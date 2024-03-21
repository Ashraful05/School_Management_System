@extends('admin.master')
@if($feeCategoryAmount->exists)
    @section('title','Update Student Fees Amount')
@else
    @section('title','Add Student Fees Amount')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Category Amount</h4>
                    <a href="{{ route('feeCategoryAmount.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Fees Amount List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    @if($feeCategoryAmount->exists)
                        <form action="{{ route('feeCategoryAmount.update',$feeCategoryAmount->id) }}" method="post" >
                            @method('put')
                            @else
                                <form action="{{ route('feeCategoryAmount.store') }}" method="post" >
                                    @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Select Amount Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" class="form-control">
                                                        <option value="" selected disabled>Select Category Of Fee Amount</option>
                                                        @foreach($feeCategories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->fee_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <h5>Select Student Class<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="class_id[]" class="form-control">
                                                        <option value="" selected disabled>Select Student Class</option>
                                                        @foreach($classes as $class)
                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>Fee Amount<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amount[]" value="{{ old('amount',$feeCategoryAmount->amount) }}" class="form-control" >
                                                    @error('amount')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3" style="padding-top: 25px;">
                                            <span class="btn btn-success addmoreevent"><i class="fa fa-plus-circle"></i></span>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="text-xs-right">
                                            @if($feeCategoryAmount->exists)
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                            @else
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                            @endif
                                        </div>
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
