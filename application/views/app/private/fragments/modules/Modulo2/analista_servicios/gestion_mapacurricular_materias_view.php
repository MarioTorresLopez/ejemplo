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
                Agregar materia
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <!--form START-->
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_mapacurricular_materias/crear_mapa_curricular_materias" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Plan de estudios</label>
                                    <input type="text" id="nom_pe" class="form-control" name="nom_pe"  value="<?= $plan_estudios->nomplanestudios ?>" disabled>
                                    <input type="hidden" id="id_pe" class="form-control" name="id_pe" value="<?= $plan_estudios->idpe ?>">
                                    <input type="hidden" id="id_institucion" class="form-control" name="id_institucion" value="<?= $idinstitucion ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Mapa curricular</label>
                                    <input type="text" id="mapa_curricular" class="form-control" name="mapa_curricular" value="<?= $mapa_curricular->mapacurricular ?>" disabled>
                                    <input type="hidden" id="id_mc" class="form-control" name="id_mc" value="<?= $mapa_curricular->idmc ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Materia</label>
                                    <input type="text" id="materia" class="form-control" name="materia" placeholder="*Campo requerido" style="text-transform: uppercase;">
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
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Agregar materia</a>
                    <!--<a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>-->
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
                Materias por mapa curricular
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
                                    <th>Materia</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!is_null($materias_mc)) :
                                    foreach ($materias_mc as $materia_mc) :
                                        ?>
                                        <tr>
                                            <td><?= $materia_mc->asignatura ?></td>
                                            <td>                            
                                                <button class="btn btn-danger eliminacion" data-id="<?= $materia_mc->idmateria?>" data-mc="<?= $materia_mc->idmc?>" type="button">
                                                    <i class="fa fa-trash-o"></i> 
                                                    <span class="bold"> </span>
                                                </button>

                                            </td>
                                        </tr>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
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
        <div class="col-lg-12">
            <label>  </label>
        </div>

    </div>
    <!-- ROW END -->
</div>



