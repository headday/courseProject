<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\ContentController; 
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

Route::get('/',[ContentController::class,'index'])->name('main');
Route::get('/admin',[ContentController::class,'getAdminPage'])->middleware('CheckAdminRole')->name('admin_page');
Route::get('/kurs', function () {
    return view('kurs');
});

Route::get('/course/{id}',[ContentController::class,'getDetailCourse'])->name('getDetailCourse');
Route::get('/registration',[AuthController::class,'getPage'])->middleware('AlreadyLoggedIn');
Route::post('/registration',[AuthController::class,'createUser'])->name('registration');

Route::get('/login',[AuthController::class,'getLoginPage'])->middleware('AlreadyLoggedIn');
Route::post('/login',[AuthController::class,'check'])->name('login');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/profile',[AuthController::class,'profile'])->middleware('authCheck');

Route::get('/add',[ContentController::class,'getAddPage'])->middleware('CheckAdminRole')->name('add');
Route::post('/add',[ContentController::class,'addCourse'])->middleware('CheckAdminRole')->name('addCourse');
Route::get('/delete/{id}',[ContentController::class,'deleteCourse'])->middleware('CheckAdminRole')->name('deleteCourse');

Route::get('/recording/{id}',[ContentController::class,'recordingCourse'])->middleware('authCheck')->name('recordingCourse');
Route::get('/unrecording/{id}',[ContentController::class,'unRecordingCourse'])->middleware('authCheck')->name('unrecordingrourse');
Route::get('/filter/{type}',[ContentController::class,'filter'])->name('filter');

Route::get('/recording_course/{id}',[ContentController::class,'getRecordingCourse'])->name('getRecordingCourse');
Route::get('/unrecording_with_user/{course_id}/{user_id}',[ContentController::class,'unRecordingUserWithCourse'])->name('unrecording_with_user');

