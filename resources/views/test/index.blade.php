@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="panel panel-primary text-center">
            <div class="panel-heading"><h3>Testing Things</h3></div>
            <div class="panel-body">
                @php
                    $input  = '2018-08-16 2:11:20';
                    $now = Carbon\Carbon::now();
                    $format1 = 'Y-m-d';
                    $format2 = 'i';
                    $date = Carbon\Carbon::parse($input)->format($format1);
                    $time = Carbon\Carbon::parse($input)->format($format2);
                    $time2 = Carbon\Carbon::parse($now)->format($format2);
                @endphp
                {{$date}}<br>
                {{Carbon\Carbon::now()}}<br>
                You have : {{$time+30 - $time2}} Mins Only
            </div>
        </div>
    </div>
@endsection
