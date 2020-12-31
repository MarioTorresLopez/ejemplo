<?php
/**
 * Vista del historial de las inscripciones con un buscador
 * para asi encontrar la informacion mas rapida y consultar
 * el historial de los alumnos.
 *
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/historial_inscripcion
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
                Historial
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- table START -->
                <div class="well well-lg">
                    <div class="row">
                    	<div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Período:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Carrera:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Especialidad:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Grupo:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div> 
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Matrícula:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label"> Nombre:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                        </div>                                               
                        <div class="col-lg-12">
                            <div class="form-group text-right">
                                <label class="control-label">  </label>
                                <button class="btn btn-primary">
                                    <i class="fa fa-search"></i> Consultar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                <!--table START-->
                <table  class="table table-striped table-bordered table-hover">
                    <!-- thead START-->
                    <thead>
                        <tr>
                            <th>Período</th>
                            <th>Carrera</th>
                            <th>Especialidad</th>
                            <th>Matrícula</th>
                            <th>Nombre</th>
                            <th>Grupo</th>
                            <th>Alumnos</th>
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
                                <td>2016482475</td>
                                <td>Juan José Sánchez Lugo</td>
                                <td>T-165</td>
                                <td><a href="<?php base_url() ?>detalle_inscripcion"><button class="btn btn-default" type="button" id="lista_alumno"><i class="fa fa-user"></i></button></a></td> 
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
