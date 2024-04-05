@extends('admin.master')
@section('title','Assign Subject Details')
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
                            <h3 class="box-title">Students Class Name: {{ $detailsData['0']['studentClassName']['name'] }}</h3>
                            <a href="{{ route('assignStudentSubject.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Assigned Subject List</a>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="" class="table table-bordered table-striped">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>SL.</th>
                                        <th>Subject Name</th>
                                        <th>Full Mark</th>
                                        <th>Pass Mark</th>
                                        <th>Subjective Mark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($detailsData as $row => $data)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $data->subjectName->name }}</td>
                                            <td>{{ $data->full_mark }}</td>
                                            <td>{{ $data->pass_mark }}</td>
                                            <td>{{ $data->subjective_mark }}</td>
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

