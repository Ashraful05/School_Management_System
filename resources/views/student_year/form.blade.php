@extends('admin.master')
@if($year->exists)
    @section('title','Update Student Class')
@else
    @section('title','Add Student Class')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Year</h4>
                    <a href="{{ route('year.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Year List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($year->exists)
                                <form action="{{ route('year.update',$year->id) }}" method="post" >
                                    @method('put')
                                    @else
                                        <form action="{{ route('year.store') }}" method="post" >
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Class Name<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="year_name" value="{{ old('year_name',$year->year_name) }}" class="form-control" >
                                                            @error('year_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                @if($year->exists)
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
