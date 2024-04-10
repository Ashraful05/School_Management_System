<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRegistrationController extends Controller
{
    public function registrationIndex()
    {
        $assignedStudents = AssignStudent::get();
        return view('student_registration.index',compact('assignedStudents'));
    }
    public function registrationCreate()
    {
        $years = StudentYear::get();
        $shifts = StudentShift::get();
        $groups = StudentGroup::get();
        $classes = StudentClass::get();
        return view('student_registration.form',compact('classes','years','shifts','groups'));
    }
    public function saveRegistration(Request $request)
    {
//        return $request->all();
//        $request->validate([
//           'name'=>'required'
//        ]);
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('user_type','student')->orderBy('id','desc')->first();
            if($student == null){
                $firstReg = 0;
                $studentId = $firstReg+1;
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }else{
                $student = User::where('user_type','student')->orderby('id','desc')->first()->id;
                $studentId = $student+1;
                if($studentId<10){
                    $id_no = '000'.$studentId;
                }elseif ($studentId<100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId<1000){
                    $id_no = '0'.$studentId;
                }
            }

        });
    }
}
