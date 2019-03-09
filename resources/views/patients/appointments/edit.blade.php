@extends('layouts.app')
@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading text-center">
      Update Appointment with {{$appointment->doctor->user->name}}
    </div>
    <div class="panel-body">
      <form action="{{route('patient.appointment.update',['id'=>$appointment->id])}}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Department's Name</label>
          <input class="form-control" type="text" value="{{$appointment->doctor->department->name}}" disabled="1">
        </div>
        <div class="form-group">
          <label>Doctor's Name</label>
          <input class="form-control" type="text" name="name" value="{{$appointment->doctor->user->name}}" disabled="1">
        </div>
        <div class="form-group">
          <label class="control-label" for="date">Date</label>
          <input class="form-control" id="date" name="date" value="{{$appointment->date}}" type="text"/>
        </div>
        <div class="form-group">
          <input type="submit" value="Update Appointment" class="btn btn-success btn-block">
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.js"></script>
<script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.panel-body form').length>0 ? $('.panel-body form').parent() : "body";
    var options={
      format: 'dd-mm-yyyy',
      container: container,
      todayHighlight: true,
      autoclose: true,
    };
    date_input.datepicker(options);
  })

  $('.clockpicker').clockpicker({
    placement: 'top',
    align: 'left',
    donetext: 'SET'
  });
</script>
@endsection

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/clockpicker/0.0.7/bootstrap-clockpicker.min.css">
@endsection
