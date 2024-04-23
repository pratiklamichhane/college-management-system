@extends('layouts.master')
@section('title', 'Dashboard')

@section('content')
<!-- login error -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
  <h2>User Register Form</h2>
  <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
        @csrf

    <div class="form-group">
      <label for="name">Name:</label>
      <input type="name" class="form-control" id="name"
      value="{{old('name')}}"
      placeholder="Enter name" name="name">
    </div>

    <div class="form-group">
      <label for="model">Email:</label>
      <input type="email" class="form-control" id="email"
      value="{{old('email')}}"
      placeholder="Enter email" name="email">
    </div>

    <div class="form-group">
      <label for="storage">Role:</label>
      <select name="role" class="form-control">
        <option value="teacher">Teacher</option>
        <option value="student">Student</option>
      </select>
    </div>

    <div class="form-group">
      <label for="storage">Password:</label>
      <input type="password" class="form-control" id="password"
      placeholder="Enter password" name="password">
    </div>

      <div class="form-group">
      <label for="storage">Password:</label>
      <input type="password" class="form-control" id="password_confirmation"
      placeholder="Enter password" name="password_confirmation">
    </div>


      <div class="form-group">
          <label for="storage">Image:</label>
          <input type="file" class="form-control" id="image" name="image">
      </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

@endsection
