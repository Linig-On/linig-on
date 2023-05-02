<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function myBookmarkedWorkers() {
        $userBookmarks = DB::table('bookmarks')->where('user_id', Auth::user()->id)->get();

        $model = array();

        foreach ($userBookmarks as $bookmark) {
            $worker = DB::table('workers')->where('id', $bookmark->worker_id)->first();
            $user = DB::table('users')->where('id', $worker->user_id)->first();
            $item = [
                'worker_id' => $worker->id,
                'worker_name' => $user->first_name . ' ' . $user->last_name,
                'short_bio' => $worker->short_bio,
                'image_url' => $user->image_url
            ];

            array_push($model, $item);
        }

        return view('public.myBookmarks')->with('userBookmarks', $model);
    }
}
