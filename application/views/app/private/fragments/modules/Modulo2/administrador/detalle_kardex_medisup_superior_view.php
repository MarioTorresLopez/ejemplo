<?php
/**
 * Vista de listado pare expedir kardex de
 * escuelas media superior y supériores
 * 
 * @since      1.0
 * @version    1.0
 * @link       NA
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo2.usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./app/detalle_kardex_medisup_superior
 */
?>

<div class="row">
    <!--col-lg-12 START-->
    <div class="col-lg-12">
        <!--hpanel START-->
        <div class="hpanel hblue">
            <!--panel-heading START-->
            <div class="panel-heading">
                <!--panel-tools START-->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--panel-tools END-->
                <h2>Generar Kardex</h2>
            </div>
            <!--panel-heading END-->
            <!--panel-body START-->
            <div class="panel-body">
                <!--well well-lg START-->
                <div class="well well-lg">
                    <!--row START-->
                    <div class="row">
                        <h4 class="font-bold text-center">
                            SECRETARIA DE EDUCACIÓN DEL ESTADO DE QUERÉTARO
                        </h4>
                        <h5 class="text-center">
                            <p>
                                COORDINACIÓN DE DESARROLLO EDUCATIVO <br>
                                DIRECCIÓN DE EDUCACIÓN
                            </p>
                        </h5>
                    </div>
                    <!--row END-->
                </div>
                <!--well well-lg END-->
                
                <!--well well-lg START-->
                <div class="well well-lg">
                    <!--row START-->
                    <div class="row">
                        <h5 class="text-center">
                            <p>
                                PREPARATORIA DE NEGOCIOS
                            </p>
                        </h5>
                        
                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">Alumno:</label>
                            <div class="col-lg-7">
                                <input type="text" disabled="" class="form-control" value="Apellido1 Apellido2 Nombre(s)">
                            </div>
                            <label class="col-lg-1 control-label">Número de alumno:</label>
                            <div class="col-lg-2 ">
                                <input type="text" disabled="" class="form-control" value="201701234">
                            </div>
                        </div>
                        <!--col-lg-12 END-->
                        
                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">CURP:</label>
                            <div class="col-lg-5">
                                <input type="text" disabled="" class="form-control" value="DSADKDJ01919LAS">
                            </div>
                            <label class="col-lg-1 control-label">Promedio generado:</label>
                            <div class="col-lg-2 ">
                                <input type="text" disabled="" class="form-control" value="9.2">
                            </div>
                        </div>
                        <!--col-lg-12 END-->
                    </div>
                    <!--row END-->
                    
                    <div class="col-lg-12">
                        <label>  </label>
                    </div>
                    <!--row START-->
                    <div class="row">
                        <!--table START-->
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                            <!--thead START-->
                            <thead>
                                <tr>
                                    <th colspan="6">
                                        <div class="col-lg-12">
                                            <label class="col-lg-2 control-label">Clave de centro de Trabajo:</label>
                                            <div class="col-lg-4 ">
                                                <input type="text" disabled="" class="form-control" value="1352313">
                                            </div>
                                            <div class="col-lg-4 ">
                                                <input type="text" disabled="" class="form-control" value="Bachillerato General">
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <!--thead END-->
                            <!--thead START-->
                            <thead >
                                <tr>
                                    <th class="text-center">Período</th>
                                    <th class="text-center">Materia</th>
                                    <th class="text-center">Calificación</th>
                                    <th class="text-center">Nomenclatura</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Ciclo</th>
                                </tr>
                            </thead>
                            <!--thead END-->
                            <!--tbody START-->
                            <tbody>
                                <?php
                                for ($i = 0; $i <= 5; $i++) {
                                    $acumulador = $i + 1;
                                    ?>
                                    <tr>
                                        <td><?= $acumulador ?></td>
                                        <td>Materia <?= $acumulador ?></td> 
                                        <td>9.1</td> 
                                        <td>123MA<?= $acumulador ?></td>    
                                        <td>08/08/2018</td>    
                                        <td>2015-2018</td>    
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                            <!--tbody END-->
                        </table>
                        <!--table END-->
                        <!--col-md-12 col-md-offset-6 START-->
                        <div class="col-md-12 col-md-offset-6 ">
                            <label class="col-lg-1 control-label">Subtotal de materias:</label>
                            <div class="col-lg-2 ">
                                <input type="text" disabled="" class="form-control" value="9">
                            </div>
                            <label class="col-lg-1 control-label text-center"> de </label>
                            <div class="col-lg-2">
                                <input type="text" disabled="" class="form-control" value="6">
                            </div>
                        </div>
                        <!--col-md-12 col-md-offset-6 END-->
                        <!--col-md-12 col-md-offset-6 START-->
                        <div class="col-md-12 col-md-offset-6 ">
                            <label class="col-lg-1 control-label text-info">Total de materias:</label>
                            <div class="col-lg-2 ">
                                <input type="text" disabled="" class="form-control" value="9">
                            </div>
                            <label class="col-lg-1 control-label text-center"> de </label>
                            <div class="col-lg-2">
                                <input type="text" disabled="" class="form-control" value="6">
                            </div>
                        </div>
                        <!--col-md-12 col-md-offset-6 END-->
                    </div>
                    <!--row END-->
                </div>
                <!--well well-lg END-->

                <!--col-lg-12 START-->
                <div class="col-lg-12">
                    <div class="form-group text-right">
                        <label class="control-label">  </label>
                        <button class="btn btn-info btn-lg">
                            <i class="fa fa-print"></i> Imprimir
                        </button>
                    </div>
                </div>
                <!--col-lg-12 END-->
            </div>
            <!--panel-body END-->
        </div>
        <!--hpanel hblue END-->
    </div>
    <!--col-lg-12 END-->
</div>
<!--row END-->


<div class="row">
    <!--col-lg-12 START-->
    <div class="col-lg-12">
        <label ></label>
        <label ></label>
    </div> 
    <!--col-lg-12 END-->
</div>
<!--row END-->


