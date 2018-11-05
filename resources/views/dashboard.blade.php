@extends('layouts/master')

@section('content')

@javascript(compact('pusherKey', 'pusherCluster', 'usingNodeServer'))

<dashboard id="dashboard" columns="5" rows="12">
    <traffic position="a1:b12"></traffic>
    <weather position="c1:d12"></weather>
    <time-weather position="e1:e4" date-format="ddd DD/MM" time-zone="Europe/Amsterdam" weather-city="Den Haag"></time-weather>
    <calendar position="e5:e12"></calendar>
</dashboard>

@endsection
