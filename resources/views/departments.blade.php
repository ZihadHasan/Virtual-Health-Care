@extends('layout')
@section('content')
    
    <div class="container text-center">
      <h2>Doctors of <b>{{$name}}</b> Department</h2>
    </div><br><br>

  	<div style="height: 65vh;" class="container">
      @if($doctors->count() > 0)
                  <div class="row">
                  @foreach ($doctors as $doctor)
                  <div class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                    <div class="panel panel-primary text-center">
                      <div class="panel-heading"><strong>{{$doctor->user->name}}</strong></div>
                      <div class="panel-body">
                        <img src="{{asset($doctor->user->avatar)}}" alt="{{$doctor->user->name}}" class="img-fluid" height="200px" width="200px"><br><br>
                        <b>{{$doctor->title}}</b><br>
                        {{$doctor->department->name}}<br>
                        <span class="alert-danger" style="padding: 2px; margin-bottom: 5px">{{$doctor->user->description}}</span><br>
                        <a href="{{route('profile',['id' => $doctor->id])}}" class="btn btn-sm btn-primary"><strong>View Profile</strong></a>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>


  						<div class="text-center">
                {{ $doctors->links() }}
              </div>

  				<!-- /pagination -->
  			</div>
        @else
            <div class="col-lg-6 col-md-6 col-sm-12 col-lg-offset-3 col-md-offset-3">
                <div class="alert alert-danger text-center">
                    No Doctors Available for <b>{{$name}}</b> Department
                </div>
            </div>
        @endif
  			<!-- /col -->
  		</div>
  		<!-- /row -->
  	</div>
  	<!-- /container -->
@endsection
