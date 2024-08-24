@extends('admin.master')
@section('title','Add Student Fee')
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
                            <h4 class="box-title">Add Student <strong>Fee</strong></h4>
                        </div>
                        <div class="box-body">

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

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="controls">
                                            <select name="fee_category_id" id="fee_category_id" class="form-control">
                                                <option selected disabled>Select Fee Category</option>
                                                @foreach($feeCategories as $feeCategory)
                                                    <option value="{{ $feeCategory->id }}">{{ $feeCategory->fee_category_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="controls">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <a id="search" class="btn btn-rounded btn-dark mb-5" name="search">Search</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="DocumentResults">
                                        <script id="document-template" type="text/x-handlebars-template">
                                            <form action="{{ route('studentFee.store') }}" method="post">
                                                @csrf
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
                                            </form>
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
            var year_id = $("#year_id").val();
            var class_id = $("#class_id").val();
            var fee_category_id = $("#fee_category_id").val();
            var date = $('#date').val();
            $.ajax({
                url: "{{ route('student_fee_get')}}",
                type: "get",
                data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},
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
        {{--$(document).on('click','#search',function(){--}}
        {{--    var year_id = $('#year_id').val();--}}
        {{--    var class_id = $('#class_id').val();--}}
        {{--    var fee_category_id = $('#fee_category_id').val();--}}
        {{--    var date = $('#date').val();--}}
        {{--    // alert(date);--}}

        {{--    $.ajax({--}}
        {{--        url: "{{ route('student_fee_get')}}",--}}
        {{--        type: "get",--}}
        {{--        data: {'year_id':year_id,'class_id':class_id,'fee_category_id':fee_category_id,'date':date},--}}
        {{--        beforeSend: function() {--}}
        {{--        },--}}
        {{--        success: function (data) {--}}
        {{--            console.log(data);--}}
        {{--            var source = $("#document-template").html();--}}
        {{--            var template = Handlebars.compile(source);--}}
        {{--            var html = template(data);--}}
        {{--            $('#DocumentResults').html(html);--}}
        {{--            $('[data-toggle="tooltip"]').tooltip();--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}

    </script>

@endsection

