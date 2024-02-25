@extends('admin.master')
@section('title','View Profile')
@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('../images/gallery/full/10.jpg') center center;">
                            <h3 class="widget-user-username">Name: {{ $user->name }}</h3>
                            <h6 class="widget-user-desc">Type: {{ $user->user_type }}</h6>
                        </div>
                        <div class="widget-user-image">
                            <img class="rounded-circle" src="{{ (!empty($user->profile_photo_path))?url('images/'.$user->profile_photo_path	):url('images/no_image.jpg') }}" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">12K</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 br-1 bl-1">
                                    <div class="description-block">
                                        <h5 class="description-header">550</h5>
                                        <span class="description-text">FOLLOWERS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">158</h5>
                                        <span class="description-text">TWEETS</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
