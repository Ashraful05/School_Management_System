<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\EmployeeSalaryLog;
use App\Models\StudentYear;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use niklasravnsborg\LaravelPdf\Facades\Pdf;

class EmployeeRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = User::where('user_type','employee')->get();
//        return $employees;
        return view('employee_registration.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Designation $designation)
    {
        $designations = Designation::get();
        return view('employee_registration.form',compact('designation','designations'));
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
            'name'=>'required|string',
            'mobile'=>'required|numeric',
            'address'=>'required|string',
            'designation_id'=>'required'
        ],[
            'designation_id.required'=>'Employee Designation is required'
        ]);
        DB::transaction(function() use($request) {
//            $checkYear = StudentYear::find($request->year_id)->year_name;
            $checkYear = date('Ym',strtotime($request->joining_date));
            $employee = User::where('user_type', 'employee')->orderBy('id', 'desc')->first();
            if ($employee == null) {
                $firstReg = 0;
                $employeeId = $firstReg + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
            } else {
                $employee = User::where('user_type', 'employee')->orderby('id', 'desc')->first()->id;
                $employeeId = $employee + 1;
                if ($employeeId < 10) {
                    $id_no = '000'.$employeeId;
                } elseif ($employeeId < 100) {
                    $id_no = '00'.$employeeId;
                } elseif ($employeeId < 1000) {
                    $id_no = '0'.$employeeId;
                }
            }

            if ($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('Y_m_dHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/employee_images/'),$fileName);
            }
            $finalIdNo = $checkYear.$id_no;
            $code = rand(0000, 9999);
            $employeeData = User::create([
                'name' => $request->name,
                'id_number' => $finalIdNo,
                'code' => $code,
                'password' => Hash::make($code),
                'user_type' => 'employee',
                'mobile' => $request->mobile,
                'address' => $request->address,
                'gender' => $request->gender,
                'mothers_name' => $request->mothers_name,
                'fathers_name' => $request->fathers_name,
                'religion' => $request->religion,
//                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),
                'joining_date' => date('Y-m-d', strtotime($request->joining_date)),
                'salary' => $request->salary,
                'designation_id'=>$request->designation_id,
                'image' => $fileName,
            ]);
            EmployeeSalaryLog::create([
               'employee_id'=>$employeeData->id,
                'effected_salary'=>date('Y-m-d', strtotime($request->joining_date)),
                'previous_salary'=>$request->salary,
                'present_salary'=>$request->salary,
                'increment_salary'=>'0',
            ]);
        });
            $notification = [
                'alert-type'=>'success',
                'message'=>'Employee Data Saved Successfully!!'
            ];
            return redirect()->route('employeeRegistration.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details($id)
    {
        $detailsData = User::findOrFail($id);
        $pdf = Pdf::loadView('employee_registration.employee_details_pdf',compact('detailsData'));
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editData = User::findOrFail($id);
        $designations = Designation::get();
        return view('employee_registration.edit',compact('designations','editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string',
            'mobile'=>'required|numeric',
            'address'=>'required|string',
            'designation_id'=>'required'
        ],[
            'designation_id.required'=>'Employee Designation is required'
        ]);

            $employeeData = User::where('id',$id)->first();
//            $checkYear = date('Ym',strtotime($request->joining_date));
//            $employee = User::where('user_type', 'employee')->orderBy('id', 'desc')->first();


            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('images/employee_images/'.$employeeData->image));
                $fileName = date('Y_m_dHi').'.'.$file->getClientOriginalExtension();
                $file->move(public_path('images/employee_images/'),$fileName);

                $employeeData->update([
                    'name' => $request->name,
//                'user_type' => 'employee',
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'mothers_name' => $request->mothers_name,
                    'fathers_name' => $request->fathers_name,
                    'religion' => $request->religion,
//                'date_of_birth' => date('Y-m-d', strtotime($request->date_of_birth)),

                    'designation_id'=>$request->designation_id,
                    'image' => $fileName,
                ]);
            }

            else{
                $employeeData->update([
                    'name' => $request->name,
//                'user_type' => 'employee',
                    'mobile' => $request->mobile,
                    'address' => $request->address,
                    'gender' => $request->gender,
                    'mothers_name' => $request->mothers_name,
                    'fathers_name' => $request->fathers_name,
                    'religion' => $request->religion,
                    'designation_id'=>$request->designation_id,
                ]);
            }
//            EmployeeSalaryLog::create([
//                'employee_id'=>$employeeData->id,
//                'effected_salary'=>date('Y-m-d', strtotime($request->joining_date)),
//                'previous_salary'=>$request->salary,
//                'present_salary'=>$request->salary,
//                'increment_salary'=>'0',
//            ]);
//
        $notification = [
            'alert-type'=>'info',
            'message'=>'Employee Data Updated Successfully!!'
        ];
        return redirect()->route('employeeRegistration.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
