
<?php
/**
 * Vista para el registro de institucion para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para verifcar los datos del usuario que los subio(Institucion) y adjuntar los documentos en formato digitalizado a la plataforma.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /detalle
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/gestion_institucion_analista
 */
?>
<?php
if (!is_null($modals)):
    foreach ($modals as $modal):
        ?>
        <?= $modal ?>
        <?php
    endforeach;
endif;
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
                Registro de institución
                <input type="hidden" class="form-control" id="idprimerparametro" name="idprimerparametro" value="<?= $otro2 ?>">
                <input type="hidden" class="form-control" id="idsegundoparametro" name="idsegundoparametro" value="<?= $otro ?>">
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <?php if ($institucion->estatusinsti === '2' || $institucion->estatusinsti === '8' || $institucion->estatusinsti === '7') { ?>
                            <a class="btn btn-primary" id="tab1-tab" disabled="disabled">Datos institución</a>    
                        <?php } else { ?>
                            <a class="btn btn-primary" id="tab1-tab" disabled="disabled">Datos solicitud</a>
                            <a class="btn btn-default" id="tab2-tab" disabled="disabled">Documentos generales</a>
                            <a class="btn btn-default" id="tab3-tab" disabled="disabled">Documentos institución</a>
                            <a class="btn btn-default" id="tab4-tab" disabled="disabled">Validar documentación</a>
                        <?php } ?>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-right m-t-xs">
                                <!--<a class="btn btn-default prev" href="#">Anterior</a>-->
                                <?php if ($institucion->estatusinsti === '2') { ?>
                                    <button class="btn btn-primary aceptacion" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span> Aceptar información para incorporación
                                    </button>
    <!--                                    <button class="btn btn-danger eliminacion" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-times"></i> 
                                        <span class="bold"> </span> Cancelar solicitud
                                    </button>-->
                                <?php } else if ($institucion->estatusinsti === '8') { ?>
                                    <button class="btn btn-primary habilitar" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span> Habilitar trámite
                                    </button>
                                <?php } else if ($institucion->estatusinsti === '7') { ?>

                                <?php } else { ?>
                                    <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                <?php } ?>
                            </div>

                            <div class="text-center">
                                <i class="pe-7s-user fa-5x text-muted"></i>
                                <h1 class="">Datos</h1>
                            </div>


                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- COL-LG-12 START -->
                                <div class="col-lg-12">

                                    <!-- ROW START -->
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <label><h3>Institución</h3></label>
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Persona</label>


                                            <input type="text" name="persona_inst" id="persona_inst" class="form-control" 
                                                   value="<?php if ($institucion->personainsti == '1') { ?> FÍSICA <?php } else { ?> MORAL  <?php } ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Nivel educativo</label>
                                            <input type="text" name="nivel_inst" id="nivel_inst" class="form-control" value="<?= $institucion->nivelninsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Modalidad</label>
                                            <input type="text" name="modalidad" id="modalidad" class="form-control" value="<?= $institucion->modalidadinsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Plan y programa de estudios</label>
                                            <input type="text" name="nombre_plan" id="nombre_plan" class="form-control" value="<?= $institucion->planinsti ?>" disabled="disabled">
                                        </div>

                                        <div class="col-sm-4">
                                            <label>Teléfono institución</label>
                                            <input type="text" name="telefono_inst" id="telefono_inst" class="form-control" value="<?= $institucion->telefonoinsti ?>" disabled="disabled">
                                        </div>


                                        <div class=" col-sm-12">
                                            <label><h3>Posibles nombres</h3></label>
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nombre 1</label>
                                            <input type="text" name="nom1_inst" id="nom1_inst" class="form-control" value="<?= $institucion->terna1insti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nombre 2</label>
                                            <input type="text" name="nom2_inst" id="nom2_inst" class="form-control" value="<?= $institucion->terna2insti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-12">
                                            <label>Nombre 3</label>
                                            <input type="text" name="nom3_inst" id="nom3_inst" class="form-control" value="<?= $institucion->terna3insti ?>" disabled="disabled">
                                        </div>


                                        <div class=" col-sm-12">
                                            <label><h3>Domicilio de la institución</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Calle</label>
                                            <input type="text" name="calle_inst" id="calle_inst" class="form-control" value="<?= $institucion->calleinsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Número interior</label>
                                            <input type="text" name="num_int_inst" id="num_int_inst" class="form-control" value="<?= $institucion->nointinsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Número exterior</label>
                                            <input type="text" name="num_ext_inst" id="num_ext_inst" class="form-control" value="<?= $institucion->noextinsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Colonia</label>
                                            <input type="text" name="col_inst" id="col_inst" class="form-control" value="<?= $institucion->coloniainsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Código postal</label>
                                            <input type="text" name="cp_inst" id="cp_inst" class="form-control" value="<?= $institucion->cpinsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Entidad federativa</label>
                                            <input type="text" name="ent_inst" id="ent_inst" class="form-control" value="<?= $institucion->estaninsti ?>" disabled="disabled">
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Municipio</label>
                                            <input type="text" name="mun_inst" id="mun_inst" class="form-control" value="<?= $institucion->munininsti ?>" disabled="disabled">
                                        </div>


                                        <?php if (!is_null($datos_prop)): ?>

                                            <div class="col-sm-12">
                                                <label><h3>Datos del propietario</h3></label>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Apellido 1</label>
                                                    <input type="text" name="a1propie" id="a1propie" class="form-control" value="<?= $datos_prop->apellido1 ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Apellido 2</label>
                                                    <input type="text" name="a2propie" id="a2propie" class="form-control" value="<?= $datos_prop->apellido2 ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Nombre(s)</label>
                                                    <input type="text" name="nompropie" id="nompropie" class="form-control" value="<?= $datos_prop->nompropietario ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Teléfono</label>
                                                    <input type="text" name="telefonopropie" id="telefonopropie" class="form-control" value="<?= $datos_prop->telefono ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Correo</label>
                                                    <input type="text" name="correopropie" id="correopropie" class="form-control" value="<?= $datos_prop->correo ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>RFC</label>
                                                    <input type="text" name="rfcpropie" id="rfcpropie" class="form-control" value="<?= $datos_prop->rfc ?>" disabled="disabled">
                                                </div>
                                            </div>

                                        <?php endif ?>


                                        <?php if (!is_null($datos_notificacion)): ?>

                                            <div class=" col-sm-12">
                                                <label><h3>Domicilio para oir y recibir notificaciones</h3></label>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Calle</label>
                                                    <input type="text" name="calleoirnotificacion" id="calleoirnotificacion" class="form-control" value="<?= $datos_notificacion->calle ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Número interior</label>
                                                    <input type="text" name="nointoirnotificacion" id="nointoirnotificacion" class="form-control" value="<?= $datos_notificacion->noint ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Número exterior</label>
                                                    <input type="text" name="noextoirnotificacion" id="noextoirnotificacion" class="form-control" value="<?= $datos_notificacion->noext ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Colonia</label>
                                                    <input type="text" name="coloniaoirnotificacion" id="coloniaoirnotificacion" class="form-control" value="<?= $datos_notificacion->colonia ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Código postal</label>
                                                    <input type="text" name="cpoirnotificacion" id="cpoirnotificacion" class="form-control" value="<?= $datos_notificacion->cp ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <!-- datos de otra tabla start -->
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Entidad federativa:</label>
                                                    <input type="text" name="estaoirnotificacion" id="estaoirnotificacion" class="form-control" value="<?= $datos_notificacion->estaoirnotificacion ?>" disabled="disabled">
                                                </div>
                                            </div>
                                            <!-- datos de otra tabla start -->
                                            <div class="form-group">
                                                <div class="col-lg-4">
                                                    <label>Municipio:</label>
                                                    <input type="text" name="munioirnotificacion" id="munioirnotificacion" class="form-control" value="<?= $datos_notificacion->munioirnotificacion ?>" disabled="disabled">
                                                </div>
                                            </div>

                                        <?php endif ?>

                                        <!-- Datos de una persona moral-->
                                        <?php if ($institucion->personainsti == 0) { ?>

                                            <div class="col-sm-12">
                                                <label><h3>Asociación Moral</h3></label>
                                            </div>
                                            <div class="form-group"> 
                                                <div class="col-sm-4">
                                                    <label>Nombre</label>
                                                    <?php if (!is_null($datos_persona_moral)) { ?>    
                                                        <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="<?= $datos_persona_moral->nombre ?>" disabled="disabled">
                                                    <?php } else { ?>
                                                        <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="" disabled="disabled">
                                                    <?php } ?>
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <!--  Datos del representante -->
                                        <?php
                                        if (!is_null($datos_repre)):
                                            foreach ($datos_repre as $rp):
                                                ?>

                                                <div class="row col-lg-12" id="row_media" >
                                                    <div class="col-sm-12">
                                                        <label><h3>Datos del representante</h3></label>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Apellido 1</label>
                                                            <input type="text" name="a1repre" id="a1repre" class="form-control" value="<?= $rp->apellido1 ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Apellido 2</label>
                                                            <input type="text" name="a2repre" id="a2repre" class="form-control" value="<?= $rp->apellido2 ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Nombre(s)</label>
                                                            <input type="text" name="nomrepre" id="nomrepre" class="form-control" value="<?= $rp->nombre ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Teléfono</label>
                                                            <input type="text" name="telrepre" id="telrepre" class="form-control" value="<?= $rp->telefono ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php
                                            endforeach;
                                        endif;
                                        ?>

                                    </div>
                                    <!-- ROW END -->

                                </div>
                                <!-- COL-LG-12 END -->

                            </div>
                            <!-- ROW END -->

                            <div class="text-right m-t-xs">
                                <!--<a class="btn btn-default prev" href="#">Anterior</a>-->
                                <?php if ($institucion->estatusinsti === '2') { ?>
                                    <button class="btn btn-primary aceptacion" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span> Aceptar información para incorporación
                                    </button>
    <!--                                    <button class="btn btn-danger eliminacion" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-times"></i> 
                                        <span class="bold"> </span> Cancelar solicitud
                                    </button>-->
                                <?php } else if ($institucion->estatusinsti === '8') { ?>
                                    <button class="btn btn-primary habilitar" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span> Habilitar trámite de incorporación
                                    </button>
                                <?php } else if ($institucion->estatusinsti === '7') { ?>

                                <?php } else { ?>
                                    <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                <?php } ?>
                            </div>
                        </div>
                        <!-- STEP1 END -->


                        <!-- STEP2 START -->
                        <div id="step2" class="p-m tab-pane">
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                <h1 class="">Listado de documentación</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <?php if ($institucion->personainsti == '1') { ?>
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Acta de nacimiento del propietario</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="1" id="btn_desplegar1">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="1" id="btn_desplegar1">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="1" id="btn_desplegar1">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                            <input type="hidden" class="form-control" id="idInst" name="idInstitucion" value="<?= $institucion->idinsti ?>">
                                        </div>
                                        <div id="div_desplegar1" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary " value="1" id="btn_aceptado1">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary " value="1" id="btn_aceptado1">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info pruebaBit" value="1" id="btn_comentarioBitacora1">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div id="div_comentarioBitacora1" class="col-sm-12">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora1" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="1" id="btn_enviar_comentarioBitacora1" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Identificación oficial vigente con fotografía del propietario</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="2" id="btn_desplegar2">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="2" id="btn_desplegar2">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="2" id="btn_desplegar2">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar2" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="2" id="btn_aceptado2">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="2" id="btn_aceptado2">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info pruebaBit" value="2" id="btn_comentarioBitacora2">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora2">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora2" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="2" id="btn_enviar_comentarioBitacora2" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php } else if ($institucion->personainsti == '0') { ?>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Acta de nacimiento del representante o representantes legales</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="5" id="btn_desplegar3">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="5" id="btn_desplegar3">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="5" id="btn_desplegar3">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar3" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="5" id="btn_aceptado3">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="5" id="btn_aceptado3">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info pruebaBit" value="5" id="btn_comentarioBitacora3">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora3">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora3" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="5" id="btn_enviar_comentarioBitacora3" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Identificación oficial vigente con fotografía del representante o representantes legales</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="4" id="btn_desplegar4">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="4" id="btn_desplegar4">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="4" id="btn_desplegar4">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar4" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="4" id="btn_aceptado4">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="4" id="btn_aceptado4">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info pruebaBit" value="4" id="btn_comentarioBitacora4">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora4">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora4" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="4" id="btn_enviar_comentarioBitacora4" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Acta constitutiva</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="3" id="btn_desplegar6">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="3" id="btn_desplegar6">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="3" id="btn_desplegar6">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar6" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="3" id="btn_aceptado6">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="3" id="btn_aceptado6">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info pruebaBit" value="3" id="btn_comentarioBitacora6">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora6">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora6" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="3" id="btn_enviar_comentarioBitacora6" id="btn_enviar_comentarioBitacora4" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                <?php } ?>

                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Ocupación legal del inmueble</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="26" id="btn_desplegar7">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar7" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado7">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado7">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success " value="26" id="btn_comentarioBitacora7">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora7">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora7" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora7" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->


                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Croquis de ubicación del inmueble</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="61" id="btn_desplegar10">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar10" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="61" id="btn_aceptado10">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="61" id="btn_aceptado10">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success " value="61" id="btn_comentarioBitacora8">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora8">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora8" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="61" id="btn_enviar_comentarioBitacora8" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->


                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Cédula profesional del perito</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="11" id="btn_desplegar11">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar11" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="11" id="btn_aceptado11">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="11" id="btn_aceptado11">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success" value="11" id="btn_comentarioBitacora9">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora9">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora9" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="11" id="btn_enviar_comentarioBitacora9" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->

                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Acreditación legal del inmueble (estructura pública)</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="6" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar12" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="6" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="6" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success btnBitacora" value="6" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="6" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Acreditación legal del inmueble (contrato de arrendamiento)</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="7" id="btn_desplegar13">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar13" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="7" id="btn_aceptado13">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="7" id="btn_aceptado13">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success btnBitacora" value="7" id="btn_comentarioBitacora11">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora11">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora11" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="7" id="btn_enviar_comentarioBitacora11" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Acreditación legal del inmueble (contrato de comodato)</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <button type="button" class="btn btn-info" value="8" id="btn_desplegar14">Revisar <i class="fa fa-pencil"></i></button>
                                    </div>
                                    <div id="div_desplegar14" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="8" id="btn_aceptado14">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="8" id="btn_aceptado14">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-success btnBitacora" value="8" id="btn_comentarioBitacora12">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora12">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora12" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="8" id="btn_enviar_comentarioBitacora12" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->

                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Ocupación legal del inmueble</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar12" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Dictamen de uso de suelo</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar15" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Constancia de seguridad estructural</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar16" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Visto bueno de protección civil municipal</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar17" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>


                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Certificado del número oficial</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar18" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->

                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Recibo de pago de derechos</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                        <?php if ($institucion->estatusinsti === '1') { ?>
                                            <button type="button" class="btn btn-default" value="56" id="btn_desplegar19">Revisar <i class="fa fa-pencil"></i></button>
                                        <?php } else if ($institucion->estatusinsti === '3') { ?>
                                            <button type="button" class="btn btn-primary" value="56" id="btn_desplegar19">Analizar <i class="fa fa-pencil"></i></button>
                                            <?php
                                        } else if ($institucion->estatusinsti === '4') {
                                            ?>
                                            <button type="button" class="btn btn-success" value="56" id="btn_desplegar19">Supervisión <i class="fa fa-pencil"></i></button>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div id="div_desplegar19" class="col-sm-12">
                                        <?php if ($institucion->estatusinsti === '1') { ?>
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-primary" value="56" id="btn_aceptado19">Recibido <i class="fa fa-check"></i></button>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-primary" value="56" id="btn_aceptado19">Analizado <i class="fa fa-check"></i></button>
                                            </div>
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-info btnBitacora pruebaBit" value="56" id="btn_comentarioBitacora17">Comentario bitácora <i class="fa fa-comment"></i></button>
                                            </div>
<!--                                            <div class="col-sm-12" id="div_comentarioBitacora17">
                                                <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                <div class="textarea" id="text_comentarioBitacora17" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                <span class="help-block"></span>
                                                <button type="button" class="btn btn-primary btnBitacora" x="56" id="btn_enviar_comentarioBitacora17" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                            </div>-->
                                        <?php } ?>
                                    </div>
                                </div>


                                <!--
                                <div class="row well well-lg">
                                    <div class="col-sm-12">
                                        <label><h3>Plano arquitectónico del inmueble</h3></label>
                                    </div>
                                    <div class="col-sm-12" style="margin-top: 10px;">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                    <?php
                                } else if ($institucion->estatusinsti === '4') {
                                    ?>
                                                                                            <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                    <?php
                                }
                                ?>
                                    </div>
                                    <div id="div_desplegar20" class="col-sm-12">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                                                                </div>
                                <?php } else { ?>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                    <button type="button" class="btn btn-info btnBitacora" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                </div>
                                                                                                <div class="col-sm-12" id="div_comentarioBitacora18">
                                                                                                    <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                    <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                    <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                </div>
                                <?php } ?>
                                    </div>
                                </div>
                                -->


                            </div>
                            <!-- ROW END -->  

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP2 END -->


                        <!-- STEP3 START -->
                        <div id="step3" class="p-m tab-pane">
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant3" id="btnprevStep3" href="#step2" data-toggle="tab">Anterior</a>
                                <a class="btn btn-default next sig3" href="#step4" data-toggle="tab" id="btnnextStep3">Siguiente</a>
                            </div>
                            <div class="text-center">
                                <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                <h1 class="">Listado de documentación</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!--    VERIFICAR LOS ID DE CADA BOTON DE INICIAL Y DE BASICA-->
                                <!-- EDUCACIÓN INICIAL START-->
                                <?php if ($institucion->nivelinsti == '11') { ?>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Educación inicial (plantilla de personal docente y directivo)</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="58" id="btn_desplegar21">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="58" id="21">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="58" id="btn_desplegar21">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar21" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="58" id="btn_comentarioBitacora19">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div id="div_comentarioBitacora19" class="col-sm-12">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacoraE" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span> 
                                                    <button type="button" class="btn btn-primary btnBitacora" x="58" id="btn_enviar_comentarioBitacora19" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Descripción de instalaciones educación inicial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="63" id="btn_desplegar32">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="63" id="btn_desplegar32">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="63" id="btn_desplegar32">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar32" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="63" id="btn_comentarioBitacora32">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora32">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora32" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span> 
                                                    <button type="button" class="btn btn-primary btnBitacora" x="63" id="btn_enviar_comentarioBitacora32" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Ocupación legal del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar12" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Dictamen de uso de suelo</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar15" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>                                                  
                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Constancia de seguridad estructural</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar16" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Visto bueno de protección civil municipal</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar17" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Certificado del número oficial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar18" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plano arquitectónico del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar20" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora18">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Inventario de las Instalaciones</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="59" id="btn_desplegar22">Revisar <i class="fa fa-pencil"></i></button>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar22" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="59" id="btn_comentarioBitacora20">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div id="div_comentarioBitacora20" class="col-sm-12">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora20" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="59" id="btn_enviar_comentarioBitacora20" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->

                                <?php } ?>
                                <!-- EDUCACIÓN INICIAL END -->


                                <!-- EDUCACIÓN BÁSICA START -->
                                <?php if ($institucion->nivelinsti == '12' || $institucion->nivelinsti == '13' || $institucion->nivelinsti == '14') { ?>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Educación básica (plantilla de personal docente y directivo)</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="58" id="btn_desplegar21">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="58" id="btn_desplegar21">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="58" id="btn_desplegar21">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar21" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="58" id="btn_comentarioBitacora19">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div id="div_comentarioBitacora19" class="col-sm-12">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora19" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span> 
                                                    <button type="button" class="btn btn-primary btnBitacora" x="58" id="btn_enviar_comentarioBitacora19" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Descripción de instalaciones educación básica</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="63" id="btn_desplegar32">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="63" id="btn_desplegar32">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="63" id="btn_desplegar32">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar32" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="63" id="btn_comentarioBitacora32">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora32">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora32" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="63" id="btn_enviar_comentarioBitacora32" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Ocupación legal del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar12" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Dictamen de uso de suelo</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar15" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Constancia de seguridad estructural</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar16" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Visto bueno de protección civil municipal</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar17" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Certificado del número oficial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar18" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plano arquitectónico del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar20" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora18">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Material bibliográfico</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="18" id="btn_desplegar23">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="18" id="btn_desplegar23">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="18" id="btn_desplegar23">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar23" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="18" id="btn_aceptado23">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="18" id="btn_aceptado23">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="18" id="btn_comentarioBitacora23">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div id="div_comentarioBitacora23" class="col-sm-12">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora23" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="18" id="btn_enviar_comentarioBitacora23" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Equipamiento de laboratorio polifuncional</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="66" id="btn_desplegar24">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="66" id="btn_desplegar24">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="66" id="btn_desplegar24">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar24" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="66" id="btn_aceptado24">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="66" id="btn_aceptado24">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="66" id="btn_comentarioBitacora21">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora21">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora21" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="66" id="btn_enviar_comentarioBitacora21" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Inventario de las instalaciones</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="59" id="btn_desplegar22">Revisar <i class="fa fa-pencil"></i></button>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar22" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="59" id="btn_comentarioBitacora20">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div id="div_comentarioBitacora20" class="col-sm-12">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora20" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="59" id="btn_enviar_comentarioBitacora20" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->


                                <?php } ?>
                                <!-- EDUCACIÓN BÁSICA END -->


                                <!-- EDUCACIÓN MEDIA SUPERIOR START -->
                                <?php if ($institucion->nivelinsti == '15') { ?>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Media superior (plantilla de personal docente y directivo)</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="58" id="btn_desplegar21">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="58" id="btn_desplegar21">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="58" id="btn_desplegar21">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" class="form-control" id="id_folio" name="id_folio" value="<?= $institucion->folio ?>">
                                            <input type="hidden" class="form-control" id="id_usu_rec" name="id_usu_rec" value="<?= $institucion->idusu ?>">
                                        </div>
                                        <div id="div_desplegar21" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="58" id="btn_aceptado21">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="58" id="btn_comentarioBitacora19">Comentario bitácora<i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div id="div_comentarioBitacora19" class="col-sm-12">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora19" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="58" id="btn_enviar_comentarioBitacora19" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Descripción de instalaciones educación media superior</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="63" id="btn_desplegar32">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="63" id="btn_desplegar32">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="63" id="btn_desplegar32">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar32" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="63" id="btn_comentarioBitacora32">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora32">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora32" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="63" id="btn_enviar_comentarioBitacora32" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Ocupación legal del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar12" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Dictamen de uso de suelo</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar15" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Constancia de seguridad estructural</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar16" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Visto bueno de protección civil municipal</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar17" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Certificado del número oficial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar18" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plano arquitectónico del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar20" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora18">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Equipamiento de laboratorio polifuncional</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="66" id="btn_desplegar24">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="66" id="btn_desplegar24">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="66" id="btn_desplegar24">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar24" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="66" id="btn_aceptado24">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="66" id="btn_aceptado24">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="66" id="btn_comentarioBitacora21">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora21">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora21" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="66" id="btn_enviar_comentarioBitacora21" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Inventario de las instalaciones</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="59" id="btn_desplegar22">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar22" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="59" id="btn_aceptado22">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="59" id="btn_comentarioBitacora20">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div id="div_comentarioBitacora20" class="col-sm-12">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora20" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="59" id="btn_enviar_comentarioBitacora20" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Instrumento de evaluación de nuevas oportunidades de programas educativos en educación superior, de planes y programas de estudio que no sean del área de la salud a_enopees</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="21" id="btn_desplegar25">Revisar <i class="fa fa-pencil"></i></button>
                                    <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="21" id="btn_desplegar25">Analizar <i class="fa fa-pencil"></i></button>
                                        <?php
                                    } else if ($institucion->estatusinsti === '4') {
                                        ?>
                                                                                            <button type="button" class="btn btn-success" value="21" id="btn_desplegar25">Supervisión <i class="fa fa-pencil"></i></button>
                                        <?php
                                    }
                                    ?>
                                        </div>
                                        <div id="div_desplegar25" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="21" id="btn_aceptado25">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="21" id="btn_aceptado25">Analizado <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-info btnBitacora" value="21" id="btn_comentarioBitacora22">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora22">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora22" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="21" id="btn_enviar_comentarioBitacora22" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    
                                    -->

                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Acervo bibliográfico</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="19" id="btn_desplegar26">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar26" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="19" id="btn_aceptado26">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="19" id="btn_aceptado26">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success" value="19" id="btn_comentarioBitacora23">Comentario <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora23">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora23" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="19" id="btn_enviar_comentarioBitacora23" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->

                                <?php } ?>
                                <!-- EDUCACIÓN MEDIA SUPERIOR END -->


                                <!-- EDUCACIÓN SUPERIOR START -->
                                <?php if ($institucion->nivelinsti == '16') { ?>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Ocupación legal del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar12" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Dictamen de uso de suelo</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar15" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Constancia de seguridad estructural</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar16" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Visto bueno de protección civil municipal</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar17" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Certificado del número oficial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar18" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plano arquitectónico del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar20" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora18">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Mapa curricular</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="28" id="btn_desplegar27">Revisar <i class="fa fa-pencil"></i></button>
                                    <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="28" id="btn_desplegar27">Analizar <i class="fa fa-pencil"></i></button>
                                        <?php
                                    } else if ($institucion->estatusinsti === '4') {
                                        ?>
                                                                                            <button type="button" class="btn btn-success" value="28" id="btn_desplegar27">Supervisión <i class="fa fa-pencil"></i></button>
                                        <?php
                                    }
                                    ?>
                                        </div>
                                        <div id="div_desplegar27" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="28" id="btn_aceptado27">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="28" id="btn_aceptado27">Analizado <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-info btnBitacora" value="28" id="btn_comentarioBitacora27">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora27">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora27" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="28" id="btn_enviar_comentarioBitacora27" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->

                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Programa de estudios</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="68" id="btn_desplegar28">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar28" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="68" id="btn_aceptado28">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="68" id="btn_aceptado28">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="68" id="btn_comentarioBitacora28">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora28">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora28" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="68" id="btn_enviar_comentarioBitacora28" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plataforma tecnológica educativa</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="69" id="btn_desplegar29">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar29" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="69" id="btn_aceptado29">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="69" id="btn_aceptado29">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="69" id="btn_comentarioBitacora29">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora29">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora29" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="69" id="btn_enviar_comentarioBitacora29" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Instalaciones especiales</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="23" id="btn_desplegar30">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar30" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="23" id="btn_aceptado30">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="23" id="btn_aceptado30">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-success btnBitacora" value="23" id="btn_comentarioBitacora30">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora30">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora30" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="23" id="btn_enviar_comentarioBitacora30" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->


                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>COEPES  formato autoevaluación (ENOPEES)</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-info" value="65" id="btn_desplegar31">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar31" class="col-sm-12">
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-primary" value="65" id="btn_aceptado31">Recibido <i class="fa fa-check"></i></button>
                                            </div>
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-warning" value="65" id="btn_comentario31">Comentario <i class="fa fa-comment"></i></button>
                                            </div>
                                            <div class="col-sm-12" id="div_comentario31">
                                                <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                <div class="textarea" id="text_comentario31" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                <button type="button" class="btn btn-primary" id="btn_enviar_comentario31">Enviar Comentario</button>
                                            </div>
                                            <div class="col-sm-4" style="margin-top: 10px;">
                                                <button type="button" class="btn btn-success" value="65" id="btn_comentarioBitacora31">Comentario bitácora <i class="fa fa-comment"></i></button>
                                            </div>
                                            <div class="col-sm-12" id="div_comentarioBitacora31">
                                                <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                <div class="textarea" id="text_comentarioBitacora31" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                <button type="button" class="btn btn-primary" id="btn_enviar_comentarioBitacora31">Enviar Comentario</button>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <!--
                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Descripción de instalaciones educación superior</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                            <button type="button" class="btn btn-default" value="63" id="btn_desplegar32">Revisar <i class="fa fa-pencil"></i></button>
                                    <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                                                            <button type="button" class="btn btn-primary" value="63" id="btn_desplegar32">Analizar <i class="fa fa-pencil"></i></button>
                                        <?php
                                    } else if ($institucion->estatusinsti === '4') {
                                        ?>
                                                                                            <button type="button" class="btn btn-success" value="63" id="btn_desplegar32">Supervisión <i class="fa fa-pencil"></i></button>
                                        <?php
                                    }
                                    ?>
                                        </div>
                                        <div id="div_desplegar32" class="col-sm-12">
                                    <?php if ($institucion->estatusinsti === '1') { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Recibido <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                    <?php } else { ?>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-primary" value="63" id="btn_aceptado32">Analizado <i class="fa fa-check"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-4" style="margin-top: 10px;">
                                                                                                        <button type="button" class="btn btn-info btnBitacora" value="63" id="btn_comentarioBitacora32">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                                                                    </div>
                                                                                                    <div class="col-sm-12" id="div_comentarioBitacora32">
                                                                                                        <span class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</span>
                                                                                                        <div class="textarea" id="text_comentarioBitacora32" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                                                                        <button type="button" class="btn btn-primary btnBitacora" x="63" id="btn_enviar_comentarioBitacora32" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                                                                    </div>
                                    <?php } ?>
                                        </div>
                                    </div>
                                    -->

                                <?php } ?>
                                <!-- EDUCACIÓN SUPERIOR END -->


                                <!-- EDUCACIÓN SUPERIOR ÁREA DE LA SALUD START -->
                                <?php if ($institucion->nivelinsti == '17') { ?>

                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Opinión Técnica Académica (OTA)</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <button type="button" class="btn btn-default" value="72" id="btn_desplegar30">Revisar <i class="fa fa-pencil"></i></button>
                                        </div>
                                        <div id="div_desplegar30" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="72" id="btn_aceptado30">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="72" id="btn_aceptado30">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-success btnBitacora pruebaBit" value="72" id="btn_comentarioBitacora30">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora30">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora30" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="72" id="btn_enviar_comentarioBitacora30" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Ocupación legal del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="26" id="btn_desplegar12">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="26" id="btn_desplegar12">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="26" id="btn_desplegar12">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar12" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="26" id="btn_aceptado12">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="26" id="btn_comentarioBitacora10">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora10">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora10" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="26" id="btn_enviar_comentarioBitacora10" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Dictamen de uso de suelo</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="15" id="btn_desplegar15">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="15" id="btn_desplegar15">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="15" id="btn_desplegar15">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar15" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="15" id="btn_aceptado15">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="15" id="btn_comentarioBitacora13">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora13">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora13" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="15" id="btn_enviar_comentarioBitacora13" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>   


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Constancia de seguridad estructural</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="9" id="btn_desplegar16">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="9" id="btn_desplegar16">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="9" id="btn_desplegar16">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar16" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="9" id="btn_aceptado16">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="9" id="btn_comentarioBitacora14">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora14">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora14" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="9" id="btn_enviar_comentarioBitacora14" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Visto bueno de protección civil municipal</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="13" id="btn_desplegar17">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="13" id="btn_desplegar17">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="13" id="btn_desplegar17">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar17" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="13" id="btn_aceptado17">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="13" id="btn_comentarioBitacora15">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora15">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora15" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="13" id="btn_enviar_comentarioBitacora15" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Certificado del número oficial</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="16" id="btn_desplegar18">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="16" id="btn_desplegar18">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="16" id="btn_desplegar18">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar18" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="16" id="btn_aceptado18">Analizado <i class="fa fa-check"></i></button>
                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="16" id="btn_comentarioBitacora16">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>
<!--                                                <div class="col-sm-12" id="div_comentarioBitacora16">
                                                    <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                    <div class="textarea" id="text_comentarioBitacora16" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                    <span class="help-block"></span>
                                                    <button type="button" class="btn btn-primary btnBitacora" x="16" id="btn_enviar_comentarioBitacora16" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>    


                                    <div class="row well well-lg">
                                        <div class="col-sm-12">
                                            <label><h3>Plano arquitectónico del inmueble</h3></label>
                                        </div>
                                        <div class="col-sm-12" style="margin-top: 10px;">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <button type="button" class="btn btn-default" value="62" id="btn_desplegar20">Revisar <i class="fa fa-pencil"></i></button>
                                            <?php } else if ($institucion->estatusinsti === '3') { ?>
                                                <button type="button" class="btn btn-primary" value="62" id="btn_desplegar20">Analizar <i class="fa fa-pencil"></i></button>
                                                <?php
                                            } else if ($institucion->estatusinsti === '4') {
                                                ?>
                                                <button type="button" class="btn btn-success" value="62" id="btn_desplegar20">Supervisión <i class="fa fa-pencil"></i></button>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div id="div_desplegar20" class="col-sm-12">
                                            <?php if ($institucion->estatusinsti === '1') { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Recibido <i class="fa fa-check"></i></button>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-primary" value="62" id="btn_aceptado20">Analizado <i class="fa fa-check"></i></button>

                                                </div>
                                                <div class="col-sm-4" style="margin-top: 10px;">
                                                    <button type="button" class="btn btn-info btnBitacora pruebaBit" value="62" id="btn_comentarioBitacora18">Comentario bitácora <i class="fa fa-comment"></i></button>
                                                </div>

                                                <!--
                                                    <div class="col-sm-12" id="div_comentarioBitacora18">
                                                        <label class="placeholder">Escriba su comentario en el siguiente cuadro de texto.</label>
                                                        <div class="textarea" id="text_comentarioBitacora18" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                                        <span class="help-block"></span>
                                                        <button type="button" class="btn btn-primary btnBitacora" x="62" id="btn_enviar_comentarioBitacora18" data-id="<?= $institucion->idinsti ?>" data-usu="<?= $institucion->idusu ?>">Enviar Comentario</button>
                                                    </div>-->
                                            <?php } ?>
                                        </div>
                                    </div>


                                <?php } ?>
                                <!-- EDUCACIÓN SUPERIOR ÁREA DE LA SALUD END -->


                            </div>
                            <!-- ROW END -->  

                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant3" id="btnprevStep3" href="#step2" data-toggle="tab">Anterior</a>
                                <a class="btn btn-default next sig3" href="#step4" data-toggle="tab" id="btnnextStep3">Siguiente</a>
                            </div>
                        </div>
                        <!-- STEP3 END -->


                        <!-- STEP4 START -->
                        <div id="step4" class="tab-pane">
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant4" href="#step3" data-toggle="tab" id="btnprevStep4">Anterior</a>                           
                            </div>
                            <!-- ROW START -->
                            <div class="row text-center m-t-lg m-b-lg">
                                <?php if ($institucion->estatusinsti === '1') { ?>
                                    <button class="btn btn-primary revisiondocumentos btn-sm" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span> Se han recibido todos los documentos
                                    </button>
    <!--                             <button class="btn btn-danger eliminaciondocumentos  btn-block" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-times"></i> 
                                        <span class="bold"> </span> Cancelar solicitud
                                    </button>-->
                                <?php } else if ($institucion->estatusinsti === '3') { ?>
                                    <button class="btn btn-primary aceptaciondocumentos btn-sm" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span>Todos los documentos se encuentran en orden
                                    </button>
    <!--                               <button class="btn btn-danger eliminaciondocumentos btn-block" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-times"></i> 
                                        <span class="bold"> </span> Cancelar solicitud
                                    </button>-->
                                <?php } else if ($institucion->estatusinsti === '4') { ?>
                                    <button class="btn btn-primary acreditacionincorporacion btn-sm" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-check "></i> 
                                        <span class="bold"> </span>Se otorga acuerdo
                                    </button>
                                    <button class="btn btn-danger eliminacionincorporacion btn-sm" data-id="<?= $institucion->idinsti ?>" type="button">
                                        <i class="fa fa-times"></i> 
                                        <span class="bold"> </span> Se niega acuerdo
                                    </button>
                                <?php } ?>
                                <button class="btn btn-warning2 suspendersolicitudinco btn-sm" data-id="<?= $institucion->idinsti ?>" type="button">
                                    <i class="fa pe-7s-attention"></i> 
                                    <span class="bold"> </span> Suspender solicitud de incorporación
                                </button>
                            </div>
                            <!-- ROW END -->
                            <div class="text-right m-t-xs">
                                <a class="btn btn-default prev ant4" href="#step3" data-toggle="tab" id="btnprevStep4">Anterior</a>                           
                            </div>
                        </div>
                        <!-- STEP4 END -->

                    </div>
                    <!-- TAB-CONTENT END -->

                </form>
                <!-- FORM END -->
                <div class="row">

                    <?php if ($institucion->estatusinsti !== '7') { ?>
                        <!--                        cl-lg-6 START -->
                        <div class="col-lg-12">
                            <!--                            hpanel START -->
                            <div class="hpanel hblue">
                                <!--                                panel-heading START -->
                                <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                                    <!--                                    panel-tools START -->
                                    <div class="panel-tools">
                                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                    </div>
                                    <!--                                    panel-tools END 
                                                                        Agregar bitácora -->
                                </div>
                                <!--                                panel-heading END 
                                                                panel-body START -->
                                <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <input type="hidden" class="form-control" id="idinstitucion" name="idinstitucion" value="<?= $otro ?>">
                                            <input type="hidden" class="form-control" id="otro2" name="otro2" value="<?= $otro2 ?>">
                                            <input type="hidden" class="form-control" id="otro" name="otro" value="<?= $otro ?>">
                                            <label class="placeholder">Escriba su observación en el siguiente cuadro de texto.</label>
                                            <div class="textarea" id="comentario_bitacora" tabindex="0" role="textbox" aria-multiline="true" contenteditable="PLAINTEXT-ONLY" data-role="editable" aria-label="Join the discussion…" style="overflow: auto; word-wrap: break-word; max-height: 350px; background-color: #E8E5EC; text-transform: uppercase;"><p><br></p></div>
                                            <span class="help-block"></span>
                                            <button type="button" class="btn btn-primary" id="botonBit">Enviar Comentario</button>                                       
                                        </div>
                                    </div>
                                </div>
                                <!--                                panel-body END -->
                            </div>
                            <!--                            hpanel END -->
                        </div>   <!--        col-lg-6 END -->
                    <?php } ?>

                    <!--                    col-lg-12 START -->
                    <div class="col-lg-12">
                        <!--                        hpanel START-->
                        <div class="hpanel hblue">
                            <!--                            panel-heading START -->
                            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                                <!--                                panel-tools START -->
                                <div class="panel-tools">
                                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                </div>
                                <!--                                panel-tools END -->
                                Bitácora
                            </div>
                            <!--                            panel-heading END 
                                                        panel-body START -->
                            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
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
                                                        <?php if ($bitacora->idanalista == $this->session->userdata('idusu')) { ?>
                                                            <a class = "btn btn-info" href="<?= base_url() ?>analista/gestion_institucion/editar_bitacora/<?= $bitacora->idinstitucion ?>/<?= $bitacora->consecutivo ?>">
                                                                <i class="fa fa-paste"></i> 
                                                                <span class="bold">  </span>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a class = "btn btn-info" disabled>
                                                                <i class="fa fa-paste"></i> 
                                                                <span class="bold">  </span>
                                                            </a>
                                                        <?php } ?>

                                                    </td>
                                                </tr>

                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>

                                </table>
                                <!--                                table END -->
                            </div>
                            <!--                            panel-body END -->
                        </div>
                        <!--                        hpanel END -->
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

<script>
       jQuery(document).ready(function ($) {
        $(".btnBitacora").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
    });
    jQuery(document).ready(function ($) {
        $(".btn_enviar_comentarioBitacora18").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
         $(".btn_enviar_comentarioBitacora16").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
   $(".btn_enviar_comentarioBitacora15").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });

   $(".btn_enviar_comentarioBitacora14").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
 $(".btn_enviar_comentarioBitacora13").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
 $(".btn_enviar_comentarioBitacora10").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
 $(".btn_enviar_comentarioBitacora30").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
 $(".btn_enviar_comentarioBitacora21").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
 $(".btn_enviar_comentarioBitacora32").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora19").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora21").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora23").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora17").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora6").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora4").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora3").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora2").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora1").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
$(".btn_enviar_comentarioBitacora1").click(function (e) {
            $("#modal-addevento-data").modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        });
     
    });
  
</script>


