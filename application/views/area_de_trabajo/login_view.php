<?php
/**
 * Vista de inicio de sesion al sistema
 *
 * Vista que muestra un pequeño formulario para ingresar
 * 
 * @since       1.0
 * @version     1.0
 * @link        /login_controller/ejemplo_login
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/controllers/login_controller.php
 */
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?= base_url()?>static/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url()?>static/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?= base_url()?>static/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?= base_url()?>static/vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?= base_url()?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?= base_url()?>static/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?= base_url()?>static/styles/style.css">

</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- color-line START -->
<div class="color-line"></div>

<!-- login-container START -->
<div class="login-container">
    <!-- row START -->
    <div class="row">
        <!-- col-md-12 START -->
        <div class="col-md-12">
            <!-- text-center m-b-mb START -->
            <div class="text-center m-b-md">
                <h3>AIDE</h3>
                <small>Inicia sesion</small>
            </div>
            <!-- text-center m-b-mb END -->
            <!-- hpanel START -->
            <div class="hpanel">
                <!-- panel-body START -->
                <div class="panel-body">
                        <!-- form START -->
                        <form action="<?=base_url()?>login_controller/enviar_datos" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Correo Electronico</label>
                                <input type="text" placeholder="example@gmail.com" title="Por favor ingresa tu correo" required="" value="" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Por favor ingresa tu contraseña" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                            </div>
                            <div class="checkbox">
                                <input type="checkbox" class="i-checks" checked>
                                    Recordar contraseña
                            </div>
                            <button class="btn btn-success btn-block" type="submit">Iniciar sesion</button>
                        </form>
                        <!-- form END -->
                        <?php 
                            if($this->session->flashdata('usuario_incorrecto'))
                            {
                        ?>
                            <p><?=$this->session->flashdata('usuario_incorrecto')?></p>
                        <?php
                            }
                        ?>
                </div>
                <!-- panel-body END -->
            </div>
            <!-- hpanel END -->
        </div>
        <!-- col-md-12 END -->
    </div>
    <!--row END -->
</div>
<!-- login-container END -->

<!-- Vendor scripts -->
<script src="<?= base_url()?>static/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url()?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url()?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url()?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url()?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?= base_url()?>static/vendor/iCheck/icheck.min.js"></script>
<script src="<?= base_url()?>static/vendor/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?= base_url()?>static/scripts/homer.js"></script>

</body>
</html>
