<?php

use App\Http\Controllers\Guess\LoginController;
use Illuminate\Support\Facades\Route;

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


// ==== Guest Side Start ====
Route::get('/', [HomeController::class, 'index']);

// ==== Guest Side End ====



// ==== Authenticate Start ====
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', function () { return redirect('/'); });

// ==== Authenticate End ====

