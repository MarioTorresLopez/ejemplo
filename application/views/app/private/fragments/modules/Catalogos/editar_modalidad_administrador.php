<!DOCTYPE html>
<?php
/**
 * Vista del administrador, donde edita el nombre de la modalidad
 * @since      1.0
 * @version    1.0
 * @link       /editar_modalidad
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_modalidad_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/editar_modalidad_administrador
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
                    Editar modalidad
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <?php
                    if ($this->session->flashdata('modalidad_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('modalidad_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                    <form role="form" id="form" action="<?=base_url()?>administrador/modalidad/editar_post" method="post">
                        <div class="form-group">
                            <label for="nombre" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre modalidad</label> 
                            <!--input donde manda llamar el id de la modalidad para poder editarla, mediante la función de 
                            "$modalidad->asignatura" que viene desde el controlado "materia"-->
                            <input type="text" id="nombre_modalidad_administrador" name="nombre_modalidad_administrador" value="<?=$modalidad->nommodalidad?>" class="form-control" style="text-transform: uppercase;" required>
                            <input type="hidden" name="idModalidad" id="idModalidad" value="<?=$modalidad->idmodalidad?>" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Guardar</strong></button>
                            <a href="<?= base_url() ?>administrador/modalidad"  class="btn btn-sm btn-danger m-t-n-xs"><strong><i class="fa fa fa-ban"> </i> Cancelar</strong></a>
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

