@extends('admin.master')
@if($shift->exists)
    @section('title','Update Student Shift')
@else
    @section('title','Add Student Shift')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Shift</h4>
                    <a href="{{ route('shift.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Shift List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($shift->exists)
                                <form action="{{ route('shift.update',$shift->id) }}" method="post" >
                                    @method('put')
                                    @else
                                        <form action="{{ route('shift.store') }}" method="post" >
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Shift Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="shift_name" value="{{ old('shift_name',$shift->shift_name) }}" class="form-control" >
                                                            @error('shift_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                @if($shift->exists)
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
