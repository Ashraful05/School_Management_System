@extends('admin.master')
@section('title','Student Fees List')
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
                            <h3 class="box-title">Student Fees List</h3>
                            <a href="{{ route('studentFee.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Student Fee</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>ID No.</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Class</th>
                                        <th>Fee Type</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $row=>$data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->student->id_number }}</td>
                                            <td>{{ $data->student->name }}</td>
                                            <td>{{ $data->studentYear->year_name }}</td>
                                            <td>{{ $data->studentClass->name }}</td>
                                            <td>{{ $data->FeeCategory->fee_category_name }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ date('M Y',strtotime($data->date)) }}</td>
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


