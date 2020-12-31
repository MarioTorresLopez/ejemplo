<?php
/**
 * Vista del detalle de las inscripciones, cuando seleccione
 * un alumno podra ver su informacion actual y su historial
 *
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/detalle_inscripcion_admin
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
                Detalle inscripción
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--table START-->
                <table  class="table table-striped table-bordered table-hover">
                   
                    <!-- tbody START-->
                    <tbody>
                            <tr>
                                <td>Nombre:</td>
                                <td>Juan José Sánchez Lugo</td>
                            </tr>
                            <tr>
                                <td>Matrícula: </td>
                                <td>2016482475</td>
                            </tr>    
                            <tr>    
                                <td>Carrera: </td>
                                <td>TIC</td>
                            </tr>    
                            <tr>    
                                <td>Especialidad: </td>
                                <td>Sistemas Informáticas</td>                               
                            </tr>
                            <tr>    
                                <td>Estatus: </td>
                                <td>Baja temporal</td>                               
                            </tr>

                    </tbody>
                    <!-- tbody END-->                          

                </table>
                <!-- table END-->

                <!--table START-->
                <table  class="table table-striped table-bordered table-hover">
                	<!-- thead START-->
                    <thead>
                        <tr>
                            <th>Período</th>
                            <th>Carrera</th>
                            <th>Especialidad</th>
                            <th>Grupo</th>
                            <th>Calificación</th>
                            
                        </tr>
                    </thead>
                    <!-- thead END-->
                   
                    <!-- tbody START-->
                    <tbody>
                        <?php for ($i = 0; $i < 5; $i++) { ?>
                            <tr>
                                <td>1</td>
                                <td>TIC</td>
                                <td>Sistemas Informáticas</td>
                                <td>T-165</td> 
                                <td><a href="<?php base_url() ?>detalle_calificacion"><button class="btn btn-default " type="button"><i class=" fa fa-building"></i></button></a></td>
                                                               
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