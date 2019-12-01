@extends('layout', ['user' => $user, 'page' => 'H'])

@section('content')
    <h1>Bacheca</h1>
    @component('component.feedPhotoComponent', ['user' => $user, 'listaPhoto' => $listaPhoto, 'page' => 'H']) @endcomponent
@endsection