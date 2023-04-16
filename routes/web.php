<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/about', [HomeController::class, 'aboutUs'])->name('about-us');

// authentication
Route::get('/register/user', [RegisterController::class, 'registerAsUser'])->name('register-as-user');
Route::post('/register/user', [RegisterController::class, 'registerUser'])->name('register-user');

Route::get('/register/worker', [RegisterController::class, 'registerAsWorker'])->name('register-as-worker');

Route::get('/register/worker/individual', [RegisterController::class, 'registerAsWorkerIndividual'])->name('register-as-worker-individual');
Route::post('/register/worker/individual', [RegisterController::class, 'registerWorkerIndividual'])->name('register-worker-individual');

Route::get('/register/worker/wait-approval', [RegisterController::class, 'registerWorkerWaitApproval'])->name('register-worker-wait-approval');

Route::get('/login/', [LoginController::class, 'index'])->name('login');

Route::get('/login/user', [LoginController::class, 'loginAsUser'])->name('login-as-user');
Route::post('/login/user', [LoginController::class, 'loginUser'])->name('login-user');

Route::get('/login/worker', [LoginController::class, 'loginAsWorker'])->name('login-as-worker');
Route::post('/login/worker', [LoginController::class, 'loginWorker'])->name('login-worker');

Route::get('/service/worker/{id}', [ServiceController::class, 'workerProfile'])->name('services-worker-profile');

// private module
Route::get('/service/dashboard', [ServiceController::class, 'serviceDashboard'])->name('service-dashboard');
Route::get('/service/my-profile', [ServiceController::class, 'serviceMyProfile'])->name('service-my-profile');
