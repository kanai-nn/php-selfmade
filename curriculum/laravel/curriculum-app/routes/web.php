<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;

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
Route::get('/calendar/user-periods', [App\Http\Controllers\CalendarController::class, 'getRecentPeriods']);


Route::get('/firstRegist', [App\Http\Controllers\FirstRegistController::class, 'getRegister'])->name('firstRegist');
Route::post('/firstRegist', [App\Http\Controllers\FirstRegistController::class, 'firstRegister'])->name('firstRegist');
Route::get('/firstRegistComplete', [App\Http\Controllers\FirstRegistController::class, 'getComplete'])->name('firstRegistComplete');


Route::get('/menstrualcorrect', [App\Http\Controllers\CorrectController::class, 'getform'])->name('menstrualcorrect');
Route::post('/menstrualcorrect', [App\Http\Controllers\CorrectController::class, 'correct'])->name('menstrualcorrect');

Route::get('/beautyCorrect', [App\Http\Controllers\BeautyCorrectController::class, 'getform'])->name('beautyCorrect');
Route::post('/beautyCorrect', [App\Http\Controllers\BeautyCorrectController::class, 'add'])->name('beautyCorrect');
Route::get('/beautyRemove', [App\Http\Controllers\BeautyRemoveController::class, 'getform'])->name('beautyGet');
// Route::post('/beautyRemove', [App\Http\Controllers\BeautyRemoveController::class, 'remove'])->name('beautyRemove');
Route::post('/beautyRemove/{id}', [App\Http\Controllers\BeautyRemoveController::class, 'remove'])->name('beautyRemovedone');

use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'getEvents']);
Route::post('/events/store', [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

use App\Http\Controllers\BeautyUpdateController;

Route::post('/beauty/update/{id}', [BeautyUpdateController::class, 'updateCycle'])->name('beauty.update');








Route::get('/management', [App\Http\Controllers\ManagementController::class, 'getform'])->name('management');
Route::post('/management/{id}', [App\Http\Controllers\ManagementController::class, 'userRemove'])->name('userRemove');

Route::get('/managementAdd', [App\Http\Controllers\ManagementAddController::class, 'add'])->name('managementAdd');
Route::post('/managementAdd', [App\Http\Controllers\ManagementAddController::class, 'managementAddUser'])->name('managementAddUser');

Route::get('/salonRegistShow', [App\Http\Controllers\SalonRegistController::class, 'salonRegistShow'])->name('salonRegistShow');
Route::post('/salonRegistConfirm', [App\Http\Controllers\SalonRegistController::class, 'salonRegistConfirm'])->name('salonRegistConfirm');
Route::post('/salonRegist', [App\Http\Controllers\SalonRegistController::class, 'salonRegist'])->name('salonRegist');
Route::get('/salonRegistComplete', [App\Http\Controllers\SalonRegistController::class, 'salonRegistComplete'])->name('salonRegistComplete');

Route::get('/salonInfo', [App\Http\Controllers\SalonRegistController::class, 'salonInfo'])->name('salonInfo');
Route::post('/salonRemove/{id}', [App\Http\Controllers\SalonRegistController::class, 'salonRemove'])->name('salonRemove');

Route::get('/salon/edit/{id}', [App\Http\Controllers\SalonRegistController::class, 'edit'])->name('salon.edit');
Route::post('/salon/update/{id}', [App\Http\Controllers\SalonRegistController::class, 'update'])->name('salon.update');
