@extends('layout', ['user' => $user])

@section('nome_utente')
    {{ $user->nome }} {{ $user->cognome }}
@endsection

@section('content')
    <h1>Profilo</h1>
    <h6><strong>Nome</strong>: {{ $user->nome }}</h6>
    <h6><strong>Cognome</strong>: {{ $user->cognome }}</h6>
    <h6><strong>Username</strong>: {{ $user->nickname }}</h6>
    <h6><strong>eMail</strong>: {{ $user->email }}</h6>
    <h6><strong>Data di Nascita</strong>: {{ date('d-m-Y', strtotime($user->dataNascita)) }}</h6>
    <h6><strong>Biografia</strong>: {{ $user->bio }}</h6>
   
    <div class="section_content mt30">
        <a href="/editProfileInfo" class="btn btn-primary-outline">Modifica Profilo</a>
        <a href="/editProfilePhoto" class="btn btn-primary-outline">Cambia Foto</a>
    </div>

    <div class="section_content mt30">
        <h4>Statistiche Foto</h4>
    </div>
@endsection