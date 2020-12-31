<?php
/**
 * Vista de la gestion de asignacion de roles por usuarios
 *
 * Vista que muestra al usuario la interfaz grafica para agregar, mostrar, editar y eliminar los roles existentes de cada usuario 
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
                Agregar rol
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
                <form action="<?= base_url()?>administrador/roles_admin/crear_rol_admin" method="post" id="form">

                    <!-- ROW START -->
                    <div class="row">

                        <!-- COL-SM-12 START -->
                        <div class="col-sm-12">

                            <div class="form-group ">
                              <div class="col-sm-12">
                                <label>Nombre del rol</label> 
                                <input type="text" id="nombre_rol" name="nombre_rol" placeholder="*Campo requerido" class="form-control" style="text-transform: uppercase;">
                                 <span class="help-block"></span>
                              </div>
                            </div>
                            <div class="form-group clol-sm-12 text-right">
                                <div class="col-sm-12">
                                <button class="btn btn-sm btn-primary m-t-n-xs" id="botonRol" nombre="botonRol" type="submit">
                                    <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                                </div>
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


    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Roles
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <div class="table-responsive">
                <!-- TABLE START -->
                <table id="example3" class="table table-striped table-bordered table-hover">
                    <!-- THEAD START -->
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de última modificación</th>
                            <th>Usuario que modificó</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>    
                    <!-- THEAD END -->

                    <!-- TBODY START -->
                    
                        <tbody>
                        <?php
                        if (!is_null($usuarioRoles)) :
                            $contador = 0;
                            foreach ($usuarioRoles as $rol) :
                                $contador += 1;
                                ?>
                                <tr>
                                    <td> <?= $rol->nomrol?> </td> 
                                    <td> <?= $rol->fecmodificacion?> </td> 
                                    <td> <?= $rol->usuariomodificacion?> </td> 
                                    
                                    <td>                            
                                        <a class = "btn btn-info" href="<?= base_url() ?>administrador/roles_admin/editar_rol/<?= $rol->idrol ?>">
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                        <button class="btn btn-danger eliminacionUsuRol" data-id="<?= $rol->idrol ?>" type="button">
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
                </table>
                <!-- TABLE END -->
                </div>

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->


    <!-- COL-LG-6 START-->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START-->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Asignar rol
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form  action="<?= base_url()?>administrador/roles_admin/asignar_rol" method="post" id="form1">

                    <!-- ROW START -->
                    <div class="row">

                        <!-- COL-SM-12 START -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                 <div class="col-sm-12">
                                <label> Ingresar rol</label> 
                                <select name="idrol" id="idrol" class="form-control m-b" required="">
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
                                <span class="help-block"></span>
                                </div>
                        </div>

                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Asignar módulos</label> 
                                <select name="idmodulo" id="idmodulo"  class="form-control m-b">
                                        <option>---Seleccione---</option>
                                         <?php
                                            if (!is_null($modulosA)) :
                                                $contador = 0;
                                                foreach ($modulosA as $modulo) :
                                                    $contador += 1;
                                                    ?>
                                                    <option value="<?= $modulo->idmodulo ?>"><?= $modulo->nommodulo ?></option>      
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
                        <table id="" class="table table-striped table-bordered table-hover">      
                            <!-- THEAD START -->
                            <thead>
                                <tr>

                                    <th>Visualizar</th> 
                                    <th>Crear</th> 
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                    
                                </tr>
                            </thead>
                        <!-- THEAD END -->

                        <!--TBODY START -->
                        <tbody>
                            
                                <tr> 
                                    
                                    <td> <input type="checkbox" id="ch1" name="check[]"  value="1" ></td>
                                    <td> <input type="checkbox" id="ch2" name="check[]"  value="2" ></td>
                                    <td> <input type="checkbox" id="ch3" name="check[]"  value="3"></td>
                                    <td> <input type="checkbox" id="ch4" name="check[]"  value="4"></td>
                                    
                                </tr>
                            
                        </tbody>
                        <!-- TBODY END -->
                       
                    </table>
                        <span class="help-block"></span>  
                </div>
                    
              </div>
                    <div class="form-group col-sm-12 text-right">
                        <div class="col-sm-12">
                          <button class="btn btn-sm btn-primary m-t-n-xs" id="botonmodulo" nombre="botonmodulo" type="submit">
                               <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                         </div>
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
    <!-- COL-LG-6 END -->

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Nomenclatura
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- ROW START -->
                <div class="row">

                    <!-- COL-SM-12 START -->
                    <div class="col-sm-12">
                        <div class="col-sm-3">
                            <label>1.- Visualizar</label>
                        </div>
                        <div class="col-sm-3">
                            <label>2.- Crear</label>
                        </div>
                        <div class="col-sm-3">
                            <label>3.- Modificar</label>
                        </div>
                        <div class="col-sm-3">
                            <label>4.- Eliminar</label>
                        </div>
                    </div>
                    <!-- COL-SM-12 END -->

                </div>
                <!-- ROW END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->


    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Roles y módulos con permiso
            </div>
            <!-- PANEL-HEADING END -->

            <!-- PANEL-BODY -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <div class="table-responsive">
                <!-- TABLE START -->
                <table id="example2" class="table table-striped table-bordered table-hover">

                    <!-- THEAD START -->
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Módulo</th>
                            <th>Permiso</th>
                            <th>Editar/Eliminar</th>

                        </tr>
                    </thead>
                    <!-- THEAD END -->

                    <!-- TBODY START -->
                    <tbody>
                    <?php
                        if (!is_null($permodulo)) :
                            
                             foreach ($permodulo as $moduloPer) :
//                             foreach ($permodulo1 as $moduloPer1) :
                                $contador = 0;
//                                foreach ($permodulo2 as $moduloPer2) :
//                                   $permodulo = $permodulo + $permodulo2 ;
//                                    foreach ($permodulo3 as $moduloPer3) :
//                                      $permodulo2 = $permodulo2 + $permodulo3 ;
//                                       foreach ($permodulo4 as $moduloPer4) :
//                                          $permodulo3 = $permodulo3 + $permodulo4 ;
                              
                                ?>
                                <tr>
                                    <td> <?= $moduloPer->nomrol?> </td>  
                                    <td> <?= $moduloPer->nommodulo?> </td> 
                                    <td> 
                                        <?php if (!is_null($permisos)) :
                                          $algo="";
                                          foreach ($permisos as $p2):
                                              foreach ($p2 as $p3):
                                              if($moduloPer->idrol==$p3->idrol && $moduloPer->idmodulo==$p3->idmodulo):
                                                  $algo.=$p3->permisos;
                                              endif;
                                              //$algo.=$p3->permisos;
                                              endforeach;
                                              
                                          endforeach;
                                          $b=$algo;
                                          ?>
                                        <?=  $b ?>
                                          <?php
                                        endif;?>
                                    </td>
                                    <td>                            
                                        <a class = "btn btn-info" href="<?= base_url() ?>administrador/roles_admin/editar_roles_permiso_modulo/<?= $moduloPer->idrol?>/<?= $moduloPer->idmodulo?>">
                                            <i class="fa fa-paste"></i> 
                                            <span class="bold">  </span>
                                        </a>
                                        <!--Agregado de atributos para eliminar--->
                                        <button class="btn btn-danger eliminacionAdminRol" data-idrol="<?= $moduloPer->idrol?>" data-idmodulo="<?= $moduloPer->idmodulo?>" type="button">
                                            <i class="fa fa-trash"></i> 
                                            <span class="bold"> </span>
                                        </button>

                                    </td>
                                </tr>
                            
                        <?php
                        endforeach;
//                        endforeach;
//                        endforeach;
//                        endforeach;
//                        endforeach;
                    endif;
                    ?>
                                </tbody>
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
<!-- ROW END-->
