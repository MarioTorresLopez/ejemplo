<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="row">

    <!-- col-lg-12 START-->
    <div class="col-lg-12">

        <!-- hpanel START -->
        <div class="hpanel hblue">

            <!-- panel-heading START -->
            <div class="panel-heading">

                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->

                <h2>Historial de kardex generados</h2>
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body">

                <!-- table-responsive START -->
                <div class="table-responsive">

                    <!-- table START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">
                        
                        <!-- thead START -->
                        <thead>
                            <tr>
                                <th class="text_center">Nombre</th>
                                <th class="text_center">Fecha de solicitud</th>
                                <th class="text_center">Fecha de expedición</th>
                                <th class="text_center">Folio de documento</th>
                                <th class="text_center">Acciones</th>
                            </tr>
                        </thead>
                        <!-- thead END -->

                        <!-- tbody START -->
                        <tbody>
                            <?php
                            for ($i = 0; $i <= 9; $i++) {
                                $acumulador = $i + 1;
                                ?>
                                <tr>
                                    <td>Michelle Arellano Arteaga </td>
                                    <td>08/08/2018</td> 
                                    <td>08/08/2018</td> 
                                    <td>123<?= $acumulador ?></td> 
                                    <td class="tooltip-demo text-center">
                                        <a href="#" class="btn btn-primary" data-toggle="tooltip" title='Cargar archivo'>
                                            <i class="fa fa fa-file-pdf-o"></i>
                                            Ver kardex
                                        </a>
                                    </td>   
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        <!-- tbody END -->
                        
                    </table>
                    <!-- table END -->
                    
                </div>
                <!-- table-responsive END -->

            </div>
            <!-- panel-body END -->
            
        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END -->

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