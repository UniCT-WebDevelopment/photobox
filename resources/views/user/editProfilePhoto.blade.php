@extends('layout', ['user' => $user])

@section('content')
<h1>Cambia foto profilo</h1>

@component('uploadPhotoComponent', ['pathUpload' => 'editProfilePhoto', 'pathToReturn' => 'profile'])
@endcomponent

@endsection 
