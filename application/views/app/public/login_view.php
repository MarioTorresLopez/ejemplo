<?php
/**
 * Vista de inicio de sesion
 *
 * Vista que muestra el inio de sesion de todos los uaurios del sistema, desde el flujo, 
 * en esta vista es posible recuperar la contraseña o registrarse directamente
 * 
 * @since      1.0
 * @version    1.0
 * @link       /login
 * @package    application.views
 * @subpackage app.public
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/login.php
 */
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title -->
        <title><?= $titulo ?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/loader.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css" />

    </head>
    <body class="blank">

        <!-- LOADING SCREEN START -->
        <div id="loading-screen">	
            <div class="loaderImageWrapper">
                <div id="loaderImage"></div>
            </div>
            <div id="loader-wrapper" style="background: #FFFFFF !important;">
                <div style="position: absolute;top: 15%; width: 100%;">
                    <h3 style="text-align: center; color: #545657;">AIDE</h3>
                    <img src="<?= base_url() ?>static/images/sedeq_web.jpg" alt="<?= app_name() ?>" class="img img-responsive hidden-sm hidden-xs" style="max-height: 80px; display: block; margin: auto;">
                </div>
                <div id="loader"></div>
            </div>
        </div>	
        <!-- LOADING SECREEN END -->


        <!--[if lt IE 7]>
        <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <div class="color-line"></div>

        <div class="login-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center m-b-md">
                        <img src="<?= base_url() ?>static/images/logos/logo_aide_md.png" alt="<?= app_name() ?>" class="img-responsive" style="display: block; margin: auto;" />
                        <h3><?= $titulo ?></h3>
                        <small><?= app_name() ?></small>
                    </div>
                    <div class="hpanel">
                        <div class="panel-body">
                            <form action="#" id="login-form">
                                <div class="form-group">
                                    <label class="control-label" for="username">Username</label>
                                    <input type="text" placeholder="E-mail / Teléfono" title="Por favor ingrese su correo electrónico" required name="username" id="username" class="form-control" autofocus>
                                    <span class="help-block small">Correo electrónico o teléfono (10 dígitos)</span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Contraseña</label>
                                    <input type="password" title="Por favor ingrese su contraseña" placeholder="******" required name="password" id="password" class="form-control">
                                    <span class="help-block small">Su contraseña (10 caracteres)</span>
                                </div>						
                                <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-sign-in"> </i> Login</button>

                                <a class="text-primary text-right btn-block loader-link" href="<?= base_url() ?>registro" style="margin-top: 25px;">¿No tiene una cuenta?, por favor registrese</a>

                                <a class="text-primary text-right btn-block" style="margin-top: 5px;" href="#">¿Olvidó su contraseña?, recuperela aquí</a>

                                <small class="btn-block text-right" style="margin-top: 5px;">
                                    ¿Tiene problemas para acceder, por favor contacte al <a class="text-primary" href="#">webmaster</a>?
                                </small>
                            </form>
                        </div>
                    </div>
                </div>	
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <strong><?= app_title() ?></strong><br /><?= app_name() ?> <br/> <?= date("Y") ?>. Todos los Derechos Reservados <br />
                    <br /> <small>Desarrollado por <a href="http://cidtai.uteq.edu.mx">CIDTAI - UTEQ</a></small>
                </div>
            </div>
        </div>


        <!-- Vendor scripts -->
        <script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>

        <!-- App scripts -->
        <script> function base_url() {
        return "<?= base_url() ?>";
    }</script>
        <script src="<?= base_url() ?>static/scripts/homer.js"></script>
        <script src="<?= base_url() ?>static/scripts/app/libs/common.js"></script>
        <script src="<?= base_url() ?>static/scripts/app/public/login.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                loading();
            });
        </script>

    </body>
</html>
