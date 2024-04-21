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
              <h3 class="box-title">teachers</h3>
                <a href="{{ route('teachers.create') }}" class="btn btn-primary pull-right">Add teacher</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="col-2">No</th>
                  <th class="col-4">teachers Name</th>
                  <th class="col-2">Courses</th>
                  <th class="col-sm-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teachers as $teacher)
                <tr>
                  <td class="col-2">{{ $loop->iteration }}</td>
                  <td class="col-4">{{ $teacher->user->name }}</td>
                  <td class="col-2">{{ $teacher->department->name }}</td>
                  <td class="col-2">
                    <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('teachers.destroy', $teacher->id) }}" method="post" style="display: inline-block">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                  </td>
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