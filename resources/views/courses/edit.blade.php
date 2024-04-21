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
            <li><a href="#">Courses</a></li>
            <li class="active">Create</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Course Create</h3>
                    </div>

                    
                    <form class="form-horizontal" action="{{route('courses.update' , $course->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" id="name" placeholder="Name"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name' , $course->name) }}" autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="help-block">{{$errors->first('name')}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="department_id" class="control-label">Department</label>

                                <select name="department_id" id="department_id" class="form-control">
                                    <option value="">Select Department</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if($department->id == $course->department_id) selected @endif>{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <span class="help-block">{{$errors->first('department_id')}}</span>
                                @enderror
                            </div>

                        </div>

                        <div class="box-footer">
                            <a href="{{route('courses.index')}}" class="btn btn-default">Cancel</a>
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
