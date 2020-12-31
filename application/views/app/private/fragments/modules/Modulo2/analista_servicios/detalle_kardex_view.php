<?php
/**
 * Vista de listado pare expedir kardex de
 * escuelas media superior y supériores
 * 
 * @since      1.0
 * @version    1.0
 * @link       NA
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo2.usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./app/detalle_kardex_medisup_superior
 */
?>

<div class="row">

    <!--col-lg-12 START-->
    <div class="col-lg-12">

        <!--hpanel START-->
        <div class="hpanel hblue">

            <!--panel-heading START-->
            <div class="panel-heading">

                <!--panel-tools START-->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--panel-tools END-->

                <h2>Generar Kardex</h2>
            </div>
            <!--panel-heading END-->

            <!--panel-body START-->
            <div class="panel-body">

                <!--well well-lg START-->
                <div class="well well-lg">

                    <!--row START-->
                    <div class="row">
                        <h4 class="font-bold text-center">
                            SECRETARIA DE EDUCACIÓN DEL ESTADO DE QUERÉTARO
                        </h4>
                        <h5 class="text-center">
                            <p>
                                COORDINACIÓN DE DESARROLLO EDUCATIVO <br>
                                DIRECCIÓN DE EDUCACIÓN
                            </p>
                        </h5>
                    </div>
                    <!--row END-->

                </div>
                <!--well well-lg END-->

                <?php
                
                $idnivel = $encabezado_kardex->idnivel;
                $idalumno = $encabezado_kardex->idalumno;
                
                $periodos_alumno = $this->filtrados_escolar_model->periodos_kardex($idnivel, $idalumno);

                $conp = 0;
                $acup = 0;
                $prom = 0;
                if (!is_null($periodos_alumno)) :
                    foreach ($periodos_alumno as $periodo_alumno) :

                        $materias_periodo = $this->filtrados_escolar_model->consultar_materia_periodo($idalumno, $periodo_alumno->idnoperiodo);

                        if (!is_null($materias_periodo)) :
                            foreach ($materias_periodo as $materia_periodo) :

                                
                                $ultima_calificacion_materia = $this->filtrados_escolar_model->consultar_calificacion_materia_kardex($idalumno, $materia_periodo->idmateria, $materia_periodo->idopt);

                                if (!is_null($ultima_calificacion_materia)) :
                                    foreach ($ultima_calificacion_materia as $calificacion_materia) :

                                        $conp++;
                                        $acup = $acup + $calificacion_materia->calificacion;

                                    endforeach;
                                endif;

                            endforeach;
                        endif;

                    endforeach;
                endif;

                $prom = $acup / $conp;
                $promediog = number_format($prom, 2, '.', '');
                ?>

                <!--well well-lg START-->
                <div class="well well-lg">

                    <!--row START-->
                    <div class="row">
                        <h5 class="text-center">
                            <p>
                                KARDEX
                                <br>
                                <?= $encabezado_kardex->nominstitucion ?>
                            </p>
                        </h5>

                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">Alumno:</label>
                            <div class="col-lg-7">
                                <input type="text" disabled="" class="form-control" value="<?= $encabezado_kardex->nomalumno ?>">
                            </div>
                        </div>
                        <!--col-lg-12 END-->

                        <div class="col-lg-12">
                            <label>  </label>
                        </div>

                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">CURP:</label>
                            <div class="col-lg-7">
                                <input type="text" disabled="" class="form-control" value="<?= $encabezado_kardex->curp ?>">
                            </div>
                            <label class="col-lg-1 control-label">Promedio generado:</label>
                            <div class="col-lg-2">
                                <input type="text" disabled="" class="form-control" value="<?= $promediog ?>">
                            </div>
                        </div>
                        <!--col-lg-12 END-->

                    </div>
                    <!--row END-->

                    <div class="col-lg-12">
                        <label>  </label>
                    </div>

                    <!--row START-->
                    <div class="row">

                        <!--col-lg-12 START-->
                        <div class="col-lg-12">

                            <!-- table-responsive START -->
                            <div class="table-responsive">

                                <!--table START-->
                                <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">

                                    <!--thead START-->
                                    <thead>
                                        <tr>
                                            <th colspan="6">
                                                <div class="col-lg-12">
                                                    <label class="col-lg-2 control-label">Clave de centro de Trabajo:</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" disabled="" class="form-control" value="<?= $encabezado_kardex->cvecentrotrab ?>">
                                                    </div>
                                                    <div class="col-lg-7">
                                                        <input type="text" disabled="" class="form-control" value="<?= $encabezado_kardex->nomcarrera ?>">
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--thead END-->

                                    <!--thead START-->
                                    <thead >
                                        <tr>
                                            <th class="text-center">Periodo</th>
                                            <th class="text-center">Materia</th>
                                            <th class="text-center">Calificación</th>
                                            <th class="text-center">Nomenclatura</th>
                                            <th class="text-center">Fecha</th>
                                            <th class="text-center">Ciclos</th>
                                        </tr>
                                    </thead>
                                    <!--thead END-->

                                    <!--tbody START-->
                                    <tbody>
                                        <?php
                                        if (!is_null($calificaciones_kardex)) :
                                            foreach ($calificaciones_kardex as $calificacion_kardex) :
                                                ?>
                                                <tr>
                                                    <td><?= $calificacion_kardex->nomnoperiodo ?> <?= $calificacion_kardex->nomperiodo ?></td>
                                                    <?php if($calificacion_kardex->nomoptativa === NULL || $calificacion_kardex->nomoptativa === '') { ?>
                                                        <td><?= $calificacion_kardex->nommateria ?></td>
                                                    <?php }else { ?>
                                                        <td><?= $calificacion_kardex->nomoptativa ?></td>
                                                    <?php } ?>
                                                    <td><?= $calificacion_kardex->calificacion ?></td>
                                                    <?php if ($calificacion_kardex->nomenclatura === '2' || $calificacion_kardex->nomenclatura === '3') { ?>
                                                        <td style="background-color: red; color: #ffffff">
                                                            <?= $calificacion_kardex->nomtipoevaluacion ?>
                                                        </td>
                                                    <?php } else { ?>
                                                        <td>
                                                            <?= $calificacion_kardex->nomtipoevaluacion ?>
                                                        </td>
                                                    <?php } ?>
                                                    <td><?= $calificacion_kardex->fechaexamen ?></td>
                                                    <td><?= $calificacion_kardex->ciclo_escolar ?></td>
                                                </tr>
                                                <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </tbody>
                                    <!--tbody END-->

                                </table>
                                <!--table END-->

                            </div>
                            <!-- table-responsive END -->

                        </div>
                        <!--col-lg-12 END-->



                        <!--col-md-12 col-md-offset-6 START-->
                        <div class="col-md-offset-6 ">
                            <label class="col-lg-3 control-label">Subtotal de materias:</label>
                            <div class="col-lg-3 ">
                                <input type="text" disabled="" class="form-control" value="<?= $conp ?>">
                            </div>
                            <label class="col-lg-3 control-label text-center"> de </label>
                            <div class="col-lg-3">
                                <input type="text" disabled="" class="form-control" value="<?= $conp ?>">
                            </div>
                        </div>
                        <!--col-md-12 col-md-offset-6 END-->

                        <hr align="left" noshade="noshade" size="2" width="100%" />

                        <!--col-md-12 col-md-offset-6 START-->
                        <div class="col-md-offset-6 ">
                            <label class="col-lg-3 control-label text-info">Total de materias:</label>
                            <div class="col-lg-3 ">
                                <input type="text" disabled="" class="form-control" value="<?= $conp ?>">
                            </div>
                            <label class="col-lg-3 control-label text-center"> de </label>
                            <div class="col-lg-3">
                                <input type="text" disabled="" class="form-control" value="<?= $conp ?>">
                            </div>
                        </div>
                        <!--col-md-12 col-md-offset-6 END-->

                    </div>
                    <!--row END-->

                </div>
                <!--well well-lg END-->

                <!--col-lg-12 START-->
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <a href="<?= base_url() ?>analista_servicios/imprimir_kardex_alumno/visualizar_kardex/<?= $idinstitucion ?>/<?= $encabezado_kardex->idnivel ?>/<?= $encabezado_kardex->idalumno ?>" class="btn btn-info btn-lg" data-toggle="tooltip" title='Cargar archivo' target="_blank">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
                        </a>
                    </div>
                </div>
                <!--col-lg-12 END-->

            </div>
            <!--panel-body END-->

        </div>
        <!--hpanel hblue END-->

    </div>
    <!--col-lg-12 END-->

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
<!--row END-->



