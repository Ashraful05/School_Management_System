@extends('admin.master')
@section('title','School Subject List')
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
                            <h3 class="box-title">School Subject List</h3>
                            <a href="{{ route('schoolSubject.create') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Add Subject</a>
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
                                    @foreach($subjects as $row=>$subject)
                                        <tr>
                                            <td>{{ ++$row }}</td>
                                            <td>{{ $subject->name }}</td>
                                            <td>
                                                <a href="{{ route('schoolSubject.edit',$subject->id) }}" class="btn btn-rounded btn-info"><i class="fa fa-pencil" title="edit"></i></a>
                                                <form action="{{ route('schoolSubject.destroy',$subject->id) }}" method="post" id="">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-rounded btn-danger" onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o" title="delete"></i></button>
                                                </form>

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
