<?php
/**
 * Vista de registros de plan de estudios (aspirante)
 *
 * Vista que muestra al usuario la interfaz gráfica para el llenado de datos que se requieren al momento de 
 * registrar un plan de estudios, además ver que documentos han sido aceptados y observaciones.. 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage app/private/fragments/modules/Modulo1/usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/usuario/tramite
 */
?>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Registro de plan de estudios
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" href="#step1" id="tab1-tab">Alta de datos</a>
                        <a class="btn btn-default" href="#step2" id="tab2-tab">Carrera</a>
                        <a class="btn btn-default" href="#step3" id="tab3-tab">Documentos</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Registro</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP COL-LG-9 START -->
                                <div class="form-group col-lg-9" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-12">
                                        <label>Nombre del plan</label>
                                        <input type="text" name="nombre_plan" id="nombre_plan" class="form-control" placeholder="*Campo requerido" required>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Modalidad educativa</label>
                                        <select name="modalidad" id="modalidad"class="form-control m-b">
                                            <option>---Seleccione---</option>
                                            <option>Escolarizada</option>
                                            <option>No escolarizada</option>
                                            <option>Mixta</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Tipo de ingreso</label>
                                        <select name="tipo_ingreso" id="tipo_ingreso"class="form-control m-b">
                                            <option>---Seleccione---</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- FORM-GROUP COL-LG-9 END -->

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <!--<a class="btn btn-default prev" href="#">Anterior</a>-->
                                <a class="btn btn-default next" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP1 END -->

                        <!-- STEP2 START -->
                        <div id="step2" class="p-m tab-pane">
                            <div class="text-center">
                                <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Registro</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP COL-LG-9 START -->
                                <div class="form-group col-lg-9" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-12">
                                        <label>Nombre de la carrera</label>
                                        <input type="text" name="nombre_carrera" id="nombre_carrera" class="form-control" placeholder="*Campo requerido">
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Nombre de la especialidad</label>
                                        <input type="text" name="nombre_especialidad" id="nombre_especialidad" class="form-control" placeholder="*Campo requerido">
                                    </div>

                                </div>
                                <!-- FORM-GROUP COL-LG-9 END -->

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                               	<a class="btn btn-default next" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP2 END -->

                        <!-- STEP3 START -->
                        <div id="step3" class="p-m tab-pane">
                            <div class="text-center">
                                <!--<i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                <h1 class="">Documetación</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP COL-LG-12 START -->
                                <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-8">
                                        <label><h3>Proyecto educativo</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_proyecto_educativo" name="docu_proyecto_educativo" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Considera las bases y enfoque de los planes y programas
                                        de educación básica según el modelo educativo, así como el perfil de ingreso y egreso
                                        estipulado en los mismos. que cubra la dimensión pedagógica, la organizacional,
                                        administrativa y sociocultural
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_proyecto_educativo">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_proyecto_educativo" aria-expanded="true" aria-controls="obse_proyecto_educativo">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_proyecto_educativo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_proyecto_educativo">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_proyecto_educativo" name="obse_proyecto_educativo" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>COEPES</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_coepes" name="docu_coepes" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_coepes">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_coepes" aria-expanded="true" aria-controls="obse_coepes">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_coepes" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_coepes">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_coepes" name="obse_coepes" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>CIFRHS</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_cifrhs" name="docu_cifrhs" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_cifrhs">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_cifrhs" aria-expanded="true" aria-controls="obse_cifrhs">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_cifrhs" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cifrhs">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_cifrhs" name="obse_cifrhs" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                </div>
                                <!-- FORM-GROUP COL-LG-12 END -->

                            </div>
                            <!-- ROW END -->  

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                <!--<a class="btn btn-default next" href="#">Siguiente</a>-->
                                <!--<a class="btn btn-primary submitWizard" href="#">Enviar</a>-->
                            </div>
                        </div>
                        <!-- STEP3 END -->

                    </div>
                    <!-- TAB-CONTENT END -->

                </form>
                <!-- FORM END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->

    <!-- ROW START -->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
    <!-- ROW END -->

</div>
<!-- ROW END -->
