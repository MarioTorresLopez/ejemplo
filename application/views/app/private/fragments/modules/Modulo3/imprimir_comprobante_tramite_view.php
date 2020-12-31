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

            <!-- row START -->
            <div class="row">
                <div class="col-xs-2">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            FECHA: 
                        </label>
                    </h5>
                </div>
                <div class="col-xs-2">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            10/12/2019
                        </label>
                    </h5>
                </div>
                <div class="col-xs-2">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            FOLIO:
                        </label>
                    </h5>
                </div>
                <div class="col-xs-2">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px; font-weight: bold">
                            A2023
                        </label>
                    </h5>
                </div>
                <div class="col-xs-4">
                </div>
            </div>
            <!-- row END -->

            <!-- row START -->
            <div class="row">
                <div class="col-xs-3">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            NOMBRE DEL USUARIO: 
                        </label>
                    </h5>
                </div>
                <div class="col-xs-9">
                    <input type="text" id="nombre_usuario" class="form-control" name="nombre_usuario">
                </div>
            </div>
            <!-- row END -->

            <!-- row START -->
            <div class="row">
                <div class="col-xs-3">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            TIPO DE TRÁMITE: 
                        </label>
                    </h5>
                </div>
                <div class="col-xs-2">
                    <input type="text" id="equivalencia" class="form-control" name="equivalencia" value="EQUIVALENCIA" style="font-family: sans-serif; font-size: 9px">
                </div>
                <div class="col-xs-2">
                    <input type="text" id="revalidacion" class="form-control" name="revalidacion" value="REVALIDACIÓN" style="font-family: sans-serif; font-size: 9px">
                </div>
                <div class="col-xs-2">
                    <input type="text" id="media_superior" class="form-control" name="media_superior" value="MED. SUP." style="font-family: sans-serif; font-size: 9px">
                </div>
                <div class="col-xs-3">
                    <input type="text" id="superior" class="form-control" name="superior" value="SUPERIOR" style="font-family: sans-serif; font-size: 9px">
                </div>
            </div>
            <!-- row END -->

            <!-- row START -->
            <div class="row">
                <div class="col-xs-3">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            HORARIO PARA RECOGER TIEMPO DE RESPUESTA: 
                        </label>
                    </h5>
                </div>
                <div class="col-xs-9">
                    <input type="text" id="horario" class="form-control" name="horario" value="1:30 A 3:30 P.M. de LUNES A JUEVES 15 días hábiles" style="font-family: sans-serif; font-size: 12px">
                </div>
            </div>
            <!-- row END -->

            <!-- row START -->
            <div class="row">
                <div class="col-xs-3">
                    <h5 class="font-bold">
                        <label style="font-family: sans-serif; font-size: 12px">
                            NOMBRE Y FIRMA DE RECEPCIÓN:
                        </label>
                    </h5>
                </div>
                <div class="col-xs-9">
                    <input type="text" id="nombre_firma" class="form-control" name="nombre_firma">
                </div>
            </div>
            <!-- row END -->
            
            <!-- row START -->
            <div class="row">
                <div class="col-xs-12">
                    <ul>
                        <li>
                            EL TRÁMITE QUE AMPARA EL PRESENTE COMPROBANTE SE ENTREGARÁ AL INTERESADO, A UN FAMILIAR EN LINEA DIRECTA, 
                            TUTOR, GESTOR DEBIDAMENTE ACREDITADO, O EN SU CASO, A QUIEN ACREDITE MEDIANTE CARTA PODER.
                        </li>
                        <li>
                            PARA CUALQUIER DUDA O INFORMACIÓN SOBRE EL TRÁMITE FAVOR DE COMUNICARSE A LOS TELÉFONOS 2-62-02-43, 
                            2-62-03-30 Y 2-62-00-83 EXTS. 131,112 DE LUNES A VIERNES EN HORARIO DE 9:00 A 15:30 HRS.
                        </li>
                    </ul>
                </div>
            </div>
            <!-- row END -->

        </div>

    </body>

</html>    