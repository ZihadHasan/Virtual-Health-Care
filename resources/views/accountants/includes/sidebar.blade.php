<div class="col-lg-4">
  <div class="panel panel-default text-center">
    <div class="panel-heading ehealth">
      Accountant
    </div>
    <div class="panel-body">
      @if ($user->avatar)
        <img src="{{asset($user->avatar)}}" alt="your img" height="100px" width="80px">
      @else
        <span class="alert alert-danger">Please Add an Image</span>
      @endif<br><br>
      <big><b>{{$user->name}}</b></big><br>
      <big>{{$user->email}}</big><br>
      <big>{{$user->phone}}</big><br><br>
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
        <a href="{{route('accountant.appointment.recieption')}}">
          <li class="list-group-item">Recieption</li>
        </a>
        <a href="{{route('accountant.unverified.appointment.list')}}">
          <li class="list-group-item">Unverified Appointments</li>
        </a>
        <a href="{{route('accountant.verified.appointment.list')}}">
          <li class="list-group-item">Verified Appointments</li>
        </a>
      </ul>
    </div>
  </div>
</div>
