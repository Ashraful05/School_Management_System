<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Student\StudentClassController;
use App\Http\Controllers\Student\StudentYearController;
use App\Http\Controllers\Student\StudentGroupController;
use App\Http\Controllers\Student\StudentShiftController;
use App\Http\Controllers\Student\StudentFeeCategoryController;
use App\Http\Controllers\Student\StudentFeeCategoryAmountController;
use App\Http\Controllers\Student\ExamTypeController;
use App\Http\Controllers\Student\SchoolSubjectController;
use App\Http\Controllers\Student\AssignStudentSubjectController;
use App\Http\Controllers\Student\DesignationController;
use App\Http\Controllers\Student\StudentRegistrationController;
use App\Http\Controllers\Student\StudentRollGenerateController;


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
Route::resource('student/shift',StudentShiftController::class)->middleware('auth:sanctum');
Route::resource('student/feeCategory',StudentFeeCategoryController::class)->middleware('auth:sanctum');
Route::resource('student/feeCategoryAmount',StudentFeeCategoryAmountController::class)
    ->except('edit')
    ->middleware('auth:sanctum');
Route::get('student/feeCategoryAmount/{fee_category_id}/edit', [StudentFeeCategoryAmountController::class,'edit'])
    ->name('feeCategoryAmount.edit')
    ->middleware('auth:sanctum');
//Route::post('student/feeCategoryAmount/{fee_category_id}', [StudentFeeCategoryAmountController::class,'update'])->name('feeCategoryAmount.update');

Route::resource('examType',ExamTypeController::class)->middleware('auth:sanctum');
Route::resource('schoolSubject',SchoolSubjectController::class)->middleware('auth:sanctum');
Route::resource('assignStudentSubject',AssignStudentSubjectController::class)
    ->except('edit')
    ->middleware('auth:sanctum');
Route::get('assignStudentSubject/{class_id}/edit',[AssignStudentSubjectController::class,'edit'])
    ->name('assignStudentSubject.edit')
    ->middleware('auth:sanctum');

Route::resource('designation',DesignationController::class)->middleware('auth:sanctum');
Route::controller(StudentRegistrationController::class)
    ->prefix('student/registration')->middleware('auth:sanctum')
    ->group(function (){
        Route::get('index','registrationIndex')->name('student.registration.index');
        Route::get('create','registrationCreate')->name('student.registration.create');
        Route::post('save','saveRegistration')->name('student.registration.store');
        Route::get('year/wise/class','classYearWise')->name('student_class_year_wise');
        Route::get('edit/{student_id}','editRegistration')->name('student.registration.edit');
        Route::post('update/{student_id}','updateRegistration')->name('student.registration.update');
        Route::get('promotion/{student_id}','studentPromotion')->name('student.registration.promotion');
        Route::post('promotion/update/{student_id}','studentPromotionUpdate')->name('promotion.update');
        Route::get('details/pdf/{student_id}','studentDetailsInPdf')->name('student.registration.details');
        Route::get('roll/generate','studentRollGenerate')->name('student.roll.generate');
});
Route::controller(StudentRollGenerateController::class)->prefix('student/roll')
    ->middleware('auth:sanctum')->group(function(){
       Route::get('generate','rollGenerate')->name('student.roll.generate');
       Route::get('students','getStudents')->name('student.registration.getstudents');
       Route::post('generate/save','saveStudentRoll')->name('student.roll.save');
    });
