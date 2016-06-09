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
	<?php include 'header.php' ?>
	<main>
	<div class="container" style="width: 90%;margin-bottom: 100">
		<?php
		$controller->checkLogoutRequest();
		$controller->checkLoginRequest();
		if ($controller->isAuthenticated()) { ?>
			<div class="row">
				<div class="col s12 blu"><h5>Opzioni Disponibili<i class="material-icons prefix left med-icon golden">lock_open</i></i></h5></div>
			</div>
			<div class="card-panel">
				<div class="row center" style="margin-top:50px">
					<div class="col s12 m6 l6 center">
						<a href="properties.php"><i class="material-icons big-icon golden">vpn_key</i></a>
						<a href="properties.php" class="blu"><h5>Modifica le propriet&agrave; del sito</h5></a>
					</div>
					<div class="col s12 m6 l6 center">
						<a href="content.php"><i class="material-icons big-icon golden">assignment</i></a>
						<a href="content.php" class="blu"><h5>Modifica i contenuti del sito</h5></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<a href="index.php?req=logout" class="waves-effect waves-light btn button right"><i class="material-icons right">exit_to_app</i>Logout</a>
				</div>
			</div>
		<?php } else { ?>
		<div class="row">
			<div class="col s12 blu"><h5>Login<i class="material-icons prefix left med-icon golden">lock_outline</i></i></h5></div>
		</div>
		<form class="col s12" name="loginForm" action="index.php" method="post">
			<div class="card-panel">
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<i class="material-icons prefix blu">account_circle</i>
						<input id="username" name="username" type="text" class="validate" required>
						<label for="username">Username</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12 m12 l12">
						<i class="material-icons prefix blu">enhanced_encryption</i>
						<input id="password" name="password" type="password" class="validate" required>
						<label for="password">Password</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12 m12 l12">
					<button style="margin-top:25px" class="btn waves-effect waves-light right button" type="submit" name="register_button">Log In
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