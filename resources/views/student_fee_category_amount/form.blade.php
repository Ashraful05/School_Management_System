@extends('admin.master')
@if($feeCategoryAmount->exists)
    @section('title','Update Student Fees Amount')
@else
    @section('title','Add Student Fees Amount')
@endif

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Fee Category Amount</h4>
                    <a href="{{ route('feeCategoryAmount.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student Fees Amount List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    @if($feeCategoryAmount->exists)
                        <form action="{{ route('feeCategoryAmount.update',$feeCategoryAmount->id) }}" method="post" >
                            @method('put')
                            @else
                                <form action="{{ route('feeCategoryAmount.store') }}" method="post" >
                                    @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">

                                            <div class="form-group">
                                                <h5>Select Fee Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="fee_category_id" class="form-control">
                                                        <option value="" selected disabled>Select Category Of Fee Amount</option>
                                                        @foreach($feeCategories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->fee_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="add_item">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h5>Select Student Class<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <select name="class_id[]" class="form-control">
                                                                    <option value="" selected disabled>Select Student Class</option>
                                                                    @foreach($classes as $class)
                                                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <h5>Fee Amount<span class="text-danger">*</span></h5>
                                                            <div class="controls">
                                                                <input type="text" name="amount[]" value="{{ old('amount',$feeCategoryAmount->amount) }}" class="form-control" >
                                                                @error('amount')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2" style="padding-top: 25px;">
                                                        <span class="btn btn-success add_more_event" ><i class="fa fa-plus-circle"></i></span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <div class="text-xs-right">
                                            @if($feeCategoryAmount->exists)
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                            @else
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>

    <div style="display: none">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <h5>Select Student Class<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="class_id[]" class="form-control">
                                    <option value="" selected disabled>Select Student Class</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <h5>Fee Amount<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="amount[]" value="{{ old('amount',$feeCategoryAmount->amount) }}" class="form-control" >
                                @error('amount')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3" style="padding-top: 25px;">
                        <span class="btn btn-success add_more_event" id="add_more_event"><i class="fa fa-plus-circle"></i></span>
                        <span class="btn btn-danger remove_more_event" id="remove_more_event"><i class="fa fa-minus-circle"></i></span>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        $(document).ready(function(){
            var counter = 0;
            $(document).on('click','.add_more_event',function(){
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest('.add_item').append(whole_extra_item_add);
                counter++;
            });
            $(document).on('click','.remove_more_event',function(event){
               $(this).closest('.delete_whole_extra_item_add').remove();
               counter -= 1;
            });
        });
    </script>

@endsection
