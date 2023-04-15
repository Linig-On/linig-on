<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * GET
     */
    public function index()
    {
        return view('auth.login.login');
    }

    /**
     * GET
     */
    public function loginAsUser()
    {
        return view('auth.login.loginAsUser');
    }

    /**
     * GET
     */
    public function loginAsWorker()
    {
        return view('auth.login.loginAsWorker');
    }

    /**
     * POST
     * @param Request $request
     */
    public function loginWorker(Request $request)
    {
        // validate
        // check if the worker is already approved
        // throw an error if its not saying its still not approved
    }
}
