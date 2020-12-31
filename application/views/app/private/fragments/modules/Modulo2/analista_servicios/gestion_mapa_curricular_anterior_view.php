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
                Agregar mapa curricular
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <!--form START-->
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_mapa_curricular/crear_mapa_curricular_anterior" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Plan de estudios</label>
                                    <input type="text" id="nom_pe" class="form-control" name="nom_pe"  value="<?= $plan_estudios->nomplanestudios ?>" disabled>
                                    <input type="hidden" id="id_pe" class="form-control" name="id_pe" value="<?= $plan_estudios->idpe ?>">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Mapa curricular</label>
                                    <input type="text" id="mapa_curricular" class="form-control" name="mapa_curricular" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Periodo</label>
                                    <select class="js-source-states" style="width: 100%" name="periodo" id="periodo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($periodos)) :
                                            foreach ($periodos as $periodo) :
                                                ?>
                                                <option value="<?= $periodo->idperiodo ?>"><?= $periodo->nomperiodo ?></option>      
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
                                    <label>Número periodo</label>
                                    <select class="js-source-states" style="width: 100%" name="no_periodo" id="no_periodo">
                                        <option>---Seleccione---</option>
                                        <?php
                                        if (!is_null($noperiodos)) :
                                            foreach ($noperiodos as $noperiodo) :
                                                ?>
                                                <option value="<?= $noperiodo->idnoperiodo ?>"><?= $noperiodo->nomnoperiodo ?></option>      
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
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
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Agregar mapa curricular</a>
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
                Mapa(s) curricular(es)
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
                                    <th>Mapa curricular</th>
                                    <th>No.periodo</th>
                                    <th>Periodo</th>
                                    <th>Acciones</th>
                                    <th>Editar</th>
                                </tr>

                            </thead>
                            <!--thead END -->

                            <!--tbody START -->
                            <tbody>
                                <?php
                                if (!is_null($mapas_curriculares)) :
                                    foreach ($mapas_curriculares as $mapa_curricular) :
                                        ?>
                                        <tr>
                                            <td><?= $mapa_curricular->mapacurricular ?></td>
                                            <td><?= $mapa_curricular->nomnoperiodo ?></td>
                                            <td><?= $mapa_curricular->nomperiodo ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>analista_servicios/gestion_mapacurricular_materias/mc_materias_anteriores/<?= $idpe ?>/<?= $mapa_curricular->idmc ?>">
                                                    <button class="btn btn-info btn-block" type="button">
                                                        Añadir materias
                                                        <i class="fa fa-plus-circle"></i> 
                                                        <span class="bold">  </span>
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url() ?>analista_servicios/gestion_mapacurricular_materias/editar_mapa_curricular_anterior/<?= $mapa_curricular->idmc ?>/<?=$plan_estudios->idpe?>">
                                                    <button class="btn btn-info btn-block" type="button">
                                                        <i class="fa fa-paste"></i> 
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
                Agregar optativa
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <!--form START-->
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_mapa_curricular/crear_mapa_curricular_anterior" method="post">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Plan de estudios</label>
                                    <input type="text" id="nom_pe" class="form-control" name="nom_pe"  value="<?= $plan_estudios->nomplanestudios ?>" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>N° de optativa</label>
                                    <input type="text" id="no_optativa" class="form-control" name="no_optativa" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Nombre de optativa</label>
                                    <input type="text" id="nomb_optativa" class="form-control" name="nomb_optativa" placeholder="*Campo requerido" style="text-transform: uppercase;">
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
                    <a class="btn btn-primary agregar-optativa">Agregar optativa</a>
                    <!--<a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>-->
                </div>
                
                <div class="text-right m-t-xs">
                    <button class="btn btn-danger eliminar-optativa" type="button">
                        Eliminar
                        <i class="fa fa-trash-o"></i> 
                        <span class="bold"> </span>
                    </button>
                </div>
                
                <!-- ROW START -->
                <div class="row well well-lg">

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <form id="form_optativas" action="<?= base_url() ?>analista_servicios/gestion_mapa_curricular/crear_optativas" method="post">
                            <input type="hidden" id="optativas" name="optativas" value="">
                            <input type="hidden" id="id_pe" class="form-control" name="id_pe" value="<?= $plan_estudios->idpe ?>">
                            <table class="table table-striped table-bordered table-hover" id="tablaprueba">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>N° optativa</th>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </form>
                    </div>
                    <!-- form-group col-lg-12 END -->

                </div> 
                <!-- ROW END --> 
                <div class="text-right m-t-xs">
                    <a class="btn btn-primary anadir-optativa">Añadir optativas</a>
                    <!--<a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>-->
                </div>

            </div>
            <!--panel body END-->

        </div>
        <!-- hpanel END -->
    </div>
    
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
                Optativas
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- row START -->
                <div class="row">

                    <!-- TABLE-RESPONSIVE START -->
                    <div class="table-responsive">

                        <!-- table START -->
                        <table id="" class="table table-striped table-bordered table-hover">

                            <!-- thead START -->
                            <thead>

                                <tr>
                                    <th>N° optativa</th>
                                    <th>Nombre</th>
                                </tr>

                            </thead>
                            <!--thead END -->

                            <!--tbody START -->
                            <tbody>
                                <?php
                                if (!is_null($optativas)) :
                                    foreach ($optativas as $optativa) :
                                        ?>
                                        <tr>
                                            <td><?= $optativa->nuoptativa ?></td>
                                            <td><?= $optativa->nomoptativa ?></td>
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