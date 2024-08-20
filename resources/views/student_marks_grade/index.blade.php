@extends('admin.master')
@section('title','Student Marks Grade List')
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
                            <h3 class="box-title">Grade Marks List</h3>
                            <a href="{{ route('employeeRegistration.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Grade Marks</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Grade Name</th>
                                        <th>Grade Point</th>
                                        <th>Start Marks</th>
                                        <th>End Marks</th>
                                        <th>Point Range</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $row=>$data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->grade_name }}</td>
                                            <td>{{ $data->grade_point }}</td>
                                            <td>{{ $data->start_marks }}</td>
                                            <td>{{ $data->end_marks }}</td>
                                            <td>{{ $data->start_point }} - {{ $data->end_point }}</td>
                                            <td>{{ $data->remarks }}</td>
                                            <td>
                                                <a href="{{ route('employeeRegistration.edit',$data->id) }}" class="btn btn-rounded btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
{{--                                                <a href="{{ route('employeeRegistration.details',$employee->id) }}" class="btn btn-rounded btn-danger" title="Details" target="_blank"><i class="fa fa-file-pdf-o"></i></a>--}}
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

