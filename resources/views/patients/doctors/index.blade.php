@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading ehealth">
      Select a Department
    </div>
    <div class="panel-body">
      <form class="form-inline text-center" action="{{route('patient.appointment.department.submit')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <select class="form-control" name="department_id">
            @foreach ($departments as $department)
              <option @if($find)@if($result->id == $department->id) selected @endif @endif value="{{$department->id}}">{{$department->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <input type="submit" value="Get Doctors" class="btn btn-sm btn-primary">
        </div>
      </form>
    </div>
  </div>
  @if($find)
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        Doctors from {{$result->name}}
      </div>
      <div class="panel-body">
        @if($doctors->count() > 0)
          @foreach ($doctors as $doctor)
            <div class="row">
              <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                <div class="panel panel-success text-center">
                  <div class="panel-heading">{{$doctor->user->name}}</div>
                  <div class="panel-body">
                    <img src="{{asset($doctor->user->avatar)}}" alt="your img" height="45px" width="45px"><br><br>
                    <b>{{$doctor->title}}</b><br>
                    {{$doctor->department->name}}<br>
                    <span class="alert-danger" style="padding: 2px; margin-bottom: 5px">{{$doctor->user->description}}</span><br>
                    <a href="{{route('patient.appointment.take',['id' => $doctor->id])}}" class="btn btn-sm btn-primary">Take Appointment</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        @else
          <div class="alert alert-warning">
            No Doctors Found For {{$result->name}}
          </div>
        @endif
      </div>
    </div>
  @endif
@endsection
