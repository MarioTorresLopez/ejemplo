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
                Solicitud
            </div>
            <!-- panel-heading END -->
            <form role="form" id="form" action="<?= base_url() ?>analista_servicios/equivalencia/crear_solicitud"  method="post">
            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <div class="form-group">

                            <div class="form-group">
                                <div class="col-sm-4">
                                    <label>Fecha: </label>
                                    <input type="text" id="fecha_sol" class="form-control" name="fecha_sol"  value="<?php echo date('Y-m-d'); ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;" disabled>
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
                                    <input type="text" id="folio_sol" class="form-control" name="folio_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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

                        <div class="form-group">
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Apellido paterno</label>
                                <input type="text" id="ap_eq" class="form-control" name="ap_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Apellido materno</label>
                                <input type="text" id="am_eq" class="form-control" name="am_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nombre(s)</label>
                                <input type="text" id="nom_eq" class="form-control" name="nom_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Nacionalidad</label>
                                <select class="form-control" style="width: 100%" name="nacionalidad" id="nacionalidad">
                                    <option>---Seleccione---</option>
                                    <option value="0">Mexicano</option>
                                    <option value="1">Extranjero</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>CURP</label>
                                <input type="text" id="curp_eq" class="form-control" name="curp_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        </div>

                        <!--col-lg-12 START-->
                        <div class="col-lg-12">
                            <label class="col-lg-1 control-label">Domicilio:</label>
                            <div class="col-lg-7">

                            </div>
                        </div>
                        <!--col-lg-12 END-->
                        <div class="form-group">
                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Calle y número</label>
                                <input type="text" id="calle_num" class="form-control" name="calle_num" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Colonia</label>
                                <input type="text" id="colonia_eq" class="form-control" name="colonia_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Delegación o municipio</label>
                                <input type="text" id="del_mun" class="form-control" name="del_mun" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Ciudad y estado</label>
                                <input type="text" id="ciudad_est" class="form-control" name="ciudad_est" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Código postal</label>
                                <input type="text" id="cp_eq" class="form-control" name="cp_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Télefono</label>
                                <input type="text" id="tel_eq" class="form-control" name="tel_eq" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-4">
                                <label>Correo electrónico</label>
                                <input type="text" id="correo_eq" class="form-control" name="correo_eq" placeholder="*Campo requerido">
                                <span class="help-block"></span>
                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- form-group col-lg-12 END -->

                </div> 
                <!-- ROW END --> 

                <!-- ROW START -->
                <div class="row well well-lg">
                    <div class="row">
                        <h4>
                            <p>
                                ESTUDIOS CURSADOS QUE SE DESEAN SE DECLAREN EQUIVALENTE (Denominación según certificado)
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
                                <select class="form-control" style="width: 100%" name="nivel_procedencia" id="nivel_procedencia">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO O PREPARATORIA">Bachillerato ó Preparatoria</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="PREPARATORIA ABIERTA">Preparatoria Abierta</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-8" id="div_nivel_anterior">

                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- form-group col-lg-12 END -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Institución de procedencia</label>
                                <input type="text" id="inst_proc" class="form-control" name="inst_proc" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Ciudad y Estado donde se localiza la institución</label>
                                <input type="text" id="ciu_est_inst_ant" class="form-control" name="ciu_est_inst_ant" placeholder="*Campo requerido" style="text-transform: uppercase;">
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
                                ESTUDIOS CON LOS QUE REQUIERO REALIZAR LA EQUIVALENCIA (Deseo continuar estudiando)
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
                                <select class="form-control" style="width: 100%" name="nivel_nuevo" id="nivel_nuevo">
                                    <option value="---Seleccione---">---Seleccione---</option>
                                    <option value="BACHILLERATO GENERAL">Bachillerato General</option>
                                    <option value="BACHILLERATO O PREPARATORIA">Bachillerato ó Preparatoria</option>
                                    <option value="BACHILLERATO TECNOLÓGICO">Bachillerato Tecnológico</option>
                                    <option value="PREPARATORIA ABIERTA">Preparatoria Abierta</option>
                                    <option value="TÉCNICO POSTSECUNDARIO">Técnico Postsecundario</option>
                                    <option value="TÉCNICO SUPERIOR UNIVERSITARIO">Técnico Superior Universitario</option>
                                    <option value="LICENCIATURA">Licenciatura</option>
                                    <option value="ESPECIALIDAD">Especialidad</option>
                                    <option value="MAESTRÍA">Maestría</option>
                                    <option value="DOCTORADO">Doctorado</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                            </div>

                            <div class="form-group">
                            <div class="col-sm-8" id="div_nivel_nuevo">

                            </div>
                            </div>
                        </div>

                    </div>
                    <!-- form-group col-lg-12 END -->
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Institución a ingresar, incluyendo plantel o campus</label>
                                <input type="text" id="inst_nuevo" class="form-control" name="inst_nuevo" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <div class="form-group">
                            <div class="col-sm-8">
                                <label>Ciudad y Estado donde se localiza la institución</label>
                                <input type="text" id="ciu_est_inst_nuevo" class="form-control" name="ciu_est_inst_nuevo" placeholder="*Campo requerido" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                            <div class="col-sm-4">
                                <label>Indicar clave del plan de estudios</label>
                                <input type="text" id="clv_plan" class="form-control" name="clv_plan" placeholder="*Campo requerido" style="text-transform: uppercase;">
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
                                <select class="form-control" style="width: 100%" name="act_nac" id="act_nac">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="act_nat" id="act_nat">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="cald_mig" id="cald_mig">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Secundaria</label>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control" style="width: 100%" name="certf_sec" id="certf_sec">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Certificado de Técnico Postsecundario</label>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control" style="width: 100%" name="certf_post" id="certf_post">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="certf_bach" id="certf_bach">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="certf_tsu" id="certf_tsu">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="certf_lic" id="certf_lic">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="certf_esp" id="certf_esp">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="certf_mst" id="certf_mst">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>

                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Carta de Aceptación para Eduación Normal</label>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control" style="width: 100%" name="carta_acep" id="carta_acep">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>
                    <div class="form-group col-lg-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Carta de renuncia de semestres y/o asignaturas</label>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control" style="width: 100%" name="carta_ren" id="carta_ren">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <select class="form-control" style="width: 100%" name="comprobante" id="comprobante">
                                    <option>---Seleccione---</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
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
                                <input type="text" id="otro" class="form-control" name="otro" placeholder="" style="text-transform: uppercase;">
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </div>

                </div> 
                <!-- ROW END -->

                <div class="text-right m-t-xs">
                    <input type="hidden" value="" id="validador" name="validador">
                    <input type="hidden" value="" id="validador2" name="validador2">
                    <a class="btn btn-primary"  id="validacion_registro_solicitud" name="validacion_registro_solicitud">Registrar solicitud</a>
                    <a class="btn btn-danger" id="cancelar_solicitud" name="cancelar_solicitud">Cancelar</a>
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