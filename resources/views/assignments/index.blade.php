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
              <h3 class="box-title">Assignments</h3>
                @can('create', App\Models\Assignment::class)
                <a href="{{ route('assignments.create') }}" class="btn btn-primary pull-right">Add assignment</a>
                @endcan
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th class="col-2">No</th>
                  <th class="col-2">Students</th>
                  <th class="col-2">Teachers</th>
                  <th class="col-2">Title</th>
                  <th class="col-2">Description</th>
                  @can('update', App\Models\Assignment::class)
                  <th class="col-sm-2">Actions</th>
                  @endcan
                </tr>
                </thead>
                <tbody>
                @foreach($assignments as $assignment)
                <tr>
                  <td class="col-2">{{ $loop->iteration }}</td>
                  <td class="col-2">{{ $assignment->student->user->name }}</td>
                  <td class="col-2">{{ $assignment->teacher->user->name }}</td>
                  <td class="col-2">{{ $assignment->title }}</td>
                  <td class="col-2">{!!$assignment->description!!}</td>
                  @can('update', $assignment)
                  <td class="col-2">
                    <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('assignments.destroy', $assignment->id) }}" method="post" style="display: inline-block">
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