@extends('admin.master')
@section('title','Edit User Profile')
@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Manage Profile</h4>
                    <a href="{{ route('view_profile') }}" class="btn btn-rounded btn-success mb-3" style="float: right">View Profile</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            <form action="{{ route('update_user_profile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>User Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ old('name',$editProfile->name) }}" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" value="{{ old('email',$editProfile->email) }}" class="form-control" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h5>User Mobile <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" value="{{ old('mobile',$editProfile->mobile) }}" class="form-control" > </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>User Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="address" value="{{ old('address',$editProfile->address) }}" class="form-control" > </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Select Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="" class="form-control">
                                                    <option value="" selected disabled>Select Gender</option>
                                                    <option value="male" {{ ($editProfile->gender == 'male' ? 'selected' : '') }}>Male</option>
                                                    <option value="female" {{ ($editProfile->gender == 'female' ? 'selected' : '') }}>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image"id="image"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <img id="showImage" src="{{ (!empty($editProfile->image))?url('images/user_image/'.$editProfile->image):url('images/no_image.jpg') }}" style="height: 100px;width: 100px;" alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
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
