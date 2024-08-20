<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentMarks;
use App\Models\StudentMarksGrade;
use Illuminate\Http\Request;
use function GuzzleHttp\normalize_header_keys;

class StudentMarksGradeController extends Controller
{
    public function index()
    {
        $allData = StudentMarksGrade::get();
        return view('student_marks_grade.index',compact('allData'));
    }

    public function create()
    {
        return view('student_marks_grade.form');
    }

    public function store(Request $request)
    {
        StudentMarksGrade::create($request->all());
//        StudentMarksGrade::create([
//            'grade_name'=>$request->grade_name,
//            'grade_point'=>$request->grade_point,
//            'start_marks'=>$request->start_marks,
//            'end_marks'=>$request->end_marks,
//            'start_point'=>$request->start_point,
//            'end_point'=>$request->end_point,
//            'remarks'=>$request->remarks,
//        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Data Saved!!'
        ];
        return redirect()->route('marksGrade.index')->with($notification);
    }

    public function edit($id)
    {
        $marksGrade = StudentMarksGrade::findOrFail($id);
        return view('student_marks_grade.edit',compact('marksGrade'));
    }

    public function update(Request $request,$id)
    {
        StudentMarksGrade::findOrFail($id)->update([
             'grade_name'=>$request->grade_name,
            'grade_point'=>$request->grade_point,
            'start_marks'=>$request->start_marks,
            'end_marks'=>$request->end_marks,
            'start_point'=>$request->start_point,
            'end_point'=>$request->end_point,
            'remarks'=>$request->remarks,
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!'
        ];
        return redirect()->route('marksGrade.index')->with($notification);
    }



}
