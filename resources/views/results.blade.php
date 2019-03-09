@extends('layout')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-lg-offset-3 text-center">
      <h2>Result for <span class="search">{{$query}}</span></h2>
    </div>
  </div>
</div>
 
<div class="container"> 

  @if($doctors->count() > 0)
        <div class="row">
          @foreach ($doctors as $doctor)
            <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
              <div class="panel panel-primary text-center">
                <div class="panel-heading"><strong>{{$doctor->name}}</strong></div>
                <div class="panel-body">
                  <img src="{{asset($doctor->avatar)}}" alt="{{$doctor->name}}" class="img-fluid" height="200px" width="200px"><br><br>
                  <b>{{$doctor->title}}</b><br>
                  {{$doctor->doctor->department->name}}<br>
                  <span class="alert-danger" style="padding: 2px; margin-bottom: 5px">{{$doctor->description}}</span><br>
                  <a href="{{route('profile',['id' => $doctor->doctor->id])}}" class="btn btn-sm btn-primary"><strong>View profile</strong></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>

        <div class="text-center">
          {{$doctors->links()}}
        </div>

  @else
      <div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
          <div class="alert alert-danger text-center">
              No Doctors found by {{$query}}
          </div>
      </div>
  @endif

</div>
@endsection
