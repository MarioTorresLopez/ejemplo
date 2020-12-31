<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
                Registro de institución
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="form" action="<?= base_url() ?>analista/subir_pdf/subir_documentacion" method="post" enctype="multipart/form-data" >
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" id="tab1-tab">Institución</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <i class="pe-7s-home fa-5x text-muted"></i>
                                <h1 class="">Datos</h1>
                            </div>

                            <!-- ROW START -->
                            <div class="row well well-lg">
                                
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label>Identificación oficial con fotografía del propietario</label>
                                        <input type="file" id="iden_ofic_prop" class="form-control" name="iden_ofic_prop" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                

                            </div>
                            <!-- ROW END -->  

                            <div class="text-right m-t-xs">
                                <button class="btn btn-primary" type="submit" value="Submit">Enviar</button>
                            </div>
                        </div>
                        <!-- STEP1 END -->

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


    <!-- ROW START -->
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
    <!-- ROW END -->

</div>
<!-- ROW END -->