<?php
/**
* Vista para el alta de alumnos a AIDE
*
* Vista principal de la aplicación que muestra el conjunto de widgets correspondientes 
* al nivel de usuario, relacionando los fragmentos correspondientes al contenido
* 
* @since      1.0
* @version    1.0
* @link       /alta_alumnos
* @package    application.views
* @subpackage app.private.fragments.modules.Modulo2.Inscripcion
* @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
* @uses       ./application/controllers/app/incripcion.php
*/
?>
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Alta de alumnos
                </div>
                <div class="panel-body">

                    <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                        <div class="text-center m-b-md" id="wizardControl">
                            <a class="btn btn-primary" id="tab1-tab">Paso 1 - Datos pertinentes</a>
                            <a class="btn btn-default" id="tab2-tab">Paso 2 - Documentación</a>
                        </div>

                        <div class="tab-content">
                            <div id="step1" class="p-m tab-pane active">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <i class="pe-7s-user fa-5x text-muted"></i>
                                        <h1 class="">Alta de datos</h1>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class=" col-sm-12">
                                                <label><h3>Faltan los campos necesarios</h3></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default next" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                </div>
                            </div>

                            <div id="step2" class="p-m tab-pane">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                        <h1 class="">Documetacion</h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                            <label>Archivo para alta de alumnos</label>
                                            <input type="file" value="" id="alta_alumnos" class="form-control" name="alta_alumnos" placeholder="*campo requerido" >
                                        </div>
                                    </div>
                                </div>  

                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                <a class="btn btn-primary submitWizard" href="#">Enviar</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="m-t-md">

                        <p>

                        </p>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
