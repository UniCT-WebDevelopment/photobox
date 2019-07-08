@extends('layout')

@section('nome_utente')
    {{ $user->nome }} {{ $user->cognome }}
@endsection

@section('content') 
    <h1>Bacheca</h1> 
@endsection