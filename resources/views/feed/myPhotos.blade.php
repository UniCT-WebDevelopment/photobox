@extends('layout', ['user' => $user, 'page' => 'M'])

@section('content')
    <h1>Le mie foto</h1>
    @component('component.feedPhotoComponent', ['user' => $user, 'listaPhoto' => $listaPhoto]) @endcomponent
@endsection