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


