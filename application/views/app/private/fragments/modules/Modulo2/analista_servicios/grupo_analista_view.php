<?php
/**

 * Vista que muestra al analista la interfaz grafica, dende se podra visualizar
 * el listado de grupos que tiene un periodo seleccionado.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/grupo_analista
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

                Grupos
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START-->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                
                <!--well well-lg START-->
                <div class="well well-lg">

                    <!--row START-->
                    <div class="row">
                        
                        <!--col-lg-12 START-->
                        <div class="col-lg-12">

                            <!-- panel-group START -->
                            <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                Nombre del alumno

                                <input type="text" class="form-control" name="nombre_alumno" id="nombre_alumno" >
                            </div>
                            <!-- panel-group END -->

                            <!-- panel-group START -->
                            <div class="panel-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                CURP

                                <input type="text" class="form-control" name="curp_alumno" id="curp_alumno" >
                            </div>
                            <!-- panel-group END -->

                            

                            <div class="text-right">
                                <a href="<?php base_url() ?>periodo"><button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="glyphicon glyphicon-search"></i> Consultar</strong></button></a>
                            </div>

                        </div>
                        <!--col-lg-12 END-->
                        
                        </div>
                    <!--row END-->

                </div>
                <!--well well-lg END-->

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
                                        <th colspan="3">Institución: UTEQ</th>
                                        <th colspan="3">Plantel: UTEQ</th>
                                        <th colspan="2">Carrera: Educación</th>
                                    </tr>
                                    <tr>
                                        <th>Escuela de procedencia</th>
                                        <th>Grado</th>
                                        <th>Especialidad</th>
                                        <th>Nombre grupo</th>
                                        <th>Alumno</th>
                                        <th>CURP</th>
                                        <th>Tipo de ingreso</th>
                                        <th>Calificaciones</th>
                                        <!--<th>Editar grupo</th>-->
                                    </tr>
                                </thead>
                                <!-- thead END-->

                                <!-- tbody START-->
                                <tbody>
                                    <?php for ($i = 0; $i < 30; $i++) { ?>
                                        <tr>
                                            <td>UNIVERSIDAD MARISTA DE QUERETARO</td>
                                            <td>Maestría</td>
                                            <td>NA</td>
                                            <td>A</td>
                                            <td>Pedro Casas Luna</td>
                                            <td>FOGM771226MMNLRR03</td>
                                            <td>Equivalencia</td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php base_url() ?>calificacion_gestion"><button class="btn btn-default " type="button"><i class=" fa fa-building"></i></button></a>                                                
                                                </div>
                                            </td>
                                            <!--
                                            <td>

                                                <a href="<?php base_url() ?>grupo/editar"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>

                                            </td>
                                            -->
                                        </tr>
                                    <?php } ?>

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
                        <label class="control-label">  </label>
                        <button class="btn btn-info btn-lg">
                            <i class="fa fa-print"></i> Imprimir reporte
                        </button>
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