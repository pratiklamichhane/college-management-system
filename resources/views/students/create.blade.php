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
            <li><a href="#">Students</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Students Create</h3>
                    </div>

                    
                    <form class="form-horizontal" action="{{route('students.store')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-6">
                                <label for="student_id" class=" control-label">Student</label>

                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select Student</option>
                                    @foreach($students as $student)
                                        <option value="{{$student->id}}">{{$student->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="help-block">{{$errors->first('user_id')}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="student_id" class=" control-label">Course</label>

                                <select name="course_id" id="course_id" class="form-control">
                                    <option value="">Select Course</option>
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->name}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="help-block">{{$course->first('course')}}</span>
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
