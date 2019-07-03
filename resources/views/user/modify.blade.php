@extends('layout')

@section('content')
    <head>
        <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
    <h1>Modifica dati profilo</h1>
    <div class="main-w3layouts wrapper">
        <div class="main-agileinfo">
            <div class="agileits-top" id="login-form">
                <form action="#" method="POST">
                    <input class="text" type="text" name="nome" placeholder="Nome" required>
                    <input class="text" type="text" name="cognome" placeholder="Cognome" required>
                    <input class="text" type="date" name="dataNascita" placeholder="Data di nascita" required>
                    <!--<input class="text" type="text" name="username" placeholder="Username" required>-->
                    <input class="text email" type="email" name="email" placeholder="Email" required>
                    <input class="text" type="password" name="password" placeholder="Password" required>
                    <input class="text" type="password" name="passwordControllo" placeholder="Ripeti Password" required>
                    <input type="submit" value="Modifica">
                </form>
            </div>
        </div>
    </div>

    </body>

@endsection
