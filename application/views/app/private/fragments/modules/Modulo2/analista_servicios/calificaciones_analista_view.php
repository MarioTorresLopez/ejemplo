<?php
/**
 * Vista de calificaciones dasda de alta
 * Vista que muestra las calificaciones dadas de alta
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/calificaciones_usuario
 */
?>


<!DOCTYPE html>


<!-- row START -->
<div class="row">
    <!-- col-lg-6 START -->
    <div class="col-lg-6">
        <!-- hpanel START -->
        <div class="hpanel">
            <!-- panel-heading START -->
            <div class="panel-heading">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
               Ingresar datos
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body">

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
                                            <label>Elegir Plantel   </label>
                                            <!-- select START -->   
                                            <select value="" id="plantel" class="form-control" name="elegir_plantel">
                                                <option value="plantel1">Plantel 1</option>
                                                <option value="plantel2">Plantel 2</option>
                                                <option value="plantel3">Plantel 3</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir Carrera  </label>
                                            <!-- select START -->   
                                            <select value="" id="carrera" class="form-control" name="elegir_carrera">
                                                <option value="plantel1">Informatica</option>
                                                <option value="plantel2">Redes</option>
                                                <option value="plantel3">Mecatronica</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir Turno  </label>
                                            <!-- select START -->   
                                            <select value="" id="turno" class="form-control" name="elegir_turno">
                                                <option value="plantel1">Matutino</option>
                                                <option value="plantel2">Vespertino</option>
                                                <option value="plantel3">Mixto</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                         <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir Tipo  </label>
                                            <!-- select START -->   
                                            <select value="" id="tipo" class="form-control" name="elegir_tipo">
                                                <option value="plantel1">Publica</option>
                                                <option value="plantel2">Privada</option>
                                            </select>
                                            <!-- select END -->
                                        </div>
                                        <!-- col-lg-12 END -->
                                        <!-- col-lg-12 START -->
                                        <div class="form-group col-lg-12">
                                            <label>Elegir Grupo</label>
                                            <!-- select START -->   
                                            <select value="" id="grupo" class="form-control" name="elegir_grupo">
                                                <option value="plantel1">T-171</option>
                                                <option value="plantel2">T-172</option>
                                                <option value="plantel3">T-173</option>
                                            </select>
                                            <!-- select END -->
                                              </div>
                                        <!-- col-lg-12 END -->
                                       
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
        <div class="hpanel">
            <!-- panel-heading START -->
            <div class="panel-heading">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Alumnos Existentes
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body">
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
                                    
                                    <a class = "btn btn-primary" href="">
                                            <i class="fa fa-paste">Modificar Calificaciones</i> 
                                            <span class="bold">  </span>
                                        </a>
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
    
     <!--ROW  START-->
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
    <!--ROW  END-->
</div>
<!-- row END -->