<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Student\StudentClassController;
use App\Http\Controllers\Student\StudentYearController;
use App\Http\Controllers\Student\StudentGroupController;
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

Route::get('/', function () {
//    return view('welcome');
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');
});

Route::controller(AdminController::class)->prefix('admin')->group(function (){
    Route::get('logout','logOut')->name('admin.logout');
});

//user management routes......
Route::controller(UserController::class)
    ->prefix('user')->group(function (){
    Route::get('view','userView')->name('user_view')->middleware('auth:sanctum');
    Route::get('add','userAdd')->name('user_add')->middleware('auth:sanctum');
    Route::post('save','userSave')->name('user_save');
    Route::get('edit/{id}','editUser')->name('user_edit');
    Route::post('update/{id}','updateUser')->name('user_update');
    Route::get('delete/{id}','deleteUser')->name('user_delete')->middleware('auth:sanctum');
    Route::get('profile/view','viewProfile')->name('view_profile');
    Route::get('profile/edit','editProfile')->name('edit_user_profile');
    Route::post('profile/update','updateProfile')->name('update_user_profile');
    Route::get('change/password','changePassword')->name('change_password');
});
Route::controller(UserController::class)->group(function(){
    Route::post('password/update','updatePassword')->name('password.update');
});
Route::resource('student/class',StudentClassController::class)->middleware('auth:sanctum');
Route::resource('student/year',StudentYearController::class)->middleware('auth:sanctum');
Route::resource('student/group',StudentGroupController::class)->middleware('auth:sanctum');
