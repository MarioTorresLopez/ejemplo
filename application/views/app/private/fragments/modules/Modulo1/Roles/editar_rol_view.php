<?php
/**
 * Vista de la edicion del rol 
 *
 * Vista que muestra al usuario la interfaz grafica para editar el nombre del rol, 
 * la fecha de modificacion se realizará al momento dela edicion y el usuario quien 
 * realizo la acción
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/roles
 */
?>

<!DOCTYPE html>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Editar rol
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <?php
                    if ($this->session->flashdata('rol_incorrecta')) {
                    ?>

                    <div class="alert alert-danger fade in alert-dismissable">
                        <a class="close" data-dismiss="alert">x</a>
                        <?= $this->session->flashdata('rol_incorrecta') ?>
                    </div>
                    <?php
                }
                ?>
                <!-- FORM START -->
                <form action="<?= base_url()?>administrador/roles_admin/editar_rol_modulo_permiso" method="post" id="form">

                    <!-- ROW START -->
                    <div class="row">

                        <!-- COL-SM-12 START -->
                        <div class="col-sm-12">

                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Nombre del rol</label> 
                                <input type="text" id="nombre_rol" name="nombre_rol" placeholder="*Campo requerido" value="<?=$rolAdmin->nomrol?>" class="form-control" style="text-transform: uppercase;">
                                <input type="hidden" name="idRol" id="idRol" value="<?=$rolAdmin->idrol?>"  class="form-control">
                            <span class="help-block"></span>
                                </div>
                                </div>
                            <div class="form-group col-sm-12 text-right">
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                                    <strong><i class="fa fa-file-text"> </i> Guardar</strong>
                                </button>
                                <a href="<?= base_url() ?>administrador/roles_admin">
                                    <button class="btn btn-sm btn-danger m-t-n-xs" type="button">
                                        <strong><i class="fa fa fa-ban"> </i> Cancelar</strong>
                                    </button>
                                </a>
                            </div>

                        </div>
                        <!-- COL-SM-12 END -->

                    </div>
                    <!-- ROW END -->

                </form>
                <!-- FORM END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->
    </div>
    <!-- COL-LG-12 END -->

    <!-- ROW START-->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
    <!-- ROW END-->

</div>
<!-- ROW END-->