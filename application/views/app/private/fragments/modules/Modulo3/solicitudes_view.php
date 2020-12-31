<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

                Solicitudes
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
                                        <th>Fecha</th>
                                        <th>Nombre del solicitante</th>
                                        <th>Tipo de solicitud</th>
                                        <th>Ver</th>
                                    </tr>
                                </thead>
                                <!-- thead END-->

                                <!-- tbody START-->
                                <tbody>
                                    
                                    <?php
//                                    if (!is_null($listado_alumnos_analista)) :
//                                        foreach ($listado_alumnos_analista as $alumno_analista) :
                                            ?>
<!--                                            <tr>
                                                <td><//?= $alumno_analista->nominstitucion ?></td>
                                                <td><//?= $alumno_analista->nomnivel ?></td>
                                                <td><//?= $alumno_analista->nomcarrera ?></td>
                                                <td><//?= $alumno_analista->nomcompletoalumno ?></td>
                                                <td><//?= $alumno_analista->curp ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<//?= base_url() ?>analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/<//?= $alumno_analista->idinstitucion ?>/<//?= $alumno_analista->idnivel ?>/<//?= $alumno_analista->idalumno ?>">
                                                            <button class="btn btn-default" type="button">
                                                                <i class="fa fa-list-alt"></i>
                                                                <span class="bold">  </span>
                                                            </button>
                                                        </a>                                                
                                                    </div>
                                                </td>
                                            </tr>-->
                                            <?php
//                                        endforeach;
//                                    endif;
                                    ?>
                                    <tr>
                                        <td>21/11/2019</td>
                                        <td>Mario Eduardo Torres Lopez</td>
                                        <td>Dictamen técnico</td>
                                        <td>
                                            <!--<a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion/detalle_solicitud/16/3"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>-->
                                            <a href="<?= base_url() ?>analista_servicios/dictamen_tecnico"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>22/11/2019</td>
                                        <td>Alondra Romero Felix</td>
                                        <td>Revalidación de estudios</td>
                                        <td>
                                            <!--<a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion/detalle_solicitud/16/2"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>-->
                                            <a href="<?= base_url() ?>analista_servicios/revalidacion"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>23/11/2019</td>
                                        <td>Michelle Arellano Arteaga</td>
                                        <td>Equivalencia</td>
                                        <td>
                                            <!--<a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion/detalle_solicitud/16/1"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>-->
                                            <a href="<?= base_url() ?>analista_servicios/equivalencia"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>24/11/2019</td>
                                        <td>Jaqueline Juarez Padilla</td>
                                        <td>Dictamen técnico</td>
                                        <td>
                                            <!--<a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion/detalle_solicitud/16/3"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>-->
                                            <a href="<?= base_url() ?>analista_servicios/dictamen_tecnico"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>25/11/2019</td>
                                        <td>Víctor Aguilar Sanchez</td>
                                        <td>Equivalencia</td>
                                        <td>
                                            <!--<a href="<?= base_url() ?>analista_servicios/equivalencia_revalidacion/detalle_solicitud/16/1"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>-->
                                            <a href="<?= base_url() ?>analista_servicios/equivalencia"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                        </td>
                                    </tr>
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
