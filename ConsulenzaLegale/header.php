<header>
<?php include_once("analyticstracking.php") ?>
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper style-header">
			<a href="index.php" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="left hide-on-med-and-down">
				<li><a class="tooltipped" data-position="bottom" data-delay="100" data-tooltip="Home Page" href="index.php" ><img src="public/img/logo_white_pic.png"></a></li>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li><a href="who.php">Chi Siamo</a></li>
				<li><a href="service.php">Servizi</a></li>
				<li><a href="contact.php">Contatti</a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdownReq">Invia Richiesta<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			<ul class="side-nav" id="mobile-menu">
		        <li><a class="waves-effect waves-light" href="index.php"><img class="header-img right" style="margin-top: 15px;" src="public/img/logo_black_pic.png">Home</a></li>
		        <li class="divider"></li>
		        <li><a class="waves-effect waves-light" href="who.php"><i class="material-icons right">perm_identity</i>Chi Siamo</a></li>
		        <li><a class="waves-effect waves-light" href="service.php"><i class="material-icons right">business</i>Servizi</a></li>
		        <li><a class="waves-effect waves-light" href="contact.php"><i class="material-icons right">email</i>Contatti</a></li>
				<ul class="collapsible" data-collapsible="accordion">
					<li>
      					<div class="collapsible-header black-text"><i class="material-icons right">send</i>Invia Richiesta</div>
      					<div class="collapsible-body black-text">
      						<a class="black-text" href="send.php?req=cds"><i class="material-icons right">directions_car</i>Verbale CdS</a>
      						<a class="black-text" href="send.php?req=ce"><i class="material-icons right">folder_shared</i>Cartella Esattoriale</a>
      						<a class="black-text" href="send.php?req=st"><i class="material-icons right">gavel</i>Sanzione Tributaria</a>
      					</div>
    				</li>
				</ul>
		    </ul>
		</div>
	</nav>
</div>
<ul id="dropdownReq" class="dropdown-content">
	<li><a class="blue-text text-darken-4" href="send.php?req=cds"><i class="material-icons right">directions_car</i>Verbale Codice Strada</a></li>
	<li><a class="blue-text text-darken-4" href="send.php?req=ce"><i class="material-icons right">folder_shared</i>Cartella Esattoriale</a></li>
	<li><a class="blue-text text-darken-4" href="send.php?req=st"><i class="material-icons right">gavel</i>Sanzione Tributaria</a></li>
</ul>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
	$(".dropdown-button").dropdown();
	$('.collapsible').collapsible({
	      accordion : true // A setting that changes the collapsible behavior to expandable instead of the default accordion style
	    });
});
</script>
</header>