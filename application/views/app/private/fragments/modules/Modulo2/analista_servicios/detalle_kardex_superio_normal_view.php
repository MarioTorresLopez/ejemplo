<?php
/**
 * Vista de listado pare expedir kardex de
 * escuelas normales
 * 
 * @since      1.0
 * @version    1.0
 * @link       NA
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo2.usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./app/detalle_kardex_superio_normal
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
                <h2>Generar Kardex Normal</h2>
            </div>
            <!--panel-heading END-->
            
            <!--panel-body START-->
            <div class="panel-body">
                <!--well well-lg START-->
                <div class="well well-lg">
                    <!--row START-->
                    <div class="row">
                        <h4 class="font-bold text-center title-text">
                            SISTEMA EDUCATIVO NACIONAL
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
                        <!--col-lg-12 START-->
                        <div class="col-lg-12 ">
                            <!--form-group START-->
                            <div class="form-group col-lg-6">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:35%;">Nombre de la escuela</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-6">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:35%;">Clave del centro de trabajo</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:32%;">Primer apellido</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:30%;">Segundo apellido</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:40%;">Nombre(s)</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:40%;">Licenciatura</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:40%;">Modalidad</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--form-group START-->
                            <div class="form-group col-lg-4">
                                <input type="text" value="" id="" class="form-control" name="">
                                <label style="margin-left:40%;">Matrícula</label>
                            </div>
                            <!--form-group END-->
                            
                            <!--table START-->
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                                <!--thead START-->
                                <thead>
                                    <tr>
                                        <th colspan="4" scope="col">
                                           
                                        </th>
                                        <th class="text-center" colspan="3">
                                          TEMPORAL
                                        </th>
                                        <th class="text-center" colspan="3">
                                          DEFINITIVA
                                        </th>
                                    </tr>
                                </thead>
                                <!--thead END-->
                                <!--thead START-->
                                <thead>
                                    <tr rowspan="2">
                                        <th colspan="4">
                                            
                                        </th>
                                        <!--<th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>-->
                                        <th class="text-center" colspan="6">Períodos de regularización</th>
                                    </tr>
                                    <tr rowspan="2">
                                        
                                        <th class="text-center">Clave</th>
                                        <th class="text-center">Asignatura</th>
                                        <th class="text-center">Calificación final</th>
                                        <th class="text-center">Porcentaje de asistencia</th>
                                        <th>FECHA</th>
                                        <th>CALIF</th>
                                        <th>FECHA</th>
                                        <th>CALIF</th>
                                        <th>FECHA</th>
                                        <th>CALIF</th>
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
                                            <td>08/08/2017</td>
                                            <td>9</td>
                                            <td>8/08/2017</td>
                                            <td>9</td>
                                            <td>8/08/2017</td>
                                            <td>9.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                                <!--tbody END-->
                            </table>
                            <!--table END-->
                            
                            <!--form-goum col-md-12 START-->
                            <div class="col-md-12 col-md-offset-6 form-group">
                                <label class="col-lg-1 control-label">Promedio general de aprovechamiento</label>
                                <div class="col-lg-2">
                                    <input type="text" disabled="" class="form-control" value="9">
                                </div>
                            </div>
                            <!--form-goum col-md-12 END-->
                        </div>
                        <!--col-lg-12 END-->
                    </div>
                    <!--row END-->
                </div>
                <!--well well-lg END-->
                
                <!--col-lg-12 START-->
                <div class="col-lg-12">
                    <!--form-group START-->
                    <div class="form-group text-right">
                        <label class="control-label">  </label>
                        <button class="btn btn-info btn-lg">
                            <i class="fa fa-print"></i> Imprimir
                        </button>
                    </div>
                    <!--form-group END-->
                </div>
                <!--col-lg-12 END-->
            </div>
            <!--panel-body END-->
        </div>
        <!--hpanel END-->
    </div>
    <!--col-lg-12 END-->
</div>
<div class="row">
    <!--col-lg-12 START-->
    <div class="col-lg-12">
        <label ></label>
        <label ></label>
    </div> 
    <!--col-lg-12 END-->
</div>
<!--row END-->

