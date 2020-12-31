<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
                Registro de acuerdo
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body">


                <div class="text-center m-b-md" id="wizardControl">
                    <a class="btn btn-primary" href="#step1" id="tab1-tab">Paso 1 - Acuerdo</a>
                </div>

                <!-- TAB-CONTENT START -->
                <div class="tab-content">

                    <!-- STEP3 START -->
                    <div id="step1" class="p-m tab-pane active">
                        <div class="text-center">
                            <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                            <h1 class="">Agregar acuerdo</h1>
                        </div>

                        <!-- ROW START -->
                        <div class="row well well-lg">

                            <!-- FORM-GROUP COL-LG-12 START -->
                            <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                <!-- FORM START -->
                                <form name="form" novalidate id="form" action="<?= base_url() ?>analista/gestion_acuerdos/registrar_acuerdo_analista" method="post">

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Expediente</label>
                                            <input type="text" class="form-control" name="folio" id="folio" value="<?= $institucion->folio ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Tipo de proceso</label>
                                            <input type="text" id="tipo_proceso" class="form-control" name="tipo_proceso" value="Incorporación" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Plan y programa de estudios</label>
                                            <input type="hidden" class="form-control" name="nombre_plan_estudios"  id="nombre_plan_estudios" value="<?= $institucion->planinsti ?>">
                                            <input type="text" class="form-control" name="nombre_plan_estudios"  id="nombre_plan_estudios" value="<?= $institucion->planinsti ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Modalidad</label>
                                            <input type="hidden" class="form-control" name="modalidad"  id="modalidad" value="<?= $institucion->modinsti ?>">
                                            <input type="text" class="form-control" name="modalidad"  id="modalidad" value="<?= $institucion->modalidadinsti ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Tipo proceso</label>
                                            <select class="js-source-states" style="width: 100%" name="tipo_proceso" id="tipo_proceso">
                                                <option>---Seleccione---</option>
                                    <?php
                                    if (!is_null($tipo_procesos)) :
                                        foreach ($tipo_procesos as $tipo_proceso) :
                                            ?>
                                                                                                <option value="<?= $tipo_proceso->idproceso ?>"><?= $tipo_proceso->nombreproceso ?></option>      
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    -->

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Número de acuerdo</label>
                                            <input type="text" class="form-control" name="numero_acuerdo" id="numero_acuerdo" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Persona</label>
                                            <input type="hidden" id="persona" class="form-control" name="persona" value="<?= $institucion->personainsti ?>">
                                            <input type="hidden" id="idinstitucion" class="form-control" name="idinstitucion" value="<?= $institucion->idinsti ?>">
                                            <input type="text" id="desc_persona" class="form-control" name="desc_persona" value="<?php if ($institucion->personainsti == '1') { ?> FÍSICA <?php } else { ?> MORAL  <?php } ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Fecha de inicio de vigencia</label>
                                            <input type="date" class="form-control" name="fecha_inicio_vigencia"  id="fecha_inicio_vigencia">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Fecha de fin de vigencia</label>
                                            <input type="date" class="form-control" name="fecha_fin_vigencia"  id="fecha_fin_vigencia">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Nivel educativo</label>
                                            <input type="hidden" id="nivel" class="form-control" name="nivel" value="<?= $institucion->nivelinsti ?>">
                                            <input type="text" id="desc_nivel" class="form-control" name="desc_nivel" value="<?= $institucion->nivelninsti ?>" disabled>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Ciclo escolar de inicio</label>
                                            <select class="js-source-states" style="width: 100%" name="ciclo" id="ciclo">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($ciclos)) :
                                                    foreach ($ciclos as $ciclo) :
                                                        ?>
                                                        <option value="<?= $ciclo->idciclo ?>"><?= $ciclo->tiempo ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Tipo de alumnado</label>
                                            <select class="js-source-states" style="width: 100%" name="alumnado" id="alumnado">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($alumnado)) :
                                                    foreach ($alumnado as $alum) :
                                                        ?>
                                                        <option value="<?= $alum->idtipoalumnado ?>"><?= $alum->tipoalumnado ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Turno</label>
                                            <select class="js-source-states" style="width: 100%" name="turno" id="turno">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($turnos)) :
                                                    foreach ($turnos as $turno) :
                                                        ?>
                                                        <option value="<?= $turno->idturno ?>"><?= $turno->descturno ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Grupos autorizados</label>
                                            <input type="text" id="grupos_autorizado" class="form-control" name="grupos_autorizado" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Alumnos autorizados</label>
                                            <input type="text" id="alumnos_autorizado" class="form-control" name="alumnos_autorizado" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Nombre de la institución</label>
                                            <input type="text" id="nombre_institucion" class="form-control" name="nombre_institucion" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Clave de centro de trabajo</label>
                                            <input type="text" id="clave_institucion" class="form-control" name="clave_institucion" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Correo electrónico</label>
                                            <input type="text" id="correo_institucion" class="form-control" name="correo_institucion" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Nombre completo del director</label>
                                            <input type="text" id="director_institucion" class="form-control" name="director_institucion" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                            <span class="help-block"></span>
                                        </div>
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

                                    <?php endif ?>

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

                                    <?php if ($institucion->personainsti == 0) { ?>
                                        <!--  datos de una persona moral-->
                                        <div class="col-sm-12">
                                            <label><h3>Asociación Moral</h3></label>
                                        </div>
                                        <div class="form-group"> 
                                            <div class="col-sm-12">
                                                <label>Nombre</label>
                                                <?php if (!is_null($datos_persona_moral)) { ?>    
                                                    <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="<?= $datos_persona_moral->nombre ?>" disabled="disabled">
                                                <?php } else { ?>
                                                    <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="" disabled="disabled">
                                                <?php } ?>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <div class=" col-sm-12">
                                        <label><h3>Dirección de la institución</h3></label>
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Calle</label>
                                        <input type="text" name="calle_inst" id="calle_inst" class="form-control" value="<?= $institucion->calleinsti ?>" disabled="disabled">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Número exterior</label>
                                        <input type="text" name="num_int_inst" id="num_int_inst" class="form-control" value="<?= $institucion->nointinsti ?>" disabled="disabled">
                                    </div>
                                    <div class="col-sm-4">
                                        <label>Número interior</label>
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
                                    <div class="col-sm-4">
                                        <label>Teléfono</label>
                                        <input type="text" name="telefono_inst" id="telefono_inst" class="form-control" value="<?= $institucion->telefonoinsti ?>" disabled="disabled">
                                    </div>     


                                    <div class=" col-sm-12">
                                        <label><h3>Analista que llevó el trámite</h3></label>
                                    </div>
                                    <div class="col-sm-12">
                                        <label>Nombre completo</label>
                                        <input type="text" name="nombre_analista" id="nombre_analista" class="form-control" value="<?= $institucion->nombreanalista ?>" disabled="disabled">
                                    </div>


                                </form>
                                <!-- FORM END -->

                            </div>
                            <!-- FORM-GROUP COL-LG-12 END -->

                        </div> 
                        <!-- ROW END --> 

                        <div class="text-right m-t-xs">
                            <a class="btn btn-primary submitWizard" href="#" id="btnvalidar">Agregar acuerdo</a>
                            <a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>
                        </div>
                    </div>
                    <!-- STEP3 END -->

                </div>
                <!-- TAB-CONTENT END -->

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