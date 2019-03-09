<div class="col-lg-4">
  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Doctor
    </div>
    <div class="panel-body">
      @if ($user->avatar)
        <img src="{{asset($user->avatar)}}" alt="your img" height="100px" width="80px">
      @else
        <span class="alert alert-danger">Please Add an Image</span>
      @endif<br><br>
      <big><b>{{$user->name}}</b></big> ({{$user->doctor->title}})<br>
      <b>{{$user->doctor->department->name}}</b><br>
      <big>{{$user->email}}</big><br>
      <big>{{$user->phone}}</big><br>
      <big><address><b>Objectives :</b> <br>@if($user->description){{$user->description}}@else <span class="alert-danger">Please Add your Address</span>@endif</address></big>
      <a href="{{route('user.profile.edit')}}" class="btn btn-block btn-primary">Edit</a>
    </div>
  </div>


  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Quick Links
    </div>
    <div class="panel-body">
      <ul class="list-group">
        <a href="{{route('home')}}">
          <li class="list-group-item">Home</li>
        </a>
        <a href="{{route('doctor.appointment.index')}}">
          <li class="list-group-item">Pending Appointments</li>
        </a>
        <a href="{{route('doctor.patient.list',['id' => Auth::user()->doctor->id])}}">
          <li class="list-group-item">Your Patients</li>
        </a>
      </ul>
    </div>
  </div>
</div>
