@extends('layout', ['user' => $user, 'page' => 'C'])

@section('content')
    <h1>Carica foto</h1>
    @component('component.uploadPhotoComponent', ['pathUpload' => 'feedUploadPhoto', 'pathToReturn' => 'feed']) @endcomponent
@endsection 