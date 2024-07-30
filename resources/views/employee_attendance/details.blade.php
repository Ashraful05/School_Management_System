@extends('admin.master')
@section('title','Employee Attendance Details')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Attendance Details</h3>
                            <a href="{{ route('employeeAttendance.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">View Attendance</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Employee Name</th>
                                        <th>Employee ID No.</th>
                                        <th>Attendance Date</th>
                                        <th>Attendance Status</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($details as $row=>$detail)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $detail->user->name }}</td>
                                            <td>{{ $detail->user->id_number }}</td>
                                            <td>{{ date('d-m-Y',strtotime($detail->date)) }}</td>
                                            <td>@if($detail->attendance_status == 'Leave')
                                            <span class="text-danger">Leave</span>
                                                @else
                                                    {{ $detail->attendance_status }}
                                                @endif</td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
