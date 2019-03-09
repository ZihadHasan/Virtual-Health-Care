@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Create New Department</div>
              <div class="panel-body">
                <form action="{{route('department.store')}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Department</label>
                    <input type="text" name="name" id='name' class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Create Department</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
