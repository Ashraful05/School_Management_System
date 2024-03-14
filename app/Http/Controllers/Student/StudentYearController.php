<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\cr;
use App\Models\StudentYear;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $years = StudentYear::get();
        return view('student_year.index',compact('years'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentYear $year)
    {
        return view('student_year.form',compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'year_name'=>'required|unique:student_years'
        ]);
        StudentYear::create([
           'year_name'=>$request->year_name
        ]);
        $notification = [
          'alert-type'=>'success',
          'message'=>'Data Saved!!!'
        ];
        return redirect()->route('year.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentYear $year)
    {
        return view('student_year.form',compact('year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentYear $year)
    {
        $request->validate([
            'year_name'=>'required|unique:student_years'
        ]);
        $year->update([
           'year_name'=>$request->year_name
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Saved!!!'
        ];
        return redirect()->route('year.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cr  $cr
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentYear $year)
    {
        $year->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Updated!!!'
        ];
        return redirect()->route('year.index')->with($notification);
    }
}
