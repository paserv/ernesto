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
	<?php if (isset($_POST['name'])) {
			$isDelivered = $controller->sendMail($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['phone'], $_POST['motivation'], $_POST['date'], $_POST['misc'], $_POST['file']);
				if ($isDelivered) { ?>
					<div class="row">
						<div class="col s12"><h5>Risultato Operazione<i class="mdi-action-settings left small"></i></h5></div>
					</div>
					<div class="card-panel">
						<div class="row">
							<div class="col s12"><h5>Operazione eseguita con successo<i class="material-icons left small">done</i></h5></div>
						</div>
					</div>
					<div class="row" style="margin-right:0px;">
						<a class="waves-effect waves-light btn blue darken-4 right" href="index.php"><i class="material-icons right">backspace</i>Torna alla Home</a>
					</div>
					<?php } else { ?>
					<div class="row">
						<div class="col s12"><h5>Errore<i class="mdi-content-block left"></i></h5></div>
					</div>
					<div class="card-panel">
						<div class="row">
							<h5>Al momento non è possibile inoltrare le richieste. Ci scusiamo per l'inconveniente. Per favore riprovate in un secondo momento</h5>
						</div>
					</div>
					<div class="row" style="margin-right:0px;">
						<a class="waves-effect waves-light btn blue darken-4 right" href="index.php"><i class="material-icons right">backspace</i>Torna alla Home</a>
					</div>
					<?php }
				} else {?>
					<div class="row">
							<div class="col s12"><h5>Invia gratuitamente una richiesta<i class="mdi-content-mail left small"></i></h5></div>
					</div>
					<form class="col s12" name="requestForm" action="send.php" method="post">
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">account_circle</i>
								<input id="name" name="name" type="text" class="validate" required>
								<label for="name" data-error="Nome non corretto" data-success="OK">Nome</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">contacts</i>
								<input id="surname" name="surname" type="text" class="validate" required>
								<label for="surname" data-error="Cognome non corretto" data-success="OK">Cognome</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">mail</i>
								<input id="email" name="email" type="email" class="validate" required>
								<label for="email" data-error="Email non corretta" data-success="OK">Email</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">phone</i>
								<input id="phone" name="phone" type="tel" class="validate" required>
								<label for="phone" data-error="Numero telefonico non corretto" data-success="OK">Telefono</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">report_problem</i>
							    <select id="motivation" name="motivation">
							      <option value="" disabled selected>Scegli</option>
							      <option value="1">Verbale</option>
							      <option value="2">Cartella Esattoriale</option>
							    </select>
							    <label>Motivazione</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix">play_for_work</i>
								<input id="date" name="date" type="date" class="datepicker" required>
								<label for="date">Data notifica atto</label>
							</div>
						</div>
						<div class="row">
						    <div class="input-field col s12 m12 l12 tooltipped" data-tooltip="Spiegaci il perche' del ricorso">
								<i class="material-icons prefix">note_add</i>
								<textarea id="misc" name="misc" class="materialize-textarea" maxlength="160" length="160"></textarea>
								<label for="misc">Varie ed Eventuali</label>
							</div>
						</div>
						<div class="row">
							<div class="file-field input-field col s12 m12 l12">
							<i class="material-icons prefix">receipt</i>
								<div class="btn right" style="margin-left:10px">
									<span>File</span>
									<input type="file">
								</div>
								<div class="file-path-wrapper">
									<input id="file" name="file" class="file-path validate" style="margin-left:35px" type="text" placeholder="Allega file verbale o archivio .zip">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 m12 l12">
								<div class="g-recaptcha" data-sitekey="<?php echo RC_SECRET_SITE; ?>" data-size="compact"></div>
							</div>
							<div class="input-field col s6 m12 l12">	
								<button style="margin-top:25px;" class="btn waves-effect waves-light blue darken-4 right" type="submit" name="register_button">Invia
									<i class="material-icons">done</i>
								</button>
							</div>
						</div>
					</form>
				</div>
	<?php } include 'footer.php'; ?>

	<script>
	$(document).ready(function() {
		$('select').material_select();
	  });
	$('.datepicker').pickadate({
	    selectMonths: true, // Creates a dropdown to control month
	    selectYears: 15, // Creates a dropdown of 15 years to control year
	    format: 'dd/mm/yyyy'
	  });
	</script>
	</body>
	
	</html>