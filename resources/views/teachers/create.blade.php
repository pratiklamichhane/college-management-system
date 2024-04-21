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
            <li><a href="#">teachers</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">teachers Create</h3>
                    </div>

                    
                    <form class="form-horizontal" action="{{route('teachers.store')}}" method="post">
                        @csrf
                        <div class="box-body">
                            <div class="col-md-6">
                                <label for="teacher_id" class=" control-label">teacher</label>

                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">Select teacher</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                <span class="help-block">{{$errors->first('user_id')}}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="teacher_id" class=" control-label">Department</label>

                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                <span class="help-block">{{$department->first('department')}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="box-footer">
                            <a href="{{route('teachers.index')}}" class="btn btn-default">Cancel</a>
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
