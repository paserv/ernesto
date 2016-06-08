<?php 
require_once 'autoload.php';
autoload();
$controller = new Controller();
?>
<!DOCTYPE html>
	<html>
		<head>
			<?php include 'head.php' ?>
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
							<div class="col s12 m6 l6 blu"><h5>Invio gratuito richiesta<i class="material-icons prefix left golden">send</i></h5></div>
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
							      <option value="Verbale Codice della Strada" <?php if ( (isset($_POST ["motivation"]) and ($_POST ["motivation"] == 'Verbale Codice della Strada')) or (isset($_GET['req']) and $_GET['req'] == 'cds') ) echo ('selected');?>>Verbale Codice della Strada</option>
							      <option value="Cartella Esattoriale" <?php if (isset($_POST ["motivation"]) and ($_POST ["motivation"] == 'Cartella Esattoriale') or (isset($_GET['req']) and $_GET['req'] == 'ce') ) echo ('selected');?>>Cartella Esattoriale</option>
							      <option value="Sanzione Tributaria" <?php if (isset($_POST ["motivation"]) and ($_POST ["motivation"] == 'Sanzione Tributaria') or (isset($_GET['req']) and $_GET['req'] == 'st') ) echo ('selected');?>>Sanzione Tributaria</option>
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
							<div class="col s12 m6 l6 center">
								<div class="card blue-grey lighten-5" style="margin-top:0px">
									<div class="card-content">
										<span class="card-title black-text">Termini e Condizioni</span>
										<p>Sottomettendo il seguente form, si concorda sulla seguente <a href="//www.iubenda.com/privacy-policy/7859989" class="iubenda-white iubenda-embed" title="Privacy Policy">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src = "//cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script></p>
										<div class="row center" style="margin-top: 10px; margin-bottom: 0px;">
											<input type="checkbox" id="acceptTerms" required name="terms"/><label for="acceptTerms">Accetta</label>
										</div>
									</div>
								</div>
							</div>
							<div class="input-field col s12 m6 l6 center" <?php if($isRobot) echo ' style="margin-top:0px"'?>">
								<?php if($isRobot) { echo('<div class="red-text center" style="margin-top:0px">Dimostra di non essere un robot</div>');}?>
								<div style="align:center;display:inline-table" class="g-recaptcha" data-sitekey="<?php echo RC_SECRET_SITE; ?>" data-size="compact"></div>
							</div>
						</div>
						<button style="margin-top:30px;" class="btn waves-effect waves-light button right" type="submit" name="register_button">Invia
							<i class="material-icons">send</i>
						</button>
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