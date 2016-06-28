<!DOCTYPE html>
<html lang="it-IT" class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
	<link type="text/css" rel="stylesheet" href="/public/css/materialize.min.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="/public/css/jquery-ui.css">
	<link type="text/css" rel="stylesheet" href="/public/css/site.css" />
	<script type="text/javascript" src="/public/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/public/js/jquery-ui-1.11.4.js"></script>
	<script type="text/javascript" src="/public/js/materialize.min.js"></script>
</head>

<body <?php body_class(); ?>>

<header style="font-family:Roboto;">
<div class="navbar-fixed">
	<nav>
		<div class="nav-wrapper style-header">
			<a href="/index.php" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
			<ul class="left hide-on-med-and-down">
				<li><a class="tooltipped" data-position="bottom" data-delay="100" data-tooltip="Home Page" href="/index.php" ><img src="/public/img/logo_white_pic.png"></a></li>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li><a href="/who.php">Chi Siamo</a></li>
				<li><a href="/service.php">Servizi</a></li>
				<li><a href="/blog">News</a></li>
				<li><a href="/send.php">Contatti</a></li>
				<li><a class="dropdown-button" href="#!" data-activates="dropdownReq">Invia Richiesta<i class="material-icons right">arrow_drop_down</i></a></li>
			</ul>
			<ul class="side-nav" id="mobile-menu">
		        <li><a class="waves-effect waves-light" href="/index.php"><img class="header-img right" style="margin-top: 15px;" src="/public/img/logo_black_pic.png">Home</a></li>
		        <li class="divider"></li>
		        <li><a class="waves-effect waves-light" href="/who.php"><i class="material-icons right">perm_identity</i>Chi Siamo</a></li>
		        <li><a class="waves-effect waves-light" href="/service.php"><i class="material-icons right">business</i>Servizi</a></li>
		        <li><a class="waves-effect waves-light" href="/blog"><i class="material-icons right">rss_feed</i>News</a></li>
		        <li><a class="waves-effect waves-light" href="/send.php"><i class="material-icons right">email</i>Contatti</a></li>
				<ul class="collapsible" data-collapsible="accordion">
					<li>
      					<div class="collapsible-header black-text"><i class="material-icons right">arrow_drop_down</i>Invia Richiesta</div>
      					<div class="collapsible-body black-text">
      						<a class="black-text" href="/send.php?req=cds"><i class="material-icons right">directions_car</i>Verbale CdS</a>
      						<a class="black-text" href="/send.php?req=ce"><i class="material-icons right">folder_shared</i>Cartella Esattoriale</a>
      						<a class="black-text" href="/send.php?req=st"><i class="material-icons right">gavel</i>Sanzione Tributaria</a>
      					</div>
    				</li>
				</ul>
		    </ul>
		</div>
	</nav>
</div>
<ul id="dropdownReq" class="dropdown-content">
	<li><a class="blue-text text-darken-4" href="/send.php?req=cds"><i class="material-icons right">directions_car</i>Verbale Codice Strada</a></li>
	<li><a class="blue-text text-darken-4" href="/send.php?req=ce"><i class="material-icons right">folder_shared</i>Cartella Esattoriale</a></li>
	<li><a class="blue-text text-darken-4" href="/send.php?req=st"><i class="material-icons right">gavel</i>Sanzione Tributaria</a></li>
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
<main style="font-family:Roboto;">
<div class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentysixteen' ); ?></a>
		<div id="content" class="site-content">