<!DOCTYPE html>
<?php
/**
 * Vista del administrador, contiene un formulario en donde se puede editar el nombre de la materia 
 * que ingreso el usuario.
 *
 * @since      1.0
 * @version    1.0
 * @link       /editar_materia_catalogo
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.editar_materia_catalogo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @controlador    ./application/controllers/administrador/materia
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
                    Editar materia
                </div>
                <!-- /.panel-heading -->
                <!-- panel-body -->
                <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                    <p>
                        Formulario 
                    </p>
                    <!-- form -->
                    <?php
                    if ($this->session->flashdata('materia_incorrecta')) {
                        ?>

                        <div class="alert alert-danger fade in alert-dismissable">
                            <a class="close" data-dismiss="alert">x</a>
                            <?= $this->session->flashdata('materia_incorrecta') ?>
                        </div>
                        <?php
                    }
                    ?>
                    <form role="form" id="form" action="<?= base_url() ?>administrador/materia/editar_materia" method="post">
                        <div class="form-group">
                            <label>Nombre materia</label> 
                            <!--input donde manda llamar el id de la materia para poder editarla, mediante la función de 
                            $materia->asignatura que viene desde el controlador "materia"-->
                            <input type="text" id="nombre_materia_catalogo" name="nombre_materia_catalogo" value="<?= $materia->asignatura ?>" class="form-control" style="text-transform: uppercase;" required>
                            <input type="hidden" name="id_materia" id="id_materia" value="<?= $materia->idmateria ?>" class="form-control">
                            <!-- span se utiliza para validar que tenga contenido el input y pueda dar el siguiente paso, se escuenta 
                                 en el JS "validacion_catalogo"-->
                            <span class="help-block"></span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Guardar</strong></button>
                            <a href="<?= base_url() ?>administrador/materia" class="btn btn-sm btn-danger m-t-n-xs"><strong><i class="fa fa fa-ban"> </i> Cancelar</strong></a>
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



