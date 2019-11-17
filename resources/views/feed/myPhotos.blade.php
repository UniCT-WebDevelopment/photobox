@extends('layout', ['user' => $user]) 

@section('content')
<h1>Le mie foto</h1>

@component('feed.feedPhotoComponent', ['user' => $user, 'listaPhoto' => $listaPhoto])
@endcomponent

@endsection