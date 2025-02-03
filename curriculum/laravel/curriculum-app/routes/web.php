<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [App\Http\Controllers\member_regist_Controller::class, 'getRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\member_regist_Controller::class, 'getRegister'])->name('register');

Route::get('/login', [App\Http\Controllers\member_login_Controller::class, 'getShowLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\member_login_Controller::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\SessionController::class, 'logout'])->name('logout');

Route::get('/confirm', [App\Http\Controllers\member_regist_Controller::class, 'getConfirm'])->name('confirm');
Route::post('/confirm', [App\Http\Controllers\member_regist_Controller::class, 'getConfirm'])->name('confirm');
Route::get('/complete', [App\Http\Controllers\member_regist_Controller::class, 'getComplete'])->name('complete');
Route::post('/complete', [App\Http\Controllers\member_regist_Controller::class, 'getComplete'])->name('complete');

Route::get('/main', [App\Http\Controllers\Maincontroller::class, 'getMain'])->name('main');

Route::get('/firstRegist', [App\Http\Controllers\FirstRegistController::class, 'getRegister'])->name('firstRegist');
Route::post('/firstRegist', [App\Http\Controllers\FirstRegistController::class, 'firstRegister'])->name('firstRegist');
Route::get('/firstRegistComplete', [App\Http\Controllers\FirstRegistController::class, 'getComplete'])->name('firstRegistComplete');