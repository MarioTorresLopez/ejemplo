<?php
/**
 * Vista de registros de mapa curricular (administrador)
 *
 * Vista que muestra al usuario la interfaz gráfica para el llenado de datos que se requieren al momento de 
 * registrar un mapa curricular y las asignaturas que lleva, además el aspirante podrá ver si el documento ha sido aceptado.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage app/private/fragments/modules/Modulo1/usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/tramites_usuario
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
                Registro de Mapa Curricular
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" href="#step1" id="tab1-tab">Modalidad</a>
                        <a class="btn btn-default" href="#step2" id="tab2-tab">Datos asignaturas</a>
                        <a class="btn btn-default" href="#step3" id="tab3-tab">Documento</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <!--<i class="fa" style="font-size:100px">&#xf02d;</i>
                                <h1 class="">Alta de datos</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row">

                                <!-- COL-LG-9 START -->
                                <div class="col-lg-9">

                                    <!-- ROW START -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Cantidad de materias</label>
                                            <input type="text" name="num_materias" value="" id="num_materias" class="form-control">
                                        </div>
                                        <div class=" col-sm-6">
                                            <label>Tipo de institucion</label>
                                            <select name="estado" class="form-control m-b" id="tipo_institucion">
                                                <option value="" selected="selected">---Seleccione---</option>
                                                <option value="1">Media Superior</option>
                                                <option value="2">Superior</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- ROW END -->

                                </div>
                                <!-- COL-LG-9 END -->

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <!--<a class="btn btn-default prev" id="idprueba">Anterior</a>-->
                                <a class="btn btn-default next" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP1 END -->

                        <!-- STEP2 START -->
                        <div id="step2" class="p-m tab-pane">
                            <div class="text-center">
                                <!--<i class="fa" style="font-size:100px">&#xf02d;</i>
                                <h1 class="">Alta de asignaturas</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row">

                                <!-- COL-LG-9 START -->
                                <div class="col-lg-9">

                                    <!-- ROW START -->
                                    <div class="row">
                                    <!--<input class="hidden" value="1" id="tipo_institucion">-->
                                        <div class="row" id="row_media">

                                        </div>

                                        <div class="row" id="row_superior">

                                        </div>
                                    </div>
                                    <!-- ROW END -->

                                </div>
                                <!-- COL-LG-9 END -->

                            </div>
                            <!-- ROW END -->
                            <div class="text-right m-t-xs">
                                <!--<input type="button" name="botonb" id="botonb" value="Borrar">-->
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
                            <div class="row">

                                <!-- FORM-GROUP COL-LG-9 START -->
                                <div class="form-group col-lg-9" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-8">
                                        <label><h3>Mapa Curricular</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_mapa_curricular" name="docu_mapa_curricular" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción.
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_mapa_curricular" name="obse_mapa_curricular" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>

                                </div>
                                <!-- FORM-GROUP COL-LG-9 END -->

                            </div> 
                            <!-- ROW END --> 

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                <!--<a class="btn btn-default next" href="#">Siguiente</a>-->
                                <a class="btn btn-primary submitWizard" href="#">Enviar</a>
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
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
</div>
<!-- ROW END -->

