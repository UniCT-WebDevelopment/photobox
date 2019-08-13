@extends('layout') 

@section('nome_utente') 
    {{ $user->nome }} {{ $user->cognome }} 
@endsection 

@section('content')

<h1>Modifica profilo</h1>
<form action="#" method="POST">
    <div class="mt50 row justify-content-center">
        <div class="col-md-4 col-12">
            <input class="form-control" type="text" name="nome" placeholder="Nome" autocomplete="off" required>
        </div>
        <div class="col-md-4 col-12">
            <input class="form-control" type="text" name="cognome" placeholder="Cognome" autocomplete="off" required>
        </div>
        <div class="col-md-4 col-12">
            <input class="form-control" type="date" name="dataNascita" placeholder="Data di nascita" required>
        </div>  
    </div>

    <div class="row justify-content-center">
        <div class="col-12">
            <textarea  placeholder="Biografia" class="form-control" cols="4" rows="3"></textarea>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6 col-12">
            <input class="form-control" type="password" name="password" placeholder="Password" autocomplete="off">
        </div>       
        <div class="col-lg-6 col-12">
                <input class="form-control" type="password" name="passwordControllo" placeholder="Ripeti Password" autocomplete="off">
        </div>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Modifica</button>
    </div>
</form>

@endsection