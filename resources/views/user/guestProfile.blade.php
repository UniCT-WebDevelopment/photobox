@extends('layout', ['user' => $user, 'page' => 'G'])

@section('content')

@component('component.userInfoComponent', ['user' => $guest]) @endcomponent

<h3>Le foto di {{ $guest->nome }} {{ $guest->cognome }}</h3>
@component('component.feedPhotoComponent', ['user' => $guest, 'listaPhoto' => $listaPhoto, 'page' => 'G']) @endcomponent

@endsection