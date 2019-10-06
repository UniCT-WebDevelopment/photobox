@extends('layout')

@section('nome_utente')
{{ $user->nome }} {{ $user->cognome }}
@endsection

@section('content')
<h1>Cambia foto profilo</h1>

@component('user.uploadPhotoComponent')
@endcomponent

@endsection