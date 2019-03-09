@extends('layouts.app')

@section('content')
  <div class="justify-content-center">

    @include('admin.includes.errors')


          <div class="panel panel-primary">
              <div class="panel-heading">Prescribe {{$pre->patient->user->name}}</div>
              <div class="panel-body">
                <form action="{{route('prescription.update',['id' => $pre->id])}}" method="post">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="name">Prescription</label>
                    <textarea name="body" rows="8" cols="80" class="form-control pull-left">
                      {{$pre->body }}
                      </textarea>
                  </div>
                  <div class="form-group">
                    <div class="text-center">
                      <button type="submit" class="btn btn-success btn-block btn-lg">Save Prescription</button>
                    </div>
                  </div>
                </form>
              </div>
          </div>
      </div>
@endsection
