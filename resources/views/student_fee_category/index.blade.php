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
                            <h3 class="box-title">Students Fees List</h3>
                            <a href="{{ route('feeCategory.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Fee Category</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Fee Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($fees as $row => $fee)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $fee->fee_category_name }}</td>
                                            {{--                                            <td>{{ $item->phone_no }}</td>--}}
                                            <td>
                                                <a href="{{ route('feeCategory.edit',$fee->id) }}" class="btn btn-rounded btn-info">Edit</a>
                                                <form action="{{ route('feeCategory.destroy',$fee->id) }}" method="post" id="">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                </form>

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
