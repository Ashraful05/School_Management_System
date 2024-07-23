@extends('admin.master')

@section('title','Employee Leave Form')

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Employee Leave</h4>
                    <a href="{{ route('employeeLeave.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">View Employee Leave</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('employeeLeave.save') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Employee Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="employee_id" id="employee_id" class="form-control">
                                                    <option value="" selected disabled>Select Employee</option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('employee_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Leave Purpose<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="leave_purpose_id" id="leave_purpose_id" class="form-control">
                                                    <option value="" selected disabled>Select Leave Purpose</option>
                                                    @foreach($leavePurposes as $leavePurpose)
                                                        <option value="{{ $leavePurpose->id }}">{{ $leavePurpose->name }}</option>
                                                    @endforeach
                                                    <option value="0">Other Purpose</option>
                                                </select>
                                                <input style="display: none;" type="text" name="name" id="add_another" class="form-control" placeholder="Write your purpose">
                                                @error('leave_purpose_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Start Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="start_date" class="form-control">
                                                @error('start_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>End Date<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="end_date" class="form-control">
                                                @error('end_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
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

    <script>
        $(document).ready(function(){
            $(document).on('change','#leave_purpose_id',function (){
               var leave_purpose_id = $(this).val();
               if(leave_purpose_id == '0'){
                   $('#add_another').show();
               }else{
                   $('#add_another').hide();
               }
            });
        });
    </script>
@endsection

