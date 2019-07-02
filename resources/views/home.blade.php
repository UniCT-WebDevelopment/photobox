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
		<h1>Benvenuto su {{ env('APP_NAME') }} <!--<img src="/images/logo.png">--></h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="#" method="POST">
					<input class="text" type="text" name="nome" placeholder="Nome" required>
					<input class="text" type="text" name="cognome" placeholder="Cognome" required>
					<input class="text" type="text" name="username" placeholder="Username" required>
					<input class="text email" type="email" name="email" placeholder="Email" required>
					<input class="text" type="password" name="password" placeholder="Password" required>
					<input type="submit" value="Registrati">
				</form>
				<p>Hai gi&agrave; un Account? <a href="login"> Accedi</a></p>
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

</body>
</html>