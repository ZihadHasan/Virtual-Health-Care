@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Appointment List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th>Date</th>
          <th>Action</th>
          <th colspan="2"  class="text-center">Identity</th>
        </thead>
        <tbody>
          @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
              <tr rowsapn="2">
                <td>
                  {{$appointment->patient->user->name}}
                </td>
                <td>
                  {{$appointment->doctor->user->name}}
                </td>
                <td>{{$appointment->date}}</td>
                <td>
                  <a href="{{route('accountant.appointment.get',['id' => $appointment->id])}}" class="btn btn-sm btn-primary">Details</a>
                </td>
                <td colspan="2" class="text-center">
                  <span class="alert-info">{{$appointment->checkout->identity}}</span>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Verified Appointment Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
