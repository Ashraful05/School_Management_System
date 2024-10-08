@extends('admin.master')
@section('title','Student Marks Entry')
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
                            <a href="{{ route('edit.student.marks') }}" class="btn btn-rounded btn-primary" style="float:right">Marks Edit</a>
                        </div>
                        <div class="box-body">
                            <form action="{{ route('marksEntry.store') }}" method="post">
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
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="assign_subject_id" id="assign_subject_id" class="form-control">
                                                    <option selected >Select Subject</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
                                        {{--                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Search" name="search">--}}
                                        <a id="search" class="btn btn-rounded btn-dark mb-5" name="search">Search</a>
                                    </div>
                                </div>

                                <div class="row d-none" id="marks-entry">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped" style="width: 100%">
                                            <thead>
                                            <td>ID No.</td>
                                            <td>Student Name</td>
                                            <td>Student Father's Name</td>
                                            <td>Gender</td>
                                            <td>Marks</td>
                                            </thead>
                                            <tbody id="marks-entry-tr">

                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="submit" class="form-control btn btn-rounded btn-info" value="Submit">
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


    <script type="text/javascript">
        $(document).on('click','#search',function(){
            var year_id = $('#year_id').val();
            var class_id = $('#class_id').val();
            var assign_subject_id = $('#assign_subject_id').val();
            var exam_type_id = $('#exam_type_id').val();
            $.ajax({
                url: "{{ route('student.marks.getstudents')}}",
                type: "GET",
                data: {'year_id':year_id,'class_id':class_id},
                success: function (data) {
                    $('#marks-entry').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.student.id_number+'<input type="hidden" name="student_id[]" value="'+v.student_id+'">' +
                            '<input type="hidden" name="id_number[]" value="'+v.student.id_number+'"></td>'+
                            '<td>'+v.student.name+'</td>'+
                            '<td>'+v.student.fathers_name+'</td>'+
                            '<td>'+v.student.gender+'</td>'+
                            '<td><input type="text" class="form-control form-control-sm" name="marks[]" ></td>'+
                            '</tr>';
                    });
                    html = $('#marks-entry-tr').html(html);
                }
            });
        });

    </script>

    <script type="text/javascript">
        $(function(){
            $(document).on('change','#class_id',function(){
                var class_id = $('#class_id').val();
                // alert(class_id);
                $.ajax({
                    url:"{{ route('marks_get_subject') }}",
                    type:"GET",
                    data:{class_id:class_id},
                    success:function(data){
                        var html = '<option value="">Select Subject</option>';
                        $.each(data, function(key, v) {
                            html += '<option value="'+v.id+'">'+v.subject_name.name+'</option>';
                        });
                        $('#assign_subject_id').html(html);
                    }
                });
            });
        });
    </script>


@endsection


