<?php
/**
 * Vista de la edicion del usuario
 *
 * Vista que muestra al usuario la interfaz grafica para editar los datos del usuario (nombre, correo, contraseña)
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/roles_usuario
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
                Editar datos de mi cuenta
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
                <form role="form" id="form" action="<?= base_url() ?>app/micuenta/editar_post" method="post">

                    <div class="row">
                        <!--<div class="col-sm-12">-->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Correo electrónico</label> 
                                    <input type="email" id="correo1" name="correo1" placeholder="*Campo requerido" value="<?= $datoscuenta->correousu ?>" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Contraseña</label>
                                    <input type="password" value="<?= $datoscuenta->passwordusu ?>" id="password1" name="password1" class="form-control">
                                    <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 text-right">
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit" id="cambiosUsuario" name="cambiosUsuario">
                                    <strong><i class="fa fa-file-text"> </i> Guardar</strong>
                                </button>
                                <a href="<?= base_url() ?>app/inicio">
                                    <button class="btn btn-sm btn-danger m-t-n-xs" type="button" id="cancelar" name="cancelar">
                                        <strong><i class="fa fa fa-ban"> </i> Cancelar</strong>
                                    </button>
                                </a>
                            </div>
                        <!--</div>-->
                    </div>

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
<!-- ROW END -->