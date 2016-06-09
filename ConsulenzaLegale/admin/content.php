<?php
session_start();
require_once 'autoload.php';
autoload();
$controller = new AdminController();
?>
<!DOCTYPE html>
	<html>
		<head>
			<?php include 'head.php' ?>
		</head>
	
	<body>
		<main>
			<?php include 'header.php'; if ($controller->isAuthenticated()) { ?>
			<div class="container" style="width: 90%;margin-bottom: 100">
				<div class="row">
					<div class="col s12 blu"><h5>Modifica Contenuti Sito<i class="material-icons prefix left golden med-icon">assignment</i></h5></div>
				</div>
				<div class="card-panel">
					CONTENUTO
				</div>
			</div>
			<?php } else {?>
			<div class="container" style="width: 90%;margin-bottom: 100">
				<div class="row">
					<div class="col s12 blu"><h5>Impossibile accedere alla pagina<i class="material-icons prefix left golden med-icon">pan_tool</i></h5></div>
				</div>
				<div class="card-panel">
					<h5>E' richiesta autenticazione</h5>
				</div>
				<a href="index.php" class="waves-effect waves-light btn right button"><i class="material-icons left">build</i>Login</a>
			</div>
	<?php } ?>
		</main>
	<?php include 'footer.php'; ?>

	</body>
	
	</html>