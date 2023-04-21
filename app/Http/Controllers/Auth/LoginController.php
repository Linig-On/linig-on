<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Worker;
use App\Providers\RouteServiceProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
     * POST
     * @param Request $request
     */
    public function loginUser(Request $request)
    {
        // validate
        // check if the user logging in is a user
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->user_type == 'USR' || Auth::user()->user_type == 'ADM')
                    return redirect("service");

                Auth::logout();
                return redirect()->back()->withErrors(["msg" => "This credential is for workers."])->withInput();
            }
            return redirect()->back()->withErrors(["msg" => "Invalid credentials."]);
        } catch (ValidationException $ex) {
            return redirect()->back()->withErrors($ex)->withInput();
        }
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
        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                if (Auth::user()->user_type == 'SVC') {

                    $worker = DB::table('workers')->where('user_id', Auth::user()->id)->first();

                    if ($worker->is_approved == true) {
                        return redirect()->route('service-dashboard');
                    }

                    Auth::logout();
                    return redirect()->back()->withErrors(["msg" => "Your account is yet to be approved."])->withInput();
                }

                Auth::logout();
                return redirect()->back()->withErrors(["msg" => "This credential is for users."])->withInput();
            }
            return redirect()->back()->withErrors(["msg" => "Invalid credentials."])->withInput();
        } catch (ValidationException $ex) {
            return redirect()->back()->withErrors($ex)->withInput();
        }
    }
}
