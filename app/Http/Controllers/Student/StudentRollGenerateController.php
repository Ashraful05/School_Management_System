<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentRollGenerateController extends Controller
{
    public function rollGenerate()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        return view('student_roll_generate.index',compact('years','classes'));
    }
    public function getStudents(Request $request)
    {
        $allData = AssignStudent::with('student')
            ->where(['year_id'=>$request->year_id,'class_id'=>$request->class_id])
            ->get();
        return response()->json($allData);
    }

    public function saveStudentRoll(Request $request)
    {
        if($request->student_id != null){
            for($i=0;$i<count($request->student_id);$i++){
                AssignStudent::where(['year_id'=>$request->year_id,'class_id'=>$request->class_id,
                    'student_id'=>$request->student_id[$i]])->update(['roll'=>$request->roll[$i] ]);
            }
            $notification = [
                'alert-type'=>'info',
                'message'=>'Student Roll is updated....'
            ];
        }else{
            $notification = [
              'alert-type'=>'error',
              'message'=>'Sorry there is no student...'
            ];
//            return redirect()->back()->with($notification);
        }
        return redirect()->back()->with($notification);
    }



}
