<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
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
Route::get('/about', [HomeController::class, 'aboutUs'])->name('aboutUs');

Route::get('/register/user', [RegisterController::class, 'registerAsUser'])->name('registerAsUser');
Route::get('/register/worker', [RegisterController::class, 'registerAsWorker'])->name('registerAsWorker');

Route::get('/login/user', [LoginController::class, 'loginAsUser'])->name('loginAsUser');
Route::get('/login/worker', [LoginController::class, 'loginAsWorker'])->name('loginAsWorker');

