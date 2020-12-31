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


            <!--row START-->
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
            <!--row END-->

            <!--row START-->
            <div class="row">
                <div class="col-xs-2">
                </div>
                <div class="col-xs-10">
                    <h5 class="font-bold text-center">
                        <label style="font-family: sans-serif; font-size: 12px; font-weight: bold">
                            KARDEX
                        </label>
                        <br>
                        <label style="font-family: sans-serif; font-size: 13px; font-weight: bold">
                            <?= $informacion_alumno->nominstitucion ?>
                        </label>
                    </h5>
                </div>
            </div>  
            <!--row END-->

            <?php
            $periodos_alumno = $this->filtrados_escolar_model->periodos_kardex($idnivel, $idalumno);

            $conp = 0;
            $acup = 0;
            $prom = 0;
            if (!is_null($periodos_alumno)) :
                foreach ($periodos_alumno as $periodo_alumno) :

                    $materias_periodo = $this->filtrados_escolar_model->consultar_materia_periodo($idalumno, $periodo_alumno->idnoperiodo);

                    if (!is_null($materias_periodo)) :
                        foreach ($materias_periodo as $materia_periodo) :

                            $conp++;
                            $ultima_calificacion_materia = $this->filtrados_escolar_model->consultar_calificacion_materia_kardex($idalumno, $materia_periodo->idmateria, $materia_periodo->idopt);

                            if (!is_null($ultima_calificacion_materia)) :
                                foreach ($ultima_calificacion_materia as $calificacion_materia) :

                                    $acup = $acup + $calificacion_materia->calificacion;

                                endforeach;
                            endif;

                        endforeach;
                    endif;

                endforeach;
            endif;

            $prom = $acup / $conp;
            $promediog = number_format($prom, 2, '.', '');
            ?>            

            <!--row START-->
            <div class="row">

                <!--table START-->
                <table class="table table-hover" style="width:110%">

                    <?php
                    $cont = 0;
                    ?>

                    <!--thead START-->
                    <thead>

                        <tr style="font-family: sans-serif; font-size: 11px; font-weight: bold">
                            <th colspan="8" style="width:110%; border: inset 0pt; padding-bottom: 0px">
                                <?= $informacion_alumno->nomcarrera ?>
                            </th>
                        </tr>

                        <tr style="font-family: sans-serif; font-size: 10px">
                            <th style="width:10%; border-color: black;">ALUMNO:</th>
                            <th style="width:10%; border-color: black;"></th>
                            <th style="width:40%; border-color: black;"><?= $informacion_alumno->nomalumno ?></th>
                            <th style="width:10%; border-color: black;">CURP:</th>
                            <th style="width:10%; border-color: black;"><?= $informacion_alumno->curp ?></th>
                            <th style="width:10%; border-color: black;">PROMEDIO:</th>
                            <th style="width:10%; border-color: black;"><?= $promediog ?></th>
                            <th style="width:10%; border-color: black;"></th>
                        </tr>

                        <tr style="font-family: sans-serif; font-size: 10px; font-weight: bold"> 
                            <th style="border-color: black;" class="text-center">PERIODO</th>
                            <th style="border-color: black;" colspan="2">MATERIAS</th>
                            <th style="border-color: black;"class="text-center">CALIFICACIÓN</th>
                            <th style="border-color: black;">NOMENCLATURA</th>
                            <th style="border-color: black;">FECHA</th>
                            <th style="border-color: black;" colspan="2">CICLOS</th>
                        </tr>

                    </thead>
                    <!--thead END-->

                    <!--tbody START-->
                    <tbody>


                        <?php
                        if (!is_null($periodos_alumno)) :
                            foreach ($periodos_alumno as $periodo_alumno) :
                                ?>
                                <tr style="font-family: sans-serif; font-size: 10px">
                                    <td colspan="8" style="width:100%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px">
                                        <?= $periodo_alumno->nomnoperiodo ?> <?= $periodo_alumno->nomperiodo ?>
                                        <div style="padding-left:10px;"><?= $informacion_alumno->nominstitucion ?></div>

                                        <?php $materias_periodo = $this->filtrados_escolar_model->consultar_materia_periodo($idalumno, $periodo_alumno->idnoperiodo); ?>

                                        <div style="padding-left:30px;">
                                            <!--table START-->
                                            <table class="table table-hover" style="width:100%">
                                                <!--tbody START-->
                                                <tbody>
                                                    <?php
                                                    if (!is_null($materias_periodo)) :
                                                        foreach ($materias_periodo as $materia_periodo) :
                                                            $cont++;

                                                            $ultima_calificacion_materia = $this->filtrados_escolar_model->consultar_calificacion_materia_kardex($idalumno, $materia_periodo->idmateria, $materia_periodo->idopt);

                                                            if (!is_null($ultima_calificacion_materia)) :
                                                                foreach ($ultima_calificacion_materia as $calificacion_materia) :
                                                                    ?>
                                                                    <tr>
                                                                        <td style="width:4%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $cont ?></td>
                                                                        <?php if($calificacion_materia->idmateria === '0') { ?>
                                                                            <td style="width:43%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->nomoptativa ?></td>
                                                                        <?php } else { ?>
                                                                            <td style="width:43%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->nommateria ?></td>
                                                                        <?php } ?>
                                                                        
                                                                        <td style="width:11%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->calificacion ?></td>
                                                                        <td style="width:17%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->nomtipoevaluacion ?></td>
                                                                        <td class="text-center" style="width:12%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->fechaexamen ?></td>
                                                                        <td style="width:13%; border: inset 0pt; padding-top: 0px; padding-bottom: 0px"><?= $calificacion_materia->ciclo_escolar ?></td>
                                                                    </tr>
                                                                    <?php
                                                                endforeach;
                                                            endif;
                                                        endforeach;
                                                    endif;
                                                    ?>
                                                </tbody>
                                                <!--tbody END-->
                                            </table>
                                            <!--table END-->
                                        </div>

                                    </td>
                                </tr>
                                <?php
                            endforeach;
                        endif;
                        ?>

                    </tbody>
                    <!--tbody END-->

                </table>
                <!--table END-->

            </div>  
            <!--row END-->


            <!--row START-->
            <div class="row">
                <div class="col-xs-12 text-right">
                    <label style="font-family: sans-serif; font-size: 10px">
                        SUBTOTAL DE MATERIAS <?= $cont ?> DE <?= $cont ?>
                    </label>
                </div>
            </div>  
            <!--row END-->

            <hr style="border-color: black; width: 100%">

            <!--row START-->
            <div class="row">
                <div class="col-xs-12 text-right">
                    <label style="font-family: sans-serif; font-size: 10px">
                        TOTAL DE MATERIAS <?= $cont ?> DE <?= $cont ?>
                    </label>
                </div>
            </div>  
            <!--row END-->


            <!--row START-->
            <div class="row">
                <div class="col-xs-4 text-center">
                    <hr style="border-color: black; width: 80%">
                </div>
            </div>  
            <!--row END-->  


            <!--row START-->
            <div class="row">
                <div class="col-xs-4 text-center">
                    <label style="font-family: sans-serif; font-size: 10px">
                        VoBo Jefe de Departamento
                    </label>
                </div>
            </div>  
            <!--row END-->

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

            <!--row START-->
            <div class="row">
                <div class="col-xs-4 text-center">
                    <label style="font-family: sans-serif; font-size: 10px">
                        Sello del Departamento
                    </label>
                </div>
            </div>  
            <!--row END-->


        </div>

    </body>
</html>

