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
                Registro de acuerdo
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body">


                <div class="text-center m-b-md" id="wizardControl">
                    <a class="btn btn-primary" href="#step1" id="tab1-tab">Paso 1 - Acuerdo</a>
                </div>

                <!-- TAB-CONTENT START -->
                <div class="tab-content">

                    <!-- STEP3 START -->
                    <div id="step1" class="p-m tab-pane active">
                        <div class="text-center">
                            <i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                            <h1 class="">Agregar acuerdo</h1>
                        </div>

                        <!-- ROW START -->
                        <div class="row well well-lg">

                            <!-- FORM-GROUP COL-LG-12 START -->
                            <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                <!-- FORM START -->
                                <form name="form" novalidate id="form" action="<?= base_url() ?>analista/gestion_acuerdos/registrar_acuerdo" method="post">

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Número de acuerdo</label>
                                            <input type="text" class="form-control" name="numero_acuerdo" id="numero_acuerdo" placeholder="*Campo requerido">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <!--
                                    <div class="form-group">
                                        <div class="col-sm-1">
                                            <div class="tooltip-demo">
                                                <i class="fa fa-question-circle" data-toggle="tooltip" title="Deberá colocar la fecha de inicio y fin del acuerdo, ejemplo 2018-030."></i>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Grupos autorizado</label>
                                            <input type="text" id="grupos_autorizado" class="form-control" name="grupos_autorizado" placeholder="*Campo requerido">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Persona</label>
                                            <select class="js-source-states" style="width: 100%" name="persona" id="persona">
                                                <option>---Seleccione---</option>
                                                <option value="1">Física</option>
                                                <option value="2">Moral</option>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Nivel educativo</label>
                                            <select class="js-source-states" style="width: 100%" name="nivel" id="nivel">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($niveles)) :
                                                    foreach ($niveles as $nivel) :
                                                        ?>
                                                        <option value="<?= $nivel->idnivel ?>"><?= $nivel->nomnivel ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Ciclo escolar</label>
                                            <select class="js-source-states" style="width: 100%" name="ciclo" id="ciclo">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($ciclos)) :
                                                    foreach ($ciclos as $ciclo) :
                                                        ?>
                                                        <option value="<?= $ciclo->idciclo ?>"><?= $ciclo->tiempo ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Tipo de alumnado</label>
                                            <select class="js-source-states" style="width: 100%" name="alumnado" id="alumnado">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($alumnado)) :
                                                    foreach ($alumnado as $alum) :
                                                        ?>
                                                        <option value="<?= $alum->idtipoalumnado ?>"><?= $alum->tipoalumnado ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Fecha de inicio de vigencia</label>
                                            <input type="date" class="form-control" name="fecha_inicio_vigencia"  id="fecha_inicio_vigencia">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Fecha de fin de vigencia</label>
                                            <input type="date" class="form-control" name="fecha_fin_vigencia"  id="fecha_fin_vigencia">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Plantel</label>
                                            <select class="js-source-states" style="width: 100%" name="plantel" id="plantel">
                                                <option>---Seleccione---</option>
                                                <?php
                                                if (!is_null($planteles)) :
                                                    foreach ($planteles as $plantel) :
                                                        ?>
                                                        <option value="<?= $plantel->idplantel ?>"><?= $plantel->nombre ?></option>      
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>
                                            </select>
                                            <span class="help-block"></span>
                                        </div>
                                    </div>


                                    <!--
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label>Nuevo acuerdo</label>
                                            <input type="file" value="" class="form-control" name="documento_acuerdo" id="documento_acuerdo" accept=".pdf">
                                            <span class="help-block"></span>
                                        </div>
                                    </div>
                                    -->

                                </form>
                                <!-- FORM END -->

                            </div>
                            <!-- FORM-GROUP COL-LG-12 END -->

                        </div> 
                        <!-- ROW END --> 

                        <div class="text-right m-t-xs">
                            <a class="btn btn-primary submitWizard" href="#" id="btnvalidar">Enviar</a>
                            <a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>
                        </div>
                    </div>
                    <!-- STEP3 END -->

                </div>
                <!-- TAB-CONTENT END -->

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

