<?php
/**
 * 
 * Vista que muestra al analista la interfaz grafica, dende se podra visualizar
 * el listado de periodos que tiene registrados cada plantel
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/periodo_analista
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

                Periodos del alumno
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!--well well-lg START-->
                <div class="well well-lg">

                    <!--row START-->
                    <div class="row">

                        <!-- table-responsive START -->
                        <div class="table-responsive">

                            <!-- table START -->
                            <table id="example2" class="table table-striped table-bordered table-hover">

                                <!-- thead START-->
                                <thead>
                                    <tr>
                                        <th colspan="3">ESCUELA: <?= $thead_periodos->nominstitucion ?></th>
                                        <th colspan="3">NIVEL EDUCATIVO: <?= $thead_periodos->nomnivel ?></th>
                                        <th colspan="3">PLAN DE ESTUDIOS: <?= $thead_periodos->nomcarrera ?></th>
                                    </tr>
                                    <tr>
                                        <th>Ciclo Escolar</th>
                                        <th>Tipo ingreso</th>
                                        <th>Periodo</th>
                                        <th>Especialidad</th>
                                        <th>Nombre grupo</th>
                                        <th>Alumno</th>
                                        <th>CURP</th>
                                        <th>Calificaciones</th>
                                        <th>Editar alumno</th>
                                    </tr>
                                </thead>
                                <!-- thead END-->

                                <!-- tbody START-->
                                <tbody>
                                    <?php
                                    if (!is_null($listado_periodos_alumno)) :
                                        foreach ($listado_periodos_alumno as $periodo_alumno) :
                                            ?>
                                            <tr>
                                                <td><?= $periodo_alumno->cicloescolar?></td>
                                                <td><?= $periodo_alumno->nomingreso?></td>
                                                <td><?= $periodo_alumno->nomnoperiodo ?> <?= $periodo_alumno->nomperiodo ?></td>
                                                <?php if ($periodo_alumno->nomespecialidad === '' || $periodo_alumno->nomespecialidad === NULL) { ?>
                                                    <td>
                                                        N/A
                                                    </td>
                                                <?php } else { ?>
                                                    <td>
                                                        <?= $periodo_alumno->nomespecialidad ?>
                                                    </td>
                                                <?php } ?>
                                                <td><?= $periodo_alumno->nomgrupo ?></td>
                                                <td><?= $periodo_alumno->nomcompletoalumno ?></td>
                                                <td><?= $periodo_alumno->curp ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?= base_url() ?>analista_servicios/calificacion_gestion/mostrar_calificaciones_alumno_analista/<?= $periodo_alumno->idinstitucion ?>/<?= $periodo_alumno->idnivel ?>/<?= $periodo_alumno->idalumno ?>/<?= $periodo_alumno->idnoperiodo ?>"><button class="btn btn-default " type="button"><i class="fa fa-list"></i></button></a>                                                
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="<?= base_url() ?>analista_servicios/alumno/editar/<?= $periodo_alumno->idinscripcion ?>"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a> 
                                                </td>
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
                        <!-- table-responsive END -->

                    </div>
                    <!--row END-->

                </div>
                <!--well well-lg END-->

                <!--col-lg-12 START-->
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?= base_url() ?>analista_servicios/detalle_kardex/mostrar_kardex_alumno/<?= $thead_periodos->idinstitucion ?>/<?= $thead_periodos->idnivel ?>/<?= $thead_periodos->idalumno ?>" class="btn btn-primary" data-toggle="tooltip" title='Cargar archivo'>
                            <i class="fa fa-file-pdf-o"></i>
                            Ver kardex de alumno
                        </a>
                    </div>
                </div>
                <!--col-lg-12 END-->

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