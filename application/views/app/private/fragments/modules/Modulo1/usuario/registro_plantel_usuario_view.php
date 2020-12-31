<?php
/**
 * Vista de registros de plantel (aspirante)
 *
 * Vista que muestra al usuario la interfaz gráfica para el llenado de datos que se requieren al momento de 
 * registrar el plantel, además ver que documentos han sido aceptados y observaciones..
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
                Registro de plantel
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" href="#step1" id="tab1-tab">Datos plantel</a>
                        <a class="btn btn-default" href="#step2" id="tab2-tab">Documentos institución</a>
                        <a class="btn btn-default" href="#step3" id="tab3-tab">Documentos infraestructura</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Alta datos</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- COL-SM-9 START -->
                                <div class="col-sm-9">

                                    <!-- ROW START -->
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <label><h3>Domicilio del plantel</h3></label>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                            <input type="text" name="calle_plantel" id="calle_plantel" class="form-control" placeholder="*Campo requerido" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                            <input type="text" name="no_interior_plantel" id="no_interior_plantel" class="form-control" placeholder="*Campo requerido" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                            <input type="text" name="no_exterior_plantel" id="no_exterior_plantel" class="form-control" placeholder="*Campo requerido" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" name="colonia_plantel" id="colonia_plantel" class="form-control" placeholder="*Campo requerido" required>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Entidad federativa</label>
                                            <select name="entidad_plantel" id="entidad_plantel" class="form-control m-b">
                                                <option>---Seleccione---</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Municipio</label>
                                            <select name="municipio_plantel" id="municipio_plantel" class="form-control m-b">
                                                <option>---Seleccione---</option>
                                            </select>
                                        </div>


                                        <div class="col-sm-12">
                                            <label>Tipo de alumnado</label>
                                            <select name="tipo_alumnado" id="tipo_alumnado" class="form-control m-b">
                                                <option>---Seleccione---</option>
                                                <option>Hombre</option>
                                                <option>Mujer</option>
                                                <option>Mixto</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12">
                                            <label>Turno</label>
                                            <select name="tipo_alumnado" id="tipo_alumnado" class="form-control m-b">
                                                <option>---Seleccione---</option>
                                                <option>Matutino</option>
                                                <option>Vespertino</option>
                                                <option>Mixto</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-12">
                                            <label>Horario</label>
                                            <input type="text" name="horario" id="horario" class="form-control" placeholder="*Campo requerido">
                                        </div>

                                    </div>
                                    <!-- ROW END -->

                                </div>
                                <!-- COL-SM-9 END -->

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
                                <!--<i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                <h1 class="">Documentación</h1>-->
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP COL-SM-12 START -->
                                <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-8">
                                        <label><h3>Plantilla de personal</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_plantilla_personal" name="docu_plantilla_personal" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Docentes que trabajarán en la escuela
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_plantilla_personal">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_plantilla_personal" aria-expanded="true" aria-controls="obse_plantilla_personal">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_plantilla_personal" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_plantilla_personal">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_plantilla_personal" name="obse_plantilla_personal" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Acta constitutiva</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_acta_constitutiva" name="docu_acta_constitutiva" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Escritura completa legible y la inscripción al registro público de la propiedad.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_acta_constitutiva">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_acta_constitutiva" aria-expanded="true" aria-controls="obse_acta_constitutiva">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_acta_constitutiva" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_acta_constitutiva">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_acta_constitutiva" name="obse_acta_constitutiva" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->

                                
                                    <div class="col-sm-8">
                                        <label><h3>Inventario</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_inventario" name="docu_inventario" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Copia de inventario por separado, por cada espacio, de: mobiliario, acervo bibliográfico, material y equipo escolar con los que dará cumplimiento al programa de estudio. 
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_inventario">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_inventario" aria-expanded="true" aria-controls="obse_inventario">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_inventario" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_inventario">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_inventario" name="obse_inventario" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Reglamento</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_reglamento" name="docu_reglamento" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Reglamento interior del plantel, que contemple obligaciones y derechos del personal directivo y docente, de alumnos y padres de familia, sujeto a la aprobación por la Dirección de Educación. 
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_reglamento">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_reglamento" aria-expanded="true" aria-controls="obse_reglamento">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_reglamento" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_reglamento">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_reglamento" name="obse_reglamento" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Emblema y sello</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_emblema_sello" name="docu_emblema_sello" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Documento con la propuesta.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_emblema_sello">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_emblema_sello" aria-expanded="true" aria-controls="obse_emblema_sello">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_emblema_sello" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_emblema_sello">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_emblema_sello" name="obse_emblema_sello" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                </div>
                                <!-- FORM-GROUP COL-SM-12 END -->

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

                                <!-- FORM-GROUP COL-SM-12 START -->
                                <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-8">
                                        <label><h3>Protección civil</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_proteccion_civil" name="docu_proteccion_civil" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_proteccion_civil">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_proteccion_civil" aria-expanded="true" aria-controls="obse_proteccion_civil">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_proteccion_civil" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_proteccion_civil">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_proteccion_civil" name="obse_proteccion_civil" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Constancia de seguridad</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_constancia_seguridad" name="docu_constancia_seguridad" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Emitida por un perito del Estado de Querétaro, director responsable de obra o corresponsable en seguridad estructural.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_constancia_seguridad">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_constancia_seguridad" aria-expanded="true" aria-controls="obse_constancia_seguridad">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_constancia_seguridad" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_constancia_seguridad">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_constancia_seguridad" name="obse_constancia_seguridad" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Croquis de la instalación</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_croquis_instalacion" name="docu_croquis_instalacion" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Croquis de ubicación del inmueble, con datos referenciados para su fácil localización.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_croquis_instalacion">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_croquis_instalacion" aria-expanded="true" aria-controls="obse_croquis_instalacion">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_croquis_instalacion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_croquis_instalacion">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_croquis_instalacion" name="obse_croquis_instalacion" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Plano arquitectónico</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_plano_arquitectonico" name="docu_plano_arquitectonico" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Representación gráfica 
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_plano_arquitectonico">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_plano_arquitectonico" aria-expanded="true" aria-controls="obse_plano_arquitectonico">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_plano_arquitectonico" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_plano_arquitectonico">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_plano_arquitectonico" name="obse_plano_arquitectonico" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Registro de perito</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_registro_perito" name="docu_registro_perito" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_registro_perito">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_registro_perito" aria-expanded="true" aria-controls="obse_registro_perito">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_registro_perito" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_registro_perito">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_registro_perito" name="obse_registro_perito" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Cédula profesional perito</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_cedula_perito" name="docu_cedula_perito" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Descripción
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_cedula_perito">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_cedula_perito" aria-expanded="true" aria-controls="obse_cedula_perito">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_cedula_perito" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_cedula_perito">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_cedula_perito" name="obse_cedula_perito" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Dictamen de uso de suelo</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_dictamen_suelo" name="docu_dictamen_suelo" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Documento administrativo con información relativa al uso de suelo que se asigna a un predio de acuerdo a los programas de desarrollo urbano aplicables y vigentes en la zona.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_dictamen_suelo">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_dictamen_suelo" aria-expanded="true" aria-controls="obse_dictamen_suelo">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_dictamen_suelo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_dictamen_suelo">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_dictamen_suelo" name="obse_dictamen_suelo" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->


                                    <div class="col-sm-8">
                                        <label><h3>Descripción de instalaciones</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="checkbox">
                                            <label><input type="checkbox" class="i-checks" id="docu_descripcion_instalacion" name="docu_descripcion_instalacion" disabled="disabled" checked> Aceptado </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        Fotografías de los espacios especificados.
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="panel panel-info">
                                            <div class="panel-heading" role="tab" id="heading_descripcion_instalacion">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#obse_descripcion_instalacion" aria-expanded="true" aria-controls="obse_descripcion_instalacion">
                                                        Observaciones
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="obse_descripcion_instalacion" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_descripcion_instalacion">
                                                <div class="panel-body">
                                                    Sin observaciones.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--<div class="col-sm-4">
                                        <label>Observaciones</label>
                                        <textarea id="obse_descripcion_instalacion" name="obse_descripcion_instalacion" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                    </div>-->

                                </div>
                                <!-- FORM-GROUP COL-SM-12 END -->

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