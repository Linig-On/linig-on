<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WorkerProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;

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
Route::get('/service', [ServiceController::class, 'index'])->name('service');
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

// service
Route::get('/service/worker/{id}', [ServiceController::class, 'workerProfile'])->name('service-worker-profile');
Route::get('/service/filter', [ServiceController::class, 'filter'])->name('service-filter');

// booking a service
Route::post('/service/worker/book', [ServiceController::class, 'bookWorker'])->name('book-worker');

// bookmark a service
Route::post('/service/worker/add/bookmark', [ServiceController::class, 'bookmarkWorker'])->name('bookmark-worker');
Route::post('/service/worker/remove/bookmark', [ServiceController::class, 'unBookmarkWorker'])->name('un-bookmark-worker');
Route::get('/account/my-bookmarks', [AccountController::class, 'myBookmarkedWorkers'])->name('my-bookmarks');

// rating
Route::post('/service/worker/rate', [ServiceController::class, 'rateWorker'])->name('rate-worker');
Route::post('/service/worker/rate-app', [ServiceController::class, 'rateApp'])->name('rate-app');

// sending emails
Route::post('/about/contact-us', [ContactController::class, 'sendContactUs'])->name('send-contact-us');
Route::post('/subscribe-newsletter', [ContactController::class, 'subscribeToNewsletter'])->name('subscribe-to-newsletter');

// private module
Route::get('/service/dashboard', [ServiceController::class, 'serviceDashboard'])->name('service-dashboard');
Route::get('/service/my-profile', [ServiceController::class, 'serviceMyProfile'])->name('service-my-profile');
Route::post('/service/update/worker', [ServiceController::class, 'serviceUpdateWorker'])->name('service-update-worker');

Route::get('/service/bookings', [ServiceController::class, 'serviceBookings'])->name('service-bookings');

Route::post('/service/bookings/cancel', [ServiceController::class, 'cancelBooking'])->name('cancel-booking');
Route::post('/service/bookings/accept', [ServiceController::class, 'acceptBooking'])->name('accept-booking');
Route::post('/service/bookings/complete', [ServiceController::class, 'completeBooking'])->name('complete-booking');