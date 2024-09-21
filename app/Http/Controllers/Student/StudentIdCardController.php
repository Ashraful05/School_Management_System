<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\StudentYear;
use Illuminate\Http\Request;

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

    }
}
