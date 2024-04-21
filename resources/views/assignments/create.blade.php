@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Assignment</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Assignment Create</h3>
                    </div>

                    
                    <form class="form-horizontal" action="{{route('assignments.store')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-6">
                                <label for="student_id" class=" control-label">Student</label>
                                <select name="student_id" id="student_id" class="form-control">
                                    <option value="">Select Student</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->user->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <span class="help-block">{{$errors->first('student_id')}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="teacher_id" class=" control-label">Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option value="">Select Student</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->user->name}}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                <span class="help-block">{{$errors->first('teacher_id')}}</span>
                                @enderror
                            </div>

                            <div class="col-md-12">
                                <label for="title" class=" control-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                @error('title')
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="desciption" class=" control-label">Description</label>
                                <textarea class="ckeditor form-control" name="description" value="{{old('description')}}" id="description" cols="30" rows="10" placeholder="Description here">{{old('description')}}</textarea>
                                @error('title')
                                <span class="help-block">{{$errors->first('title')}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="box-footer">
                            <a href="{{route('students.index')}}" class="btn btn-default">Cancel</a>
                            {{--                            <button type="submit" class="btn btn-default">Cancel</button>--}}
                            <button type="submit" class="btn btn-info pull-right">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- /.content-wrapper -->
@endsection
