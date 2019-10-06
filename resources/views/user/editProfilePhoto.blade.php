@extends('layout', ['user' => $user])

@section('content')
<h1>Cambia foto profilo</h1>

@component('user.uploadPhotoComponent')
@endcomponent

@endsection 
