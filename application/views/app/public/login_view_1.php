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
        <title><?= $titulo ?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->


        <link rel="shortcut icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />

        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/loader.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">

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
        
        <!-- color-line START -->
        <div class="color-line"></div>

        <!-- login-container START -->
        <div class="login-container">
            <!-- row START -->
            <div class="row">
                <!-- col-md-12 START -->
                <div class="col-md-12">
                    <!-- text-center m-b-mb START -->
                    <!--<div class="text-center m-b-md">
                        <h3>AIDE</h3>
                        <small>Inicia sesion</small>
                    </div>-->
                    <div class="text-center m-b-md">
                        <img src="<?= base_url() ?>static/images/logos/logo_aide_md.png" alt="<?= app_name() ?>" class="img-responsive" style="display: block; margin: auto;" />
                        <h3><?= $titulo ?></h3>
                        <small><?= app_name() ?></small>
                    </div>
                    <!-- text-center m-b-mb END -->
                    <!-- hpanel START -->
                    <div class="hpanel">
                        <!-- panel-body START -->
                        <div class="panel-body">
                            <!-- form START -->
                            <form action="<?= base_url() ?>auth" method="post" id="loginForm">
                                <div class="form-group">
                                    <label class="control-label" for="username">Correo:</label>
                                    <input type="text" placeholder="Correo" title="Por favor ingresa tu correo" required="" value="" name="username" id="username" class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="password">Contraseña:</label>
                                    <input type="password" title="Por favor ingrese su contraseña" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                    <span class="help-block small">Su contraseña (10 caracteres)</span>
                                </div>

                                <?php
                                if ($this->session->flashdata('usuario_incorrecto')) {
                                    ?>

                                    <div class="alert alert-danger fade in alert-dismissable">
                                        <a class="close" data-dismiss="alert">x</a>
                                        <?= $this->session->flashdata('usuario_incorrecto') ?>
                                    </div>
                                    <?php
                                }
                                ?>
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-sign-in"></i> Iniciar sesión
                                </button>
                                <a class="text-primary text-right btn-block loader-link" href="<?= base_url() ?>usuario/registro_nuevo_usuario" style="margin-top: 25px;">¿No tiene una cuenta? Por favor regístrese </a>

                                <a class="text-primary text-right btn-block" style="margin-top: 5px;" href="usuario/recuperar_password">¿Olvidó su contraseña? Recuperela aquí</a>

                                <small class="btn-block text-right" style="margin-top: 5px;">
                                    ¿Tiene problemas para acceder, por favor contacte al <a class="text-primary" href="#">Administrador</a>?
                                </small>
                            </form>
                            <!-- form END -->

                        </div>
                        <!-- panel-body END -->
                    </div>
                    <!-- hpanel END -->
                </div>
                <!-- col-md-12 END -->
            </div>
            <!--row END -->

            <div class="row">
                <div class="col-md-12 text-center">
                    <strong><?= app_title() ?></strong><br /><?= app_name() ?> <br/> <?= date("Y") ?>. Todos los Derechos Reservados <br />
                    <br /> <small>Desarrollado por <a href="http://cidtai.uteq.edu.mx">CIDTAI - UTEQ</a></small>
                </div>
            </div>
        </div>
        <!-- login-container END -->

        <!-- Vendor scripts -->
        <script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>

        <!-- App scripts -->
        <script src="<?= base_url() ?>static/scripts/homer.js"></script>
        
        <script src="<?= base_url() ?>static/scripts/app/libs/common.js"></script>
        
         <script type="text/javascript">
            function base_url() {
                return "<?= base_url() ?>";
            }

            jQuery(document).ready(function ($) {
                loading();
            });
        </script>
        <script src="<?= base_url() ?>static/scripts/charts.js"></script>
    </body>
</html>
