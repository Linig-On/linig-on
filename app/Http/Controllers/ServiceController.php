<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        return view('service');
    }

    public function serviceDashboard()
    {
        return view('svcDashboard');
    }

    public function serviceMyProfile()
    {
        $workerSkills = DB::table('worker_skills')->where('user_id', Auth::user()->id)->get();
        $workerSocials = DB::table('worker_socials')->where('user_id', Auth::user()->id)->get();
        
        return view('svcMyProfile')->with('workerSkills', $workerSkills)->with('workerSocials', $workerSocials);
    }
    
    public function workerProfile()
    {
        return view('servicePlatform2');
    }
}
