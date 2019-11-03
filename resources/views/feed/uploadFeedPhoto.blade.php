@extends('layout', ['user' => $user])

@section('content')
<h1>Carica foto</h1>

@component('uploadPhotoComponent', ['pathUpload' => 'feedUploadPhoto', 'pathToReturn' => 'feed'])
@endcomponent

@endsection 
