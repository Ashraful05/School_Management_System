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


}
