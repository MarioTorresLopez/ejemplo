<?php
/**
 * Vista de crear nueva cuenta
 *
 * vista que muestra un solictud de para crear cuenta 
 * el usuario y poder usar el sistema
 * 
 * @since       1.0
 * @version     1.0
 * @link        /login_controller/ejemplo_login
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/controllers/usuario/registro_nuevo_usuario
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


    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
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
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/loader.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/toastr/build/toastr.css" />
</head>
<body class="blank">
    <!-- color-line START -->
    <div class="color-line"></div>

    <!-- login-container START -->
    <div class="register-container">
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
                        <div class="panel-body">
                            <!-- form start -->
                            <form role="form" id="form" action="<?= base_url() ?>usuario/registro_nuevo_usuario/crear_solicitud" method="post">
                                <!-- form row -->
                                <div class="row">
                                  <!-- div del mensaje de ayuda -->
                                  <div class="form-group col-lg-12 text-right tooltip-demo ">
                                    <a class="btn btn-default" >
                                        <i class="fa fa-question-circle" data-toggle="tooltip" title="En esta sección tendrá que llenar el formulario para poder tener acceso al sistema, y el cual debe ser llenado en su totalidad por la persona que dará de alta la institución. " value="ayuda">Ayuda</i>
                                    </a>
                                </div>
                                <!-- mensaje de ayuda end -->
                                <div class="form-group col-lg-12 ">
                                    <label><h4>Datos personales</h4></label>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label>Nombre(s):</label>
                                        <input type="text" value="" id="nombre" class="form-control" name="nombre"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>

                                    </div>
                                </div>
                                <div class="form-group ">
                                    <div class="col-lg-6"> 
                                        <label>Primer apellido:</label>
                                        <input type="text" value="" id="apellido1" class="form-control" name="apellido1"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Segundo apellido:</label>
                                        <input type="text" value="" id="apellido2" class="form-control" name="apellido2"  placeholder="" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <!--alerta -->
                                               <!-- esta alerta funciona para cuando el curp ya esta registrado-->
                                        <?php
                                        if ($this->session->flashdata('solicitud_incorrecta')) {
                                            ?>

                                            <div class="alert alert-danger fade in alert-dismissable">
                                                <a class="close" data-dismiss="alert">x</a>
                                                <?= $this->session->flashdata('solicitud_incorrecta') ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-12">

                                        <label>CURP:</label>

                                        <input type="text" value="" id="curp" class="form-control" name="curp"   maxlength="18" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>


                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Teléfono 1:</label>
                                        <input type="tel" maxlength="10" value="" id="telefono1" class="form-control" name="telefono1"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label>Teléfono 2:</label>
                                        <input type="tel" maxlength="10" value="" id="telefono2" class="form-control" name="telefono2" style="text-transform: uppercase;" >
                                        <span class="help-block"></span>

                                    </div>
                                </div>
                                <div class="col-lg-12">
                                 <!--alerta -->
                                 <!-- esta alerta funciona para cuando el correo ya esta registrado-->
                                 <?php
                                 if ($this->session->flashdata('solicitud_incorrecta2')) {
                                    ?>

                                    <div class="alert alert-danger fade in alert-dismissable">
                                        <a class="close" data-dismiss="alert">x</a>
                                        <?= $this->session->flashdata('solicitud_incorrecta2') ?>
                                    </div>
                                    <?php
                                }
                                ?>  
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Correo electrónico </label>
                                    <input type="email" value="" id="correo1" class="form-control" name="correo1"  placeholder="*CAMPO REQUERIDO" > 
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Repetir correo electrónico </label>
                                    <input type="email" value="" id="correo2" class="form-control" name="correo2"  placeholder="*CAMPO REQUERIDO" >
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Contraseña </label>
                                    <input type="password" value="" id="password1" class="form-control" name="password1"  placeholder="*CAMPO REQUERIDO" > 
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Repetir contraseña

                                    </label>
                                    <input type="password" value="" id="password2" class="form-control" name="password2"  placeholder="*CAMPO REQUERIDO" >
                                    <span class="help-block"></span>
                                </div>
                            </div>


                            <div class="form-group col-lg-12">
                                <label><h4>Dirección</h4></label>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label>Calle:</label>
                                    <input type="text" value="" id="calle" class="form-control" name="calle"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Número exterior:</label>
                                    <input type="text" value="" id="noext" class="form-control" name="noext"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Número interior:</label>
                                    <input type="text" value="" id="noint" class="form-control" name="noint" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Colonia:</label>
                                    <input type="text" value="" id="colonia" class="form-control" name="colonia"  placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Código postal:</label>
                                    <input type="text" value="" id="cp" class="form-control" name="cp"  placeholder="*CAMPO REQUERIDO">
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <!-- datos de otra tabla start -->
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <!-- el siguiente if contiene variables que traen desde el controlador los municipios y estados -->
                                    <label>Entidad federativa:</label>
                                    <select name="idestado" class="form-control m-b"  id="idestado">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($estados)) :
                                            $contador = 0;
                                            foreach ($estados as $estado) :
                                                $contador += 1;
                                                ?>
                                                <option value="<?= $estado->idestado ?>"><?= $estado->nomestado ?></option> 
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <span class="help-block"></span>

                                </div>
                            </div>
                            <!-- datos de otra tabla start -->

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label>Municipio:</label>
                                    <select name="idmunicipio" class="form-control m-b"  id="idmunicipio">
                                        <option>---Seleccione---</option>

                                    </select>
                                    <span class="help-block"></span>

                                </div>
                            </div>


                        </div>
                        <div class="col-lg-12">
                            <div class="hr-line-dashed">

                            </div>
                        </div>

                        <div class="form-group " style="text-align:right;">
                            <div class="col-lg-12">

                                <button
                                class="btn btn-primary" id="correoEnviado" name="correoEnviado" 
                                type="submit">Registrar</button>

                                <a class="btn btn-default" id="cancelar" >Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
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

<!--Modales alerts-->
<script src="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.js"></script>
<script src="<?= base_url() ?>static/vendor/toastr/build/toastr.min.js"></script>

<!-- App scripts -->
<!-- el siguiente scrip atrae todos los js que contiene el controlador y estos a su vez se ubican en static->admin->js-->
<script type="text/javascript">
    function base_url() {
        return "<?=base_url()?>";
    }
</script>
<script src="<?= base_url() ?>static/scripts/homer.js"></script>
<?php if (isset($scripts)) : foreach ($scripts as $script) : ?><script type="text/javascript" src="<?= base_url() ?>static/admin/js/<?= $script ?>.js"></script><?php endforeach;
endif; ?>

<!--validacion de contraseña -->

</body>
</html>
