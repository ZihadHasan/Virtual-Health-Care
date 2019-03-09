@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Department List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Department Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          @if ($departments->count() > 0)
            @foreach ($departments as $department)
              <tr>
                <td>
                  {{$department->name}}
                </td>
                <td>
                  <a href="{{route('department.edit',['id' => $department->id])}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="{{route('department.delete',['id' => $department->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Department Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
      <center>{{ $departments->links() }}</center>
    </div>
  </div>
@endsection
