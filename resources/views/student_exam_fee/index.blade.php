@extends('admin.master')
@section('title','Student Exam Fee')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.8/handlebars.min.js" integrity="sha512-E1dSFxg+wsfJ4HKjutk/WaCzK7S2wv1POn1RRPGh8ZK+ag9l244Vqxji3r6wgz9YBf6+vhQEYJZpSjqWFPg9gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box bb-3 border-warning">
                        <div class="box-header">
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <select name="class_id" id="class_id" class="form-control">
                                                <option value="" selected disabled>Select Class</option>
                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <select name="year_id" id="year_id" class="form-control">
                                                <option value="" selected disabled>Select Year</option>
                                                @foreach($years as $year)
                                                    <option value="{{ $year->id }}">{{ $year->year_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <select name="exam_type" id="exam_type" class="form-control">
                                                <option value="" selected disabled>Select ExamType</option>
                                                @foreach($examTypes as $examType)
                                                    <option value="{{ $examType->id }}">{{ $examType->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" style="padding-right: 25px;">
                                    <a id="search" class="btn btn-rounded btn-dark mb-5" name="search">Search</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <table class="table table-striped table-bordered" style="width: 100%">
                                                <thead>
                                                <tr>
                                                    @{{{thsource}}}
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @{{#each this}}
                                                <tr>
                                                    @{{{tdsource}}}
                                                </tr>
                                                @{{/each}}
                                                </tbody>
                                            </table>
                                        </script>

                                    </div>
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

    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var exam_type = $('#exam_type').val();
            $.ajax({
                url: "{{ route('student_exam_fee_classwise_get')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'exam_type':exam_type},
                beforeSend: function() {
                },
                success: function (data) {
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);
                    var html = template(data);
                    $('#DocumentResults').html(html);
                    $('[data-toggle="tooltip"]').tooltip();
                }
            });
        });

    </script>


@endsection

