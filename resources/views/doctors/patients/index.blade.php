@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading text-center">Patient List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Date</th>
          <th>Time</th>
          <th colspan="4"  class="text-center">Action</th>
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
                    <a href="{{route('patient.profile',['id' => $appointment->patient->user->id])}}" class="btn btn-primary">View</a>
                  </td>
                  <td class="text-center">
                    <a href="{{route('patient.consult',['id' => $appointment->id])}}" class="btn btn-success">Consult</a>
                  </td>
                  <td>
                    <a href="{{route('create.prescription',['id' => $appointment->patient->id])}}" class="btn btn-info"> Prescription</a>
                  </td>
                  <td>
                    <a href="{{route('prescription.list',['id' => $appointment->patient->id])}}" class="btn btn-warning"> List </a>
                  </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Pending Appointment Exist.</th>
            </tr>
          @endif
        </tbody>
        <tfoot>
          {{$appointments->links()}}
        </tfoot>
      </table>
    </div>
  </div>
@endsection
