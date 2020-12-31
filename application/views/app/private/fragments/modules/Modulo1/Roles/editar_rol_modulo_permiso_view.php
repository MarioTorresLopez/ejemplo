<?php
/**
 * Vista de la gestion de edicion de permisos
 *
 * Vista que muestra al usuario la interfaz grafica para editar los permisos existentes en el sistema, colocados de acuerdo al rol y modulo establecido
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
<!--Actualización-->
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
                Editar rol y módulo con permiso
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form role="form" id="form" action="<?= base_url()?>administrador/roles_admin/editar_roles_modulo_permisos_post" method="post">
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
                    <!-- ROW START-->
                    <div class="row">

                        <div class="col-sm-12">

                            <div class="form-group col-sm-12">
                                <label for="rol">Rol</label> 
                                <?php if(!is_null($permodulo)) :
 foreach ($permodulo as $row) : 
                                ?>
                                
                                <?php endforeach;?>
                                <input type="text" id="nombre_rol" name="nombre_rol" class="form-control" value="<?=$row->nomrol?>" disabled>
                                <input type="hidden" name="idrol" id="idrol"  value="<?=$row->idrol?>">
                        <?php endif;?>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="modulo">Módulo</label> 
                                <input type="text" id="nombre_rol" name="nombre_rol" value="<?=$row->nommodulo ?>" class="form-control" disabled >
                                <input type="hidden" name="idmodulo" id="idmodulo" value="<?=$row->idmodulo ?>" class="form-control">
                                <!--<input type="hidden" name="idRolPer" id="idRolPer" value="<?=$row->nommodulo ?>" class="form-control">-->
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="permiso">Permiso</label>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    Visualizar 
                                <?php
                                $arr =array();
                                $rr=0;
                                $tt="";
                                foreach($permodulo as $algo):
                                    $arr[] = $algo;
                                $tt.="$algo->permisos ";
                                $rr=$rr+1;
                                    ?>
                                    <input type="hidden" name="validarP" id="validarP" value="<?=$algo->permisos?>">
                                    
                                    <?php
                                endforeach;
                                ?>    
                                    
                                    <input type="hidden" id="itp" value="<?= $tt?>">
                                    <!--Probando las validaciones de los input tipo checkbox-->
                                    <input type="checkbox" id="ch1" checked="" name="check[]"  value="1" data-prueba="">
                                </div>
                             </div>
                            <div class="form-group"> 
                                <div class="col-sm-3">
                                Crear <input type="checkbox" id="ch2" checked="" name="check[]"  value="2">
                                </div>
                             </div>
                            <div class="form-group"> 
                                <div class="col-sm-3">
                                Modificar <input type="checkbox" id="ch3" checked="" name="check[]"  value="3">
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-3">
                                Eliminar <input type="checkbox" id="ch4" checked="" name="check[]"  value="4">
                                </div>
                            </div>
                            <div class="form-group col-sm-12 text-right">
                                <a href="<?= base_url() ?>administrador/roles_admin">
                                    <button class="btn btn-sm btn-primary m-t-n-xs eliminacionEspecifica" id="botonmodulo" type="submit">
                                        <strong><i class="fa fa-file-text"> </i> Guardar</strong>
                                    </button>
                                </a>
                                <a href="<?= base_url() ?>administrador/roles_admin">
                                    <button class="btn btn-sm btn-danger m-t-n-xs" type="button">
                                        <strong><i class="fa fa fa-ban"> </i> Cancelar</strong>
                                    </button>
                                </a>
                            </div>

                        </div>

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
<!-- ROW END -->
