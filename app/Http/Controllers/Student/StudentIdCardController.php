<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\AssignStudent;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;
use PDF;

class StudentIdCardController extends Controller
{
    public function index()
    {
        $years = StudentYear::get();
        $classes = StudentClass::get();
        return view('student_id_card.index',compact('years','classes'));
    }
    public function studentIdCardGet(Request $request)
    {
        $yearId = $request->year_id;
        $classId = $request->class_id;
        $checkData = AssignStudent::where(['year_id'=>$yearId,'class_id'=>$classId])->first();
        if($checkData == true){
            $allData = AssignStudent::where(['year_id'=>$yearId,'class_id'=>$classId])->get();
            $pdf = PDF::loadView('student_id_card.id_card_pdf',compact('allData'));
            $pdf->setProtection(['copy','print'],'','pass');
            return $pdf->stream('document.pdf');
        }else{
            $notification = [
              'alert-type'=>'warning',
              'message'=>'Check your data'
            ];
            return redirect()->back()->with($notification);
        }
    }
}
