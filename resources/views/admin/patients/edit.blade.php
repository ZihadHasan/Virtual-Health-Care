@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Update Patient</div>
              <div class="panel-body">
                <form action="{{route('admin.patient.update',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' value="{{$user->name}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' value="{{$user->email}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id='phone' value="{{$user->phone}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="description" rows="8" cols="8" class="form-control" id="address">{{$user->description}}</textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Update Patient</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
