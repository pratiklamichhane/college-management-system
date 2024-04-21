@extends('layouts.master')
@section('title', 'Department create')

@section('content')
<div class="box box-info col-12">
            <div class="box-header with-border">
              <h3 class="box-title">CREATE DEPARTMENT</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal m-6" action="{{route('departments.store')}}" method="post">
              <div class="box-body">
                @csrf
                <div class="form-group">
                  <label for="name" class="col-sm-1 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Eg : BCA">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">CREATE</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
@endsection