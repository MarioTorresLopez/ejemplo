<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<!DOCTYPE  html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Page title -->
        <title><?= $titulo ?></title>

        <link rel="shortcut icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">


        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />


        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <title>Título de la página</title>
    </head>
    <body onload="window.print();">

        <div class="container">


            <!-- row START -->
            <div class="row">
                <div class="col-xs-2">
                    <img src="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" width="60" height="60">
                </div>
                <div class="col-xs-10 text-center">
                    <div class="row">
                        <div class="col-xs-12">
                            <label style="font-family: sans-serif; font-size: 18px; font-weight: bold">
                                SECRETARÍA DE EDUCACIÓN DEL ESTADO DE QUERÉTARO
                            </label>
                        </div>
                        <div class="col-xs-12">
                            <label style="font-family: sans-serif; font-size: 10px; font-weight: bold">
                                COORDINACIÓN DE DESARROLLO EDUCATIVO 
                                <br>
                                DIRECCIÓN DE EDUCACIÓN
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row END -->
            
            <!--row START-->
            <div class="row">
                <div class="col-xs-2">
                </div>
                <div class="col-xs-10">
                    <h5 class="font-bold text-right">
                        <label style="font-family: sans-serif; font-size: 10px; font-weight: bold">
                            <?= $datos_pe->nomplanestudios ?>   <?= $datos_pe->claplanestudios ?>
                        </label>
                        <br>
                        <label style="font-family: sans-serif; font-size: 10px; font-weight: bold">
                            <?= $datos_pe->nominstitucion ?>
                        </label>
                    </h5>
                </div>
            </div>  
            <!--row END-->

            <!-- row START -->
            <div class="row">

                <!-- table START -->
                <table class="table table-hover" style="width:100%">

                    <!-- thead START -->
                    <thead>

                        <tr style="font-family: sans-serif; font-size: 10px; font-weight: bold">
                            <?php
                            if (!is_null($mapas_curriculares)) :
                                foreach ($mapas_curriculares as $mapa_curricular) :
                                    ?>
                                    <th><?= $mapa_curricular->nomnoperiodo ?> <?= $mapa_curricular->nomperiodo ?></th>
                                    <?php
                                endforeach;
                            endif;
                            ?>
                        </tr>

                    </thead>
                    <!--thead END -->

                    <!--tbody START -->
                    <tbody>

                        <tr style="font-family: sans-serif; font-size: 10px">

                            <?php
                            if (!is_null($mapas_curriculares)) :
                                foreach ($mapas_curriculares as $mapa_curricular) :
                                    ?>

                                    <?php $materias_periodo_mc = $this->materias_model->consultar_materias_mc_anterior($mapa_curricular->idmc); ?>

                                    <th>
                                        <table class="table table-striped table-bordered table-hover">

                                            <?php
                                            if (!is_null($materias_periodo_mc)) :
                                                foreach ($materias_periodo_mc as $materia_periodo_mc) :
                                                    ?>
                                                    <tr>
                                                        <td><?= $materia_periodo_mc->asignatura ?></td>
                                                    </tr>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>

                                        </table>    
                                    </th>

                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </tr>

                    </tbody>
                    <!--tbody END -->

                </table>
                <!-- table START -->

            </div>
            <!-- row END -->

        </div>

    </body>

</html>    
