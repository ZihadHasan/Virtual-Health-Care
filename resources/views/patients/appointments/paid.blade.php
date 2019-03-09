<div class="printableArea">
  <center><h3>Detailed Informations</h3></center>
  <span class="pull-right">
    <b>Date:</b>{{$checkout->created_at->format('d/m/Y')}}<br>
    <b>{{$checkout->identity}}</b><br>
    <img src="{{asset($appointment->patient->user->avatar)}}" height="80px" width="80px" alt="your picture"><br>
    <small>{{$appointment->patient->user->name}}</small><br>
  </span>
  <b>Doctor info</b>:<br>
  <b>Doctor     : </b>{{$appointment->doctor->user->name}}<br>
  <b>ID No: </b>{{$appointment->checkout->id}}<br>
  <b>Title      : </b>{{$appointment->doctor->title}}<br>
  <b>Department : </b>{{$appointment->doctor->department->name}}<br>
  <b>Bill       : </b>{{number_format($appointment->doctor->bill)}} <b>(PAID)</b><br>
  <b>Date       : </b>{{$appointment->date}}<br>
  <b>Time       : </b>{{$appointment->time}}<br><br>
  <b>Patient Info</b>:<br>
  <b>Name       : </b>{{$appointment->patient->user->name}}<br>
  <b>Mobile     : </b>{{$appointment->patient->user->phone}}<br>
  <b>Age        : </b>{{$appointment->patient->age}}<br>
  <b>Gender     : </b>@if(!$appointment->patient->user->gender)Male @else Female @endif <br><br>
</div>
