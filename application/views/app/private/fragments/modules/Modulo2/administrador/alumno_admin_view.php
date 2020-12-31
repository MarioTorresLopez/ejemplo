<?php
/**
 * Vista de la lista de los alumnos
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/alumno_admin
 */
?>

<div class="row">
	<!-- col-lg-12 START-->
    <div class="col-lg-12" >
        <!-- hpanel START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Alumnos
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <div class="table-responsive">
                <!-- table START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- thead START-->
                    <thead>
                        <tr>
                            <th colspan="2">Carrera: TIC</th>
                            <th >Especialidad: Sistemas Informáticos</th>
                            <th>Grupo: T-171</th>
                        </tr>
                        <tr>
                            <th>Matrícula</th>
                            <th>Alumno</th>
                            <th>Estatus</th>
                            <th>Calificaciones</th>                            
                        </tr>
                    </thead>
                    <!-- thead END-->

                    <!-- tbody START-->
                    <tbody>
                        <?php for ($i = 0; $i < 30; $i++) { ?>
                            <tr>
                                <td>1254JSYE27</td>
                                <td>Pedro Casas Luna</td>
                                <td>Inscrito</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php base_url() ?>calificacion"><button class="btn btn-default " type="button"><i class=" fa fa-building"></i></button></a>                                                
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

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
    </div>
    <!-- ROW END -->
    
</div>