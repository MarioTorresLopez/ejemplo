<?php
/**
 * Vista del mensaje del analista al usuario
 *
 * Vista que muestra el mensaje que se envia al usuario para confirmar que sus datos fueron guardados correctamente
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/mensaje_analista
 */
?>


<!DOCTYPE html>


<!-- row START -->
<div class="row">
    <!-- col-lg-6 START -->
    <div class="col-lg-12">
        <!-- hpanel START -->
        <div class="hpanel hblue">
            <!-- panel-heading START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <!-- panel-tools START -->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!-- panel-tools END -->
                Mensaje
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
                                            <label>Redactar mensaje   </label>
                                            <input type="text" class="form-control" 
                                                   value="Sus datos han sido registrados correctamente" id="mensaje">
                                        </div>
                                        <!-- col-lg-12 END -->
                                       
                                        <!-- col-lg-12 START -->
                                <div class="col-lg-12" >
                                    <button class="btn btn-primary next aceptarInscripcionAdministrador text-left" type="button"
                                            id="aceptarInscripcionAdministrador" name="aceptarInscripcionAdministrador" >
                                        <i class="fa fa-check">Enviar</i> 
                                        <span class="bold">  </span>
                                    </button>
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
</div>
<!-- row END -->


