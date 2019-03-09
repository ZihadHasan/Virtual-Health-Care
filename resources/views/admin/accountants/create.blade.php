@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Add Accountant</div>
              <div class="panel-body">
                <form action="{{route('admin.accountant.store')}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Avatar</label>
                    <input type="file" name="avatar" id='avatar' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id='name' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id='email' class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id='password' class="form-control">
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Add Accountant</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
