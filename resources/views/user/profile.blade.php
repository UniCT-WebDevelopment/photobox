@extends('layout', ['user' => $user, 'page' => 'P'])

@section('content')

@component('component.userInfoComponent', ['user' => $user]) @endcomponent
@component('component.userBtnComponent') @endcomponent
@component('component.userChartComponent') @endcomponent

@endsection