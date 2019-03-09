@extends('layouts.app')

@section('content')
  @if(Auth::check() && Auth::user()->isAdmin)
    @include('admin.includes.index')
  @elseif (Auth::check() && Auth::user()->isPatient)
    @include('patients.includes.index')
  @elseif (Auth::check() && Auth::user()->isDoctor)
    @include('doctors.includes.index')
  @elseif (Auth::check() && Auth::user()->isAccountant)
    @include('accountants.includes.index')
  @endif
@endsection
