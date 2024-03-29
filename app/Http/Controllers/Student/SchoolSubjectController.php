<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use GuzzleHttp\Cookie\SessionCookieJar;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = SchoolSubject::get();
        return view('school_subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SchoolSubject $schoolSubject)
    {
        return view('school_subject.form',compact('schoolSubject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
           'name'=>'required|unique:school_subjects'
        ]);
        SchoolSubject::create($data);
        $notification = [
            'alert-type'=>'success',
            'message'=>'Data Saved!!'
        ];
        return redirect()->route('schoolSubject.index')->with($notification);
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
    public function edit(SchoolSubject $schoolSubject)
    {
        return view('school_subject.form',compact('schoolSubject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolSubject $schoolSubject)
    {
        $data = $request->validate([
            'name'=>'required|unique:school_subjects,name,'.$schoolSubject->id
        ]);
        $schoolSubject->update($data);
        $notification = [
            'alert-type'=>'info',
            'message'=>'Data Updated!!'
        ];
        return redirect()->route('schoolSubject.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolSubject $schoolSubject)
    {
        $schoolSubject->delete();
        $notification = [
            'alert-type'=>'error',
            'message'=>'Data Deleted!!'
        ];
        return redirect()->route('schoolSubject.index')->with($notification);
    }
}
