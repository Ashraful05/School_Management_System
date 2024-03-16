@extends('admin.master')
@if($group->exists)
    @section('title','Update Student Group')
@else
    @section('title','Add Student Group')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Group</h4>
                    <a href="{{ route('group.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Group List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($group->exists)
                                <form action="{{ route('group.update',$group->id) }}" method="post" >
                                    @method('put')
                                    @else
                                        <form action="{{ route('group.store') }}" method="post" >
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <h5>Insert Group<span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="group_name" value="{{ old('group_name',$group->group_name) }}" class="form-control" >
                                                            @error('group_name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="text-xs-right">
                                                @if($group->exists)
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
