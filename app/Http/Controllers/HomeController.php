<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $workers = DB::table('workers')->get();

        $topRatedWorkers = array();
        $i = 0;
        foreach ($workers as $worker) {
            $user = DB::table('users')->where('id', $worker->user_id)->get();
            $workerRatingAvg = (int)DB::table('worker_ratings')->where('worker_id', $worker->id)->avg('rating');

            if ($workerRatingAvg >= 4 && $i < 3) {
                $item = [
                    'worker_id' => $worker->id,
                    'image_url' => $user->first()->image_url,
                    'name' => $user->first()->first_name . ' ' . $user->first()->last_name,
                    'short_bio' => $worker->short_bio,
                ];
                
                array_push($topRatedWorkers, $item);
                $i++;
            }
        }

        return view('home')->with('topRatedWorkers', $topRatedWorkers);
    }

    public function aboutUs()
    {
        return view('aboutUs');
    }
}
