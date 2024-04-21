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
              <h3 class="box-title">Enrollments</h3>
                <a href="{{ route('enrollments.create') }}" class="btn btn-primary pull-right">Add Enrollment</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="col-2">No</th>
                  <th class="col-4">Students Name</th>
                  <th class="col-2">Courses Name</th>
                  <th class="col-sm-2">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($enrollments as $enrollment)
                <tr>
                  <td class="col-2">{{ $loop->iteration }}</td>
                  <td class="col-4">{{ $enrollment->student->user->name }}</td>
                  <td class="col-2">{{ $enrollment->course->name }}</td>
                  <td class="col-2">
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="post" style="display: inline-block">
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