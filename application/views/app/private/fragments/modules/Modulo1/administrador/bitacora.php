<!DOCTYPE html>
<?php
/**
 * Vista del administrador, muestra una tabla con la lista de las modalidades, donde las acciones son; 
 * agregar, eliminar o editar 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /modalidad
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.modalidades_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/modalidades
 */
?>

<!--<style>table {
        table-layout: fixed;
        word-wrap: break-word;
    }</style>-->
<div class="hpanel hblue">

    <!-- PANEL-HEADING START -->
    <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
        <div class="panel-tools">
            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
        </div>
        Bitácora
    </div>
    <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

        <div class="table-responsive">
            <!-- TABLE START -->
            <table id="example3" class="table table-striped table-bordered table-hover" >
                <!-- THEAD START -->
                <thead>
                    <tr>
                        <th width="15%">Institución</th>
                        <th width="15%">Analista</th>
                        <th width="25%">Documento</th>
                        <th width="35%">Comentario</th>
                        <th width="10%">Fecha</th>

                    </tr> 
                </thead>    
                <!-- THEAD END -->

                <!-- TBODY START -->
                <tbody>
                    <?php
                    if(!is_null($registrosBitacora)):
                        $cont = 0;
                        foreach ($registrosBitacora as $registro):
                            $cont++;
                        ?>
                    <tr>
                        <td><?= $registro->institucion?></td>
                        <td><?= $registro->usuario?></td>
                        <td><?= $registro->documento?></td>
                        <td><?= $registro->comentario?></td>
                        <td><?= $registro->fecha_hora?></td>
                        
                    </tr>
                    <?php
                        endforeach;
                    endif;?>

                </tbody>
            </table>
            <!-- TABLE END -->
        </div>

    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <label>  </label>
    </div>
    <div class="col-lg-12">
        <label>  </label>
    </div>
</div>-->