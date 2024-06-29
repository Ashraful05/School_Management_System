@extends('admin.master')
@section('title','Employee List')
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
                            <h3 class="box-title">Employee List</h3>
                            <a href="{{ route('employeeRegistration.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Employee</a>
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
                                        <th>Mobile</th>
                                        <th>Gender</th>
                                        <th>Joining Date</th>
                                        <th>Salary</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employees as $row=>$employee)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->id_number }}</td>
                                            <td>{{ $employee->mobile }}</td>
                                            <td>{{ $employee->gender }}</td>
                                            <td>{{ $employee->joining_date }}</td>
                                            <td>{{ $employee->salary }}</td>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role=='admin')
                                            <td>{{ $employee->code }}</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('employeeRegistration.edit',$employee->id) }}" class="btn btn-rounded btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{ route('employeeRegistration.details',$employee->id) }}" class="btn btn-rounded btn-danger" title="Details" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
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
