@extends('admin.master')
@section('title','Manage Others Cost')
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
                            <h3 class="box-title">Manage Others Cost</h3>
                            <a href="{{ route('manageOthersCost.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Others Cost</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $row=>$data)
                                        <tr>
                                            <td>{{ date('d-m-Y',strtotime($data->date)) }}</td>
                                            <td>{{ $data->amount }}</td>
                                            <td>{{ $data->description }}</td>
                                            <td>
                                                <img src="{{ (!empty($data->image))?url('images/other_cost_images/'.$data->image):url('images/no_image.jpg') }}" alt="">
                                            </td>
                                            <td><a href="{{ route('manageOthersCost.edit',$data->id) }}" class="form-control btn btn-info" title="edit"><i class="fa fa-pencil-square-o"></i></a></td>
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


