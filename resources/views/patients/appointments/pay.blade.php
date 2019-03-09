@extends('layouts.app')

@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      @if($proceed == 0)
        Check Your Details Again
      @elseif($proceed == 1)
        Pay The Bill
      @elseif($proceed == 2)
        <center><b>Payment information</b></center>
      @elseif($proceed == 3)
        <center><b>Detailed information</b></center>
      @endif
    </div>
    <div class="panel-body">
        @if($proceed == 0 || $proceed == 1)
          <div class="printableArea">
            <span class="pull-right">
              <img src="{{asset($appointment->doctor->user->avatar)}}" height="80px" width="80px" alt="your doctor"><br>
              <small>{{$appointment->doctor->user->name}}</small><br>
              <small>{{$appointment->doctor->title}}</small>
            </span>
            <b>Doctor     : </b>{{$appointment->doctor->user->name}}<br>
            <b>Title      : </b>{{$appointment->doctor->title}}<br>
            <b>Department : </b>{{$appointment->doctor->department->name}}<br>
            <b>Bill       : </b>{{number_format($appointment->doctor->bill)}}<br>
            <b>Date       : </b>{{$appointment->date}}<br>
            <b>Time       : </b>{{$appointment->time}}<br><br><br>
          </div>
        @if($proceed == 0)
          <a href="{{route('patient.appointment.proceed',['id' => $appointment->id])}}" class="btn btn-sm ehealth">Proceed</a>
        @elseif($proceed == 1)
          @include('patients.appointments.stripe')
        @endif
      @elseif($proceed == 2)
          @include('patients.appointments.paid')
      @elseif($proceed == 3)
          @include('patients.appointments.details')
      @endif
    </div>
    <div class="panel-footer">
      <a class="btn btn-sm btn-default" href="javascript:void(0);" id="printButton">print</a>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="{{asset('js/jquery.PrintArea.js')}}"></script>
  <script>
    $(document).ready(function(){
        $("#printButton").click(function(){
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = { mode : mode, popClose : close};
            $("div.printableArea").printArea( options );
        });
    });
</script>
@endsection
