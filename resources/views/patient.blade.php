@extends('layout')
@section('content')
  <div id="breadcrumb">
			<div class="container">
				<ul>
          Patient's Profile
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
		<div class="container margin_60">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">General info</a></li>
							</ul>
						</div>
					</nav>
					<div id="section_1">
						<div class="box_general_3">
							<div class="profile">
								<div class="row">
									<div class="col-lg-5 col-md-4">
										<figure>
											<img src="{{asset($user->avatar)}}" alt="" class="img-fluid" height="200px" width="200px">
										</figure>
									</div>
									<div class="col-lg-7 col-md-8">
										<strong>Patient</strong>
										<h1>{{$user->name}}</h1>
										<ul class="statistic">
											<li>{{$user->age}} y old</li>
											<li>
                        @if($user->gender)
                          Female
                        @else
                          Male
                        @endif
                      </li>
										</ul>
										<ul class="contacts">
											<li>
												<h6>Address</h6>
												{{$user->description}}
											</li>
											<li>
												<h6>Phone</h6> {{$user->phone}}</li>
										</ul>
									</div>
								</div>
							</div>
              <center>
                @if(Auth::id() == $user->id)
                  <hr>
                  <a href="{{route('user.profile.edit')}}" class="btn btn-block btn-primary">Edit</a>
                @endif
              </center>
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
@endsection
