<?php 
require_once 'autoload.php';
autoload();
$controller = new AdminController();
?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Ricorso Verbali C.d.S. - Ernesto Marzano</title>
			<link rel="icon" href="favicon.ico" />
			<link type="text/css" rel="stylesheet" href="../public/css/materialize.min.css"  media="screen,projection"/>
			<link type="text/css" rel="stylesheet" href="../public/css/jquery-ui.css">
			<link type="text/css" rel="stylesheet" href="../public/css/site.css" />
			<link rel="apple-touch-icon" sizes="57x57" href="../public/icons/apple-touch-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="../public/icons/apple-touch-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="../public/icons/apple-touch-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="../public/icons/apple-touch-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="../public/icons/apple-touch-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="../public/icons/apple-touch-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="../public/icons/apple-touch-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="../public/icons/apple-touch-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="../public/icons/apple-touch-icon-180x180.png">
			<link rel="icon" type="image/png" href="../public/icons/favicon-32x32.png" sizes="32x32">
			<link rel="icon" type="image/png" href="../public/icons/android-chrome-192x192.png" sizes="192x192">
			<link rel="icon" type="image/png" href="../public/icons/favicon-96x96.png" sizes="96x96">
			<link rel="icon" type="image/png" href="../public/icons/favicon-16x16.png" sizes="16x16">
			<link rel="manifest" href="..//icons/manifest.json">
			<link rel="mask-icon" href="../public/icons/safari-pinned-tab.svg" color="#5bbad5">
			<link rel="shortcut icon" href="../public/icons/favicon.ico" type="image/x-icon">
			<meta name="msapplication-TileColor" content="#da532c">
			<meta name="msapplication-TileImage" content="../public/icons/mstile-144x144.png">
			<meta name="msapplication-config" content="../public/icons/browserconfig.xml">
			<meta name="theme-color" content="#ffffff">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
			<meta property="og:title" content="Ricorso Verbali C.d.S.">
			<meta property="og:image" content="http://www.ricorsicodicedellastrada.com/public/img/logo.png">
			<meta property="og:site_name" content="Ricorso Verbali C.d.S.">
			<meta property="og:description" content="Ricorso Verbali C.d.S. - Richiedi un parere GRATUITO!!!">
			<meta property="og:locale" content="it_IT">
			<script type="text/javascript" src="../public/js/jquery-2.1.3.min.js"></script>
			<script type="text/javascript" src="../public/js/jquery-ui-1.11.4.js"></script>
			<script type="text/javascript" src="../public/js/materialize.min.js"></script>
		</head>
	
	<body>
	<?php include 'header.php' ?>
	<main>
	<div class="container" style="width: 90%;margin-bottom: 100">
		<?php
		if (isset($_POST['username']) && isset($_POST['password']) && $controller->areValidCredential($_POST['username'], $_POST['password'])) {
		?>
		<div class="row">
			<div class="col s12"><h5>Opzioni Disponibili<i class="material-icons prefix left">lock_open</i></i></h5></div>
		</div>
		<div class="card-panel">
		<div class="row center" style="margin-top:50px">
			<div class="col s12 m6 l6 center">
				<a href="properties.php"><i class="material-icons" style="font-size:90px">vpn_key</i></a>
				<a href="properties.php"><h5 class="deep-orange-text text-darken-4">Modifica le propriet&agrave; del sito</h5></a>
			</div>
			<div class="col s12 m6 l6 center">
				<a href="content.php"><img alt="Contenuti" src="../public/img/content.png"></a>
				<a href="content.php"><h5 class="deep-orange-text text-darken-4">Modifica i contenuti del sito</h5></a>
			</div>
		</div>
		</div>
		<div class="row">
			<div class="input-field col s12 m12 l12">
				<form class="col s12" name="loginForm" action="index.php" method="post">
					<button style="margin-top:25px;background-color:#2A5EA0" class="btn waves-effect waves-light right" type="submit" name="register_button">Exit
					<i class="material-icons">exit_to_app</i>
					</button>
				</form>
			</div>
		</div>
		<?php } else { ?>
		<div class="row">
			<div class="col s12"><h5>Login<i class="material-icons prefix left">lock_outline</i></i></h5></div>
		</div>
		<form class="col s12" name="loginForm" action="index.php" method="post">
			<div class="card-panel">
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<i class="material-icons prefix">account_circle</i>
						<input id="username" name="username" type="text" class="validate" required>
						<label for="username">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<i class="material-icons prefix">enhanced_encryption</i>
						<input id="password" name="password" type="password" class="validate" required>
						<label for="password">Password</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<button style="margin-top:25px;background-color:#2A5EA0" class="btn waves-effect waves-light right" type="submit" name="register_button">Log In
						<i class="material-icons">build</i>
					</button>
				</div>
			</div>
		</form>
		<?php } ?>
	</div>
	</main>
	<?php include 'footer.php'; ?>

	</body>
	
	</html>