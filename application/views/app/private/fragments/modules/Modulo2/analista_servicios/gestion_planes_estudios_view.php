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
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_planes_estudios/agregar_plan_estudios" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Acuerdo</label>
                                    <select class="js-source-states" style="width: 100%" name="idacuerdo" id="idacuerdo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($acuerdos)) :
                                            foreach ($acuerdos as $acuerdo) :
                                                ?>
                                                <option value="<?= $acuerdo->idacuerdo ?>"><?= $acuerdo->idacuerdo ?></option>      
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                    <span class="help-block"></span>
                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $institucion->idinstitucion ?>">
                                </div>
                            </div>
                            
                            <div id="d1" name="d1">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nivel educativo</label>
                                        <input type="text" id="" class="form-control" name="" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Modalidad</label>
                                        <input type="text" id="" class="form-control" name="" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div> 

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Plan de Estudios</label>
                                    <input type="text" id="plan_estudios" class="form-control" name="plan_estudios" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Clave del plan de estudios</label>
                                    <input type="text" id="clave_plan_estudios" class="form-control" name="clave_plan_estudios" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Especialidad</label>
                                    <select class="js-source-states" style="width: 100%" name="especialidad" id="especialidad">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($especialidades)) :
                                            foreach ($especialidades as $especialidad) :
                                                ?>
                                                <option value="<?= $especialidad->idespecialidad ?>"><?= $especialidad->nomespecialidad ?></option>      
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
                                    <label>Tipo educativo</label>
                                    <select class="js-source-states" style="width: 100%" name="tipo_educativo" id="tipo_educativo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($tipos_educativos)) :
                                            foreach ($tipos_educativos as $tipo_educativo) :
                                                ?>
                                                <option value="<?= $tipo_educativo->ideducativo ?>"><?= $tipo_educativo->nomeducativo ?></option>      
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
                                    <input type="text" id="fecha_creacion" class="form-control" name="fecha_creacion" placeholder="*CAMPO REQUERIDO">
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
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Agregar plan de estudio</a>
                    <a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>
                </div>

            </div>
            <!--panel body END-->

        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END-->

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
                Planes de estudios agregados
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- row START -->
                <div class="row">

                    <!-- TABLE-RESPONSIVE START -->
                    <div class="table-responsive">

                        <!-- table START -->
                        <table id="example2" class="table table-striped table-bordered table-hover">

                            <!-- thead START -->
                            <thead>

                                <tr> 
                                    <th>Nombre</th>
                                    <th>Clave</th>
                                    <th>Nivel educativo</th>
                                    <th>Tipo educativo</th>
                                    <th>Especialidad</th>
                                    <th>Modalidad</th>
                                    <th>Mapa curricular</th>
                                </tr>

                            </thead>
                            <!--thead END -->

                            <!--tbody START -->
                            <tbody>
                                <?php
                                if (!is_null($planes_estudios)) :
                                    foreach ($planes_estudios as $plan_estudios) :
                                        ?>
                                        <tr>
                                            <td><?= $plan_estudios->nomplanestudios ?></td>
                                            <td><?= $plan_estudios->claplanestudios ?></td>
                                            <td><?= $plan_estudios->nomnivel ?></td>
                                            <td><?= $plan_estudios->nomeducativo ?></td>
                                            <td><?= $plan_estudios->nomespecialidad ?></td>
                                            <td><?= $plan_estudios->nommodalidad ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>analista_servicios/gestion_mapa_curricular/mc_pe/<?= $institucion->idinstitucion ?>/<?= $plan_estudios->idpe ?>">
                                                    <button class="btn btn-info btn-block" type="button">
                                                        Crear 
                                                        <i class="fa pe-7s-note2"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                            <!--tbody END -->

                        </table>
                        <!-- table END -->

                    </div>
                    <!-- TABLE-RESPONSIVE END -->    

                </div>
                <!-- row END -->

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
    </div>
    <!-- ROW END -->

</div>

