@extends('layouts.app')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading ehealth">
      Enter The Identity No.
    </div>
    <div class="panel-body">
      <form class="form-inline text-center" action="{{route('accountant.appointment.recieption.submit')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label class="label-control" for="identity">Identity No: </label>
          <input type="text" name="id" value="@if($find) {{$query}} @endif" id="identity" class="form-control">
        </div>
        <div class="form-group">
          <input type="submit" value="Get information" class="btn btn-sm btn-primary">
        </div>
      </form>
    </div>
  </div>
  @if($find)
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        Info for Identity No: {{$query}}
      </div>
      <div class="panel-body">
        @if($appointment)
          <center><h3>Detailed Informations</h3></center>
          <span class="pull-right">
            <b>Date:</b>{{$appointment->checkout->created_at->format('d/m/Y')}}<br>
            <b>ID No: </b>{{$appointment->checkout->id}}<br>
            <b>{{$appointment->checkout->identity}}</b><br>
            <img src="{{asset($appointment->patient->user->avatar)}}" height="80px" width="80px" alt="your picture"><br>
            <small>{{$appointment->patient->user->name}}</small><br>
          </span>
          <b>Doctor info</b>:<br>
          <b>Doctor     : </b>{{$appointment->doctor->user->name}}<br>
          <b>Title      : </b>{{$appointment->doctor->title}}<br>
          <b>Department : </b>{{$appointment->doctor->department->name}}<br>
          <b>Bill       : </b>{{number_format($appointment->doctor->bill)}} <b>(PAID)</b><br>
          <b>Date       : </b>{{$appointment->date}}<br>
          <b>Time       : </b>{{$appointment->time}}<br><br>
          <b>Patient Info</b>:<br>
          <b>Name       : </b>{{$appointment->patient->user->name}}<br>
          <b>Mobile     : </b>{{$appointment->patient->user->phone}}<br>
          <b>Age        : </b>{{$appointment->patient->user->age}}<br>
          <b>Gender     : </b>@if(!$appointment->patient->user->gender)Male @else Female @endif <br><br>
          @if(!$appointment->isVerified)
            <a href="{{route('accountant.appointment.verify',['id' => $appointment->id])}}" class="btn btn-sm pull-right ehealth">Verify Payment</a>
          @endif
        @else
          <div class="alert alert-warning">
            No Details Found For ID No. {{$query}}
          </div>
        @endif
      </div>
    </div>
  @endif
@endsection
