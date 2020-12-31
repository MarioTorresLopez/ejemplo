<?php
/**
 * Vista para el registro de mapa curricular para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para verifcar los datos del usuario que los subio(Institucion) y adjuntar los documentos en formato digitalizado a la plataforma.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_mp
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
                Registro de mapa curricular
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" id="tab1-tab">Datos asignaturas</a>
                        <a class="btn btn-default" id="tab2-tab">Documento</a>
                        <a class="btn btn-default" id="tab3-tab">Validar documentos</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">


                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <i class="fa" style="font-size:100px">&#xf02d;</i>
                                <h1 class="">Datos de asignaturas</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">
                                <input type="text" name="num_materias" value="2" id="num_materias" class="hidden">
                                <input type="text" name="tipo_institucion" value="1" id="tipo_institucion" class="hidden">
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="row" id="row_media">

                                        </div>

                                        <div class="row" id="row_superior">

                                        </div>
                                    </div>
                                </div>
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
                                <h1 class="">Documetación</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Mapa curricular</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="" id="btn_desplegar1">Revisar <i class="fa fa-pencil"></i></button>
                                        <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="2">
                                        <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="471">
                                    </div>
                                    <div id="div_desplegar1" class="col-sm-12">
                                        <div class="col-sm-4" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-primary" value="2" id="btn_aceptado1">Aceptado</button>
                                        </div>
                                        <div class="col-sm-4" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-warning" value="1" id="btn_comentario1">Comentario</button>
                                        </div>
                                        <div class="col-sm-12" id="div_comentario1">
                                            <span class="placeholder">Escriba las observaciones en el siguiente cuadro de texto.</span>
                                            <div class="textarea" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC;"><p><br></p></div>
                                            <button type="button" class="btn btn-primary" id="btn_enviarCom1">Enviar Comentario</button>
                                        </div>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Oficio de validación de mapa curricular</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="" id="btn_desplegar2">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar2" class="col-sm-12">
                                        <div class="col-sm-4" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-primary" value="2" id="btn_aceptado2">Aceptado</button>
                                        </div>
                                        <div class="col-sm-4" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-warning" value="1" id="btn_comentario2">Comentario</button>
                                        </div>
                                        <div class="col-sm-12" id="div_comentario2">
                                            <span class="placeholder">Escriba las observaciones en el siguiente cuadro de texto.</span>
                                            <div class="textarea" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC;"><p><br></p></div>
                                            <button type="button" class="btn btn-primary" id="btn_enviarCom2">Enviar Comentario</button>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                <a class="btn btn-default next" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP2 END -->


                        <!-- STEP3 START -->
                        <div id="step3" class="tab-pane">

                            <!-- ROW START -->
                            <div class="row text-center m-t-lg m-b-lg">

                                <!-- COL-LG-12 START -->
                                <div class="col-lg-12">
                                    <i class="pe-7s-check fa-5x text-muted"></i>
                                    <p class="small m-t-md">
                                        <strong>Todos los documentos han sido revisados y aprobados</strong>
                                    </p>
                                </div>
                                <!-- COL-LG-12 END -->

                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks approveCheck" name="approve">
                                    Aprobado para subir al sistema
                                </div>
                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                <a class="btn btn-primary submitWizard" href="../gestion_institucion/gestion_mapas">Enviar</a>
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
               
                <form  id="form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="div_comentario1" class="col-sm-12">
                                <span class="placeholder">Escriba su observación en el siguiente cuadro de texto.</span>
                                <div class="textarea" id="text_comentario1" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                            </div>
                            <div>
                                <div class="col-sm-12">
                                <button class="btn btn-sm btn-primary m-t-n-xs" id="botonMod" name="botonMod" type="submit">
                                    <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
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