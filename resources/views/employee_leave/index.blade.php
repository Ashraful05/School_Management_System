@extends('admin.master')
@section('title','Employee Leave View')
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
                            <h3 class="box-title">Employee Leave View</h3>
                            <a href="{{ route('employeeLeave.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Employee Leave</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>ID No.</th>
                                        <th>Leave Purpose</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $row=>$employee)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $employee->user->name }}</td>
                                            <td>{{ $employee->user->id_number }}</td>
                                            <td>{{ $employee->leavePurpose->name }}</td>
                                            <td>{{ $employee->start_date }}</td>
                                            <td>{{ $employee->end_date }}</td>
                                            <td>
                                                <a href="{{ route('employeeLeave.edit',$employee->id) }}" class="btn btn-rounded btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{ route('employeeLeave.delete',$employee->id) }}" class="btn btn-rounded btn-danger" id="delete" title="delete" target="_blank"><i class="fa fa-trash-o"></i></a>
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
