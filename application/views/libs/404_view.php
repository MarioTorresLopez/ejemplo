<?php
/**
 * Vista del error 404 personalizado
 *
 * Vista que indica al usuario que el contenido que busca o la URL que visita
 * no existe
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage libs
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/notfound.php
 */
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Page titlet -->
	<title><?=app_title()?></title>

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

	<!-- Vendor styles -->
	<link rel="stylesheet" href="<?=base_url()?>static/vendor/fontawesome/css/font-awesome.css" />
	<link rel="stylesheet" href="<?=base_url()?>static/vendor/metisMenu/dist/metisMenu.css" />
	<link rel="stylesheet" href="<?=base_url()?>static/vendor/animate.css/animate.css" />
	<link rel="stylesheet" href="<?=base_url()?>static/coming_soon/fonts/Soberana Sans.css" />
	<link rel="stylesheet" href="<?=base_url()?>static/vendor/bootstrap/dist/css/bootstrap.css" />

	<!-- App styles -->
	<link rel="stylesheet" href="<?=base_url()?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
	<link rel="stylesheet" href="<?=base_url()?>static/fonts/pe-icon-7-stroke/css/helper.css" />
	<link href="<?=base_url()?>static/styles/loader.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?=base_url()?>static/styles/style.css" />
</head>

<body class="blank">		
	<!--[if lt IE 7]>
	<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="color-line"></div>

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

<div class="error-container">	
	<img src="<?=base_url()?>static/coming_soon/LogoAIDE_FULL.png" alt="<?=app_name()?>" class="img-responsive" />
	<i class="pe-7s-way text-primary big-icon"></i>
	<h1>404</h1>
	<strong>Contenido no encontrado</strong>
	<p>
		Lo sentimos, la página que busca no fue encontrada, Por favor revise la URL e intente nuevamente.
	</p>
	<a href="<?=base_url()?>" class="btn btn-xs btn-primary"> <i class="fa fa-flag"></i> Regresar al inicio</a>
</div>


<!-- Vendor scripts -->
<script src="<?=base_url()?>static/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=base_url()?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?=base_url()?>static/vendor/iCheck/icheck.min.js"></script>
<script src="<?=base_url()?>static/vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?=base_url()?>static/scripts/homer.js"></script>
<script src="<?=base_url()?>static/scripts/app/libs/common.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		loading();		
	});	
</script>
</body>
</html>
