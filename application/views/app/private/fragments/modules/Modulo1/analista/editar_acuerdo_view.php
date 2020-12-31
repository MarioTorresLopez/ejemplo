<?php
/**
 * Vista para la edición de acuerdos para el usuario Analista.
 *
 * Vista que muestra al usuario(Analista) la interfaz grafica para editar los acuerdos del sistema.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /editar
 * @package    application.views.app.private
 * @subpackage fragments.modules.Modulo1.analista
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/gestion_acuerdos
 */
?>
<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Edición de acuerdo
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" href="#step1" id="tab1-tab">Paso 1 - Acuerdo</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP3 START -->
                        <div id="step1" class="p-m tab-pane active">

                            <!-- ROW START -->
                            <div class="row well well-lg">

                                <!-- FORM-GROUP COL-LG-9 START -->
                                <div class="form-group col-lg-9" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                    <div class="col-sm-12">
                                    	<label><h3>Número acuerdo</h3></label>
                                        <input type="text" id="numero_acuerdo" class="form-control" name="numero_acuerdo" placeholder="*Campo requerido">
                                    </div>

                                    <div class="col-sm-12">
                                    	<label><h3>Acuerdo actualizado</h3></label>
                                        <input type="file" value="" id="nuevo_acuerdo" class="form-control" name="nuevo_acuerdo" placeholder="*Campo requerido">
                                    </div>
                                    

                                </div>
                                <!-- FORM-GROUP COL-LG-9 END -->

                            </div> 
                            <!-- ROW END --> 

                            <div class="text-right m-t-xs">
                                <a class="btn btn-primary" href="../gestion_acuerdos/gestion""><i class="fa fa-check"> </i> Actualizar</a>
                                <a class="btn btn-danger" href="../gestion_acuerdos/gestion"><i class="fa fa-ban"> </i> Cancelar</a>
                            </div>
                        </div>
                        <!-- STEP3 END -->

                    </div>
                    <!-- TAB-CONTENT END -->

                </form>
                <!-- FORM END -->

            </div>
            <!-- PANEL-BODY END -->

        </div>
        <!-- HPANEL HBLUE END -->

    </div>
    <!-- COL-LG-12 END -->

    !-- ROW START -->
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>
    <!-- ROW END -->

</div>
<!-- ROW END -->
