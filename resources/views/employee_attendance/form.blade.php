@extends('admin.master')
@if($employeeAttendance->exists)
    @section('title','Update Employee Attendance')
@else
    @section('title','Add Employee Attendance')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Attendance</h4>
                    <a href="{{ route('employeeAttendance.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Employee Attendance List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($employeeAttendance->exists)
                                <form action="{{ route('employeeAttendance.update',$employeeAttendance->id) }}" method="post" >
                                    @method('put')
                                    @else
                                        <form action="{{ route('employeeAttendance.store') }}" method="post" >
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Employee Attendance Date<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="date" name="date" value="{{ old('date',$employeeAttendance->date) }}" class="form-control" >
                                                            @error('date')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Sl</th>
                                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Employee List</th>
                                                            <th colspan="3" class="text-center" style="vertical-align: middle; width: 30%;">Attendance Status</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-center btn present_all" style="display: table-cell; background-color: #000000">Present</th>
                                                            <th class="text-center btn leave_all" style="display: table-cell; background-color: #ffa84c">Leave</th>
                                                            <th class="text-center btn absent_all" style="display: table-cell; background-color: red">Absent</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>
                                                        @foreach($employees as $row=>$employee)
                                                            <tr id="div{{$employee->id}}" class="text-center">
                                                                <input type="hidden" name="employee_id[]" value="{{ $employee->id }}">
                                                                <td>{{ ++$row }}</td>
                                                                <td>{{ $employee->name }}</td>
                                                                <td colspan="3">
                                                                    <div class="switch-toggle switch-3 switch-candy">
                                                                        <input type="radio" name="attendance_status{{$row}}" value="present" id="present{{$row}}" checked>
                                                                        <label for="present{{ $row }}">Present</label>

                                                                        <input type="radio" name="attendance_status{{$row}}" value="leave" id="leave{{$row}}" >
                                                                        <label for="leave{{ $row }}">Leave</label>

                                                                        <input type="radio" name="attendance_status{{$row}}" value="absent" id="absent{{$row}}" >
                                                                        <label for="absent{{ $row }}">Absent</label>

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>

                                            <div class="text-xs-right">
                                                @if($employeeAttendance->exists)
                                                    <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                                @else
                                                    <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                                @endif

                                            </div>
                                        </form>
                                </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection

