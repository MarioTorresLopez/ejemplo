<?php
/**
 * Vista del detalle de calificacion, cuando seleccione
 * un periodo, apareceran asta donde el alumno este
 * cursando actualmente
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
                Detalle calificación
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--table START-->
                <table  class="table table-striped table-bordered table-hover">
                	<!-- thead START-->
                    <thead>
                        <tr>
                            <th>Nombre materia</th>
                            <th>Tipo evaluación</th>
                            <th>Calificación</th>
                        </tr>
                    </thead>
                    <!-- thead END-->
                   
                    <!-- tbody START-->
                    <tbody>
                    	<?php for ($i = 0; $i < 5; $i++) { ?>
                            <tr>
                                <td>Programación</td>
                                <td>Ordinario</td>
                                <td>9.4</td>
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