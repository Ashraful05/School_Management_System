@extends('admin.master')
@section('title','Student Role Generation')
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
                            <h4 class="box-title">Student <strong>Search</strong></h4>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('student_class_year_wise') }}" method="get">
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
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
                                    <div class="col-md-4" style="padding-right: 25px;">
                                        {{--                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Search" name="search">--}}
                                        <a id="search" class="btn btn-rounded btn-dark mb-5" name="search">Search</a>
                                    </div>
                                </div>

                                <div class="row d-none" id="roll-generate">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                                <th>Id</th>
                                                <th>Student Name</th>
                                                <th>Student Father's Name</th>
                                                <th>Gender</th>
                                                <th>Roll</th>
                                            </thead>
                                            <tbody id="roll-generate-tr">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-rounded btn-info" value="Roll Generator">

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


    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            $.ajax({
                url: "{{ route('student.registration.getstudents')}}",
                type: "GET",
                data: {'year_id':year_id,'class_id':class_id},
                success: function (data) {
                    $('#roll-generate').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_no+'<input type="hidden" name="student_id[]" value="'+v.student_id+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fname+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="roll[]" value="'+v.roll+'"></td>'+
                            '</tr>';
                    });
                    html = $('#roll-generate-tr').html(html);
                }
            });
        });

    </script>

@endsection
