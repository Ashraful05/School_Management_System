<?php

use App\Http\Controllers\Employee\EmployeeAttendenceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OthersCostController;
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
use App\Http\Controllers\Student\StudentRegistrationFeeController;
use App\Http\Controllers\Student\StudentMonthlyFeeController;
use App\Http\Controllers\Student\StudentExamFeeController;
use App\Http\Controllers\Student\StudentMarksEntryController;
use App\Http\Controllers\Student\StudentMarksGradeController;
use App\Http\Controllers\Student\StudentFeeController;
use App\Http\Controllers\Employee\EmployeeRegistrationController;
use App\Http\Controllers\Employee\EmployeeSalaryController;
use App\Http\Controllers\Employee\EmployeeLeaveController;
use App\Http\Controllers\Employee\EmployeeMonthlySalaryController;
use App\Http\Controllers\Employee\ManageEmployeeSalaryController;

use App\Http\Controllers\Report\ProfitController;
use App\Http\Controllers\Report\MarkSheetController;



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
Route::resource('registration/fee',StudentRegistrationFeeController::class)->middleware('auth:sanctum');
Route::get('classwise/registration/fee',[StudentRegistrationFeeController::class,'classWiseRegistrationFee'])->name('student_registration_fee_classwise_get')->middleware('auth:sanctum');
Route::get('registration_fee/pay_slip',[StudentRegistrationFeeController::class,'registrationFeePaySlip'])->name('student.registration.fee.payslip')->middleware('auth:sanctum');

Route::get('monthly/fee',[StudentMonthlyFeecontroller::class,'Index'])->name('monthlyfee.index')->middleware('auth:sanctum');
Route::get('classwise/monthly/fee',[StudentMonthlyFeecontroller::class,'classWiseMonthlyFee'])->name('student_monthly_fee_classwise_get')->middleware('auth:sanctum');
Route::get('monthly_fee/pay_slip',[StudentMonthlyFeeController::class,'monthlyFeePaySlip'])->name('student.monthly.fee.payslip')->middleware('auth:sanctum');

Route::controller(StudentExamFeeController::class)->middleware('auth:sanctum')
    ->prefix('exam')->group(function (){
    Route::get('fee','Index')->name('exam.fee.index');
    Route::get('class_wise/fee','classWiseExamFee')->name('student_exam_fee_classwise_get');
    Route::get('fee/pay_slip','examFeePaySlip')->name('student.exam.fee.payslip');
});

//Route::controller(EmployeeRegistrationController::class)->middleware('auth:sanctum')
//    ->prefix('employee/management')->group(function (){
//       Route::get('view','Index')->name('employee.registration.index');
//    });


Route::controller(EmployeeRegistrationController::class)->prefix('employeeRegistration')
    ->middleware('auth:sanctum')->group(function(){
        Route::get('list','index')->name('employeeRegistration.index');
        Route::get('create','create')->name('employeeRegistration.create');
        Route::post('save','store')->name('employeeRegistration.store');
        Route::get('edit/{id}','edit')->name('employeeRegistration.edit');
        Route::get('details/{id}','details')->name('employeeRegistration.details');
        Route::post('update/{id}','update')->name('employeeRegistration.update');
    });
Route::controller(EmployeeSalaryController::class)->prefix('employeeSalary')
    ->middleware('auth:sanctum')->group(function (){
       Route::get('list','index')->name('employeeSalary.index');
       Route::get('increment/{id}','increment')->name('employeeSalary.increment');
       Route::get('details/{id}','details')->name('employeeSalary.details');
       Route::post('increment_salary/{id}','updateSalaryIncrement')->name('employeeSalary.increment.update');
    });

Route::controller(EmployeeLeaveController::class)->prefix('employeeLeave')
    ->middleware('auth:sanctum')->group(function (){
        Route::get('list','leaveIndex')->name('employeeLeave.index');
        Route::get('create','leaveCreate')->name('employeeLeave.create');
        Route::post('save','leaveSave')->name('employeeLeave.save');
        Route::get('edit/{id}','leaveEdit')->name('employeeLeave.edit');
        Route::post('update/{id}','leaveUpdate')->name('employeeLeave.update');
        Route::get('delete/{id}','leaveDelete')->name('employeeLeave.delete');

    });

Route::resource('employeeAttendance',EmployeeAttendenceController::class)->middleware('auth:sanctum');
Route::resource('employeeMonthlySalary',EmployeeMonthlySalaryController::class)->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function (){
    Route::get('employeeMonthWiseSalary',[EmployeeMonthlySalaryController::class,'employeeMonthWiseSalary'])->name('employee_monthly_salary_get');
    Route::get('employeeMonthlySalary/employee_monthly_salary_paySlip/{employee_id}',[EmployeeMonthlySalaryController::class,'employeeMonthlySalaryPaySlip'])->name('employee.monthly.salary.payslip');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::resource('marksEntry',StudentMarksEntryController::class);
    Route::prefix('marksEntry')->group(function (){
        Route::get('get/subject',[StudentMarksEntryController::class,'getSubject'])->name('marks_get_subject');
        Route::get('get/student/marks',[StudentMarksEntryController::class,'getStudentMarks'])->name('student.marks.getstudents');
        Route::get('get/student/marks/edit',[StudentMarksEntryController::class,'editStudentMarks'])->name('edit.student.marks');
        Route::get('get/student/marks/edit/by_ajax',[StudentMarksEntryController::class,'editMarksByAjax'])->name('student.marks.edit.getstudents');
        Route::post('get/student/marks/update',[StudentMarksEntryController::class,'updateStudentMarks'])->name('update.student.marks');
    });
});

Route::controller(StudentMarksGradeController::class)->prefix('marksGrade')
    ->middleware('auth:sanctum')->group(function (){
    Route::get('/','index')->name('marksGrade.index');
    Route::get('add','create')->name('marksGrade.create');
    Route::post('save','store')->name('marksGrade.store');
    Route::get('edit/{id}','edit')->name('marksGrade.edit');
    Route::post('update/{id}','update')->name('marksGrade.update');
});

Route::middleware('auth:sanctum')->group(function (){
    Route::resource('studentFee',StudentFeeController::class);
    Route::get('examWiseFee',[StudentFeeController::class,'studentFeeGet'])->name('student_fee_get');
});

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('manageEmployeeSalary',ManageEmployeeSalaryController::class);
    Route::get('employeeWiseSalary',[ManageEmployeeSalaryController::class,'employeeSalaryGet'])->name('employee_salary_get');
});

Route::controller(OthersCostController::class)->middleware('auth:sanctum')
    ->prefix('manageOthersCost')->group(function (){
   Route::get('/','index')->name('manageOthersCost.index');
   Route::get('add','create')->name('manageOthersCost.create');
   Route::post('save','store')->name('manageOthersCost.store');
   Route::get('edit/{id}','edit')->name('manageOthersCost.edit');
   Route::post('update/{id}','update')->name('manageOthersCost.update');
});

Route::controller(ProfitController::class)->middleware('auth:sanctum')->prefix('profit')->group(function (){
   Route::get('monthly','monthlyProfitIndex')->name('monthly_profit');
   Route::get('report','dateWiseProfitReportGet')->name('date_wise_profit_report_get');
   Route::get('report/pdf','profitReportPDF')->name('profit_report_pdf');
});

Route::controller(MarkSheetController::class)->middleware('auth:sanctum')->prefix('marksheet')->group(function(){
   Route::get('/','index')->name('marksheet.index');
   Route::get('/report','markSheetReport')->name('marksheet.report');
});





