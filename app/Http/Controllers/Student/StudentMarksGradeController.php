<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentMarksGrade;
use Illuminate\Http\Request;

class StudentMarksGradeController extends Controller
{
    public function index()
    {
        $allData = StudentMarksGrade::get();
        return view('student_marks_grade.index',compact('allData'));
    }
}
