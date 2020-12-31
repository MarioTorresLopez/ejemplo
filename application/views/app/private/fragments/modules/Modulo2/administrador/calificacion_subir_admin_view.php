<?php
/**
 *  Vista de calificacion
 *
 *  * Vista donde el usuario podra dar de alta las calificaciones por medio de adjunto de excel
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/calificacion_adminitrador
 */
?>


<!DOCTYPE html>


<!-- row START -->
<div class="row">
    <!-- col-lg-6 START -->
    <div class="col-lg-6">
        <!-- hpanel START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
              Ingresar datos
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- form START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <!-- tab-content START -->
                    <div class="tab-content">
                        <!-- step1 START -->
                        <div id="step1" class="p-m tab-pane active">

                            <!-- row START -->
                            <div class="row">
                                <!-- col-lg-12 START -->
                                <div class="col-lg-12">
                                    <!-- row START -->
                                    <div class="row">
                                       <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir nivel educativo</label>
                                            <!-- select START -->   
                                            <select name="nivel" class="js-source-states" style="width: 100%">
                                                <option>Selecciona una opción</option>
                                                <option value="1">Media superior</option>
                                                <option value="2">Superior</option>
                                                <option value="3">Normal</option>
                                            </select>

                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir institución</label>
                                            <!-- select START -->   
                                            <select value="" id="institucion" class="js-source-states" style="width: 100%" name="elegir_institucion">
                                                <option>Selecciona una opción</option>
                                                <option value="AZ">UTEQ</option>
                                                <option value="AZ">UVM</option>
                                                <option value="AZ">UNICEQ</option>
                                                <option value="AZ">ITQ</option>
                                                <option value="AZ">UPQ</option>
                                                <option value="AZ">UNAQ</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir plantel   </label>
                                            <!-- select START -->   
                                            <select value="" id="plantel" class="js-source-states" style="width: 100%" name="elegir_plantel">
                                                <option>Selecciona una opción</option>
                                                <option value="AZ">Plantel 1</option>
                                                <option value="AZ">Plantel 2</option>
                                                <option value="AZ">Plantel 3</option>
                                                <option value="AZ">Plantel 4</option>
                                                <option value="AZ">Plantel 5</option>
                                                <option value="AZ">Plantel 6</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir carrera  </label>
                                            <!-- select START -->   
                                            <select value="" id="carrera" class="js-source-states" style="width: 100%" name="elegir_carrera">
                                                <option value="plantel1">Informática</option>
                                                <option value="plantel2">Redes</option>
                                                <option value="plantel3">Mecatrónica</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir especialidad  </label>
                                            <!-- select START -->   
                                            <select value="" id="carrera" class="js-source-states" style="width: 100%" name="elegir_carrera">
                                                <option>Selecciona una opción</option>
                                                <option value="1">Sistemas informáticos</option>
                                                <option value="2">Redes</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->

                                        <div class="form-group col-lg-12">
                                            <label>Elegir grupo</label>
                                            <!-- select START -->   
                                            <select value="" id="grupo" class="js-source-states" style="width: 100%">
                                                <option value="plantel1">T-171</option>
                                                <option value="plantel2">T-172</option>
                                                <option value="plantel3">T-173</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        
                                         <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir turno  </label>
                                            <!-- select START -->   
                                            <select value="" id="turno" class="js-source-states" style="width: 100%" name="elegir_turno">
                                                <option value="plantel1">Matutino</option>
                                                <option value="plantel2">Vespertino</option>
                                                <option value="plantel3">Mixto</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                         <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir tipo  </label>
                                            <!-- select START -->   
                                            <select value="" id="tipo" class="js-source-states" style="width: 100%" name="elegir_carrera">
                                                <option value="plantel1">Pública</option>
                                                <option value="plantel2">Privada</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Agregar documento</label>
                                            <input type="file" value="" id="documento" class="form-control" name="agregar_documento">
                                        </div>

                                        <!-- col-lg-12 END -->
                                        <div class="form-group col-lg-12">
                                            <!-- table START -->
                                            <table  class="table table-striped table-bordered table-hover">
                                                <!-- thead START -->
                                                <thead>
                                                    <tr>
                                                        <th>Documento</th>
                                                        <th>Estado</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <!-- thead END -->
                                                <!-- tbody START -->
                                                <tbody>
                                                    <tr>
                                                        <td>Calificaciones Gastronomía</td>
                                                        <td>
                                                            <div class="m">
                                                                <div class="progress m-t-xs full progress-striped active">
                                                                    <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="90" 
                                                                         role="progressbar" class=" progress-bar progress-bar-success">
                                                                        50%
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td>
                                                            <a >
                                                                <button class="btn btn-danger  btn-sm eliminarCalificacion" type="button" id="eliminarCalificacion" name="eliminarCalificacion">
                                                                    <i class="fa fa fa-trash"> </i> 
                                                                    <span class="bold">  </span>
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                                <!-- tbody END -->
                                            </table>
                                            <!-- table END -->

                                        </div>
                                    </div>
                                    <!-- row END -->
                                </div>
                                <!-- col-lg-12 END -->


                            </div>
                            <!-- row END -->



                        </div>
                        <!-- step1 END -->
                    </div>
                    <!-- tab-content END -->
                </form>
                <!-- form START -->



            </div>
            <!-- panel-body END -->
        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-6 END -->


    <!-- col-lg-6 START -->
    <div class="col-lg-6">
        <!-- hpanel START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Visualización previa  
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <!-- step1 START -->
                        <div class="col-lg-12">

                            <!-- row START -->
                            <div class="row">
                                <!-- col-lg-12 START -->
                                <div class="col-lg-12 " class="form-control">
                                    <!--aqui es donde se muestra la imagen -->
                                    <iframe src="//docs.google.com/gview?url=http://www.snee.com/xml/xslt/sample.doc&embedded=true" 
                                            style="width:450px; height:400px;" frameborder="5"  ></iframe>

                                </div>
                                <!-- col-lg-12 END -->
                                <!-- col-lg-12 START -->
                                <div class="col-lg-12" >
                                    <button class="btn btn-primary next aceptarCalificacionAdministrador text-left" type="button" id="aceptarCalificacionAdministrador" name="aceptarCalificacionAdministrador" >
                                        <i class="fa fa-check">Aceptar</i> 
                                        <span class="bold">  </span>
                                    </button>
                                </div>
                                <!-- col-lg-12 END -->


                            </div>
                            <!-- row END -->


                        </div>
                        <!-- step1 END -->
            </div>
            <!-- panel-body END -->
        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-6 END -->   
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>        
</div>
<!-- row END -->


