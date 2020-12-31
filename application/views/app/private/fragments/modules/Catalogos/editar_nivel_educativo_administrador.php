<!DOCTYPE html>
<?php
/**
 * Vista del administrador, donde edita el nombre del tipo de nivel educativo
 *
 * @since      1.0
 * @version    1.0
 * @link       /editar_nivel_educativo_administrador
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_nivel_educativo_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @controlador    ./application/controllers/administrador/nivel_educativo
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
                    Editar nivel educativo
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <?php
                    if ($this->session->flashdata('nivel_incorrecta')) {
                        ?>

                        <div class="alert alert-danger fade in alert-dismissable">
                            <a class="close" data-dismiss="alert">x</a>
                            <?= $this->session->flashdata('nivel_incorrecta') ?>
                        </div>
                        <?php
                    }
                    ?>
                    <form role="form" id="form" action="<?= base_url() ?>administrador/nivel_educativo/editar_nivel" method="post">
                        <div class="form-group">
                            <label>Nombre nivel educativo</label> 
                            <!--input donde manda llamar el id del nivel educativo para poder editarla, mediante la función de 
                            $nivel->idnivel que viene desde el controlador "nivel_educativo"-->
                            <input type="text" id="nombre_nivel_educativo_administrador" name="nombre_nivel_educativo_administrador" value="<?= $nivel->nomnivel ?>" class="form-control" style="text-transform: uppercase;" required>
                            <input type="hidden" name="id_nivel" id="id_nivel" value="<?= $nivel->idnivel ?>" class="form-control">
                            <span class="help-block"></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Guardar</strong></button>
                            <a href="<?= base_url() ?>administrador/nivel_educativo" class="btn btn-sm btn-danger m-t-n-xs"><strong><i class="fa fa fa-ban"> </i> Cancelar</strong></a>
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



