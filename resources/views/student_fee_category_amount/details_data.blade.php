@extends('admin.master')
@section('title','Student Fees Details')
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
                            <h3 class="box-title">Students Fees Name: {{ $detailsData['0']['feeCategory']['fee_category_name'] }}</h3>
                            <a href="{{ route('feeCategoryAmount.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Fee Category Amount List</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>SL.</th>
                                        <th>Class Name</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detailsData as $row => $data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->class->name }}</td>
                                            <td>{{ $data->amount }}</td>
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
