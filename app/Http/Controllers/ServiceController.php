<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerSkill;
use App\Models\WorkerSocial;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ServiceController extends Controller
{
    /**
     * GET
     */
    public function index()
    {
        $workers = DB::table('workers')->where('is_approved', true)->get();
        
        $model = array();

        foreach ($workers as $worker) {
            $user = DB::table('users')->where('id', $worker->user_id)->get();
            $skills = DB::table('worker_skills')->where('worker_id', $worker->id)->get();
            
            $item = [
                'worker_id' => $worker->id,
                'image_url' => $user->first()->image_url,
                'first_name' => $user->first()->first_name,
                'last_name' => $user->first()->last_name,
                'skills' => $skills,
                'short_bio' => $worker->short_bio,
            ];
            
            array_push($model, $item);
        }

        return view('service')->with('listOfWorkers', $model);
    }

    /**
     * GET
     */
    public function serviceDashboard()
    {
        return view('svcDashboard');
    }

    /**
     * GET
     */
    public function serviceMyProfile()
    {
        $authId = Auth::user()->id;
        $worker = DB::table('workers')->where('user_id', $authId)->get();
        $workerId = $worker->first()->id;

        $workerSkills = DB::table('worker_skills')->where('worker_id', $workerId)->get();
        $workerSocials = DB::table('worker_socials')->where('worker_id', $workerId)->get();
        
        return view('svcMyProfile')->with('workerSkills', $workerSkills)->with('workerSocials', $workerSocials)->with('workerId', $workerId);
    }
    
    /**
     * GET
     */
    public function workerProfile($id)
    {
        $worker = DB::table('workers')->where('id', (int)$id)->get()->first();
        $user = DB::table('users')->where('id', $worker->user_id)->get()->first();
        $workerSkills = DB::table('worker_skills')->where('worker_id', $worker->id)->get();
        $workerSocials = DB::table('worker_socials')->where('worker_id', $worker->id)->get();
        $workerRating = DB::table('worker_ratings')->where('worker_id', $worker->id)->get();
        $workerRatingAvg = DB::table('worker_ratings')->where('worker_id', $worker->id)->avg('rating');

        return view('svcProfile')
            ->with('workerInfo', $worker)
            ->with('userInfo', $user)
            ->with('workerSkills', $workerSkills)
            ->with('workerSocials', $workerSocials)
            ->with('workerRatings', $workerRating)
            ->with('workerRatingAvg', (int)$workerRatingAvg);
    }

    /**
     * POST
     */
    public function serviceUpdateWorker(Request $request) 
    {
        try {
            $filename = null;
            $worker = DB::table('workers')->where('id', $request->worker_id)->get()->first();
            $user = DB::table('users')->where('id', $worker->user_id)->get()->first();

            if ($request->img != null) {
                // get the filename of image uploaded
                $filename = time() . '_' . $request->img->getClientOriginalName();

                // store in public folder
                $request->img->move(public_path('img/profile'), $filename);
                
                User::whereId($user->id)->update(['image_url' => $filename]);
            }

            // validate the request
            $data = $request->validate([
                'contact_number' => 'required|min:11',
                'address' => 'required',
                'short_bio' => 'required',
                'service_info' => 'required',
                'skills' => 'required',
                'socials' => 'required'
            ]);

            /**
             * update the fields:
             *  mobile -> (users table); address -> (users table)
             *  service_info -> (workers table); short_bio -> (workers table)
             *  skills -> (worker_skills table); socials -> (worker_socials table)
             */

            Worker::whereId($worker->id)->update([
                'short_bio' => $data['short_bio'],
                'service_info' => $data['service_info'],
                'updated_at' => Carbon::now()
            ]);

            User::whereId($user->id)->update([
                'contact_number' => $data['contact_number'],
                'address' => $data['address'],
                'updated_at' => Carbon::now()
            ]);

            // delete all skills and socials on worker
            DB::table('worker_skills')->where('worker_id', $worker->id)->delete();
            DB::table('worker_socials')->where('worker_id', $worker->id)->delete();

            // NOTE: this shi- is ugly af. clean this code by using functions and 
            //      using generics.
            
            // add the new skills back to table
            foreach (json_decode($data['skills'], true) as $skill) {
                WorkerSkill::create([
                    'worker_id' => $worker->id,
                    'skill' => $skill['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            // add the new skills back to table
            foreach (json_decode($data['socials'], true) as $social) {
                WorkerSocial::create([
                    'worker_id' => $worker->id,
                    'social' => $social['value'],
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }

            Session::flash('success','Successfully updated your profile.');
            return redirect()->back();

        } catch (ValidationException $ex) {
            return redirect()->back()->withErrors($ex->validator->errors());
        }
    }

    /**
     * GET
     */

    public function filter(Request $request)
    {
        $workers = DB::table('workers')->where('is_approved', true)->get();
        $model = array();

        switch ($request->input('sort_by')) {
            case 'All':
                foreach ($workers as $worker) {
                    $user = DB::table('users')->where('id', $worker->user_id)->get();
                    $skills = DB::table('worker_skills')->where('worker_id', $worker->id)->get();
                    
                    $item = [
                        'worker_id' => $worker->id,
                        'image_url' => $user->first()->image_url,
                        'first_name' => $user->first()->first_name,
                        'last_name' => $user->first()->last_name,
                        'skills' => $skills,
                        'short_bio' => $worker->short_bio,
                    ];
                    
                    array_push($model, $item);
                }
                break;
            case 'Top Rated':
                foreach ($workers as $worker) {
                    $user = DB::table('users')->where('id', $worker->user_id)->get();
                    $skills = DB::table('worker_skills')->where('worker_id', $worker->id)->get();
                    $workerRatingAvg = (int)DB::table('worker_ratings')->where('worker_id', $worker->id)->avg('rating');
                    
                    if ($workerRatingAvg >= 4) {
                        $item = [
                            'worker_id' => $worker->id,
                            'image_url' => $user->first()->image_url,
                            'first_name' => $user->first()->first_name,
                            'last_name' => $user->first()->last_name,
                            'skills' => $skills,
                            'short_bio' => $worker->short_bio,
                        ];
                        
                        array_push($model, $item);
                    }
                }
                break;
        }

        

        return view('service')->with('listOfWorkers', $model);
    }
}
