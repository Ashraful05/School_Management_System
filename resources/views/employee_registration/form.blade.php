@extends('admin.master')
@if($designation->exists)
    @section('title','Update Employee')
@else
    @section('title','Add Employee')
@endif

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Employee</h4>
                    <a href="{{ route('employeeRegistration.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Employee List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('employeeRegistration.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Employee Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" >
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Father's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fathers_name" value="{{ old('fathers_name') }}" class="form-control" >
                                                @error('mothers_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Mother's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mothers_name" value="{{ old('mothers_name') }}" class="form-control" >
                                                @error('mothers_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Salary<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="salary" value="{{ old('salary') }}" class="form-control" >
                                                @error('salary')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mobile Number<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ old('mobile') }}" class="form-control" >
                                                @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Address<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea type="text" name="address" value="{{ old('address') }}" class="form-control" ></textarea>
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Gender<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" selected disabled>Select Your Role</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                                @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Employee Religion<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="religion" id="religion" class="form-control">
                                                    <option value="" selected disabled>Select Your Role</option>
                                                    <option value="islam">Islam</option>
                                                    <option value="hindu">Hindu</option>
                                                    <option value="christian">Christian</option>
                                                </select>
                                                @error('religion')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Date of Joining<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="joining_date" value="{{ old('joining_date') }}" class="form-control" >
                                                @error('joining_date')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Designation<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="designation_id" id="designation_id" class="form-control">
                                                    <option value="" selected disabled>Select Your Designation</option>
                                                    @foreach($designations as $designation)
                                                    <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('designation_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"id="image"  class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="showImage" src="{{ url('images/no_image.jpg') }}" style="height: 100px;width: 100px;" alt="">
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
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
