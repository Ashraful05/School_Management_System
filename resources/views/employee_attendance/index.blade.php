@extends('admin.master')
@section('title','Employee Attendance List')
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
                            <h3 class="box-title">Employee Attendance List</h3>
                            <a href="{{ route('employeeAttendance.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Attendance</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Attendance Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($attendances as $row => $attendance)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ date('d-m-Y',strtotime($attendance->date)) }}</td>
                                            <td>
                                                <a href="{{ route('employeeAttendance.edit',$attendance->date) }}" class="btn btn-rounded btn-edit" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{ route('employeeAttendance.show',$attendance->date) }}" class="btn btn-rounded btn-info" title="Details"><i class="fa fa-info-circle"></i></a>
{{--                                                <form action="{{ route('employeeAttendance.destroy',$attendance->id) }}" method="post" id="">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')" title="delete"><i class="fa fa-trash-o"></i></button>--}}
{{--                                                </form>--}}

                                            </td>
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
