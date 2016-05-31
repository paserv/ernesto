<header>
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper" style="background-color: #2A5EA0">
			<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="left hide-on-med-and-down">
				<li><a class="tooltipped" data-position="bottom" data-delay="100" data-tooltip="Admin Page" href="index.php" ><img src="../public/img/logo_admin_white_pic.png"></a></li>
			</ul>
			<a href="#" class="brand-logo">Pannello di Controllo</a>
			<ul class="right hide-on-med-and-down">
				<li><a href="properties.php"><i class="material-icons right">vpn_key</i>Propriet&agrave;</a></li>
				<li><a href="content.php"><i class="material-icons right">assignment</i>Contenuti</a></li>
			</ul>
			<ul class="side-nav" id="mobile-demo">
		        <li><a class="waves-effect waves-light" href="index.php"><img class="header-img right" style="margin-top: 15px;" src="../public/img/logo_black_pic.png">Home</a></li>
		        <li class="divider"></li>
				<li><a class="waves-effect waves-light" href="who.php"><i class="material-icons right">vpn_key</i>Propriet&agrave;</a></li>
		        <li><a class="waves-effect waves-light" href="service.php"><i class="material-icons right">assignment</i>Contenuti</a></li>
		    </ul>
		</div>
	</nav>
</div>
<script>
$(document).ready(function(){
	$(".button-collapse").sideNav();
});
</script>
</header>