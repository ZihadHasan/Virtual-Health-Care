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
          <th colspan="2"  class="text-center">Action</th>
        </thead>
        <tbody>
          @if ($appointments->count() > 0)
            @foreach ($appointments as $appointment)
              <tr rowsapn="2">
                <td>
                  <a href="{{route('patient.profile',['id' => $appointment->patient->user->id])}}">{{$appointment->patient->user->name}}</a>
                </td>
                <td>
                  <a href="{{route('profile',['id' => $appointment->doctor->id])}}">{{$appointment->doctor->user->name}}</a>
                </td>
                <td>{{$appointment->date}}</td>
                <td>{{$appointment->time}}</td>
                @if(!$appointment->sendDoctor)
                  <td colspan="2" class="text-center">
                    <a href="{{route('admin.appointment.sent',['id' => $appointment->id])}}" class="btn btn-primary">Sent To Doctor</a>
                  </td>
                @elseif($appointment->sendDoctor && !$appointment->confirmedDoctor && !$appointment->isRejected)
                  <td colspan="2" class="text-center">
                    <span class="alert-success">Waiting for Doctor's Confimation</span>
                  </td>
                @elseif($appointment->sendDoctor && $appointment->isRejected)
                  <td colspan="2" class="text-center">
                    <span href="#" class="alert-danger">Doctor Rejected This Request</span>
                  </td>
                @elseif ($appointment->sendDoctor && $appointment->confirmedDoctor && !$appointment->isConfirmed && !$appointment->isRejected)
                  <td class="text-center">
                    <a href="{{route('admin.appointment.accept',['id' => $appointment->id])}}" class="btn btn-success">Accept</a>
                  </td>
                  <td class="text-center">
                    <a href="{{route('admin.appointment.reject',['id' => $appointment->id])}}" class="btn btn-danger">Reject</a>
                  </td>
               @elseif($appointment->isConfirmed && !$appointment->isPaid)
                  <td colspan="2" class="text-center">
                    <span class="alert-success">This Request Has Been Confirmed</span>
                  </td>
              @elseif($appointment->isPaid)
                 <td colspan="2" class="text-center">
                   <span class="text-success">Paid</span>
                 </td>
                @endif
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Appointment Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $appointments->links() }}</center>
    </div>
  </div>
@endsection
