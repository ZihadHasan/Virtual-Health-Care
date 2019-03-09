@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Prescription List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          <th colspan="2">Action</th>
        </thead>
        <tbody>
          @if ($prescriptions->count() > 0)
            @foreach ($prescriptions as $pre)
              <tr>
                <td>
                  {{$pre->patient->user->name}}
                </td>
                <td>
                  {{$pre->doctor->user->name}}
                </td>

                @if(Auth::user()->isDoctor && $pre->doctor->user->id == Auth::id())
                  <td>
                    <a href="{{route('prescription.edit',['id' => $pre->id])}}" class="btn btn-info btn-sm">Edit</a>
                  </td>
                @endif


                @if(Auth::id() == $pre->patient->user->id || Auth::user()->isDoctor)
                  <td>
                    <a href="{{route('show.prescription',['id' => $pre->id])}}" class="btn btn-success btn-sm">View</a>
                  </td>
                @endif

              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No prescription Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $prescriptions->links() }}</center>
    </div>
  </div>
@endsection
