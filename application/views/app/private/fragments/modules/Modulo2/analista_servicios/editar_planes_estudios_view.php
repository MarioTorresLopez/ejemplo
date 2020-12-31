<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">

    <!-- col-lg-12 START-->
    <div class="col-lg-12">

        <!-- hpanel START -->
        <div class="hpanel hblue">

            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Agregar plan de estudios
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <!--form START-->
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_planes_estudios/editar_plan_anterior" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Nombre de la institución</label>
                                    <input type="text" id="nom_institucion" class="form-control" name="nom_institucion" value="<?= $plan_estudios->nominstitucion ?>" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Número acuerdo</label>
                                    <input type="text" id="nom_acuerdo" class="form-control" name="nom_acuerdo" value="<?= $plan_estudios->nomacuerdo ?>" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Nivel educativo</label>
                                    <select class="js-source-states" style="width: 100%" name="nivel" id="nivel">
                                        <?php
                                        if (!is_null($niveles)) :
                                            foreach ($niveles as $nivel) :
                                                ?>
                                                <option <?php echo "value='$nivel->idnivel'"; ?> <?php if ($plan_estudios->idnivel == $nivel->idnivel) echo "selected" ?>><?php echo $nivel->nomnivel; ?></option>
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
                                    <label>Modalidad</label>
                                    <select class="js-source-states" style="width: 100%" name="modalidad" id="modalidad">
                                        <?php
                                        if (!is_null($modalidades)) :
                                            foreach ($modalidades as $modalidad) :
                                                ?>
                                                <option <?php echo "value='$modalidad->idmodalidad'"; ?> <?php if ($plan_estudios->idmodalidad == $modalidad->idmodalidad) echo "selected" ?>><?php echo $modalidad->nommodalidad; ?></option>
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
                                    <label>Plan de Estudios</label>
                                    <input type="text" id="plan_estudios" class="form-control" name="plan_estudios" value="<?= $plan_estudios->nomplanestudios ?>" style="text-transform: uppercase;">
                                    <input type="hidden" id="id_pe" class="form-control" name="id_pe" value="<?= $plan_estudios->idpe ?>" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Clave del plan de estudios</label>
                                    <input type="text" id="clave_plan_estudios" class="form-control" name="clave_plan_estudios" value="<?= $plan_estudios->claplanestudios ?>" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Especialidad</label>
                                    <?php if ($plan_estudios->idespecialidad === '0') { ?>
                                        <input type="text" id="especialidad" class="form-control" name="especialidad" value="N/A" style="text-transform: uppercase;">
                                        <input type="hidden" id="id_especialidad" class="form-control" name="id_especialidad" value="<?= $plan_estudios->idespecialidad ?>">
                                    <?php } else { ?>
                                        <input type="text" id="especialidad" class="form-control" name="especialidad" value="<?= $plan_estudios->nomespecialidad ?>" style="text-transform: uppercase;">
                                        <input type="hidden" id="id_especialidad" class="form-control" name="id_especialidad" value="<?= $plan_estudios->idespecialidad ?>">
                                    <?php } ?>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Tipo educativo</label>
                                    <select class="js-source-states" style="width: 100%" name="tipo_educativo" id="tipo_educativo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($tipos_educativos)) :
                                            foreach ($tipos_educativos as $tipo_educativo) :
                                                ?>
                                                <option <?php echo "value='$tipo_educativo->ideducativo'"; ?> <?php if ($plan_estudios->idtipedu == $tipo_educativo->ideducativo) echo "selected" ?>><?php echo $tipo_educativo->nomeducativo; ?></option>
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
                                    <label>Año de creación</label>
                                    <input type="text" id="fecha_creacion" class="form-control" name="fecha_creacion" value="<?= $plan_estudios->fechacreacion ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                        </form>
                        <!--form END-->

                    </div>
                    <!-- form-group col-lg-12 END -->

                </div> 
                <!-- ROW END --> 

                <div class="text-right m-t-xs">
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Editar plan de estudio</a>
                    <a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>
                </div>

            </div>
            <!--panel body END-->

        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END-->

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
