<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get
     */
    public function registerAsUser()
    {
        return view('auth.register.registerAsUser');
    }

    /**
     * POST
     */
    public function registerUser(Request $request)
    {
        // Validate the incoming request data
        try {
            // get the filename of image uploaded
            $filename = $request->img->getClientOriginalName();

            // store in public folder
            $request->img->move(public_path('img/profile'), $filename);

            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'email' => 'required',
                'password' => 'required',
                'contact_number' => 'required',
                'address' => 'required',
            ]);

            // Create a new user object and fill it with the validated data
            User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'contact_number' => $validatedData['contact_number'],
                'address' => $validatedData['address'],
                'image_url' => $filename,
            ]);

            // Redirect the user to a success page
            return redirect('/login/user')->with('success', 'Registration successful!');
        } catch (ValidationException $ex) {
            return redirect()->back()->withErrors($ex->validator->errors())->withInput();
        } catch (QueryException $ex) {
            $errorCode = $ex->errorInfo[1];

            if ($errorCode == 1062) {
                // we have a duplicate entry problem
                return redirect()->back()->withErrors(["msg" => "This email address already exists."]);
            }
        }
    }

    /**
     * GET
     */
    public function registerAsWorker()
    {
        return view('auth.register.registerAsWorker');
    }

    /**
     * GET
     */
    public function registerAsWorkerIndividual()
    {
        return view('auth.register.registerAsWorkerInd');
    }

    /**
     * GET
     */
    public function registerAsWorkerTeam()
    {
        return view('auth.register.registerAsWorkerTeam');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
