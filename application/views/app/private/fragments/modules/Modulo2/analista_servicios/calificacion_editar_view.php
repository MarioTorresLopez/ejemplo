<?php
/**
 * Vista de actualizacion de calificaciones 
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra actualizar
 * las calificaciones que tiene cada alumno corespondiente a su carrera
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/periodo
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
                Editar calificación
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!--form START-->
                <form role="form" id="form" action="<?= base_url() ?>analista_servicios/calificacion_gestion/editar_calificacion_alumno" method="post">

                    <!--form-group START-->
                    <div class="form-group col-lg-12">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <label for="materia" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Materia</label>
                            </div>
                            <div class="col-lg-2">
                                <label for="calificacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Calificación</label>
                            </div>
                            <div class="col-lg-3">
                                <label for="tipo_evaluacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Tipo evaluación</label>
                            </div>
                            <div class="col-lg-3">
                                <label for="fec_evaluacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fecha de examen</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <?php if($datos_calificacion->idmateria === '0') { ?>
                                <input type="text" id="nom_materia" name="nom_materia" value="<?= $datos_calificacion->nomoptativa ?>" class="form-control" disabled>
                                <input type="hidden" id="id_materia" name="id_materia" value="<?= $datos_calificacion->idmateria ?>" class="form-controls">
                                <input type="hidden" id="id_optativa" name="id_optativa" value="<?= $datos_calificacion->idopt ?>" class="form-controls">
                            <?php } else { ?>
                                <input type="text" id="nom_materia" name="nom_materia" value="<?= $datos_calificacion->nommateria ?>" class="form-control" disabled>
                                <input type="hidden" id="id_materia" name="id_materia" value="<?= $datos_calificacion->idmateria ?>" class="form-controls">
                            <?php } ?>
                            <input type="hidden" id="id_institucion" name="id_institucion" value="<?= $idinstitucion ?>" class="form-control">
                            <input type="hidden" id="id_nivel" name="id_nivel" value="<?= $idnivel ?>" class="form-control">
                            <input type="hidden" id="id_alumno" name="id_alumno" value="<?= $datos_calificacion->idalumno ?>" class="form-control">
                            <input type="hidden" id="id_noperiodo" name="id_noperiodo" value="<?= $datos_calificacion->idnoperiodo ?>" class="form-controls">
                        </div>

                        <div class="col-lg-2">
                            <input type="text" id="calificacion" name="calificacion" value="<?= $datos_calificacion->calificacion ?>" class="form-control" required>
                        </div>
                        <div class="col-lg-3">
                            <select name="tipo_evaluacion" class="form-control m-b">
                                <?php
                                if (!is_null($tipos_evaluacion)) :
                                    foreach ($tipos_evaluacion as $tipo_evaluacion) :
                                        ?>  
                                        <option <?php echo "value='$tipo_evaluacion->idevaluacion'"; ?> <?php if ($datos_calificacion->nomenclatura == $tipo_evaluacion->idevaluacion) echo "selected" ?>><?php echo $tipo_evaluacion->nombre; ?></option>
                                        <?php
                                    endforeach;
                                endif;
                                ?>
                            </select> 
                        </div>
                        <div class="col-lg-3">
                            <input type="date" id="fec_evaluacion" name="fec_evaluacion" value="<?= $datos_calificacion->fechaexamen ?>" class="form-control" required>
                        </div>
                    </div>                    
                    <!--form-group END-->

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check "></i> 
                            <span class="bold"> </span> Actualizar
                        </button>

                        <a href="<?= base_url() ?>analista_servicios/calificacion_gestion/mostrar_calificaciones_alumno_analista/<?= $idinstitucion ?>/<?= $datos_calificacion->idnivel ?>/<?= $datos_calificacion->idalumno ?>/<?= $datos_calificacion->idnoperiodo ?>" class="btn btn-danger" 
                           ><i class="fa fa-ban"> </i> Cancelar
                        </a>
                    </div>

                </form>
                <!--form END-->

            </div>
            <!--panel body END-->

        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END-->

    <!--ROW  START-->
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
    <!--ROW  END-->
</div>