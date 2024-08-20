@extends('admin.master')
{{--@if($designation->exists)--}}
{{--    @section('title','Update Employee')--}}
{{--@else--}}
@section('title','Edit Student Marks Grade')
{{--@endif--}}

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Grade</h4>
                    <a href="{{ route('marksGrade.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Marks Grade List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('marksGrade.update',$marksGrade->id) }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Grade Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="grade_name" value="{{ old('grade_name',$marksGrade->grade_name) }}" class="form-control" >
                                                @error('grade_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Highest Grade Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="grade_point" value="{{ old('grade_point',$marksGrade->grade_point) }}" class="form-control" >
                                                @error('grade_point')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Start Marks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="start_marks" value="{{ old('start_marks',$marksGrade->start_marks) }}" class="form-control" >
                                                @error('start_marks')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>End Marks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="end_marks" value="{{ old('end_marks',$marksGrade->end_marks) }}" class="form-control" >
                                                @error('end_marks')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Start Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="start_point" value="{{ old('start_point',$marksGrade->start_point) }}" class="form-control" >
                                                @error('start_point')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>End Point<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="end_point" value="{{ old('end_point',$marksGrade->end_point) }}" class="form-control" >
                                                @error('end_point')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Remarks<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="remarks" value="{{ old('remarks',$marksGrade->remarks) }}" class="form-control" >
                                                @error('remarks')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <button type="submit" class="form-control btn btn-rounded btn-outline-info ">Update</button>
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
