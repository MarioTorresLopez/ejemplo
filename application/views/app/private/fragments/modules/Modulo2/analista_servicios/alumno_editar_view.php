<?php
/**
 * Vista de actualizaciones de alumnos
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra actualizar
 * el alumno seleccionado
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
                Actualizar alumno
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!--form START-->
                <form role="form" id="form" action="<?= base_url() ?>analista_servicios/alumno/editar_datos_alumno" method="post">

                    <div class=" col-lg-3">
                        <label for="nombre_alumno" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre alumno</label>
                        <input type="text" id="nombre_alumno" name="nombre_alumno" value="<?= $datos_alumno->nomalumno ?>" class="form-control" disabled>
                        <input type="hidden" id="id_inscripcion" name="id_inscripcion" value="<?= $datos_alumno->idinscripcion ?>" class="form-control">
                    </div> 

                    <div class=" col-lg-3">
                        <label for="apellido1" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Apellido 1</label>
                        <input type="text" id="apellido1" name="apellido1" value="<?= $datos_alumno->ape1alumno ?>" class="form-control" disabled>
                    </div>
                    <div class=" col-lg-3">
                        <label for="apellido2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Apellido 2</label>
                        <input type="text" id="apellido2" name="apellido2" value="<?= $datos_alumno->ape2alumno ?>" class="form-control" disabled> 
                    </div>
                    <div class="col-lg-3">
                        <label for="curp" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">CURP</label>
                        <input type="text" id="curp" name="curp" value="<?= $datos_alumno->curp ?>" class="form-control" disabled> 
                    </div>

                    <div class="col-lg-3">
                        <label for="carrera" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Carrera</label> 
                        <select name="carrera" class="form-control m-b">
                            <?php
                            if (!is_null($carreras)) :
                                foreach ($carreras as $carrera) :
                                    ?>
                                    <option <?php echo "value='$carrera->idcarrera'"; ?> <?php if ($datos_alumno->idcarrera == $carrera->idcarrera) echo "selected" ?>><?php echo $carrera->nomcarrera; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="especialidad" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Especialidad</label> 
                        <select name="especialidad" class="form-control m-b">
                            <option>
                                <?php if ($datos_alumno->nomespecialidad === NULL) { ?>
                                    N/A
                                <?php } else { ?>
                                    <?= $datos_alumno->nomespecialidad ?>
                                <?php } ?>
                            </option>
                            <?php
                            if (!is_null($especialidades)) :
                                foreach ($especialidades as $especialidad) :
                                    ?>
                                    <option <?php echo "value='$especialidad->idespecialidad'"; ?> <?php if ($datos_alumno->idespecialidad == $especialidad->idespecialidad) echo "selected" ?>><?php echo $especialidad->nomespecialidad; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="grupo" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Grupo</label> 
                        <select name="grupo" class="form-control m-b">
                            <?php
                            if (!is_null($grupos_acuerdo)) :
                                foreach ($grupos_acuerdo as $grupo_acuerdo) :
                                    ?>
                                    <option <?php echo "value='$grupo_acuerdo->idga'"; ?> <?php if ($datos_alumno->idga == $grupo_acuerdo->idga) echo "selected" ?>><?php echo $grupo_acuerdo->grupo; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label for="turno" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Turno</label> 
                        <select name="turno" class="form-control m-b">
                            <?php
                            if (!is_null($turnos)) :
                                foreach ($turnos as $turno) :
                                    ?>
                                    <option <?php echo "value='$turno->idturno'"; ?> <?php if ($datos_alumno->idturno == $turno->idturno) echo "selected" ?>><?php echo $turno->descturno; ?></option>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </select>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check "></i> 
                            <span class="bold"> </span> Actualizar
                        </button>

                        <a href="<?= base_url() ?>analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/<?= $datos_alumno->idinstitucion ?>/<?= $datos_alumno->idnivel ?>/<?= $datos_alumno->idalumno ?>" class="btn btn-danger" >
                            <i class="fa fa-ban"> </i> Cancelar
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