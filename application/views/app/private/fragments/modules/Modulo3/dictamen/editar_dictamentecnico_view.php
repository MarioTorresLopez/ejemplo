<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">
    <!--<form id="form" action="<?= base_url() ?>"  method="post">-->

    <!-- col-lg-12 START-->
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
                Editar solicitud
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <form role="form" id="form" action="<?= base_url() ?>analista_servicios/dictamen_tecnico/editar_solicitud_post"  method="post">
            <div class="panel-body">
                
                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <div class="form-group">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Fecha: </label>
                                    <input type="date" id="fecha_sol" class="form-control" name="fecha_sol"  value="<?=$solicitud->fecha?>" style="text-transform: uppercase;" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>FOLIO: </label>
                                    <input type="text" id="folio_sol" class="form-control" name="folio_sol" value="<?=$solicitud->folio?>" style="text-transform: uppercase;" disabled>
                                    <span class="help-block"></span>
                                </div>
                            </div>

                        </div>  
                    </div> 
                    <hr style="border-color: black; width: 100%">
                    <div class="row">
                        <h4 class="text-center">
                            <p>
                                DATOS PERSONALES
                                <br>
                            </p>
                        </h4>
                    </div>

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">Nombre:</label>
                            <div class="col-lg-7">

                            </div>
                        </div>
                        <!--col-lg-12 END-->

                        <!--<div class="form-group">-->
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Apellido paterno</label>
                                <input type="text" id="ap_dic" class="form-control" name="ap_dic" value="<?=$solicitud->ap1?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Apellido materno</label>
                                <input type="text" id="am_dic" class="form-control" name="am_dic" value="<?=$solicitud->ap2?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nombre(s)</label>
                                <input type="text" id="nom_dic" class="form-control" name="nom_dic" value="<?=$solicitud->nombre?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nacionalidad</label>
                                <?php
                                if($solicitud->nacionalidad==0){
                                    $nacionalidad='Mexicano';
                                }else{
                                    $nacionalidad='Extranjero';
                                }
                                ?>
                                <select class="form-control" style="width: 100%" name="nacionalidad" id="nacionalidad">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                <?php
                                if($solicitud->nacionalidad==0){
                                ?>
                                    <option value="0" selected="selected">Mexicano</option>
                                    <option value="1">Extranjero</option> 
                                <?php
                                }
                                else{
                                ?>    
                                    <option value="0">Mexicano</option>
                                    <option value="1" selected="selected">Extranjero</option> 
                                <?php
                                }
                                ?>   
                                <!--<input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?=$nacionalidad?>" disabled="">-->
                                </select>
                                <span class="help-block"></span>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>CURP</label>
                                <input type="text" id="curp_dic" class="form-control" name="curp_dic" value="<?=$solicitud->curp?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        <!--</div>-->

                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">Domicilio:</label>
                            <div class="col-lg-7">

                            </div>
                        </div>
                        <!--col-lg-12 END-->
                        <!--<div class="form-group">-->
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Calle y número</label>
                                <input type="text" id="calle_num" class="form-control" name="calle_num" value="<?=$solicitud->callenumero?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Colonia</label>
                                <input type="text" id="colonia_dic" class="form-control" name="colonia_dic" value="<?=$solicitud->colonia?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Delegación o municipio</label>
                                <input type="text" id="del_mun" class="form-control" name="del_mun" value="<?=$solicitud->delegacionmunicipio?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Ciudad y estado</label>
                                <input type="text" id="ciudad_est" class="form-control" name="ciudad_est" value="<?=$solicitud->ciudadestado?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Código postal</label>
                                <input type="text" id="cp_dic" class="form-control" name="cp_dic" value="<?=$solicitud->cp?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Télefono</label>
                                <input type="text" id="tel_dic" class="form-control" name="tel_dic" value="<?=$solicitud->telefono?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                            
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Correo electrónico</label>
                                <input type="text" id="correo_dic" class="form-control" name="correo_dic" value="<?=$solicitud->correo?>">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        <!--</div>-->

                    </div>
                    <!-- form-group col-lg-12 END -->

                </div> 
                <!-- ROW END --> 
                
                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="row">
                        <h4>
                            <p>
                                ESTUDIOS CURSADOS (Denominación según certificado ó título ó grado obtenido)
                                <br>
                            </p>
                        </h4>
                    </div>

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nivel</label>
                                <!--<input type="text" id="nivel_procedencia" class="form-control" name="nivel_procedencia" value="<?=$solicitud->nivelcursado?>" style="text-transform: uppercase;" disabled>-->
                                <select class="form-control" style="width: 100%" name="nivel_procedencia" id="nivel_procedencia">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->nivelcursado=='BACHILLERATO GENERAL'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL" selected="selected">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='BACHILLERATO TECNOLÓGICO'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO" selected="selected">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='TÉCNICO POSTSECUNDARIO'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO" selected="selected">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='TÉCNICO SUPERIOR UNIVERSITARIO'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO" selected="selected">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='LICENCIATURA'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA" selected="selected">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='ESPECIALIDAD'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD" selected="selected">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='MAESTRÍA'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA" selected="selected">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->nivelcursado=='DOCTORADO'){
                                    ?>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO" selected="selected">Doctorado</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                            <div class="form-group">
                            <div class="col-sm-8" id="div_nivel_anterior">
                                <?php
                                if($solicitud->especificacioncursado!=NULL){
                                ?>
                                <label>En:</label>
                                <input type="text" id="especificacion_ant" class="form-control" name="especificacion_ant" value="<?=$solicitud->especificacioncursado?>" style="text-transform: uppercase;">
                                <?php
                                }else{
                                    
                                }
                                ?>
                            </div>
                            </div>
                        </div>
                        
                    </div>
                    <!-- form-group col-lg-12 END -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Institución de procedencia</label>
                                <input type="text" id="inst_proc" class="form-control" name="inst_proc" value="<?=$solicitud->institucionprocedencia?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Ciudad y Estado donde se localiza la institución</label>
                                <input type="text" id="ciu_est_inst_ant" class="form-control" name="ciu_est_inst_ant" value="<?=$solicitud->ciudadestadoinstproc?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                </div> 
                <!-- ROW END -->
                
                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="row">
                        <h4>
                            <p>
                                DATOS DE LA INSTITUCIÓN A LA QUE DESEO CONTINUAR ESTUDIANDO MIS ESTUDIOS DE POSGRADO
                                <br>
                            </p>
                        </h4>
                    </div>

                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nivel</label>
                                <!--<input type="text" id="nivel_nuevo" class="form-control" name="nivel_nuevo" value="<?=$solicitud->niveldestino?>" style="text-transform: uppercase;" disabled>-->
                                <select class="form-control" style="width: 100%" name="nivel_nuevo" id="nivel_nuevo">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->niveldestino=='ESPECIALIDAD'){
                                    ?>
                                    <option value="ESPECIALIDAD" selected="selected">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->niveldestino=='MAESTRÍA'){
                                    ?>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA" selected="selected">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                    <?php
                                    }
                                    if($solicitud->niveldestino=='DOCTORADO'){
                                    ?>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO" selected="selected">Doctorado</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                            
                            <div class="form-group">
                            <div class="col-sm-8">
                                <label>En:</label>
                                <input type="text" id="especificacion_nuevo" class="form-control" name="especificacion_nuevo" value="<?=$solicitud->especificaciondestino?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        <!--</div>-->
                        </div>
                        
                    </div>
                    <!-- form-group col-lg-12 END -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Institución a ingresar, incluyendo plantel o campus</label>
                                <input type="text" id="inst_nuevo" class="form-control" name="inst_nuevo" value="<?=$solicitud->instituciondestino?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Ciudad y Estado donde se localiza la institución</label>
                                <input type="text" id="ciu_est_inst_nuevo" class="form-control" name="ciu_est_inst_nuevo" value="<?=$solicitud->ciudadestadoinstdest?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Indicar clave del plan de estudios</label>
                                <input type="text" id="clv_plan" class="form-control" name="clv_plan" value="<?=$solicitud->claveplan?>" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        <!--</div>-->
                        </div>
                    </div>

                </div> 
                <!-- ROW END -->
                
                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="row">
                        <h4>
                            <p>
                                ESPACIOS PARA LLENAR SOLO POR LA DIRECCIÓN DE EDUCACIÓN
                                <br>
                            </p>
                        </h4>
                    </div>

                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Documentos presentados</label>
                            </div>
                            
                            <div class="col-sm-8">
                                <label>SI/NO</label>
                            </div>
                        </div>
                    </div>
                    <!-- form-group col-lg-12 START -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Acta de nacimiento</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="act_nac" class="form-control" name="act_nac" value="<?=$act_nac?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="act_nac" id="act_nac">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->actanacimiento==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Acta de naturalización</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="act_nat" class="form-control" name="act_nat" value="<?=$act_nat?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="act_nat" id="act_nat">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->actanaturalizacion==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Calidad migratoria</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="cald_mig" class="form-control" name="cald_mig" value="<?=$cald_mig?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="cald_mig" id="cald_mig">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->calidadmigratoria==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Bachillerato</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="certf_bach" class="form-control" name="certf_bach" value="<?=$certf_bach?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="certf_bach" id="certf_bach">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->certificadobch==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Técnico Superior Universitario</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="certf_tsu" class="form-control" name="certf_tsu" value="<?=$certf_tsu?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="certf_tsu" id="certf_tsu">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->certificadotsu==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Licenciatura</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="certf_lic" class="form-control" name="certf_lic" value="<?=$certf_lic?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="certf_lic" id="certf_lic">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->certificadolic==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Especialidad</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="certf_esp" class="form-control" name="certf_esp" value="<?=$certf_esp?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="certf_esp" id="certf_esp">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->certificadoesp==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Maestría</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="certf_mst" class="form-control" name="certf_mst" value="<?=$certf_mst?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="certf_mst" id="certf_mst">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->certificadomst==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Comprobante de pago de derechos</label>
                            </div>
                            
                            <div class="col-sm-2">
                                <!--<input type="text" id="comprobante" class="form-control" name="comprobante" value="<?=$comprobante?>" disabled>-->
                                <select class="form-control" style="width: 100%" name="comprobante" id="comprobante">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <?php
                                    if($solicitud->comprobante==0){
                                    ?>
                                    <option value="1">SI</option>
                                    <option value="0" selected="selected">NO</option>
                                    <?php
                                    }
                                    else{
                                    ?>
                                    <option value="1" selected="selected">SI</option>
                                    <option value="0">NO</option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Otro especificar:</label>
                            </div>
                            
                            <div class="col-sm-4">
                                <?php
                                if($solicitud->otro!=NULL){?>
                                <input type="text" id="otro" class="form-control" name="otro" value="<?=$solicitud->otro?>" style="text-transform: uppercase;">
                                <?php
                                }
                                else {?>
                                <input type="text" id="otro" class="form-control" name="otro" value="" style="text-transform: uppercase;">
                                <?php
                                }
                                ?>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>

                </div> 
                <!-- ROW END -->

                <div class="text-right m-t-xs">
                    <input type="hidden" value="" id="validador" name="validador">
                    <input type="hidden" value="<?=$solicitud->idsolicitud?>" id="solicitud" name="solicitud">
                    <a class="btn btn-primary"  id="validacion_registro_solicitud" name="validacion_registro_solicitud">Editar solicitud</a>
                    <a href="<?= base_url()?>analista_servicios/dictamen_tecnico/solicitudes" class="btn btn-danger">Cancelar</a>
                </div>

            </div>
            <!--panel body END-->
            </form>

        </div>
        <!-- hpanel END -->

    </div>
    <!-- col-lg-12 END-->

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
    <!--</form>-->
</div>