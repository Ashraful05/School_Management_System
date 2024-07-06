@extends('admin.master')
@section('title','Employee Salary details')
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
                            <h3 class=" text-center">Employee Salary Details</h3>
                            <h4 class="text-center"><strong>Employee Name: </strong>{{ $user->name }}</h4>
                            <h4 class="text-center"><strong>Employee ID: </strong>{{ $user->id_number }}</h4>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Previous Salary</th>
                                        <th>Present Salary</th>
                                        <th>Increment Salary</th>
                                        <th>Effected Salary Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($salaryLog as $row=>$data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->previous_salary }}</td>
                                            <td>{{ $data->present_salary }}</td>
                                            <td>{{ $data->increment_salary }}</td>
                                            <td>{{ date('d-m-Y',strtotime($data->effected_salary)) }}</td>
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

