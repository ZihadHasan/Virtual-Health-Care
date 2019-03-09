@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')

      <div class="row">
        <div class="col-lg-8 col-md-8 col-lg-offset-2 col-md-offset-2">
          <div class="alert alert-info">
            <div class="row">
              <div class="col-lg-4 col-lg-offset-1">
                <b>To</b><br>
                <b>{{$pre->patient->user->name}}</b>
              </div>
              <div class="col-lg-4 col-lg-offset-1">
                <b>By</b><br>
                <b>{{$pre->doctor->user->name}}</b>
              </div>
            </div>
          </div>
        </div>
      </div>
          <div class="panel panel-primary">
              <div class="panel-heading"><center><h4>Prescription</h4></center></div>
              <div class="panel-body">
                <form>
                  <div class="form-group">
                    <textarea rows="8" cols="80" class="form-control" disabled>
                      {{$pre->body}}
                    </textarea>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
