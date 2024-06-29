@extends('admin.master')
@section('title','Employee Salary')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
{{--                        <div class="box-header with-border">--}}
{{--                            <h3 class="box-title">Employee Salary</h3>--}}
{{--                            <a href="{{ route('employeeRegistration.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Employee</a>--}}
{{--                        </div>--}}
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($employeeSalaries as $row=>$employeeSalary)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $employeeSalary->name }}</td>
                                            <td>{{ $employeeSalary->id_number }}</td>
                                            <td>{{ $employeeSalary->mobile }}</td>
                                            <td>{{ $employeeSalary->gender }}</td>
                                            <td>{{ date('d-m-Y',strtotime($employeeSalary->joining_date)) }}</td>
                                            <td>{{ $employeeSalary->salary }}</td>
                                            <td>
                                                <a href="{{ route('employeeSalary.increment',$employeeSalary->id) }}" class="btn btn-rounded btn-info" title="Increment"><i class="fa fa-plus-circle"></i></a>
                                                <a href="{{ route('employeeSalary.details',$employeeSalary->id) }}" class="btn btn-rounded btn-danger" title="Details" target="_blank"><i class="fa fa-eye"></i></a>
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

