<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="row">

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
                Agregar solicitud para revalidación
            </div>
            <!-- panel-heading END -->

            <!--panel body START-->
            <div class="panel-body">

                <!-- ROW START -->
                <div class="row well well-lg">

                    <!--form START-->
                    <form id="form" action="<?= base_url() ?>analista_servicios/revalidacion/agregar_revalidacion_extranjero" method="post" style="font-family: 'Soberana Sans'; font-size: 1.5rem;"> 

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Fecha: </label>
                                        <input type="text" id="fecha" class="form-control" name="fecha"  value="<?= $hoy = date("Y/m/d");?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;" disabled>
                                        <input type="hidden" id="fecha_sol" class="form-control" name="fecha_sol"  value="<?= $hoy = date("Y/m/d");?>">
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

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>  
                        </div> 

                        <div class="col-sm-12 text-center">
                            <label>DATOS PERSONALES</label>
                        </div>    

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>1) Nombre: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Apellido 1: </label>
                                        <input type="text" id="apellido1_sol" class="form-control" name="apellido1_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Apellido 2: </label>
                                        <input type="text" id="apellido2_sol" class="form-control" name="apellido2_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nombre(s): </label>
                                        <input type="text" id="nombres_sol" class="form-control" name="nombres_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>2) Domicilio: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_sol" class="form-control" name="calle_num_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_sol" class="form-control" name="colonia_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Delegación o Municipio: </label>
                                        <input type="text" id="delegcion_municipio_sol" class="form-control" name="delegcion_municipio_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_sol" class="form-control" name="ciudad_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_sol" class="form-control" name="estado_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_sol" class="form-control" name="cp_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>3) Teléfono: </label>
                                        <input type="text" id="telefono_sol" class="form-control" name="telefono_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>4) Nacionalidad: </label>
                                        <input type="text" id="nacionalidad_sol" class="form-control" name="nacionalidad_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>5) Entidad de nacimiento: </label>
                                        <input type="text" id="entidad_nac_sol" class="form-control" name="entidad_nac_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>6) Sexo: </label>
                                        <select name="se_sol"  id="se_sol" class="form-control m-b">
                                            <option>---Seleccione---</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMENINO</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>7) CURP: </label>
                                        <input type="text" id="curp_sol" class="form-control" name="curp_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>DESEO REVALIDAR MIS ESTUDIOS EN: </label>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Opción: </label>
                                        <select name="prepa_sol"  id="prepa_sol" class="form-control m-b">
                                            <option>---Seleccione---</option>
                                            <option value="BACHILLERATO">BACHILLERATO</option>
                                            <option value="BACHILLERATO TECNOLÓGICO">BACHILLERATO TECNOLÓGICO</option>
                                            <option value="PREPARATORIA ABIERTA">PREPARATORIA ABIERTA</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Área: </label>
                                        <select name="area_sol"  id="area_sol" class="form-control m-b">
                                            <option>---Seleccione---</option>
                                            <option value="CIENCIAS ADMINISTRATIVAS Y SOCIALES">CIENCIAS ADMINISTRATIVAS Y SOCIALES</option>
                                            <option value="FÍSICO MATEMÁTICAS">FÍSICO MATEMÁTICAS</option>
                                            <option value="HUMANIDADES">HUMANIDADES</option>
                                        </select>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>8) DATOS DE LA INSTITUCIÓN QUE EXPIDIO LOS DOCUMENTOS ACADÉMICOS DE HIGH SCHOOL </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>El diploma y reporte de calificaciones fue expedido por: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>9) Nombre completo de la intitución: </label>
                                        <input type="text" id="nombre_ins_sol" class="form-control" name="nombre_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>10) Ubicada en: </label>
                                        <input type="text" id="ubicacion_sol" class="form-control" name="ubicacion_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Domicilio: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_sol" class="form-control" name="calle_num_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>11) Ciudad: </label>
                                        <input type="text" id="ciudad_ins_sol" class="form-control" name="ciudad_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>12) Estado: </label>
                                        <input type="text" id="estado_ins_sol" class="form-control" name="estado_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>13) País: </label>
                                        <input type="text" id="pais_ins_sol" class="form-control" name="pais_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>14) Zona Postal: </label>
                                        <input type="text" id="cp_ins_sol" class="form-control" name="cp_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>15) En su caso Teléfono : </label>
                                        <input type="text" id="telefono_ins_sol" class="form-control" name="telefono_ins_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>INFORMACIÓN SOBRE EL PERIODO Y DOMICILIO DONDE SE EFECTUARON LOS ESTUDIOS DE HIGH SCHOOL: </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-7">
                                        <label>16) Asistí y cursé las asignaturas relativas al High School, en los años </label>
                                        <input type="text" id="fecha_hs_sol" class="form-control" name="fecha_hs_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label> , en el inmueble de </label>
                                        <input type="text" id="nombre_ins_niv_sol" class="form-control" name="nombre_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>                        

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Ubicado en: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_niv_sol" class="form-control" name="calle_num_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_niv_sol" class="form-control" name="colonia_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_ins_niv_sol" class="form-control" name="ciudad_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_niv_sol" class="form-control" name="estado_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>País: </label>
                                        <input type="text" id="pais_ins_niv_sol" class="form-control" name="pais_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Zona Postal: </label>
                                        <input type="text" id="cp_ins_niv_sol" class="form-control" name="cp_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_niv_sol" class="form-control" name="telefono_ins_niv_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>DESEO INGRESAR A: </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>17) Nombre completo de la intitución: </label>
                                        <input type="text" id="nombre_ins_equi_sol" class="form-control" name="nombre_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>18) Ciudad/Municipio: </label>
                                        <input type="text" id="ciudad_mun_ins_equi_sol" class="form-control" name="ciudad_mun_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>19) Domicilio: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_equi_sol" class="form-control" name="calle_num_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_equi_sol" class="form-control" name="colonia_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegcion_ins_equi_sol" class="form-control" name="delegcion_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_ins_equi_sol" class="form-control" name="ciudad_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_equi_sol" class="form-control" name="estado_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_ins_equi_sol" class="form-control" name="cp_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_equi_sol" class="form-control" name="telefono_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>                        

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>20) Clave del Plan de estudios: </label>
                                        <input type="text" id="pe_ins_equi_sol" class="form-control" name="pe_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>21) Fecha de ingreso a la institución: </label>
                                        <input type="date" id="fecha_ing_ins_equi_sol" class="form-control" name="fecha_ing_ins_equi_sol" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                    </form>
                    <!--form END-->


                </div> 
                <!-- ROW END --> 

                <div class="text-right m-t-xs">
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Enviar revalidación</a>
                    <a class="btn btn-danger" id="btnvalidarcancelar">Cancelar</a>
                </div>

            </div>
            <!--panel body END-->

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

</div>