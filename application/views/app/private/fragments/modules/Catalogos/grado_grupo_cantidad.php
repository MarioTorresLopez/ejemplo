<!DOCTYPE html>
<?php
/**
 * Vista del administrador, muestra una tabla con la lista de las modalidades, donde las acciones son; 
 * agregar, eliminar o editar 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /modalidad
 * @package    application.views
 * @subpackage app.private.fragments.modules.catalogos.modalidades_administrador
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/administrador/modalidades
 */
?>
<div class="row">
    <!--     col-lg-6 START -->
    <div class="col-lg-12">
        <!--         hpanel START -->
        <div class="hpanel hblue">
            <!--             panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--                 panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--                 panel-tools END -->
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <p>
                    <!--                    Formulario -->
                </p>
                <!--                 form START -->
                
                <form  id="form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label>Grado</label> 
                                <input type="text" id="grado" name="grado" placeholder="*Campo requerido" class="form-control" style="text-transform: uppercase;" >
                                 <span class="help-block"></span>
                                </div>
                                 <div class="col-sm-12">
                                <label>Grupo</label> 
                                <input type="text" id="grupo" name="grupo" placeholder="*Campo requerido" class="form-control" style="text-transform: uppercase;" >
                                 <span class="help-block"></span>
                                </div>
                                 <div class="col-sm-12">
                                <label>Cantidad</label> 
                                <input type="text" id="cantidad" name="cantidad" placeholder="*Campo requerido" class="form-control" >
                                 <span class="help-block"></span>
                                </div>
                            </div>
                            <div>
                                <div class="col-sm-12">
                                <button class="btn btn-sm btn-primary m-t-n-xs" id="botonMod" name="botonGrupo" type="submit">
                                    <strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
                <!--                 form END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--         hpanel END -->
    </div>

    <!--     col-lg-6 END 
    
         col-lg-12 START -->
    <div class="col-lg-12">
        <!--         hpanel START -->
        <div class="hpanel hblue">
            <!--             panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!--                 panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--                 panel-tools END -->
                
            </div>
            <!--             panel-heading END 
                         panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!--                 table START -->
                <table id="" class="table table-striped table-bordered table-hover">
                    <!--                     thead START -->
                    <thead>
                        <tr>
                            <th>Grado</th>
                            <th>Grupo</th>
                            <th>Cantidad</th>
                            <th>Editar/Eliminar</th>
                        </tr>
                    </thead>
                    <!--                     thead END 
                                         tbody START -->
                   
                    <!--                     tbody END -->

                </table>
                <!-- table END -->
            </div>
            <!--             panel-body END -->
        </div>
        <!--        hpanel END -->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
</div>
