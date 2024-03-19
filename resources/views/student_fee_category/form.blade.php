@extends('admin.master')
@if($feeCategory->exists)
    @section('title','Update Student Fee')
@else
    @section('title','Add Student Fee')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Category</h4>
                    <a href="{{ route('feeCategory.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Fees List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($feeCategory->exists)
                                <form action="{{ route('feeCategory.update',$feeCategory->id) }}" method="post" >
                                    @method('put')
                                    @else
                                        <form action="{{ route('feeCategory.store') }}" method="post" >
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Fee Category Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="fee_category_name" value="{{ old('fee_category_name',$feeCategory->fee_category_name) }}" class="form-control" >
                                                            @error('fee_category_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                @if($feeCategory->exists)
                                                    <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                                @else
                                                    <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                                @endif

                                            </div>
                                        </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
