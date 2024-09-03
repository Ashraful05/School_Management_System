@extends('admin.master')
@section('title','Student Marks Sheet View')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title"><strong>Student MarkSheet Generate</strong></h4>
                            <a href="{{ route('edit.student.marks') }}" class="btn btn-rounded btn-primary" style="float:right">Marks Edit</a>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('marksheet.report') }}" method="get" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}" >{{ $year->year_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" >{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="exam_type_id" id="exam_type_id" class="form-control">
                                                    <option selected disabled>Select Exam Type</option>
                                                    @foreach($examTypes as $examType)
                                                        <option value="{{ $examType->id }}">{{ $examType->name }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="text" name="id_number" class="form-control" placeholder="enter student id">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" class="form-control btn btn-rounded btn-info" value="Search">
                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>

@endsection


