@extends('admin.master')

@section('title','Salary Increment')


@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Salary</h4>
                    <a href="{{ route('employeeSalary.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Salary List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update.salary.increment') }}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Salary Increment Amount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="increment_salary" value="{{ old('increment_salary') }}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Effected Date of Salary<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="effected_salary" value="{{ old('effected_salary') }}" class="form-control" >
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                </div>
                            </form>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
