<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.


 <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    -->
    <!-- Page title -->

    <?php
/**
 * Registro intitucion
 * 
 * Fragmentos de vista para el tramite de nueva intitucion 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/registro_intitucion.php
 */
?>
<title>HOMER | WebApp admin theme</title>

<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
<!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

<!-- Vendor styles -->
<link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.css" />

<!-- App styles -->
<link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
<link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">

</head>

<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    Example fo wizard form
                </div>
                <div class="panel-body">

                    <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                        <div class="text-center m-b-md" id="wizardControl">
                            <a class="btn btn-primary" href="#step1" data-toggle="tab">Step 1 - Personal data</a>
                            <a class="btn btn-default" href="#step2" data-toggle="tab">Step 2 - Payment data</a>
                            <a class="btn btn-default" href="#step3" data-toggle="tab">Step 3 - Approval</a>
                        </div>

                        <div class="tab-content">
                            <div id="step1" class="p-m tab-pane active">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <i class="pe-7s-user fa-5x text-muted"></i>
                                        <h1 class="">Registro de institucion</h1>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="form-group col-lg-12">
                                                <label>Nombre completo</label>
                                                <input type="text" name="nom_compelto" id="nom_compelto" class="form-control" placeholder="*campo requrido">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Correo electronico</label>
                                                <input type="email" value="" id="correo" class="form-control" name="correo" placeholder="*campo requerido" >
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Telefono</label>
                                                <input type="tel" value="" id="telefono" class="form-control" name="telefono"placeholder="*campo requerido">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Previous</a>
                                    <a class="btn btn-default next" href="#">Next</a>
                                </div>
                            </div>

                            <div id="step2" class="p-m tab-pane">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                        <h1 class="">Documentación</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                            <label for="tipo">Tipo de tramite</label> 
                                            <select name="institucion" id="tipo_tramite"  class="form-control m-b">
                                                <option>---Seleccione---</option>
                                                <option value="1">Fisica</option>
                                                <option value="2">Moral</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" id="fiscal_tramite">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Identificación oficial con fotografía (Credencial de elector, pasaporte vigente, licencia de manejo vigente o cédula profesional</label>
                                            <input type="file" value="" id="iden_ofic" class="form-control" name="iden_ofic" placeholder="*campo requerido" >
                                        </div>
                                        <div class=" col-lg-12">
                                            <label>Documetos de registro ante el SAT</label>
                                            <input type="file" value="" id="documento_sat" class="form-control" name="documento_sat" placeholder="*campo requerido">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" id="moral_tramite">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label>Escritura constitutiva debidamente notariada e inscrita en el Registro Público de la Propiedad y del Comercio, la misma deberá contemplar en su objeto social el impartir educación.</label>
                                            <input type="file" value="" id="iden_ofic" class="form-control" name="iden_ofic" placeholder="*campo requerido" >
                                        </div>
                                        <div class=" col-lg-12">
                                            <label>Acreditación con un poder notariado</label>
                                            <input type="file" value="" id="documento_sat" class="form-control" name="documento_sat" placeholder="*campo requerido">
                                        </div>
                                        <div class=" col-lg-12">
                                            <label>Identificación oficial con fotografía (Credencial de elector, pasaporte vigente, licencia de manejo vigente o cédula profesional</label>
                                            <input type="file" value="" id="documento_sat" class="form-control" name="documento_sat" placeholder="*campo requerido">
                                        </div>
                                    </div>
                                </div>  
                                
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Previous</a>
                                    <a class="btn btn-default next" href="#">Next</a>
                                </div>
                            </div>

                            <div id="step3" class="tab-pane">
                                <div class="row text-center m-t-lg m-b-lg">
                                    <div class="col-lg-12">
                                        <i class="pe-7s-check fa-5x text-muted"></i>
                                        <p class="small m-t-md">
                                            <strong>There are many</strong> variations of passages of Lorem Ipsum available, but the majority have suffered
                                        </p>
                                    </div>
                                    <div class="checkbox col-lg-12">
                                        <input type="checkbox" class="i-checks approveCheck" name="approve">
                                        Approve this form
                                    </div>
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Previous</a>
                                    <a class="btn btn-default next" href="#">Next</a>
                                    <a class="btn btn-success submitWizard" href="#">Submit</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="m-t-md">

                        <p>
                            This is an example of a wizard form which can be easy adjusted. Since each step is a tab, and each clik to next tab is a function you can easily add validation or any other functionality.
                        </p>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

<script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
<script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>
<script src="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.min.js"></script>

<!-- App scripts -->
<script src="<?= base_url() ?>static/scripts/homer.js"></script>



<script>
    jQuery(document).ready(function($) {

        $("#fiscal_tramite").slideUp(10);
        $("#moral_tramite").slideUp(10);
        $("#tipo_tramite").change(function(event) {
            var valor = $("#tipo_tramite").val();
            if(valor == 1){
                $("#moral_tramite").slideUp(10);
                $("#fiscal_tramite").slideDown(500);

            } else {
                $("#fiscal_tramite").slideUp(10);
                $("#moral_tramite").slideDown(500);
            }
        });

    });
</script>



