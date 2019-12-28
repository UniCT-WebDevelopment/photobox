@extends('layout', ['user' => $user, 'page' => 'P'])

@section('content')
<h1>Cambia foto profilo</h1>

@component('component.uploadPhotoComponent', ['pathUpload' => 'editProfilePhoto', 'pathToReturn' => 'profile'])
@endcomponent

@endsection