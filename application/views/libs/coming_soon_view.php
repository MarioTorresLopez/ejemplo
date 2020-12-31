<?php
/**
 * Vista del landing page provisional
 *
 * Vista que muestra que la aplicación está en construcción
 * 
 * @since       1.0
 * @version     1.0
 * @link        /coming_soon
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/controllers/coming_soon.php
 */
?>
<!DOCTYPE html>
<html style="height: 100%;">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$app_title?></title>
	<link rel="shortcut icon" href="<?=base_url()?>favicon.ico">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="<?=base_url()?>static/coming_soon/fonts/Soberana Sans.css" rel="stylesheet">
	<link href="<?=base_url()?>static/styles/loader.css" rel="stylesheet">
	<style type="text/css">
	.color-line {
		background: #f7f9fa;
		height: 6px;
		background-image: -webkit-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		background-image: -moz-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		background-image: -ms-linear-gradient(left, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		background-image: linear-gradient(to right, #34495e, #34495e 25%, #9b59b6 25%, #9b59b6 35%, #3498db 35%, #3498db 45%, #62cb31 45%, #62cb31 55%, #ffb606 55%, #ffb606 65%, #e67e22 65%, #e67e22 75%, #e74c3c 85%, #e74c3c 85%, #c0392b 85%, #c0392b 100%);
		background-size: 100% 6px;
		background-position: 50% 100%;
		background-repeat: no-repeat;
		position: relative;
		z-index: 1001;
	}
</style>
</head>
<body style="font-family:  'Soberana Sans' !important;">
	<div class="color-line"></div>

	<!-- .col-sm-12 -->
	<div class="col-sm-12">
		<!---->
		<div class="navbar-collapse">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="<?= base_url()?>login">INICIO</a></li>
				</ul>
			</div>
		</div>
	<!-- .nav -->	
	</div>
	<!-- .col-sm-12 -->


	<!-- LOADING SCREEN START -->
	<div id="loading-screen">
		<div class="loaderImageWrapper">
			<div id="loaderImage"></div>
		</div>
		<div id="loader-wrapper" style="background: #FFFFFF !important;">
			<div style="position: absolute;top: 15%; width: 100%;">
				<h3 style="text-align: center; color: #545657;">AIDE</h3>
				<img src="<?=base_url()?>static/images/sedeq_web.jpg" alt="<?=app_name()?>" class="img img-responsive hidden-sm hidden-xs" style="max-height: 80px; display: block; margin: auto;">
			</div>
			<div id="loader"></div>
		</div>
	</div>
	<!-- LOADING SECREEN END -->
	
	<div id="page-content" class="container">
		<div class="row">		
			<div class="col-sm-12">
				<img src="<?=base_url()?>static/coming_soon/LogoAIDE_FULL.png" alt="<?=app_title()?>" class="img img-responsive" style="margin: auto; max-height: 500px;">
			</div>

			<div class="col-sm-12">
				<h1 style="font-family: 'Soberana Sans'; font-size: 3.5rem;" class="text-center">
					AppWeb en construcción
				</h1>
			</div>

			<div class="col-sm-12">
				<address style="font-family: 'Soberana Sans'; margin-top: 1%; font-size: 2rem;" class="text-center">
					Dirección: Blvd. Centro Sur 75, Colinas del Cimatario, 76090 Santiago de Querétaro, Qro.
					<br />
					<br />
					<a href="tel:+524422620249" style="font-family: 'Soberana Sans'; margin-top: 1%; font-size: 2rem;">
						<i class="fa fa-phone"> </i>
						442 262 0249
					</a>
					<br />
					<br />
					<a href="https://www.google.com.mx/maps/place/Direcci%C3%B3n+De+Educaci%C3%B3n/@20.5620616,-100.3706768,17.94z/data=!4m8!1m2!2m1!1sDirecci%C3%B3n+de+educaci%C3%B3n+!3m4!1s0x85d34494f3095d9f:0xb406fcbf59acff5e!8m2!3d20.5624658!4d-100.3703292?hl=es-419" target="_blank">
						<i class="fa fa-map-marker"> </i> Ubicación
					</a>
				</address>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?=base_url()?>static/scripts/app/libs/common.js"> </script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			loading();
		});
	</script>
</body>
</html>