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
                            <h4 class="box-title"><strong>Student MarkSheet Generate PDF</strong></h4>
                        </div>
                        <div class="box-body" style="border:solid 1px; padding: 10px;">
                            <div class="row">
                                <div style="float: right" class="col-md-2 text-center">

                                </div>
                                <div class="col-md-2 text-center">

                                </div>
                                <div class="col-md-4 text-center" style="float: left">
                                    <h4><strong>Easy Learning</strong></h4>
                                    <h6><strong>Dhaka, Bangladesh</strong></h6>
                                    <h5><strong><u><i>Academic Transcript</i></u></strong></h5>
                                    <h6><strong>{{ $allMarks['0']['examType']['name'] }}</strong></h6>
                                </div>
                                <div class="col-md-12">
                                    <hr style="border: solid 1px; width: 100%; color: #ddd;margin-bottom: 0px;">
                                    <p style="text-align: right"><u><i>Print Date: </i>{{ date('d M Y') }}</u></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #FFFFFF" width="100%;" cellpadding="8" cellspacing="2">
                                        @php
                                            $assignStudent = \App\Models\AssignStudent::where(['year_id'=>$allMarks['0']->year_id,'class_id'=>$allMarks['0']->class_id])->first();
                                        @endphp
                                        <tr>
                                            <td width="50%">Student ID</td>
                                            <td width="50%">{{ $allMarks['0']['id_number'] }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Roll No.</td>
                                            <td width="50%">{{ $assignStudent->roll }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Student Name</td>
                                            <td width="50%">{{ $allMarks['0']['student']->name }}</td>
                                        </tr>
                                        <tr>
                                            <td width="50%">Session</td>
                                            <td width="50%">{{ $allMarks['0']['studentYear']->year_name }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table border="1" style="border-color: #FFFFFF" width="100%;" cellpadding="8" cellspacing="2">
                                        <thead>
                                        <tr>
                                            <td>Letter Grade</td>
                                            <td>Marks Interval</td>
                                            <td>Grade Point</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allGrades as $grade)
                                            <tr>
                                                <td>{{ $grade->grade_name }}</td>
                                                <td>{{ $grade->start_marks }} - {{ $grade->end_marks }}</td>
                                                <td>
                                                    {{ number_format((float)$grade->grade_point,2) }} - {{ ($grade->grade_point == 5)?
                                                 (number_format((float)$grade->grade_point,2)):
                                                 (number_format((float)$grade->grade_point+1,2) - (float)0.01) }}
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
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


