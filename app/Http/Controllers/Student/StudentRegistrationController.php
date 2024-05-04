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
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class StudentRegistrationController extends Controller
{
    public function registrationIndex()
    {

        $classes = StudentClass::get();
        $years = StudentYear::get();
        $yearId = StudentYear::orderby('id','desc')->first()->id;
        $classId = StudentClass::orderby('id','desc')->first()->id;
        $assignedStudents = AssignStudent::where(['class_id'=>$classId,'year_id'=>$yearId])->get();
//        return $assignedStudents;

        return view('student_registration.index',compact('assignedStudents',
            'classes','years','yearId','classId'));
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

    public function classYearWise(Request $request)
    {
        $classes = StudentClass::get();
        $years = StudentYear::get();
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $assignedStudents = AssignStudent::where(['class_id'=>$classId,'year_id'=>$yearId])->get();
//        return $assignedStudents;

        return view('student_registration.index',compact('assignedStudents',
            'classes','years','yearId','classId'));
    }

    public function editRegistration($student_id)
    {
        $years = StudentYear::get();
        $shifts = StudentShift::get();
        $groups = StudentGroup::get();
        $classes = StudentClass::get();
        $editData = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
//        return $editData;
        return view('student_registration.edit',compact('classes','years','shifts','groups','editData'));
    }
    public function updateRegistration(Request $request,$student_id)
    {
        $request->validate([
            'name'=>'required|string',
            'mobile'=>'required|numeric',
            'address'=>'required|string',
        ]);

        DB::transaction(function() use($request,$student_id){

            $userData = User::where('id',$student_id)->first();
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('images/student_images/'.$userData->image));
                $fileName = date('Y_m_dHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/student_images/'),$fileName);

                $userData->update([
                    'name'=> $request->name,
                    'mobile'=>$request->mobile,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'mothers_name'=>$request->mothers_name,
                    'fathers_name'=>$request->fathers_name,
                    'religion'=>$request->religion,
                    'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                    'image'=>$fileName,
                ]);
            }else{
                $userData->update([
                    'name'=> $request->name,
                    'mobile'=>$request->mobile,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'mothers_name'=>$request->mothers_name,
                    'fathers_name'=>$request->fathers_name,
                    'religion'=>$request->religion,
                    'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                ]);
            }


//            $assignData = AssignStudent::where(['id'=>$request->id,'student_id'=>$student_id])->first();
             AssignStudent::where(['id'=>$request->id,'student_id'=>$student_id])->update([
//            $assignData->update([
                 'class_id'=>$request->class_id,
                 'year_id'=>$request->year_id,
                 'group_id'=>$request->group_id,
                 'shift_id'=>$request->shift_id
             ]);

//            $discountStudent = DiscountStudent::where('assign_student_id',$request->id)->first();
            DiscountStudent::where('assign_student_id',$request->id)->update([
                'discount'=>$request->discount
            ]);
//            $discountStudent->update([
//                'discount'=>$request->discount
//            ]);

        });
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!'
        ];
        return redirect()->route('student.registration.index')->with($notification);
    }

    public function studentPromotion($student_id)
    {
        $years = StudentYear::get();
        $shifts = StudentShift::get();
        $groups = StudentGroup::get();
        $classes = StudentClass::get();
        $editData = AssignStudent::with(['student','discount'])->where('student_id',$student_id)->first();
        return view('student_registration.promotion',compact('years','shifts','groups','classes','editData'));
    }
    public function studentPromotionUpdate(Request $request,$student_id)
    {
        DB::transaction(function() use($request,$student_id){

            $userData = User::where('id',$student_id)->first();
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('images/student_images/'.$userData->image));
                $fileName = date('Y_m_dHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/student_images/'),$fileName);

                $userData->update([
                    'name'=> $request->name,
                    'mobile'=>$request->mobile,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'mothers_name'=>$request->mothers_name,
                    'fathers_name'=>$request->fathers_name,
                    'religion'=>$request->religion,
                    'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                    'image'=>$fileName,
                ]);
            }else{
                $userData->update([
                    'name'=> $request->name,
                    'mobile'=>$request->mobile,
                    'address'=>$request->address,
                    'gender'=>$request->gender,
                    'mothers_name'=>$request->mothers_name,
                    'fathers_name'=>$request->fathers_name,
                    'religion'=>$request->religion,
                    'date_of_birth'=>date('Y-m-d',strtotime($request->date_of_birth)),
                ]);
            }


//            $assignData = AssignStudent::where(['id'=>$request->id,'student_id'=>$student_id])->first();
//            AssignStudent::where(['id'=>$request->id,'student_id'=>$student_id])->update([
//            $assignData->update([
            AssignStudent::create([
                'student_id'=>$student_id,
                'class_id'=>$request->class_id,
                'year_id'=>$request->year_id,
                'group_id'=>$request->group_id,
                'shift_id'=>$request->shift_id
            ]);

//            $discountStudent = DiscountStudent::where('assign_student_id',$request->id)->first();
//            DiscountStudent::where('assign_student_id',$request->id)->update([

//            DiscountStudent::create([
//                'assign_student_id'=>$assignStudentId->id,
//                'discount'=>$request->discount,
//                'fee_category_id'=>1
//            ]);
            $assignStudentId = new AssignStudent();
            $discountStudent = new DiscountStudent();
            $discountStudent->assign_student_id = $assignStudentId->id;
            $discountStudent->fee_category_id = '1';
            $discountStudent->discount = $request->discount;

//            $discountStudent->update([
//                'discount'=>$request->discount
//            ]);

        });
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!'
        ];
        return redirect()->route('student.registration.index')->with($notification);
    }

    public function studentDetailsInPdf($student_id)
    {
        $detailsData = AssignStudent::with(['student','discount','studentGroup','classShift'])->where('student_id',$student_id)->first();
        $pdf = PDF::loadView('student_registration.student_details_pdf', compact('detailsData'));
        $pdf->setProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');

    }
}
