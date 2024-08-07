@extends('admin.master')
@section('title','Assign Subject List')
@section('main_content')
    <!-- Content Wrapper. Contains page content -->
    <div class="container-full">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Assign Subject List</h3>
                            <a href="{{ route('assignStudentSubject.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Assign Subject</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($assignSubjects as $row=>$assignSubject)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $assignSubject->studentClassName->name }}</td>
                                            <td>
                                                <a href="{{ route('assignStudentSubject.edit',$assignSubject->class_id) }}" class="btn btn-rounded btn-info"><i class="fa fa-pencil" title="edit"></i></a>
                                                <a href="{{ route('assignStudentSubject.show',$assignSubject->class_id) }}" class="btn btn-rounded btn-info"><i class="fa fa-info" title="Details"></i></a>

                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
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
