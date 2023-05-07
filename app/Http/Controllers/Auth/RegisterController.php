<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\NotificationHandler;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Worker;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
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
     * @param Request $request
     * @return /login/user
     * @return redirect()->back()->withErrors()->input()
     */
    public function registerUser(Request $request)
    {
        try {
            $filename = null;

            if ($request->img != null) {
                // get the filename of image uploaded
                $filename = time() . '_' . $request->img->getClientOriginalName();

                // store in public folder
                $request->img->move(public_path('img/profile'), $filename);
            }

            // Validate the incoming request data
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|max:1',
                'email' => 'required',
                'password' => 'required|min:8',
                'contact_number' => 'required|min:11',
                'address' => 'required',
            ]);

            // Create a new user object and fill it with the validated data
            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'contact_number' => $validatedData['contact_number'],
                'address' => $validatedData['address'],
                'image_url' => $filename,
            ]);

            // Send notification
            NotificationHandler::createOnRegister($user->id);

            // Redirect the user to a success page
            return redirect('/login/user')->with('success', 'Registration successful!');
        } catch (ValidationException $ex) {
            return redirect()->back()->withErrors($ex->validator->errors())->withInput();
        } catch (QueryException $ex) {
            $errorCode = $ex->errorInfo[1];

            if ($errorCode == 1062) {
                // we have a duplicate entry problem
                return redirect()->back()->withErrors(['msg' => 'This email address already exists.']);
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
     * POST
     * @param Request $request
     * @return /login/worker
     * @return redirect()->back()->withErrors()->input()
     */
    public function registerWorkerIndividual(Request $request)
    {
        try {
            $imgFileName = null;
            $resumeFileName = null;
            
            if ($request->file('img') != null) {
                // get the filename of file uploaded
                $imgFileName = time() . '_' . $request->file('img')->getClientOriginalName();
                // store in public folder
                $request->file('img')->move(public_path('img/profile'), $imgFileName);
            }

            if ($request->file('resume_url') != null) {
                // get the filename of file uploaded
                $resumeFileName = time() . '_' . $request->file('resume_url')->getClientOriginalName();
                // store in public folder
                $request->file('resume_url')->move(public_path('resume/pending-approval'), $resumeFileName);
            } else {
                throw new ValidationException(500);
            }
            
            // Validate the incoming request data
            $validatedData = $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required|max:1',
                'email' => 'required',
                'password' => 'required|min:8',
                'contact_number' => 'required|min:11',
                'address' => 'required',
            ]);
            
            // Create a new user object and fill it with the validated data
            $user = User::create([
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'gender' => $validatedData['gender'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'contact_number' => $validatedData['contact_number'],
                'address' => $validatedData['address'],
                'image_url' => $imgFileName,
                'user_type' => 'SVC',
            ]);
            
            Worker::create([
                'user_id' => $user->id,
                'resume_url' => $resumeFileName,
                'is_approved' => false,
            ]);

            // Redirect the user to a success page
            return redirect('/register/worker/wait-approval')->with('success', 'Registration successful!');
        } catch (ValidationException $ex) {
            Session::flash('missing-fields', 'Please make sure to fill in all of the required fields.');
            
            return redirect()->back()->withInput();
        } catch (QueryException $ex) {
            $errorCode = $ex->errorInfo[1];

            if ($errorCode == 1062) {
                // we have a duplicate entry problem
                Session::flash('email-already-exist', 'This email address already exists.');
                return redirect()->back();
            }
        }
    }

    /**
     * GET
     */
    public function registerWorkerWaitApproval()
    {
        return view('auth.register.waitApproval');
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
