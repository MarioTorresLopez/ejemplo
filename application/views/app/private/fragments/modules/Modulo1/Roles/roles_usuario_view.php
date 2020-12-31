<?php
/**
 * Vista de la creacion de usuario y asignacion de rol o roles
 *
 * Vista que muestra al usuario la interfaz grafica para agregar un nuevo usuario en el sistema (nombre completo, correo electronico y contraseña ...)ademas de la asigancion de un rol o varios roles
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
                Agregar rol por usuario
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form action="<?= base_url()?>administrador/roles_usuario/crear_rol" method="post" id="form">

                    <!-- ROW START -->
                    <div class="row">
                        
                     <!--  COL-SM-12 START -->                     
                    <div class="col-sm-12">  
                        
                            <div class="form-group ">
                                <div class=" col-sm-12">
                                <label>Nombre completo</label> 
                                <input type="text" id="nombreRol" value=""  name="nombreRol" placeholder="*Nombre completo" class="form-control" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                                </div>
                             </div>
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
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Correo electrónico</label> 
                                <input type="email" value="" id="correoRol" name="correoRol" placeholder="*Correo electrónico" class="form-control"  >
                               <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Contraseña</label> 
                                <input type="password" id="password" value=""  placeholder="*Contraseña" class="form-control" name="password" >
                                 <span class="help-block"></span>
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label>Asignar rol</label> 
                                <select   name="idrol" class="form-control" id="idrol" >
                                    <option>--Selecciona--</option>
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
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-12">
                                <label>Fecha de inicio</label> 
                                <input type="date" value="" id="fechainivig" name="fechainivig" placeholder="*Fecha inicio" class="form-control"  >
                               <span class="help-block"></span>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <div class="col-sm-12">
                                <label>Fecha de vigencia</label> 
                                <input type="date" value="" id="fechafinvig" name="fechafinvig" placeholder="*Fecha fin" class="form-control" >
                                <span class="help-block"></span>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 text-right" >
                                 <div class="col-sm-12">
                                     <button class="btn btn-sm btn-primary m-t-n-xs text-right" id="botonRol" nombre="botonRol"
                                        type="submit"><strong><i class="fa fa-user"> </i> Agregar</strong></button>
                                 </div>
                              </div>
                           
                    </div>
                <!--COL-SM-12 END -->

                    </div>
                    <!-- ROW END -->

                </form>
                <!-- FORM END -->
            </div>
            <!-- PANEL BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->
    </div>
    <!-- COL-LG-6 END -->

    <!-- COL-LG-12 START-->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Usuarios
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <div class="table-responsive">
                <!-- TABLE START -->
                <table id="example2" class="table table-striped table-bordered table-hover">
                    <!-- THEAD START -->
                    <thead>
                        <tr>
                            <th>idusuario</th>
                            <th>Nombre completo</th>
                            <th>Usuario</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <!-- THEAD END -->

                    <!-- TBODY START -->
                    <tbody>
                        <?php
                        if (!is_null($usuario_rol)) :
                            $contador = 0;
                            foreach ($usuario_rol as $rol) :
                                $contador += 1;
                                ?>
                                <tr>
                                    <td><?= $rol->idusuario?></td>
                                    <td> <?= $rol->nomusuario?> </td> 
                                    <td> <?= $rol->correousu?> </td> 
                                     
                                    
                                    <td>                            
                                        <a class = "btn btn-info" href="<?= base_url() ?>administrador/roles_usuario/editar_roles_usuario/<?= $rol->idusuario ?>">
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                        <button class="btn btn-danger eliminacionUsuRol" data-id="<?= $rol->idusuario ?>" type="button">
                                            <i class="fa fa-trash-o"></i> 
                                            <span class="bold"> </span>
                                        </button>

                                    </td>
                                </tr>
                            
                        <?php
                        endforeach;
                    endif;
                    ?>
                       </tbody> 
                        
                        
<!--                       
                    <!-- TBODY END -->

                </table>
                <!-- TABLE END -->
                </div>
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

