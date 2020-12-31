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
                                        <th>Editar/Ver/Subir</th>
                                    </tr>
                                </thead>
                                <!-- thead END-->

                                <!-- tbody START-->
                                <tbody>
                                    
                                    <?php
                                    if (!is_null($solicitudes)) :
                                        foreach ($solicitudes as $solicitud) :
                                            ?>
                                            <tr>
                                                <td><?= $solicitud->fecha ?></td>
                                                <td><?= $solicitud->nombre?> <?=$solicitud->ape1?> <?=$solicitud->ape2 ?></td>
                                                <td>
                                                    <a href="<?= base_url() ?>analista_servicios/revalidacion/editar_revalidacion/<?= $solicitud->idrev ?>"><button class="btn btn-info " type="button"><i class="fa fa-pencil"></i></button></a>
                                                    <a href="<?= base_url() ?>analista_servicios/revalidacion/detalle_solicitud_revalidacion/<?= $solicitud->idrev ?>"><button class="btn btn-info " type="button"><i class="fa fa-eye"></i></button></a>
                                                    <a href="<?= base_url() ?>analista_servicios/revalidacion/subir"><button class="btn btn-info " type="button"><i class="fa fa-cloud-upload"></i></button></a>
                                                </td>
                                            </tr>
                                            <?php
                                        endforeach;
                                    endif;
                                    ?>
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
