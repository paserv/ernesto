<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper">
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="left hide-on-med-and-down">
				<li><a class="tooltipped" data-position="bottom" data-delay="100" data-tooltip="Home Page" href="index.php" ><img src="public/img/logo_white_pic.png"></a></li>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li><a href="send.php"><i class="material-icons right">send</i>Invia Richiesta</a></li>
				<li><a href="who.php">Chi Siamo</a></li>
				<li><a href="service.php">Servizi</a></li>
				<li><a href="cons.php">Consigli Utili</a></li>
				<li><a href="contact.php">Contatti</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
		        <li><a class="waves-effect waves-light" href="index.php"><img class="header-img right" style="margin-top: 15px;" src="public/img/logo_black_pic.png">Home</a></li>
		        <li class="divider"></li>
		        <li><a class="waves-effect waves-light" href="send.php"><i class="material-icons right">send</i>Invia Richiesta</a></li>
				<li><a class="waves-effect waves-light" href="who.php"><i class="material-icons right">perm_identity</i>Chi Siamo</a></li>
		        <li><a class="waves-effect waves-light" href="service.php"><i class="material-icons right">room_service</i>Servizi</a></li>
		        <li><a class="waves-effect waves-light" href="cons.php"><i class="material-icons right">info_outline</i>Consigli Utili</a></li>
		        <li><a class="waves-effect waves-light" href="contact.php"><i class="material-icons right">contacts</i>Contatti</a></li>
		    </ul>
		</div>
	</nav>
</div>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
});
</script>
