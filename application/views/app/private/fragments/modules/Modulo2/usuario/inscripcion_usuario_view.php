<?php
/**
 *  Vista de inscripcion
 *
 *  * Vista donde el usuario podra dar de alta sus alumnos por medio de adjunto de excel
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/inscripcion_usuario
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
                Inscripción
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
                                     
                                         <button class="btn btn-primary btn-lg" onclick="document.getElementById('link').click()">Descargar Inicio</button>
                                         <a id="link" href="<?= base_url() ?>documentos/REGISTRO_DE_DATOS_INICIO-FIN.xls" download hidden=""></a>

                                     
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


