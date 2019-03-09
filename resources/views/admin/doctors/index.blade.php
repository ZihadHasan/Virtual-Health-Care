@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Doctor List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>Department</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          @if ($doctors->count() > 0)
            @foreach ($doctors as $doctor)
              <tr>
                <td>
                  <img src="{{asset($doctor->user->avatar)}}" height="80px" width="60px" alt="">
                </td>
                <td>
                  {{$doctor->user->name}}
                </td>
                <td>
                  @if($doctor->department_id != NULL)
                    {{$doctor->department->name}}
                  @else
                    No Department !
                  @endif
                </td>
                <td>
                  <a href="{{route('admin.doctor.edit',['id' => $doctor->user->id])}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="{{route('admin.doctor.delete',['id' => $doctor->user->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Doctor Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $doctors->links() }}</center>
    </div>
  </div>
@endsection
