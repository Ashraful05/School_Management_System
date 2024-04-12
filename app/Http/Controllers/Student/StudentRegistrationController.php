<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $request->validate([
           'name'=>'required|string',
            'mobile'=>'required|numeric',
            'address'=>'required|string',
        ]);
        DB::transaction(function() use($request){
            $checkYear = StudentYear::find($request->year_id)->year_name;
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
                if($studentId < 10){
                    $id_no = '000'.$studentId;
                }elseif ($studentId < 100){
                    $id_no = '00'.$studentId;
                }elseif ($studentId < 1000){
                    $id_no = '0'.$studentId;
                }
            }

            if($request->file('image')){
                $file = $request->file('image');
                $fileName = date('Y_m_dHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/student_images/'),$fileName);
            }
            $finalIdNo = $checkYear.$id_no;
            $code = rand(0000,9999);
            $userData = User::create([
                'name'=> $request->name,
                'id_number'=>$finalIdNo,
                'code'=>$code,
                'password'=>Hash::make($code),
                'user_type'=>'student',
                'mobile'=>$request->mobile,
                'address'=>$request->address,
                'gender'=>$request->gender,
                'mothers_name'=>$request->mothers_name,
                'fathers_name'=>$request->fathers_name,
                'religion'=>$request->religion,
                'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                'image'=>$fileName,
            ]);

            $assignData = AssignStudent::create([
               'student_id'=>$userData->id,
                'class_id'=>$request->class_id,
                'year_id'=>$request->year_id,
                'group_id'=>$request->group_id,
                'shift_id'=>$request->shift_id
            ]);
            DiscountStudent::create([
               'assign_student_id'=>$assignData->id,
                'fee_category_id'=>'1',
                'discount'=>$request->discount
            ]);

        });
        $notification = [
          'alert-type'=>'success',
          'message'=>'Data Saved!!'
        ];
        return redirect()->route('student.registration.index')->with($notification);
    }
}
