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
                Editar datos del usuario
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
                <form role="form" id="form" action="<?=base_url()?>administrador/roles_usuario/editar_post" method="post">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Nombre completo</label> 
                                <input type="text" id="nombreRol" name="nombreRol" placeholder="*Campo requerido" value="<?=$rol->nomusuario?>"class="form-control" style="text-transform: uppercase;">
                                  <input type="hidden" name="idRol" id="idRol" value="<?=$rol->idusuario?>" class="form-control">
                            <span class="help-block"></span>
                                </div>
                                </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Correo electrónico</label> 
                                <input type="email" id="correoRol" name="correoRol" placeholder="*Campo requerido" value="<?=$rol->correousu?>"class="form-control"  class="form-control" >
                              <span class="help-block"></span>
                                </div>
                                </div>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Rol actual</label>
                                    <input type="text" value="<?=$rol->nomrol?>" class="form-control" disabled="">
                                    <label>Rol nuevo</label>
                                    <select name="idrolnuevo" class="form-control" id="idrolnuevo" >
                                    <option>---Seleccione---</option>
                                     <?php
                                            if (!is_null($roles)) :
                                                $contador = 0;
                                                foreach ($roles as $rol) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $rol->idrol ?>"><?= $rol->nomrol ?></option>      
                                                    <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="form-group col-sm-12 text-right">
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit">
                                    <strong><i class="fa fa-file-text"> </i> Guardar</strong>
                                </button>
                                <a href="<?= base_url() ?>administrador/roles_usuario">
                                    <button class="btn btn-sm btn-danger m-t-n-xs" type="button">
                                        <strong><i class="fa fa fa-ban"> </i> Cancelar</strong>
                                    </button>
                                </a>
                            </div>
                        </div>
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