<?php
/**
 * Vista para el registro de plantel para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para verifcar los datos del usuario que los subio(Institucion) y adjuntar los documentos en formato digitalizado a la plataforma.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle_plantel
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
                Registro de plantel
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" id="tab1-tab">Datos plantel</a>
                        <a class="btn btn-default" id="tab2-tab">Validar</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Alta datos</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <div class=" col-sm-12">
                                    <label><h3>Datos</h3></label>
                                </div>
                                <div class="col-sm-4">
                                    <label>Nombre del plantel</label>
                                    <input type="text" name="nombre_plantel" id="nombre_plantel" class="form-control" value="<?= $plantel->nombrepla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Nombre corto del plantel</label>
                                    <input type="text" name="nombre_corto_plantel" id="nombre_corto_plantel" class="form-control" value="<?= $plantel->nombrecorto ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Clave</label>
                                    <input type="text" name="clave_plantel" id="clave_plantel" class="form-control" value="<?= $plantel->clavepla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Teléfono </label>
                                    <input type="text" name="telefono_plantel" id="telefono_plantel" class="form-control" value="<?= $plantel->telefonopla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Correo electrónico</label>
                                    <input type="text" name="correo_plantel" id="correo_plantel" class="form-control" value="<?= $plantel->correopla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Sitio web</label>
                                    <input type="text" name="sitio_web_plantel" id="sitio_web_plantel" class="form-control" value="<?= $plantel->sitiowepla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>RFC</label>
                                    <input type="text" name="rfc_plantel" id="rfc_plantel" class="form-control" value="<?= $plantel->rfcpla ?>" disabled="disabled">
                                </div>


                                <div class=" col-sm-12">
                                    <label><h3>Domicilio plantel</h3></label>
                                </div>

                                <div class="col-sm-4">
                                    <label>Calle</label>
                                    <input type="text" name="calle_plantel" id="calle_plantel" class="form-control" value="<?= $plantel->callepla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Número interior</label>
                                    <input type="text" name="num_interior_plantel" id="num_interior_plantel" class="form-control" value="<?= $plantel->nointpla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Número exterior</label>
                                    <input type="text" name="num_exterior_plantel" id="num_exterior_plantel" class="form-control" value="<?= $plantel->noextpla ?>" disabled="disabled">
                                </div>

                                <div class="col-sm-4">
                                    <label>Municipio</label>
                                    <input type="text" name="municipio_plantel" id="municipio_plantel" class="form-control" value="<?= $plantel->nommunpla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Delegación</label>
                                    <input type="text" name="delegacion_plantel" id="delegacion_plantel" class="form-control" value="<?= $plantel->delpla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-4">
                                    <label>Colonia</label>
                                    <input type="text" name="colonia_plantel" id="colonia_plantel" class="form-control" value="<?= $plantel->colpla ?>" disabled="disabled">
                                </div>

                                <div class="col-sm-12">
                                    <label>Tipo de alumnado</label>
                                    <input type="text" class="form-control" name="tipo_alumnado" id="tipo_alumnado" value="<?= $plantel->alupla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-12">
                                    <label>Turno</label>
                                    <input type="text" class="form-control" name="turno_plantel" id="turno_plantel" value="<?= $plantel->desturpla ?>" disabled="disabled">
                                </div>
                                <div class="col-sm-12">
                                    <label>Horario</label>
                                    <input type="text" class="form-control" name="horario_plantel" id="horario_plantel" value="<?= $plantel->horpla ?>" disabled="disabled">
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
                                <a class="btn btn-default prev" href="#step1" data-toggle="tab" id="btnprevStep2">Anterior</a>
                                <a class="btn btn-primary submitWizard" href="../gestion_institucion/gestion_planteles">Enviar</a>
                            </div>
                        </div>
                        <!-- STEP2 END -->


                    </div>
                    <!-- TAB-CONTENT END -->
                </form>
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
                                        <input type="hidden" class="form-control" id="idinstitucion" name="idinstitucion" value="<?= $plantel->idpla ?>">
                                        <span class="placeholder">Escriba su observación en el siguiente cuadro de texto.</span>
                                        <div class="textarea" id="comentario_bitacora" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                        <button type="button" class="btn btn-primary" id="botonBit1">Enviar Comentario</button>
                                    </div>
                                </div>
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
                                            <th>Documento</th>
                                            <th>Comentario</th>
                                            <th>Fecha</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!is_null($bitacoras)) :
                                            $contador = 0;
                                            foreach ($bitacoras as $bitacora) :
                                                $contador += 1;
                                                ?>
                                                <tr>
                                                    <td> <?= $bitacora->nomusuario ?> </td> 
                                                    <td> <?= $bitacora->documento ?> </td> 
                                                    <td> <?= $bitacora->comentario ?> </td> 
                                                    <td> <?= $bitacora->fecha_hora ?> </td> 
                                                    <td>  
                                                        <?php
                                                        if($bitacora->idanalista ==$this->session->userdata('idusu')){?>
                                                        <a class = "btn btn-info" href="<?= base_url() ?>analista/gestion_institucion/editar_bitacora_plantel/<?= $bitacora->idpla ?>/<?=$bitacora->consecutivo?>/<?=$usuarioPlantel?>">
                                                            <i class="fa fa-paste"></i> 
                                                            <span class="bold">  </span>
                                                        </a>
                                                        <?php } else{?>
                                                          <a class = "btn btn-info" disabled>
                                                            <i class="fa fa-paste"></i> 
                                                            <span class="bold">  </span>
                                                        </a>
                                                        <?php }?>
                                                      
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                </table>
                                <!-- table END -->
                            </div>
                            <!--             panel-body END -->
                        </div>
                        <!--        hpanel END -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label>  </label>
                        </div>
                        <div class="col-lg-12">
                            <label>  </label>
                        </div>
                    </div>
                </div>
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