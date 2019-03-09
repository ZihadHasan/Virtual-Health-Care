@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">Accountant List</div>
    <div class="panel-body">
      <table class="table table-hover">
        <thead>
          <th>Avatar</th>
          <th>Name</th>
          <th>Edit</th>
          <th>Delete</th>
        </thead>
        <tbody>
          @if ($accountants->count() > 0)
            @foreach ($accountants as $accountant)
              <tr>
                <td>
                  <img src="{{asset($accountant->user->avatar)}}" height="80px" width="60px" alt="">
                </td>
                <td>
                  {{$accountant->user->name}}
                </td>
                <td>
                  <a href="{{route('admin.accountant.edit',['id' => $accountant->user->id])}}" class="btn btn-info btn-sm">Edit</a>
                </td>
                <td>
                  <a href="{{route('admin.accountant.delete',['id' => $accountant->user->id])}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
            @endforeach
          @else
            <tr>
              <th colspan="5" class="text-center">No Accountant Exist.</th>
            </tr>
          @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection
