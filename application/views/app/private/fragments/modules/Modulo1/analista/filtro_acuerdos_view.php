<?php
/**
 * Vista de busqueda de acuerdos mediante filtros
 *
 * Vista que muestra al usuario la interfaz grafica, donde se podra consultar
 * el listado de acuerdos que tiene registrados, buscando por nivel academico, institucion, plantel, carrera, especialidad, etc.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/analista/gestion_acuerdos
 */
?>

<!DOCTYPE html>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START-->

    <div class="col-lg-12">

        <!-- HPANEL START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Buscador
            </div>
            <!-- PANEL-HEADING END -->


            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    <a href="<?= base_url() ?>analista/gestion_acuerdos/sec_nuevo_acuerdo">
                        <button type="button" class="btn btn-primary">Agregar acuerdo</button>
                    </a>
                </div>


                <!-- PANEL-GROUP START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Nivel educativo

                    <select class="js-source-states" style="width: 100%" name="nivel_educativo" id="nivel_educativo">
                        <option>SELLECCIONE UNA OPCIÓN</option>
                        <?php
                        if (!is_null($niveles)) :
                            foreach ($niveles as $nivel) :
                                ?>
                                <option value="<?= $nivel->idnivel ?>"><?= $nivel->nomnivel ?></option>      
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <!-- PANEL-GROUP END -->

                <!-- PANEL-GROUP START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de instituciones

                    <select class="js-source-states" style="width: 100%" name="instituciones" id="institucion">
                        <option>SELECCIONE UNA OPCIÓN</option>
                        <?php
                        if (!is_null($instituciones)) :
                            foreach ($instituciones as $institucion) :
                                ?>
                                <option value="<?= $institucion->idinsti ?>"><?= $institucion->terna1ins ?></option>      
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <!-- PANEL-GROUP END -->

                <!-- PANEL-GROUP START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de planteles

                    <select class="js-source-states" style="width: 100%" name="plateles" id="plantel">
                        <option>SELECCIONE UNA OPCIÓN</option>
                        <?php
                        if (!is_null($planteles)) :
                            foreach ($planteles as $plantel) :
                                ?>
                                <option value="<?= $plantel->idpla ?>"><?= $plantel->nomcorpla ?></option>      
                                <?php
                            endforeach;
                        endif;
                        ?>                       
                    </select>
                </div>
                <!-- PANEL-GROUP END -->

                <!-- PANEL-GROUP START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de carreras del plantel 1

                    <select class="js-source-states" style="width: 100%" name="carreras">
                        <option>SELECCIONE UNA OPCIÓN</option>
                        <?php
                        if (!is_null($carreras)):
                            foreach ($carreras as $carrera):
                                ?>
                                <option values="<?= $carrera->idcarrera ?>"><?= $carrera->nomcarrera ?></option>
                                <?php
                            endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <!-- PANEL-GROUP END -->

                <!-- PANEL-GROUP START -->
                <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    Lista de especialidades de la carrera de TIC

                    <select class="js-source-states" style="width: 100%" name="especialidades">
                        <option>SELECCIONE UNA OPCIÓN</option>  
                        <?php 
                        if(!is_null($especialidades)):
                            foreach ($especialidades as $especialidad):
                        ?>
                        <option value="<?= $especialidad->idespecialidad ?>"><?= $especialidad->nomespecialidad ?></option>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </select>
                </div>
                <!-- PANEL-GROUP END -->

                <div class="text-right">
                    <a href="<?php base_url() ?>gestion_acuerdos/gestion"><button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="glyphicon glyphicon-search"></i> Consultar</strong></button></a>

                </div>

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL END -->

    </div>
    <!-- COL-LG-12 END -->

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
</div>