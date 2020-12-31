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
                        <form id="form" action="<?= base_url() ?>analista_servicios/gestion_mapacurricular_materias/editar_mapa_anterior" method="post">

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
                                    <input type="hidden" id="idmc" class="form-control" name="idmc" value="<?= $idmapa ?>">
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
                    <div class="text-right m-t-xs">
                        <a class="btn btn-primary validargrupo"  id="btnvalidar">Editar mapa curricular</a>
                        <a class="btn btn-danger" href="<?= base_url()?>analista_servicios/gestion_mapa_curricular/mc_pe_anterior/<?=$plan_estudios->idpe?>" id="btnvalidarcancelarMateria">Cancelar</a>
                    </div>

                    <!-- form-group col-lg-12 END -->

                </div> 
            </div> 
        </div> 
    </div> 
    </div> 
    <!-- ROW END --> 