@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Update Doctor</div>
              <div class="panel-body">
                <form action="{{route('admin.doctor.update',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="department">Department</label>
                    <select class="form-control" name="department_id">
                      @foreach ($departments as $department)
                        <option @if($user->doctor->department_id == $department->id) selected @endif value="{{$department->id}}">{{$department->name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' value="{{$user->name}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id='title' value="{{$user->doctor->title}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="fees">Fees</label>
                    <input type="text" name="bill" id='fees' value="{{$user->doctor->bill}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' value="{{$user->email}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" rows="8" cols="8" class="form-control" id="description">{{$user->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Update Doctor</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
