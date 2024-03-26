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
                            <a href="{{ route('feeCategoryAmount.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Fee Category Amount</a>
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
                                    @foreach($amounts as $row => $amount)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $amount->feeCategory->fee_category_name }}</td>
                                            <td>
                                                <a href="{{ route('feeCategoryAmount.edit',$amount->fee_category_id) }}" class="btn btn-rounded btn-info"><i class="fa fa-pencil" title="Edit"></i></a>
                                                <a href="{{ route('feeCategoryAmount.show',$amount->fee_category_id) }}" class="btn btn-rounded btn-info"><i class="fa fa-info" title="Details"></i></a>

{{--                                                <form action="{{ route('feeCategoryAmount.destroy',$amount->fee_category_id) }}" method="post" id="">--}}
{{--                                                    @csrf--}}
{{--                                                    @method('delete')--}}
{{--                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>--}}
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
