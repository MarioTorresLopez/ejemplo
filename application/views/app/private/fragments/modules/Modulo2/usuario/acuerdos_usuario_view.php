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
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Acuerdos 
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!--row START-->
                <div class="row">
                    <!-- table START -->
                    <table id="example2" class="table table-striped table-bordered table-hover">

                        <!-- thead START -->
                        <thead>

                            <tr> 
                                <th>Acuerdo</th>
                                <th>Nombre institución</th>
                                <th>Nivel</th>
                                <th>Grupos</th>
                            </tr>

                        </thead>
                        <!--thead END -->
                        
                        <!--tbody START -->
                        <tbody>
                            <?php
                            if (!is_null($acuerdos_institucion)) :
                                foreach ($acuerdos_institucion as $acuerdo_institucion) :
                                    ?>
                                    <tr>
                                        <td><?= $acuerdo_institucion->idacuerdo ?></td>
                                        <td><?= $acuerdo_institucion->nombreinstitucion ?></td>
                                        <td><?= $acuerdo_institucion->nivelninsti ?></td>
                                        <td>
                                            <a href="<?= base_url() ?>usuario/gestion_grupos/grupo_acuerdo/<?= $acuerdo_institucion->idacuerdo ?>">
                                                <button class="btn btn-info btn-block" type="button">
                                                    Crear 
                                                    <i class="fa fa-group"></i> 
                                                    <span class="bold">  </span>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                        <!--tbody END -->

                    </table>
                </div>

            </div>
            <!--panel body END-->

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