@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Appointment List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan="2"  class="text-center">Action</th>
        </thead>
        <tbody>
          @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
              <tr rowsapn="2">
                <td>
                  {{$appointment->patient->user->name}}
                </td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->time}}</td>
                  <td class="text-center">
                    <a href="{{route('doctor.appointment.view',['id' => $appointment->id])}}" class="btn btn-primary">View</a>
                  </td>
                  <td class="text-center">
                    <a href="{{route('doctor.appointment.reject',['id' => $appointment->id])}}" class="btn btn-danger">Reject</a>
                  </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Pending Appointment Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
