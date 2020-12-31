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
                Agregar grupo
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <!--form START-->
                        <form id="form" action="<?= base_url()?>analista_servicios/gestion_grupos/crear_grupo" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Número de acuerdo</label>
                                    <select class="js-source-states" style="width: 100%" name="no_acuerdo" id="no_acuerdo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($acuerdos_existentes)) :
                                            foreach ($acuerdos_existentes as $acuerdo_existente) :
                                                ?>
                                                <option value="<?= $acuerdo_existente->idacuerdo ?>"><?= $acuerdo_existente->noacuerdo ?></option>      
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
                                    <label>Nombre del grupo</label>
                                    <input type="text" id="nombre_grupo" class="form-control" name="nombre_grupo" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Número de alumnos</label>
                                    <input type="text" id="numero_alumnos" class="form-control" name="numero_alumnos" placeholder="*Campo requerido" style="text-transform: uppercase;">
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
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Agregar grupo</a>
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
                Grupos agregados
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!--row START-->
                <div class="row">
                    <!-- table START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <!-- thead START -->
                        <thead>

                            <tr>
                                <th>Número acuerdo</th>
                                <th>Nombre grupo</th>
                                <th>Número alumnos</th>
                            </tr>

                        </thead>
                        <!--thead END -->

                        <!--tbody START -->
                        <tbody>
                            <?php
                            if (!is_null($grupos_acuerdos)) :
                                foreach ($grupos_acuerdos as $ga) :
                                    ?>
                                    <tr>
                                        <td><?= $ga->noacuerdo ?></td>
                                        <td><?= $ga->grupo ?></td>
                                        <td><?= $ga->alumnosxgrupo ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                        <!--tbody END -->

                    </table>
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

