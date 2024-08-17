@extends('admin.master')

{{--@if($feeCategoryAmount['fee_category_id']!='')--}}
@if($assignStudentSubject->class_id != null)
    @section('title','Update Assign Subject')
@else
    @section('title','Add Assign Subject')
@endif

@section('main_content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    {{--                    @if($feeCategoryAmount['fee_category_id']!='')--}}
                    @if($assignStudentSubject->class_id != null)
                        <h4 class="box-title">Update Assign Subject</h4>
                    @else
                        <h4 class="box-title">Add Assign Subject</h4>
                    @endif

                    <a href="{{ route('assignStudentSubject.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Assigned Subject List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    @if($assignStudentSubject->class_id != '')
                        <form action="{{ route('assignStudentSubject.update',$editSubjectWise[0]->class_id) }}" method="post" >
                            @method('put')
                            @else
                                <form action="{{ route('assignStudentSubject.store') }}" method="post" >
                                    @endif
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="add_item">
                                                @if($assignStudentSubject['class_id'] != '')
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h5>Select Student Class<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="class_id" class="form-control">
                                                                        <option value="0"{{ $assignStudentSubject->exists?'':'selected' }} selected disabled>Select Student Class</option>
                                                                        @foreach($studentClasses as $class)
                                                                            <option value="{{ $class->id }}" @if($class->id == $editSubjectWise[0]->class_id) selected @endif>{{ $class->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    @foreach($editSubjectWise as $editSubject)
                                                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <h5>Select Student Subject<span class="text-danger">*</span></h5>
                                                                        <div class="controls">
                                                                            <select name="subject_id[]" class="form-control">
                                                                                <option value="0" selected disabled>Select Student Subject</option>
                                                                                @foreach($schoolSubjects as $subject)
                                                                                    <option value="{{ $subject->id }}"
                                                                                        {{ ($subject->id == $editSubject->subject_id)?"selected":'' }}>{{ $subject->name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('subject_id')
                                                                            <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Full Mark <span class="text-danger">*</span> </h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="full_mark[]" value="{{ old('full_mark',$editSubject->full_mark) }}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Pass Mark <span class="text-danger">*</span> </h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="pass_mark[]" value="{{ old('pass_mark',$editSubject->pass_mark) }}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <h5>Subjective Mark <span class="text-danger">*</span> </h5>
                                                                        <div class="controls">
                                                                            <input type="text" name="subjective_mark[]" value="{{ old('subjective_mark',$editSubject->subjective_mark) }}" class="form-control">
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2" style="padding-top: 25px;">
                                                                    <span class="btn btn-success add_more_event" ><i class="fa fa-plus-circle"></i></span>
                                                                    <span class="btn btn-danger remove_more_event"><i class="fa fa-minus-circle"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                @else
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <h5>Select Student Class<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="class_id" class="form-control">
                                                                        <option value="0" selected disabled>Select Student Class</option>
                                                                        @foreach($studentClasses as $class)
                                                                            <option value="{{ $class->id }}">{{ $class->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('class_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <h5>Select Student Subject<span class="text-danger">*</span></h5>
                                                                <div class="controls">
                                                                    <select name="subject_id[]" class="form-control">
                                                                        <option value="0" selected disabled>Select Student Subject</option>
                                                                        @foreach($schoolSubjects as $subject)
                                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('subject_id')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Full Mark <span class="text-danger">*</span> </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="full_mark[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Pass Mark <span class="text-danger">*</span> </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="pass_mark[]" class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <h5>Subjective Mark <span class="text-danger">*</span> </h5>
                                                                <div class="controls">
                                                                    <input type="text" name="subjective_mark[]" class="form-control">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-2" style="padding-top: 25px;">
                                                            <span class="btn btn-success add_more_event" ><i class="fa fa-plus-circle"></i></span>
                                                        </div>
                                                    </div>

                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                    {{--                                    <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>--}}
                                    {{--                                </form>--}}
                                    {{--                                <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>--}}
                                    {{--                        </form>--}}
                                    <div class="col-md-12">
                                        <div class="text-xs-right">
                                            @if($assignStudentSubject->class_id != '')
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                            @else
                                                <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                        </form>
                </div>


            </div>
        </section>

    </div>
    <!-- /.col -->
    </section>
    </div>
    <!-- /.row -->
    </div>

    <div style="display: none">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                <div class="form-row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Select Student Subject<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <select name="subject_id[]" class="form-control">
                                    <option value="0" selected disabled>Select Student Subject</option>
                                    @foreach($schoolSubjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <h5>Full Mark <span class="text-danger">*</span> </h5>
                            <div class="controls">
                                <input type="text" name="full_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Pass Mark <span class="text-danger">*</span> </h5>
                            <div class="controls">
                                <input type="text" name="pass_mark[]" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <h5>Subjective Mark <span class="text-danger">*</span> </h5>
                            <div class="controls">
                                <input type="text" name="subjective_mark[]" class="form-control">
                            </div>

                        </div>
                    </div>
                    <div class="col-md-2" style="padding-top: 25px;">
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
