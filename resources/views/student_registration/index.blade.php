@extends('admin.master')
@section('title','Student Registration List')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
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
                                                <select name="class_id" id="" class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ (@$classId == $class->id)?'selected':'' }} >{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <select name="year_id" id="" class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}" {{ (@$yearId == $year->id)?'selected':'' }} >{{ $year->year_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4" style="padding-right: 25px;">
                                        <input type="submit" class="btn btn-rounded btn-dark mb-5" value="Search" name="search">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Students Registration List</h3>
                            <a href="{{ route('student.registration.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Student</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                @if(!isset($self->search))
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>ID No.</th>
                                            <th>Roll</th>
                                            <th>Class</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                                <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignedStudents as $row=>$data)
                                            <tr>
                                                <td>{{ ++$row }}</td>
                                                <td>{{ $data->student->name }}</td>
                                                <td>{{ $data->student->id_number }}</td>
                                                <td>{{ $data->roll }}</td>
                                                <td>{{ $data->studentClass->name }}</td>
                                                <td>{{ $data->studentYear->year_name }}</td>
                                                <td>
                                                    <img src="{{ (!empty($data->student->image))?url('images/student_images/'.$data->student->image):url('images/no_image.jpg') }}"
                                                         style="height: 50px;width: 50px;" alt="">
                                                </td>
                                                <td>{{ $data->student->code }}</td>
                                                <td>
                                                    <a href="{{ route('student.registration.edit',$data->student_id) }}" class="btn btn-rounded btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{ route('student.registration.promotion',$data->student_id) }}" class="btn btn-rounded btn-danger" title="Promotion"><i class="fa fa-upload"></i></a>
                                                    <a href="{{ route('student.registration.promotion',$data->student_id) }}" class="btn btn-rounded btn-danger" title="Details"><i class="fa fa-file-pdf-o"></i></a>
                                                    {{--                                                <form action="{{ route('shift.destroy',$shift->id) }}" method="post" id="">--}}
                                                    {{--                                                    @csrf--}}
                                                    {{--                                                    @method('delete')--}}
                                                    {{--                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>--}}
                                                    {{--                                                </form>--}}

                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Name</th>
                                            <th>ID No.</th>
                                            <th>Roll</th>
                                            <th>Class</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                                                <th>Code</th>
                                            @endif
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($assignedStudents as $row=>$data)
                                            <tr>
                                                <td>{{ ++$row }}</td>
                                                <td>{{ $data->student->name }}</td>
                                                <td>{{ $data->student->id_number }}</td>
                                                <td>{{ $data->roll }}</td>
                                                <td>{{ $data->studentClass->name }}</td>
                                                <td>{{ $data->studentYear->year_name }}</td>
                                                <td>
                                                    <img src="{{ (!empty($data->student->image))?url('images/student_images/'.$data->student->image):url('images/no_image.jpg') }}"
                                                         style="height: 50px;width: 50px;" alt="">
                                                </td>
                                                <td>{{ $data->student->code }}</td>
                                                <td>
                                                    <a href="{{ route('student.registration.edit',$data->student_id) }}" class="btn btn-rounded btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="{{ route('student.registration.promotion',$data->student_id) }}" class="btn btn-rounded btn-danger" title="Promotion"><i class="fa fa-upload"></i></a>
                                                    <a href="{{ route('student.registration.promotion',$data->student_id) }}" class="btn btn-rounded btn-danger" title="Description"><i class="fa fa-file-pdf-o></i></a>
                                                    {{--                                                <form action="{{ route('shift.destroy',$shift->id) }}" method="post" id="">--}}
                                                    {{--                                                    @csrf--}}
                                                    {{--                                                    @method('delete')--}}
                                                    {{--                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>--}}
                                                    {{--                                                </form>--}}

                                                </td>
                                            </tr>

                                        @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->

    </div>


@endsection
