<?php session_start(); 
require_once 'autoload.php';
autoload();
$controller = new Controller();
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Ricorso Verbali C.d.S. - Ernesto Marzano</title>
			<link rel="icon" href="favicon.ico" />
			<link type="text/css" rel="stylesheet" href="public/css/materialize.min.css"  media="screen,projection"/>
			<link type="text/css" rel="stylesheet" href="public/css/jquery-ui.css">
			<link type="text/css" rel="stylesheet" href="public/css/site.css" />
			<link rel="apple-touch-icon" sizes="57x57" href="public/icons/apple-touch-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="public/icons/apple-touch-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="public/icons/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="public/icons/apple-touch-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="public/icons/apple-touch-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="public/icons/apple-touch-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="public/icons/apple-touch-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="public/icons/apple-touch-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="public/icons/apple-touch-icon-180x180.png">
			<link rel="icon" type="image/png" href="public/icons/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="public/icons/android-chrome-192x192.png" sizes="192x192">
			<link rel="icon" type="image/png" href="public/icons/favicon-96x96.png" sizes="96x96">
			<link rel="icon" type="image/png" href="public/icons/favicon-16x16.png" sizes="16x16">
			<link rel="manifest" href="public/icons/manifest.json">
			<link rel="mask-icon" href="public/icons/safari-pinned-tab.svg" color="#5bbad5">
			<link rel="shortcut icon" href="public/icons/favicon.ico" type="image/x-icon">
			<meta name="msapplication-TileColor" content="#da532c">
			<meta name="msapplication-TileImage" content="public/icons/mstile-144x144.png">
			<meta name="msapplication-config" content="public/icons/browserconfig.xml">
			<meta name="theme-color" content="#ffffff">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
			<meta property="og:title" content="Ricorso Verbali C.d.S.">
			<meta property="og:image" content="http://www.example.com/public/img/logo.png">
			<meta property="og:site_name" content="Ricorso Verbali C.d.S.">
			<meta property="og:description" content="Ricorso Verbali C.d.S. - Richiedi un parere GRATUITO!!!">
			<meta property="og:locale" content="it_IT">
			<script type="text/javascript" src="public/js/jquery-2.1.3.min.js"></script>
			<script type="text/javascript" src="public/js/jquery-ui-1.11.4.js"></script>
			<script type="text/javascript" src="public/js/materialize.min.js"></script>
			<script src='https://www.google.com/recaptcha/api.js?hl=it'></script>
		</head>
	
	<body>
	<?php include 'header.php' ?>
	<div class="container">
		<div class="row">
				<div class="col s12"><h5>Invia gratuitamente una richiesta<i class="mdi-content-mail left small"></i></h5></div>
		</div>
		<form class="col s12" name="requestForm" action="send.php" method="post">
			<div class="row">
				<div class="input-field col s12 m6 l6">
					<i class="material-icons prefix">account_circle</i>
					<input id="name" type="text" class="validate" required>
					<label for="name" data-error="Nome non corretto" data-success="OK">Nome</label>
				</div>
				<div class="input-field col s12 m6 l6">
					<i class="material-icons prefix">contacts</i>
					<input id="surname" type="text" class="validate" required>
					<label for="surname" data-error="Cognome non corretto" data-success="OK">Cognome</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m6 l6">
					<i class="material-icons prefix">mail</i>
					<input id="email" type="email" class="validate" required>
					<label for="email" data-error="Email non corretta" data-success="OK">Email</label>
				</div>
				<div class="input-field col s12 m6 l6">
					<i class="material-icons prefix">phone</i>
					<input id="phone" type="tel" class="validate" required>
					<label for="phone" data-error="Numero telefonico non corretto" data-success="OK">Telefono</label>
				</div>
			</div>
		</form>
	</div>
	<?php include 'footer.php'; ?>

	</body>
	
	</html>