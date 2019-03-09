@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Diagnosis List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Patient Name</th>
          <th>Doctor Name</th>
          @if($dia->patient->user->id == Auth::id())
            <th>Edit</th>
          @endif
          <th>View</th>
          @if($dia->patient->user->id == Auth::id())
            <th>Delete</th>
          @endif
        </thead>
        <tbody>
          @if ($diagnosises->count() > 0)
            @foreach ($diagnosises as $dia)
              <tr>
                <td>
                  {{$dia->patient->user->name}}
                </td>
                <td>
                  @if($dia->patient->user->id == Auth::id())
                    <a href="{{route('diagnosis.edit',['id' => $dia->id])}}" class="btn btn-info btn-sm">Edit</a>
                  @endif
                </td>
                <td>
                  @if(Auth::id() == $pre->patient->user->id || Auth::user()->isDoctor)
                    <a href="{{route('show.diagnosis',['id' => $dia->id])}}" class="btn btn-success btn-sm">View</a>
                  @endif
                </td>
                <td>
                  @if($dia->patient->user->id == Auth::id())
                    <a href="{{route('diagnosis.delete',['id' => $dia->id])}}" class="btn btn-danger btn-sm">Delete</a>
                  @endif
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Diagnosis Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $diagnosises->links() }}</center>
    </div>
  </div>
@endsection
