@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Update Department: {{$department->name}}</div>
              <div class="panel-body">
                <form action="{{route('department.update',['id' => $department->id])}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Department Name</label>
                    <input type="text" name="name" id='name' class="form-control" value="{{$department->name}}">
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Upadate Department</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
