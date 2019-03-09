@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-primary">
        <div class="panel-heading">
          Photo
        </div>
        <div class="panel-body">
          <center>
            <img src="{{asset($user->avatar)}}" height="100px" width="80px" alt="">
          </center>
          <form action="{{route('user.profile.picture')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="lable-control" for="photo">Photo</label>
              <input type="file" class="form-control" name="avatar" id="photo">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
      @if($user->isDoctor)
        <div class="panel panel-primary">
          <div class="panel-heading">
            Specilities
          </div>
          <div class="panel-body">
            <form action="{{route('user.profile.specialities')}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="department" class="label-control">Department</label>
                <select class="form-control" name="department_id" id="department">
                  @foreach ($departments as $department)
                    <option @if($user->doctor->department_id == $department->id) selected @endif value="{{$department->id}}">{{$department->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="title" class="label-control">Title</label>
                <input class="form-control" name="title" id="title" value="{{$user->doctor->title}}">
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary bt-sm" value="Update">
              </div>
            </form>
          </div>
        </div>
      @endif
      <div class="panel panel-primary">
        <div class="panel-heading">
          Personal Information
        </div>
        <div class="panel-body">
          <form action="{{route('user.profile.information')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="lable-control" for="gender">Gender: </label>
              <select class="form-control" name="gender" id="gender">
                <option @if(!$user->gender)selected @endif value="0">Male</option>
                <option @if($user->gender)selected @endif value="1">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label class="lable-control" for="name">Name</label>
              <input type="text" name="name" class="form-control" value="{{$user->name}}" id="name">
            </div>
            <div class="form-group">
              <label class="lable-control" for="age">Age</label>
              <input type="text" name="age" class="form-control" value="{{$user->age}}" id="age">
            </div>
            <div class="form-group">
              <label class="lable-control" for="email">Email</label>
              <input type="email" name="email" class="form-control" value="{{$user->email}}" title="Ask Admin For Change Your Email" id="email" disabled>
            </div>
            <div class="form-group">
              <label class="lable-control" for="phone">Phone</label>
              <input type="text" name="phone" class="form-control" value="{{$user->phone}}" id="phone">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
      @if(!Auth::user()->isAccountant)
        <div class="panel panel-primary">
          <div class="panel-heading">
            @if($user->isDoctor)
              Objectives
            @elseif($user->isPatient)
              Address
            @endif
          </div>
          <div class="panel-body">
            <form action="{{route('user.profile.address')}}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label class="lable-control" for="address">@if($user->isDoctor)
                  Objectives
                @elseif($user->isPatient)
                  Address
                @endif
              </label>
                <textarea name="description" class="form-control" rows="8" cols="8" id="address">{{$user->description}}</textarea>
              </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary bt-sm" value="Update">
              </div>
            </form>
          </div>
        </div>
      @endif
      <div class="panel panel-primary">
        <div class="panel-heading">
          Update Password
        </div>
        <div class="panel-body">
          <form action="{{route('user.profile.password')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label class="lable-control" for="password">New Password</label>
              <input type="password" name="password" class="form-control"  id="password">
            </div>
            <div class="form-group">
              <label class="lable-control" for="password-confirm">Confirm Password</label>
              <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary bt-sm" value="Update">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
