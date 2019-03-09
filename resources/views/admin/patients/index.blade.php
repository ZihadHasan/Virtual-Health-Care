@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Patient List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>phone</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          @if ($patients->count() > 0)
            @foreach ($patients as $patient)
              <tr>
                <td>
                  <img src="{{asset($patient->user->avatar)}}" height="80px" width="60px" alt="">
                </td>
                <td>
                  {{$patient->user->name}}
                </td>
                <td>
                {{$patient->user->phone}}
                </td>
                <td>
                  <a href="{{route('admin.patient.edit',['id' => $patient->user->id])}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="{{route('admin.patient.delete',['id' => $patient->user->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Patient Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $patients->links() }}</center>
    </div>
  </div>
@endsection
