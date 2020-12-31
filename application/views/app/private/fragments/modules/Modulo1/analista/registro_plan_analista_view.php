<?php
/**
 * Vista para el registro de plan de estudios para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para verifcar los datos del usuario que los subio(Institucion) y adjuntar los documentos en formato digitalizado a la plataforma.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_plan
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/gestion_institucion_analista
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
                        <a class="btn btn-primary" id="tab1-tab">Alta de datos</a>
                        <a class="btn btn-default" id="tab2-tab">Carreras</a>
                        <a class="btn btn-default" id="tab3-tab">Validar</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Registro</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- COL-LG-12 START -->
                                <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                                    <label>Nombre del plan</label>
                                    <input type="text" name="nom_plan" id="nom_plan" class="form-control" value="Plan THC420" disabled="disabled">
                                    <label>Modalidad educativa</label>
                                    <input type="text" name="nom_modalidad" id="nom_modalidad" class="form-control" value="" disabled="disabled">
                                    <label>Tipo de inscripción</label>
                                    <input type="text" name="tipo_insc" id="tipo_insc" class="form-control" value="Cuatrimestral" disabled="disabled">
                                </div>
                                <!-- COL-LG-12 END -->

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default next" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP1 END -->


                        <!-- STEP2 START -->
                        <div id="step2" class="p-m tab-pane">
                            <div class="text-center">
                                <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                <h1 class="">Carreras</h1>
                            </div>
                            <div class="row">
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP START -->
                                <div class="form-group">

                                    <!-- COL-LG-12 START -->
                                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                                        <label>Carrera</label>
                                        <input type="text" value="Mecatrónica" id="carrera" class="form-control" name="carrera" disabled="disabled">
                                        <label>Especialidad</label>
                                        <input type="text" value="Sistemas electricos" id="especialidad" class="form-control" name="especialidad" disabled="disabled">
                                    </div>
                                    <!-- COL-LG-12 END -->

                                </div>
                                <!-- FORM-GROUP END -->

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

                            <!-- ROW START -->
                            <div class="row text-center m-t-lg m-b-lg">

                                <!-- COL-LG-12 START -->
                                <div class="col-lg-12">
                                    <i class="pe-7s-check fa-5x text-muted"></i>
                                    <p class="small m-t-md">
                                        <strong>Todos sus datos han sido revisados y aprobados</strong>
                                    </p>
                                </div>
                                <!-- COL-LG-12 END -->

                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks approveCheck" name="approve">
                                    Aprobado
                                </div>

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                <a class="btn btn-primary submitWizard" href="../gestion_institucion/gestion_planes">Enviar</a>
                            </div>
                        </div>
                        <!-- STEP3 END -->

                    </div>
                    <!-- TAB-CONTENT END -->

                </form>
                
                <!-- FORM END -->
<div class="row">
    <!--     col-lg-6 START -->
    <div class="col-lg-12">
        <!--         hpanel START -->
        <div class="hpanel hblue">
            <!--             panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--                 panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--                 panel-tools END -->
                Agregar bitácora 
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <p>
                    <!--                    Formulario -->
                </p>
                <!--                 form START -->
               
                <div class="row">
                    <div class="col-sm-12">
<!--                                       <input type="text" class="form-control" id="idsolicitud" name="idsolicitud" value="<?= $plantel->idpla ?>">-->
                        <span class="placeholder">Escriba su observación en el siguiente cuadro de texto.</span>
                        <div class="textarea" id="comentario_bitacora" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                        <button type="button" class="btn btn-primary" id="botonBit1">Enviar Comentario</button>
                    </div>
                </div>
                <!--                 form END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--         hpanel END -->
    </div>

    <!--     col-lg-6 END 
    
         col-lg-12 START -->
    <div class="col-lg-12">
        <!--         hpanel START -->
        <div class="hpanel hblue">
            <!--             panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--                 panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--                 panel-tools END -->
                Bitácora
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">
                                         
                    <thead>
                        <tr>
                            <th>Nombre analista</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <td>Raul Zavaleta Zea</td>
                    <td>Cambio de plan de estudios de la institución
                    "Patito" recibí documentos, falta verificarlos</td>
                    <td>20/01/2019</td>
                    <td>                            
                        <a class = "btn btn-info" href="">
                            <i class="fa fa-paste"></i> 
                            <span class="bold">  </span>
                        </a>
                    </td>
                        
                        
                    </tbody>
                <tbody>
                    <td>Victor Manuel Aguilar Sanchez</td>
                    <td>Cambio de plan de estudios de la institución
                    "Patito" recibí documentos, falta verificarlos</td>
                    <td>20/01/2019</td>
                    <td>                            
                        <a class = "btn btn-info" href="">
                            <i class="fa fa-paste"></i> 
                            <span class="bold">  </span>
                        </a>
                    </td>
                        
                        
                    </tbody>
                    <tbody>
                    <td>Martin Larios</td>
                    <td>Cambio de plan de estudios de la institución
                    "Patito" recibí documentos, falta verificarlos</td>
                    <td>20/01/2019</td>
                    <td>                            
                        <a class = "btn btn-info" href="">
                            <i class="fa fa-paste"></i> 
                            <span class="bold">  </span>
                        </a>
                    </td>
                        
                        
                    </tbody>
                    
                </table>
                <!-- table END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--        hpanel END -->
    </div>
    
</div>
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