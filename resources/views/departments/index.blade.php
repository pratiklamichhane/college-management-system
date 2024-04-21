@extends('layouts.master')
@section('title', 'Departments')
@section('content')

<!-- session success -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Departments</h3>
                @can('create', App\Models\Department::class)
                  <a href="{{ route('departments.create') }}" class="btn btn-primary pull-right">Add Department</a>
                @endcan     
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="col-2">No</th>
                  <th class="col-4">Name</th>
                  <th class="col-2">Courses</th>
                  @can('update', App\Models\Department::class)
                    <th class="col-2">Actions</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($departments as $department)
                <tr>
                  <td class="col-2">{{ $loop->iteration }}</td>
                  <td class="col-4">{{ $department->name }}</td>
                  <td class="col-2">
                    @foreach($department->courses as $course)
                      <span>{{ $course->name }} {{!$loop->last ? ',' : ''}} </span>
                    @endforeach
                  </td>
                  @can(['update' , 'delete'], App\Models\Department::class)
                  <td class="col-2">
                    <a href="{{ route('departments.edit', $department->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('departments.destroy', $department->id) }}" method="post" style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                  </td>
                  @endcan
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection