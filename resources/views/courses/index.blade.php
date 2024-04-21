@extends('layouts.master')

@section('title', 'Welcome')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Departments
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">courses</a></li>
            <li class="active">list</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Departments</h3>
                        <a href="{{route('courses.create')}}" class="btn  btn-primary pull-right">
                            Create</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>S.N</th>
                                <th>Course Name</th>
                                <th>Department Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->department->name}}</td>
                                    <td>
                                        <a href="{{route('courses.edit', $course->id)}}"
                                           class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <form action="{{route('courses.destroy', $course->id)}}" method="post"
                                              style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs"
                                                    onclick="return confirm('Are you sure you want to delete this item?');">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection

{{--@section('scripts')--}}
{{--    <script>--}}
{{--        alert('Welcome page script');--}}
{{--    </script>--}}
{{--@endsection--}}