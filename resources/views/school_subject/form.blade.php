@extends('admin.master')
@if($schoolSubject->exists)
    @section('title','Update School Subject')
@else
    @section('title','Add School Subject')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Subject</h4>
                    <a href="{{ route('schoolSubject.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Subject List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($schoolSubject->exists)
                            <form action="{{ route('schoolSubject.update',$schoolSubject->id) }}" method="post" >
                                @method('put')
                                @else
                                    <form action="{{ route('schoolSubject.store') }}" method="post" >
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Subject Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ old('name',$schoolSubject->name) }}" class="form-control" >
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    @if($schoolSubject->exists)
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
