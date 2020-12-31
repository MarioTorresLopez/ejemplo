<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/**
 * Vista de listado de solicitudes para gestionar y
 * expedir kardex
 * 
 * @since      1.0
 * @version    1.0
 * @link       NA
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo2.usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./app/gestion_kardex
 */
?>

<div class="row">
    <!-- col-lg-12 START-->
    <div class="col-lg-12">
        <!-- hpanel START-->
        <div class="hpanel hblue">
            <!-- panel-heading START-->
            <div class="panel-heading">
                <!-- panel-tools START-->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END-->
                <h2>Generar kardex</h2>
            </div>
            <!-- panel-heading END-->
            
            <!-- panel-body START-->
            <div class="panel-body">
                <!-- well well-lg START-->
                <div class="well well-lg">
                    <!-- row START-->
                    <div class="row">
                        
                        <!-- col-sm-3 START-->
                        <div class="col-sm-3">
                            <!-- form-group START-->
                            <div class="form-group">
                                <label class="control-label"> Matrícula:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                            <!-- form-group END-->
                        </div>
                        <!-- col-sm-3 END-->
                        
                        <!-- col-sm-3 START-->
                        <div class="col-sm-3">
                            <!-- form-group START-->
                            <div class="form-group">
                                <label class="control-label"> Nombre:</label>
                                <input type="text" value="" id="" class="form-control" name="">
                            </div>
                            <!-- form-group END-->
                        </div>
                        <!-- col-sm-3 END-->
                        
                        
                        <!-- col-lg-12 START-->
                        <div class="col-sm-3">
                            <!-- form-group START-->
                            <div class="form-group">
                                
                                <br>
                                <button class="btn btn-info">
                                    <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                            <!-- form-group END-->
                        </div>
                        <!-- col-lg-12 END-->
                    </div>
                    <!-- row END-->
                </div>
                <!-- well well-lg END-->
                
                <div class="table-responsive">
                <!--table START-->
                 <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">
                     <!--thead START-->
                    <thead>
                        <tr>
                            <th class="text_center">Nombre</th>
                            <th class="text_center">Fecha de solicitud</th>
                            <th class="text_center">Fecha de expedición</th>
                            <th class="text_center">Folio de documento</th>
                            <th class="text_center">Media Superior - Superior</th>
                            <th class="text_center">Normal</th>
                        </tr>
                    </thead>
                    <!--thead END-->
                    
                    <!--tbody START-->
                    <tbody>
                        <?php
                        for ($i = 0; $i <= 4; $i++) {
                            $acumulador = $i + 1;
                            ?>
                            <tr>
                                <td>Michelle Arellano Arteaga </td>
                                <td>08/08/2018</td> 
                                <td>08/08/2018</td> 
                                <td>123<?= $acumulador ?></td> 
                                <td class="tooltip-demo text-center">
                                    <a href="<?php base_url() ?>detalle_kardex_medisup_superior" class="btn btn-primary" data-toggle="tooltip" title='Cargar archivo'>
                                        <i class="fa fa-file-pdf-o"></i>
                                        Ver kardex
                                    </a>
                                </td>
                                <td class="tooltip-demo text-center">
                                    <a href="<?php base_url() ?>detalle_kardex_normal" class="btn btn-default" data-toggle="tooltip" title='Cargar archivo'>
                                        <i class="fa fa-file-pdf-o"></i>
                                        Ver kardex
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    <!--tbody END-->
                </table>
                <!--table END-->
                </div>
            </div>
            <!--panel-body END-->
        </div>
        <!--hpanel END-->
        
        <!--hpanel START-->
        <div class="hpanel hgreen">
            <!--panel-heading START-->
            <div class="panel-heading">
                <!--panel-tools START-->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--panel-tools END-->
                <h2>Historial de kardex generados</h2>
            </div>
            <!--panel-heading END-->
            
            <!--panel-body START-->
            <div class="panel-body">
                <div class="table-responsive">
                <!--table START-->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!--thead START-->
                    <thead>
                        <tr>
                            <th class="text_center">Nombre</th>
                            <th class="text_center">Fecha de solicitud</th>
                            <th class="text_center">Fecha de expedición</th>
                            <th class="text_center">Folio de documento</th>
                            <th class="text_center">Acciones</th>
                        </tr>
                    </thead>
                    <!--thead END-->
                    
                    <!--tbody START-->
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
                    <!--tbody END-->
                </table>
                <!--table END-->
                </div>
            </div>
            <!--panel-body END-->
        </div>
        <!--hpanel END-->
        
    </div>
    <!--pacol-lg-12 END-->

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



