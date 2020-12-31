<?php
/**
 * Vista de las calificaciones, visualizar el listado
 * de las calificaciones
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/calificacion_analista
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
                Calificaciones
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <div class="table-responsive">
                    <!-- table START -->
                    <table class="table table-striped table-bordered table-hover">
                        <!-- thead START-->
                        <thead>
                            <tr>
                                <th>PLAN DE ESTUDIOS: <?= $thead_calificaciones->nomcarrera ?></th>
                                <th>ESPECIALIDAD: 
                                    <?php if ($thead_calificaciones->nomespecialidad === NULL) { ?>
                                        N/A
                                    <?php } else { ?>
                                        <?= $thead_calificaciones->nomespecialidad ?>
                                    <?php } ?>
                                </th>
                                <th>GRUPO: <?= $thead_calificaciones->nomgrupo ?></th>
                                <th><?= $thead_calificaciones->nomnoperiodo ?> <?= $thead_calificaciones->nomperiodo ?></th>
                                <th >ALUMNO: <?= $thead_calificaciones->nomalumno ?></th>
                            </tr>
                            <tr>
                                <th>Materia</th>
                                <th>Calificación</th>
                                <th>Tipo de evaluación</th>
                                <th>Fecha examen</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <!-- thead END-->

                        <!-- tbody START-->
                        <tbody>
                            <?php
                            if (!is_null($calificaciones_alumno)) :
                                foreach ($calificaciones_alumno as $calificacion_alumno) :
                                    ?>
                                    <tr>
                                        <td><?= $calificacion_alumno->nommateria ?></td>
                                        <td><?= $calificacion_alumno->calificacion ?></td>
                                        <?php if ($calificacion_alumno->nomenclatura === '2' || $calificacion_alumno->nomenclatura === '3') { ?>
                                            <td style="background-color: red; color: #ffffff">
                                                <?= $calificacion_alumno->nomtipoevaluacion ?>
                                            </td>
                                        <?php } else { ?>
                                            <td>
                                                <?= $calificacion_alumno->nomtipoevaluacion ?>
                                            </td>
                                        <?php } ?>
                                        <td><?= $calificacion_alumno->fechaexamen ?></td>
                                        <td><?= $calificacion_alumno->descestatusalumno ?></td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                        <!-- tbody END-->                          

                    </table>
                    <!-- table END-->
                </div>
            </div>
            <!--panel-body END-->            

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