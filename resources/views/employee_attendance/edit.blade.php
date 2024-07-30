@extends('admin.master')

@section('title','Edit Employee Attendance')


@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Edit Attendance</h4>
                    <a href="{{ route('employeeAttendance.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Employee Attendance List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
{{--                            <form action="{{ route('employeeAttendance.update') }}" method="post" >--}}
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Employee Attendance Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date" value="{{ old('date',$attendanceDate['0']['date']) }}" class="form-control" >
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
                                            @foreach($attendanceDate as $key => $data)
                                                <tr id="div{{$data->id}}" class="text-center">
                                                    <input type="hidden" name="employee_id[]" value="{{ $data->employee_id }}">
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $data->user->name }}</td>
                                                    <td colspan="3">
                                                        <div class="switch-toggle switch-3 switch-candy">

                                                            <input type="radio" name="attendance_status{{$key}}" value="Present"
                                                                   id="present{{$key}}" checked {{ $data->attendance_status=='Present'?'checked':''}}>
                                                            <label for="present{{$key}}">Present</label>

                                                            <input type="radio" name="attendance_status{{$key}}" value="Leave"
                                                                   id="leave{{$key}}" {{ $data->attendance_status == 'Leave'?'checked':'' }}>
                                                            <label for="leave{{$key}}">Leave</label>

                                                            <input type="radio" name="attendance_status{{$key}}" value="Absent"
                                                                   id="absent{{$key}}" {{ $data->attendance_status == 'Absent'?'checked':'' }}>
                                                            <label for="absent{{$key}}">Absent</label>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>

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

