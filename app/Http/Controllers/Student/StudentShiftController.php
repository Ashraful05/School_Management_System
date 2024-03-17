<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentShift;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = StudentShift::get();
        return view('student_shift.index',compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentShift $shift)
    {
        return view('student_shift.form',compact('shift'));
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
            'shift_name'=>'required|unique:student_shifts'
        ]);
        StudentShift::create([
            'shift_name'=>$request->shift_name
        ]);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!!'
        ];
        return redirect()->route('shift.index')->with($notification);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentShift $shift)
    {
        return view('student_shift.form',compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentShift $shift)
    {
        $request->validate([
            'shift_name'=>'required|unique:student_shifts,shift_name,'.$shift->id
        ]);
        $shift->update([
            'shift_name'=>$request->shift_name
        ]);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!!'
        ];
        return redirect()->route('shift.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentShift $shift)
    {
        $shift->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Deleted!!!'
        ];
        return redirect()->route('shift.index')->with($notification);
    }
}
