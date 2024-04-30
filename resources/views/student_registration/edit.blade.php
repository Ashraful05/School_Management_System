@extends('admin.master')
{{--@if($class->exists)--}}
{{--    @section('title','Update Student Class')--}}
{{--@else--}}

{{--@endif--}}
@section('title','Edit Register Student')

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">View Student</h4>
                    <a href="{{ route('student.registration.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('student.registration.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ old('name',$editData->student->name) }}" class="form-control" >
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Father's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="fathers_name" value="{{ old('fathers_name',$editData->student->fathers_name) }}" class="form-control" >
                                                @error('mothers_name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mother's Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mothers_name" value="{{ old('mothers_name',$editData->student->mothers_name) }}" class="form-control" >
                                                @error('mothers_name')
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
                                                <input type="text" name="mobile" value="{{ old('mobile',$editData->student->mobile) }}" class="form-control" >
                                                @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Address<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea type="text" name="address" value="{{ old('address') }}" class="form-control" >{{ $editData->student->address }}</textarea>
                                                @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Gender<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="" selected disabled>Select Your Role</option>
                                                    <option value="male" {{ $editData->student->gender == 'male'?'selected':'' }}>Male</option>
                                                    <option value="female" {{ $editData->student->gender == 'female'?'selected':'' }}>Female</option>
                                                </select>
                                                @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Religion<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="religion" id="religion" class="form-control">
                                                    <option value="" selected disabled>Select Your Role</option>
                                                    <option value="islam" {{ $editData->student->religion == 'islam'?'selected':'' }}>Islam</option>
                                                    <option value="hindu"  {{ $editData->student->religion == 'hindu'?'selected':'' }}>Hindu</option>
                                                    <option value="christian" {{ $editData->student->religion == 'christian'?'selected':'' }}>Christian</option>
                                                </select>
                                                @error('religion')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date of Birth<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="date" name="date_of_birth" value="{{ old('date_of_birth',$editData->student->date_of_birth) }}" class="form-control" >
                                                @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Discount<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="discount" value="{{ old('discount',$editData->discount->discount) }}" class="form-control" >
                                                @error('discount')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Student Class<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="class_id" id="class_id" class="form-control">
                                                    <option value="" selected disabled>Select Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ ($editData->class_id == $class->id)?'selected':'' }}>{{ $class->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Student Year<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="year_id" id="year_id" class="form-control">
                                                    <option value="" selected disabled>Select Year</option>
                                                    @foreach($years as $year)
                                                        <option value="{{ $year->id }}" {{ ($year->id == $editData->year_id)?'selected':'' }}>{{ $year->year_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('year_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Student Group<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="group_id" id="group_id" class="form-control">
                                                    <option value="" selected disabled>Select Group</option>
                                                    @foreach($groups as $group)
                                                        <option value="{{ $group->id }}" {{ ($group->id == $editData->group_id)?'selected':'' }}>{{ $group->group_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('group_id')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Student Shift<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="shift_id" id="shift_id" class="form-control">
                                                    <option value="" selected disabled>Select Shift</option>
                                                    @foreach($shifts as $shift)
                                                        <option value="{{ $shift->id }}" {{ ($shift->id == $editData->shift_id)?'selected':'' }}>{{ $shift->shift_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('shift_id')
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
                                                <img id="showImage" src="{{ (!empty($editData->student->image))?url('images/student_images/',$editData->student->image):url('images/no_image.jpg') }}" style="height: 100px;width: 100px;" alt="">
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

