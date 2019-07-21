@extends('layout')

@section('content')
    <h1>Profilo</h1>
    <h6><strong>Nome</strong>: {{ $user->nome }}</h6>
    <h6><strong>Cognome</strong>: {{ $user->cognome }}</h6>
    <h6><strong>Username</strong>: {{ $user->nickname }}</h6>
    <h6><strong>Data di Nascita</strong>: {{ $user->dataNascita }}</h6>
   
    <div class="section_content mt30">
        <a href="/modify" class="btn btn-primary-outline">Modifica Profilo</a>
        <a href="/modifyPhoto" class="btn btn-primary-outline">Cambia Foto</a>
    </div>
@endsection