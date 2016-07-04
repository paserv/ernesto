<!DOCTYPE html>
	<html>
		<head>
			<?php include 'head.php' ?>
		</head>
	
	<body>
	<?php include 'header.php' ?>
	<main>
	<div class="container" style="width: 90%;margin-bottom: 100px;margin-top:50px">
		<div class="row">
			<div class="col s12 center"><a href="send.php"><img src="public/img/logo.png" height="200"></a></div>
			<div class="col s12 center golden"><h3 class="albertus-font">Ricorsi & Controricorsi</h3></div>
			<div class="col s12 center blu"><h5 class="palermo-font">Richiedi un parere GRATUITO!!!</h5></div>
		</div>
		<div class="row" style="margin-top:50px">
			<div class="col s12 m4 l4 center">
				<a href="send.php?req=cds"><i class="material-icons big-icon golden">directions_car</i></a>
				<a href="send.php?req=cds" class="blu"><h5>Verbali Codice della Strada</h5></a>
			</div>
			<div class="col s12 m4 l4 center">
				<a href="send.php?req=ce"><i class="material-icons big-icon golden">folder_shared</i></a>
				<a href="send.php?req=ce" class="blu"><h5>Cartelle Esattoriali</h5></a>
			</div>
			<div class="col s12 m4 l4 center">
				<a href="send.php?req=st"><i class="material-icons big-icon golden">gavel</i></a>
				<a href="send.php?req=st" class="blu"><h5>Sanzioni Tributarie</h5></a>
			</div>
		</div>
	</div>
	</main>
	<?php include 'footer.php'; ?>

	</body>
	
	</html>