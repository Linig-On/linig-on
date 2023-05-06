<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bookmark;
use App\Helpers\NotificationHandler;
use App\Models\AppRating;
use App\Models\User;
use App\Models\Worker;
use App\Models\WorkerRating;
use App\Models\WorkerSkill;
use App\Models\WorkerSocial;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
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

        return view('public.service')->with('listOfWorkers', $model);
    }

    /**
     * GET
     */
    public function serviceDashboard()
    {
        $worker = DB::table('workers')
            ->join('users', 'users.id', '=', 'workers.user_id')
            ->where('workers.user_id', Auth::user()->id)
            ->select('workers.id as worker_id', 'users.id as user_id', 'users.*', 'workers.*')
            ->first();
        
        $latestRating = DB::table('worker_ratings')
            ->where('worker_id', $worker->worker_id)
            ->join('users', 'users.id', '=', 'worker_ratings.user_id')
            ->orderBy('worker_ratings.created_at', 'desc')
            ->first();
        
        $listOfBookings = DB::table('bookings')
            ->where('worker_id', $worker->worker_id)
            ->where('status', 'Pending')
            ->orWhere('status', 'For Approval')
            ->get();

        $ratingAvg = DB::table('worker_ratings')
            ->where('worker_id', $worker->worker_id)
            ->avg('rating');
        
        $bookingStats = [
            'recieved' => DB::table('bookings')
                ->where('worker_id', $worker->worker_id)
                ->count(),
            'pending' => DB::table('bookings')
                ->where('worker_id', $worker->worker_id)
                ->where('status', 'Pending')
                ->orWhere('status', 'For Approval')
                ->count()
        ];
        
        return view('service.svcDashboard')
            ->with('listOfBookings', $listOfBookings)
            ->with('latestRating', $latestRating)
            ->with('ratingAvg', $ratingAvg)
            ->with('bookingStats', $bookingStats);
    }

    /**
     * GET
     */
    public function serviceMyProfile()
    {
        $authId = Auth::user()->id;
        $worker = DB::table('workers')->where('user_id', $authId)->first();
        $workerId = $worker->id;

        $workerSkills = DB::table('worker_skills')->where('worker_id', $workerId)->get();
        $workerSocials = DB::table('worker_socials')->where('worker_id', $workerId)->get();
        
        return view('service.svcMyProfile')->with('workerSkills', $workerSkills)->with('workerSocials', $workerSocials)->with('workerId', $workerId);
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
        $workerRating = DB::table('worker_ratings')->where('worker_id', $worker->id)->orderBy('created_at', 'DESC')->get();
        $workerRatingAvg = DB::table('worker_ratings')->where('worker_id', $worker->id)->avg('rating');
        $isBookmarked = 'false';
        $hasBookingComplete = false;
        
        if (Auth::user() != null) {
            $isBookmarked = DB::table('bookmarks')
                ->where('worker_id', $worker->id)
                ->where('user_id', Auth::user()->id)
                ->first() != null ? 'true' : 'false';
            
            $hasBookingComplete = DB::table('bookings')
                ->where('worker_id', $worker->id)
                ->where('user_id', Auth::user()->id)
                ->where('status', 'Done')
                ->first() != null ? true : false;
        }

        return view('public.svcProfile')
            ->with('workerInfo', $worker)
            ->with('userInfo', $user)
            ->with('workerSkills', $workerSkills)
            ->with('workerSocials', $workerSocials)
            ->with('workerRatings', $workerRating)
            ->with('workerRatingAvg', (int)$workerRatingAvg)
            ->with('isBookmarked', $isBookmarked)
            ->with('canComment', $hasBookingComplete);
    }

    /**
     * POST
     */
    public function rateWorker(Request $request) 
    {
        $worker = DB::table('workers')
            ->join('users', 'users.id', '=', 'workers.user_id')
            ->where('workers.id', $request->input('worker_id'))
            ->first();

        try {
            // validating fields
            $data = $request->validate([
                'user_id' => 'required',
                'worker_id' => 'required',
                'full_name' => 'required',
                'comment' => 'required',
                'rating' => 'required',
            ]);

            WorkerRating::create([
                'user_id' => $data['user_id'],
                'worker_id' => $data['worker_id'],
                'name' => $data['full_name'],
                'comment' => $data['comment'],
                'rating' => $data['rating'],
                'created_at' => Carbon::now(),
            ]);

            // send notifications

            Session::flash('worker-rating-success', 'Thank you for your feedback! You have successfully rated ' . $worker->first_name . ' ' . $worker->last_name);
            return redirect()->back();
        } catch (ValidationException $th) {
            Session::flash('worker-rating-failed-missing-fields', 'Uh oh! Rating ' . $worker->first_name . ' ' . $worker->last_name . ' was not successful. Please make sure to fill in the required fields.');
            return redirect()->back();
        } catch (QueryException $th) {
            Session::flash('worker-rating-failed', 'Uh oh! Rating ' . $worker->first_name . ' ' . $worker->last_name . ' was not successful!');
            return redirect()->back();
        }
    }

    /**
     * POST
     */
    public function rateApp(Request $request) 
    {
        try {
            // validating fields
            $data = $request->validate([
                'user_id' => 'required',
                'full_name' => 'required',
                'comment' => 'required',
                'is_liked' => 'required',
            ]);

            AppRating::create([
                'user_id' => $data['user_id'],
                'name' => $data['full_name'],
                'comment' => $data['comment'],
                'is_liked' => $data['is_liked'],
                'created_at' => Carbon::now(),
            ]);

            // send notifications

            Session::flash('app-rating-success', 'Thank you for your feedback! Your feedback will helps us improve our website.');
            return redirect()->back();
        } catch (ValidationException $th) {
            Session::flash('app-rating-failed-missing-fields', 'Uh oh! Your rating was not successful. Please make sure to fill in the required fields.');
            return redirect()->back();
        } catch (QueryException $th) {
            Session::flash('app-rating-failed', 'Uh oh! Your rating was not successful...');
            return redirect()->back();
        }
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

        

        return view('public.service')->with('listOfWorkers', $model);
    }

    /**
     * POST
     */
    public function bookmarkWorker(Request $request) {
        $worker_id = $request->input('id');
        
        try {
            Bookmark::create([
                'user_id' => Auth::user()->id,
                'worker_id' => $worker_id,
                'created_at' => Carbon::now()
            ]);
        } catch (QueryException $th) {
            return response('Error.');
        }
        return response('Successfull.');
    }

    /**
     * POST
     */
    public function unBookmarkWorker(Request $request) {
        $worker_id = $request->input('id');

        try {
            DB::table('bookmarks')->where('worker_id', $worker_id)->delete();
        } catch (QueryException $th) {
            return response('Error.');
        }
        return response('Successfull.');
    }

    /**
     * POST
     */
    public function bookWorker(Request $request) {

        $worker = DB::table('workers')
            ->join('users', 'users.id', '=', 'workers.user_id')
            ->where('workers.id', '=', (int)$request->input('worker_id'))
            ->first();

        $workerName = $worker->first_name . ' '. $worker->last_name;
        
        try {
            $filename = null;

            if ($request->image_of_area != null) {
                // get the filename of image uploaded
                $filename = time() . '_' . $request->image_of_area->getClientOriginalName();

                // store in public folder
                $request->image_of_area->move(public_path('img/booking/img-of-area'), $filename);
            }
            
            $data = $request->validate([
                'area_type' => 'required',
                'address' => 'required',
                'landmarks' => 'required',
                'preferred_time' => 'required',
                'preferred_date' => 'required',
            ]);

            $arr = $request->input('area_type');
            $typeOfArea = implode(", ", $arr);

            Booking::create([
                'user_id' => $request->input('user_id'),
                'worker_id' => $request->input('worker_id'),
                'date_booked' => date('Y-m-d'),
                'status' => 'For Approval',
                'client_first_name' => Auth::user()->first_name,
                'client_last_name' => Auth::user()->last_name,
                'client_email_address' => Auth::user()->email,
                'client_contact_number' => Auth::user()->contact_number,
                'client_gender' => Auth::user()->gender,
                'client_address' => Auth::user()->address,
                'type_of_area' => $typeOfArea,
                'landmarks' => $data['landmarks'],
                'area_image_url' => $filename,
                'additional_details_requests' => $request->input('message'),
                'preferred_time' => $data['preferred_time'],
                'preferred_date' => $data['preferred_date'],
            ]);

            $clientName = Auth::user()->first_name . ' ' . Auth::user()->last_name;

            // send notifications
            NotificationHandler::createOnBookingToUser($request->input('user_id'));
            NotificationHandler::createOnBookingToWorker($worker->user_id, $clientName);
            
            Session::flash('booking-success', 'Successfully booked a service to <span class="fw-bold fs-inherit"> ' . $workerName . '!</span>');
            return redirect()->back();

        } catch (ValidationException $ex) {
            Session::flash('booking-missing-fields', $ex->getMessage());
            return redirect()->back()->withErrors($ex->validator->errors())->withInput();
        } catch (Exception $ex) {
            Session::flash('booking-failed', 'An error occured while attempting to book <span class="fw-bold fs-inherit text-danger"> ' . $workerName . '.</span>');
            return redirect()->back();
        }
    }

    /**
     * GET
     */
    public function serviceBookings() {
        $worker = DB::table('workers')
            ->where('user_id', Auth::user()->id)
            ->join('users', 'users.id', '=', 'workers.user_id')
            ->select('workers.id as worker_id', 'users.id as user_id', 'users.*', 'workers.*')
            ->first();
        
        $listOfBookings = DB::table('bookings')->where('worker_id', $worker->worker_id)->get();

        return view('service.svcBookings')->with('listOfBookings', $listOfBookings);
    }

    /**
     * POST
     */
    public function acceptBooking(Request $request) {

        try {
            $booking = DB::table('bookings')->where('id', (int)$request->input('id'))->first();
            $clientName = $booking->client_first_name . ' ' . $booking->client_last_name;
            $workerName = Auth::user()->first_name . ' ' . Auth::user()->last_name;

            DB::table('bookings')
                ->where('id', (int)$request->input('id'))
                ->update([
                    'status' => 'Pending', 
                    'updated_at' => Carbon::now()
                ]);
            
            $workerUserId = DB::table('workers')
                ->join('users', 'users.id', '=', 'workers.user_id')
                ->where('workers.id', Auth::user()->id)
                ->select('workers.id as worker_id', 'users.id as user_id', 'users.*', 'workers.*')
                ->first()
                ->id;

            // send notifications
            NotificationHandler::createOnBookingAcceptToUser($booking->user_id, $clientName);
            NotificationHandler::createOnBookingAcceptToWorker($workerUserId, $clientName);

            return response(json_encode(['message' => 'You have successfully accepted a booking!']), 200);
        } catch (Exception $th) {
            return response(json_encode(['message' => $th->getMessage()]), 410);
        }
    }

    /**
     * POST
     */
    public function cancelBooking(Request $request) {

        try {
            $booking = DB::table('bookings')->where('id', (int)$request->input('id'))->first();
            $clientName = $booking->client_first_name . ' ' . $booking->client_last_name;

            DB::table('bookings')
                ->where('id', (int)$request->input('id'))
                ->update([
                    'status' => 'Cancelled',
                    'updated_at' => Carbon::now()
                ]);
            
            $workerUserId = DB::table('workers')
                ->join('users', 'users.id', '=', 'workers.user_id')
                ->where('workers.id', Auth::user()->id)
                ->select('workers.id as worker_id', 'users.id as user_id', 'users.*', 'workers.*')
                ->first()
                ->id;
    
            // send notifications
            NotificationHandler::createOnBookingCanceledToUser($booking->user_id);
            NotificationHandler::createOnBookingCanceledToWorker($workerUserId, $clientName);

            return response(json_encode(['message' => 'You have successfully cancelled a booking.']), 200);
        } catch (Exception $th) {
            return response(json_encode(['message' => $th->getMessage()]), 410);
        }
    }

    /**
     * POST
     */
    public function completeBooking(Request $request) {

        try {
            $booking = DB::table('bookings')->where('id', (int)$request->input('id'))->first();
            $workerName = Auth::user()->first_name . ' ' . Auth::user()->last_name;

            DB::table('bookings')
                ->where('id', (int)$request->input('id'))
                ->update([
                    'status' => 'Done',
                    'updated_at' => Carbon::now(),
                    'date_finished' => date('Y-m-d')
                ]);
    
            $workerUserId = DB::table('workers')
                ->join('users', 'users.id', '=', 'workers.user_id')
                ->where('workers.id', Auth::user()->id)
                ->select('workers.id as worker_id', 'users.id as user_id', 'users.*', 'workers.*')
                ->first()
                ->id;

                // send notifications
            NotificationHandler::createOnBookingCompleteToUser($booking->user_id, $workerName);
            NotificationHandler::createOnBookingCompleteToWorker($workerUserId);
            
            return response(json_encode(['message' => 'Great! You have completed a booking.']), 200);
        } catch (Exception $th) {
            return response(json_encode(['message' => $th->getMessage()]), 410);
        }
    }
}
