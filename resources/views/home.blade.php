<!DOCTYPE html>
<html>
<head>
<title>PhotoBox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>

    <link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i" rel="stylesheet">
</head>
<body>
	<div class="main-w3layouts wrapper">
		<img src="/images/logo.svg">
		<div class="main-agileinfo">
			<div class="agileits-top" id="signin-form">
				@if(!empty($response) && $response == 'success')
					<p class="success">Abbiamo creato il tuo account, <br> clicca su Accedi per entrare.</p>
				@elseif(!empty($response) && $response == 'fail')
					<p class="error">Esiste già un utente registrato <br> con questa email o username.</p>
				@endif
				<form action="/signin" method="POST">
					{{ csrf_field() }}
					<input class="text" type="text" name="nome" placeholder="Nome" required>
					<input class="text" type="text" name="cognome" placeholder="Cognome" required>
					<input class="text" type="date" name="dataNascita" placeholder="Data di nascita" required>
					<input class="text" type="text" name="nickname" placeholder="Username" required>
					<input class="text email" type="email" name="email" placeholder="Email" required>
					<input class="text" type="password" name="password" placeholder="Password" required>
					<input type="submit" value="Registrati">
				</form>
				<p>Hai gi&agrave; un Account? <a href id="switch-form-login"> Accedi</a></p>
			</div>

			<div class="agileits-top" id="login-form">
				<p>
    				{{ $errors->first('email') }}
					{{ $errors->first('password') }}
					{{ $errors->first('login_fail') }}
				</p>

				<form action="/login" method="POST">
					{{ csrf_field() }}
					<input class="text" type="email" name="email" placeholder="Email" required>
					<input class="text" type="password" name="password" placeholder="Password" required>
					<input type="submit" value="Accedi">
    				<p>Non hai un Account? <a href id="switch-form-signin"> Registrati</a></p>
				</form>
			</div>
        </div>

		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2019 {{ env('APP_NAME') }}. All rights reserved | Design by: {{ env('AUTHORS') }}
		</div>

		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<script src="js/cocoon/jquery.min.js"></script>
	<script src="js/login.js"></script>
</body>
</html>