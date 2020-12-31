<?php
/**
 * Vista de alta de calificaciones asi como visualizar el listado
 * de las calificaciones
 *
 * Vista que muestra al usuario la interfaz grafica, dende se podra consultar
 * el listado de calificaciones que tiene cada alumno corespondiente a su carrera
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
                Agregar calificación
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">
                <p>Formulario</p>
                <!--form START-->
                <form role="form" id="form">

                    <!--form-group START-->
                    <?php for ($i = 0; $i < 3; $i++) { ?>
                    <div class="form-group col-lg-12">
                        <div class="col-lg-12">
                            <div class=" col-lg-4">
                                <label for="nombre_materia" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre materia</label>
                            </div>
                            <div class="col-lg-4">
                                <label for="calificacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Calificación</label>
                            </div>
                            <div class="col-lg-4">
                                <label for="tipo_evaluacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Tipo evaluación</label>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <input type="text" id="materia" name="materia" placeholder="Matemáticas" class="form-control" disabled>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" id="calificacion" name="calificacion" placeholder="*Capo Requerido" class="form-control" required>
                        </div>
                        <div class="col-lg-4">
                            <select name="tEvaluacion" class="form-control m-b">
                                <option>--Seleccione--</option>
                                <option value="1">Ordinario</option>
                                <option value="2">Regularización</option>
                                <option value="3">Extraordinario</option>
                            </select> 
                        </div>
                    </div>                    
                    <!--form-group END-->

                    <!--form-group START-->
                    <div class="form-group col-lg-12">
                        <div class="col-lg-12">
                            <div class=" col-lg-6">
                                <label for="fec_evaluacion" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fecha evaluación</label>
                            </div>
                            <div class=" col-lg-6">
                                <label for="faltas" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Porcentaje de faltas</label>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <input type="date" id="fec_evaluacion" name="fec_evaluacion" placeholder="*Capo Requerido" class="form-control" required>
                        </div>
                        <div class="col-lg-6">
                            <input type="text" id="faltas" name="faltas" placeholder="*Capo Requerido" class="form-control" required>
                        </div>
                    </div>                    
                    <!--form-group END-->
                    <?php } ?>

                    <div class="text-right">
                        <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                    </div>

                </form>
                <!--form END-->
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
                Calificaciones
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- thead START-->
                    <thead>
                    	<tr>
                            <th>Carrera: TIC</th>
                            <th>Especialidad: Sistemas Informáticos</th>
                            <th>Grupo: T-171</th>
                            <th colspan="2">Alumno: Pedro Casas Luna</th>
                    	</tr>
                        <tr>
                            <th>Materia</th>
                            <th>Tipo de evalución</th>
                            <th>Calificación</th>
                            <th>Fecha</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <!-- thead END-->

                    <!-- tbody START-->
                    <tbody>
                        <?php for ($i = 0; $i < 30; $i++) { ?>
                            <tr>
                                <td>Matemáticas</td>
                                <td>Ordinario</td>
                                <td>9.0</td>
                                <td>07/08/2018</td>                                
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php base_url() ?>calificacion_ingresar/editar"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>                                             
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                    <!-- tbody END-->                          

                </table>
                <!-- table END-->
            </div>
            <!--panel-body END-->            

        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-12 END-->
</div>