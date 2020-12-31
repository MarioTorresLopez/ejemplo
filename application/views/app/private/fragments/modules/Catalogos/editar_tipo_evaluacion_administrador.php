<!DOCTYPE html>
<?php
/**
 * Vista del administrador, donde edita el nombre de tipo de
 * evaluación
 * @since      1.0
 * @version    1.0
 * @link       /editar_tipo_evaluacion
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_tipo_evaluacion_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @controlador    ./application/controllers/administrador/tipo_evaluacion
 */
?>

<div class="content">

    <div class="row">
        <!-- col-lg-6 -->
        <div class="col-lg-12">
            <!-- hpanel -->
            <div class="hpanel hblue">
                <!-- panel-heading -->
                <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                    <!-- panel-tools -->
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <!-- /.panel-heading -->
                    Editar tipo evaluación
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <?php
                if ($this->session->flashdata('tevaluacion_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('tevaluacion_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                    <form role="form" id="form" action="<?=base_url()?>administrador/tipo_evaluacion/editar_tipo_evaluacion" method="post">
                        <div class="form-group">
                            <label for="nombre" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre tipo evaluación</label> 
                            <input type="text" id="nombre_tipo_evaluacion_administrador" name="nombre_tipo_evaluacion_administrador" value="<?=$tevaluacion->nombre?>" class="form-control" style="text-transform: uppercase;" required>
                            <input type="hidden" name="idEvaluacion" id="idEvaluacion" value="<?=$tevaluacion->idevaluacion?>" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Guardar</strong></button>
                            <a href="<?= base_url() ?>administrador/tipo_evaluacion" class="btn btn-sm btn-danger m-t-n-xs"><strong><i class="fa fa fa-ban"> </i> Cancelar</strong></a>
                        </div>
                    </form>
                    <!-- ./form -->
                </div>
                <!-- ./panel-body -->
            </div>
            <!-- ./hpanel -->
        </div>
        <!-- ./col-lg-6 -->

    </div>
</div>



