<?php
/**
 * Vista de solicitud de baja a institución
 *
 * Vista que muestra al usuario la interfaz grafica para agregar datos requeridos para la solicitud de baja de la institución
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/baja_institucion
 */
?>


<!DOCTYPE html>

<div class="row">
    <!-- col-lg-12 START -->
    <div class="col-lg-12">
        <!-- hpanel hblue START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Solicitud
            </div>
            <!-- panel-heading END -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <p>
                    Formulario 
                </p>
                <!-- row START-->
                <div class="row">
                    <!-- form START-->
                    <form role="form" id="form">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="clave">Clave</label> 
                                <input type="text" id="clave" name="clave" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="telefono">Teléfono</label> 
                                <input type="text" id="telefono" name="telefono" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
						<div class="form-group">
                            <div class="col-sm-4">
                                <label for="correo_electronico">Correo electrónico</label> 
                                <input type="text" id="correo_electronico" name="correo_electronico" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nombre_escuela">Nombre de la escuela</label> 
                                <input type="text" id="nombre_escuela" name="nombre_escuela" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="fundacion">Año de fundación</label> 
                                <input type="text" id="fundacion" name="fundacion" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="direccion_escuela">Dirección escuela</label> 
                                <input type="text" id="direccion_escuela" name="direcccion_escuela" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="zona">Zona</label> 
                                <input type="text" id="zona" name="zona" placeholder="*Campo requerido" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="periodo_baja">Periodo de baja</label> 
                                <select name="periodo_baja" class="form-control m-b">
                                    <option>---Seleccione---</option>
                                    <option value="">Temporal</option>
                                    <option value="">Definitiva</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label for="nivel_educativo">Nivel educativo</label> 
                                <select name="nivel_educativo" class="form-control m-b">
                                    <option>---Seleccione---</option>
                                    <option value="">Media Superior</option>
                                    <option value="">Superior</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-user"> </i> Enviar</strong></button>
                            </div>
                        </div>
                    </form>
                    <!-- form END-->
                </div>
                <!--row END -->
            </div>
        </div>
        <!-- hpanel hblue END -->
    </div>
    <!-- col-lg-12 END -->

    
</div>     

