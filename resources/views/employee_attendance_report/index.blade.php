@extends('admin.master')
@section('title','Employee Attendance Report')
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
                            <h4 class="box-title"><strong>Employee Attendance Report</strong></h4>
{{--                            <a href="{{ route('edit.student.marks') }}" class="btn btn-rounded btn-primary" style="float:right">Marks Edit</a>--}}
                        </div>
                        <div class="box-body">
                            <form action="{{ route('attendance.report') }}" method="get" target="_blank">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" class="form-control">
                                                    <option value="" selected disabled>Select Employee</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}" >{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <input type="date" name="date" class="form-control">
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


