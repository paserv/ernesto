<?php 
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
			<link rel="apple-touch-icon" sizes="57x57" href="public/icons/apple-icon-57x57.png">
			<link rel="apple-touch-icon" sizes="60x60" href="public/icons/apple-icon-60x60.png">
			<link rel="apple-touch-icon" sizes="72x72" href="public/icons/apple-icon-72x72.png">
			<link rel="apple-touch-icon" sizes="76x76" href="public/icons/apple-icon-76x76.png">
			<link rel="apple-touch-icon" sizes="114x114" href="public/icons/apple-icon-114x114.png">
			<link rel="apple-touch-icon" sizes="120x120" href="public/icons/apple-icon-120x120.png">
			<link rel="apple-touch-icon" sizes="144x144" href="public/icons/apple-icon-144x144.png">
			<link rel="apple-touch-icon" sizes="152x152" href="public/icons/apple-icon-152x152.png">
			<link rel="apple-touch-icon" sizes="180x180" href="public/icons/apple-icon-180x180.png">
			<link rel="icon" type="image/png" sizes="192x192"  href="public/icons/android-icon-192x192.png">
			<link rel="icon" type="image/png" sizes="32x32" href="public/icons/favicon-32x32.png">
			<link rel="icon" type="image/png" sizes="96x96" href="public/icons/favicon-96x96.png">
			<link rel="icon" type="image/png" sizes="16x16" href="public/icons/favicon-16x16.png">
			<link rel="manifest" href="/manifest.json">
			<link rel="mask-icon" href="public/icons/safari-pinned-tab.svg" color="#5bbad5">
			<link rel="shortcut icon" href="public/icons/favicon.ico" type="image/x-icon">
			<meta name="msapplication-TileColor" content="#ffffff">
			<meta name="msapplication-TileImage" content="public/icons/ms-icon-144x144.png">
			<meta name="theme-color" content="#ffffff">
			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
			<meta property="og:title" content="Ricorso Verbali C.d.S.">
			<meta property="og:image" content="http://www.ricorsicodicedellastrada.com/public/img/logo.png">
			<meta property="og:site_name" content="Ricorso Verbali C.d.S.">
			<meta property="og:description" content="Ricorso Verbali C.d.S. - Richiedi un parere GRATUITO!!!">
			<meta property="og:locale" content="it_IT">
			<meta http-equiv="X-UA-Compatible" content="IE=Edge">
			<script type="text/javascript" src="public/js/jquery-2.1.3.min.js"></script>
			<script type="text/javascript" src="public/js/jquery-ui-1.11.4.js"></script>
			<script type="text/javascript" src="public/js/materialize.min.js"></script>
			<script src='https://www.google.com/recaptcha/api.js?hl=it'></script>
		</head>
	
	<body>
	<?php include 'header.php' ?>
	<main>
	<div class="container">
	<?php
		$isRobot = false;
		$mailResponse = new MailResponse('notset', '', '');
		if (isset($_POST['g-recaptcha-response'])) {
			$isRobot = $controller->checkIsRobot($_POST['g-recaptcha-response']);
			if (!$isRobot) {
				$mailResponse = $controller->sendMail($_POST['name'], $_POST['email'], $_POST['phone'], $_POST['motivation'], $_POST['date'], $_POST['misc'], $_FILES['file']);//'C:\test.log');
			}
		}
		
		if ($mailResponse->response == 'notset' or $mailResponse->response == 'ko') { 
					if ($mailResponse->type == 'sme') { ?>
						<script>Materialize.toast('Servizio al momento non raggiungibile. Si prega di riprovare in un secondo momento', 10000);</script>
					<?php } ?>
					<div class="row">
							<div class="col s12 m6 l6 blu"><h5>Invia gratuitamente una richiesta<i class="material-icons prefix left golden">send</i></h5></div>
							<div class="col s12 m6 l6">
								<a href="send.php" class="waves-effect waves-light btn button right" style="margin-top:10px"><i class="material-icons left">cached</i>reset fields</a>
							</div>
					</div>
					<div class="card-panel">
					<form class="col s12" name="requestForm" action="send.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="input-field col s12 m12 l12">
								<i class="material-icons prefix blu">account_circle</i>
								<input id="name" name="name" value="<?php if (isset($_POST ["name"])) echo ($_POST ["name"]);?>" type="text" class="validate" required>
								<label for="name" data-error="Nome non corretto" data-success="OK" class="<?php if (isset($_POST ["name"])) echo ('active');?>">Nome e Cognome*</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix blu">mail</i>
								<input id="email" name="email" value="<?php if (isset($_POST ["email"])) echo ($_POST ["email"]);?>" type="email" class="validate" required>
								<label for="email" data-error="Email non corretta" data-success="OK" class="<?php if (isset($_POST ["email"])) echo ('active');?>">Email*</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix blu">phone</i>
								<input id="phone" name="phone" value="<?php if (isset($_POST ["phone"])) echo ($_POST ["phone"]);?>" type="tel" class="validate">
								<label for="phone" data-error="Numero telefonico non corretto" data-success="OK" class="<?php if (isset($_POST ["phone"])) echo ('active');?>">Telefono</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix blu">help</i>
							    <select id="motivation" name="motivation">
							      <option value="Richiesta Generica" <?php if (isset($_POST ["motivation"]) and ($_POST ["motivation"] =='Richiesta Generica')) echo ('selected');?>>Richiesta Generica</option>
							      <option value="Verbale" <?php if (isset($_POST ["motivation"]) and ($_POST ["motivation"] == 'Verbale')) echo ('selected');?>>Verbale</option>
							      <option value="Cartella Esattoriale" <?php if (isset($_POST ["motivation"]) and ($_POST ["motivation"] == 'Cartella Esattoriale')) echo ('selected');?>>Cartella Esattoriale</option>
							    </select>
							    <label>Motivazione</label>
							</div>
							<div class="input-field col s12 m6 l6">
								<i class="material-icons prefix blu">date_range</i>
								<input id="date" name="date" value="<?php if (isset($_POST ["date"])) echo ($_POST ["date"]);?>" type="date" class="datepicker">
								<label for="date" class="<?php if (isset($_POST ["date"])) echo ('active');?>">Data notifica atto</label>
							</div>
						</div>
						<div class="row">
						    <div class="input-field col s12 m12 l12 tooltipped" data-tooltip="Spiegaci il perche' del ricorso">
								<i class="material-icons prefix blu">note_add</i>
								<textarea id="misc" name="misc"  class="materialize-textarea" maxlength="160"><?php if (isset($_POST ["misc"])) echo ($_POST ["misc"]);?></textarea>
								<label for="misc" class="<?php if (isset($_POST ["misc"])) echo ('active');?>">Varie ed Eventuali</label>
							</div>
						</div>
						<div class="row">
							<div class="file-field input-field col s12 m12 l12">
								<i class="material-icons prefix blu">attach_file</i>
								<div class="btn right button" style="margin-left:10px">
									<span>File</span>
									<input type="file" id="file" name="file">
								</div>
								<div class="file-path-wrapper">
									<?php if ($mailResponse!= 'notset' and $mailResponse->type == 'fve') echo '<p class="red-text" style="margin-left:20px">' . $mailResponse->description . '</p>'; ?>
									<input id="file_wrap" name="file_wrap" value="<?php if (isset($_POST ["file"])) echo ($_POST ["file"]);?>" class="file-path validate" style="margin-left:35px" type="text" placeholder="Allega file verbale o archivio .zip">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12 m12 l12">
								<?php if($isRobot) { echo('<p class="red-text">Dimostra di non essere un robot</p>');}?>
								<div style="align:center;display:inline-table" class="g-recaptcha" data-sitekey="<?php echo RC_SECRET_SITE; ?>" data-size="compact"></div>
								<button style="margin-top:25px;" class="btn waves-effect waves-light button right" type="submit" name="register_button">Invia
									<i class="material-icons">send</i>
								</button>
							</div>
						</div>
					</form>
					</div>
	<?php } else if ($mailResponse->response == 'ok') { ?>
				<div class="row">
					<div class="col s12"><h5>Risultato Operazione<i class="material-icons prefix left">thumb_up</i></h5></div>
				</div>
				<div class="card-panel">
					<div class="row">
						<div class="col s12"><h5>Operazione eseguita con successo!</h5></div>
					</div>
				</div>
				<div class="row" style="margin-right:0px;">
					<a class="btn waves-effect waves-light button right" href="index.php"><i class="material-icons right">backspace</i>Torna alla Home</a>
				</div>
			<?php } ?>
	</div>
	</main>
	<?php include 'footer.php'; ?>

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