<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function workerProfile()
    {
        return view('servicePlatform2');
    }
}
