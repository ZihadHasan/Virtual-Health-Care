@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Update Accountant</div>
              <div class="panel-body">
                <form action="{{route('admin.accountant.update',['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' value="{{$user->name}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' value="{{$user->email}}" class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Update Accountant</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
