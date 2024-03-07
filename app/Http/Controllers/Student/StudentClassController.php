<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = StudentClass::get();
        return view('student_class.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(StudentClass $class)
    {
        return view('student_class.form',compact('class'));
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
            'name'=>'required'
        ]);
        StudentClass::create([
            'name'=>$request->name
        ]);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Class Info Saved!!'
        ];
        return redirect()->route('class.index')->with($notification);
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
    public function edit(StudentClass $class)
    {
        return view('student_class.form',compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentClass $class)
    {
        $request->validate([
           'name'=>'required'
        ]);
        $class->update([
           'name'=>$request->name
        ]);
        $notification = [
          'alert-type'=>'info',
          'message'=>'Class Info Updated!!'
        ];
        return redirect()->route('class.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentClass $class)
    {
        $class->delete();
        $notification = [
          'alert-type'=>'error',
          'message'=>'Class Info deleted'
        ];
        return redirect()->route('class.index')->with($notification);
    }
}
