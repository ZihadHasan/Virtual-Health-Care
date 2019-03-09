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
          <th>Time</th>
          <th colspan="2"  class="text-center">Status</th>
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
                <td>{{$appointment->time}}</td>
                @if($appointment->isPaid)
                  <td colspan="2" class="text-center">
                    <a href="{{route('accountant.appointment.get',['id'=>$appointment->id])}}" class="btn btn-primary">Verify Payment</a>
                  </td>
                @else
                  <td colspan="2" class="text-center">
                    <span class="alert-primary">Yet to be paid</span>
                  </td>
                @endif
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Unverified Appointment Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
