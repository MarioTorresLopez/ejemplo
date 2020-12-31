<!DOCTYPE html>
<?php
/**
 * Vista del administrador, donde edita el turno  
 * @since      1.0
 * @version    1.0
 * @link       /editar_turno_administrador
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_turno_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/editar_turno
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
                    Editar turno
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <?php
                if ($this->session->flashdata('turno_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('turno_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                    <form role="form" id="form" action="<?= base_url()?>administrador/turno/editar_post" method="post">
                        <div class="form-group">
                            <label for="nombre" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre turno</label> 
                            <input type="text" id="nombre_turno_administrador" name="nombre_turno_administrador" style="text-transform: uppercase;" value="<?=$turno->descturno?>"  placeholder="*Campo requerido" class="form-control" required>
                            <input type="hidden" name="id_turno" id="idModalidad" value="<?=$turno->idturno?>" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Guardar</strong></button>
                            <a href="<?= base_url() ?>administrador/turno" class="btn btn-sm btn-danger m-t-n-xs"><strong><i class="fa fa fa-ban"> </i> Cancelar</strong></a>
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







