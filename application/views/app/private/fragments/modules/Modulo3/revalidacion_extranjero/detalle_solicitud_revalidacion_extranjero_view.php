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
                    <form id="form" action="<?= base_url() ?>" method="post" style="font-family: 'Soberana Sans'; font-size: 1.5rem;"> 

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Fecha: </label>
                                        <input type="text" id="fecha_sol" class="form-control" name="fecha_sol"  value="<?= $solicitud_revalidacion_extra->fecha ?>" disabled>
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
                                        <input type="text" id="folio_sol" class="form-control" name="folio_sol" value="<?= $solicitud_revalidacion_extra->folio ?>" disabled>
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
                                        <input type="text" id="apellido1_sol" class="form-control" name="apellido1_sol" value="<?= $solicitud_revalidacion_extra->ape1 ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Apellido 2: </label>
                                        <input type="text" id="apellido2_sol" class="form-control" name="apellido2_sol" value="<?= $solicitud_revalidacion_extra->ape2 ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nombre(s): </label>
                                        <input type="text" id="nombres_sol" class="form-control" name="nombres_sol" value="<?= $solicitud_revalidacion_extra->nombre ?>" disabled>
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
                                        <input type="text" id="calle_num_sol" class="form-control" name="calle_num_sol" value="<?= $solicitud_revalidacion_extra->callenum ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_sol" class="form-control" name="colonia_sol" value="<?= $solicitud_revalidacion_extra->colonia ?>" disabled>
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
                                        <input type="text" id="delegcion_municipio_sol" class="form-control" name="delegcion_municipio_sol" value="<?= $solicitud_revalidacion_extra->delegacionmun ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_sol" class="form-control" name="ciudad_sol" value="<?= $solicitud_revalidacion_extra->ciudad ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_sol" class="form-control" name="estado_sol" value="<?= $solicitud_revalidacion_extra->estado ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_sol" class="form-control" name="cp_sol" value="<?= $solicitud_revalidacion_extra->codigopostal ?>" disabled>
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
                                        <input type="text" id="telefono_sol" class="form-control" name="telefono_sol" value="<?= $solicitud_revalidacion_extra->telefono ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>4) Nacionalidad: </label>
                                        <input type="text" id="nacionalidad_sol" class="form-control" name="nacionalidad_sol" value="<?= $solicitud_revalidacion_extra->nacionalidad ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>5) Entidad de nacimiento: </label>
                                        <input type="text" id="entidad_nac_sol" class="form-control" name="entidad_nac_sol" value="<?= $solicitud_revalidacion_extra->entidadnacimiento ?>" disabled>
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
                                        <input type="text" id="se_sol" class="form-control" name="se_sol" value="<?= $solicitud_revalidacion_extra->genero ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>7) CURP: </label>
                                        <input type="text" id="curp_sol" class="form-control" name="curp_sol" value="<?= $solicitud_revalidacion_extra->curp ?>" disabled>
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
                                        <input type="text" id="prepa_sol" class="form-control" name="prepa_sol" value="<?= $solicitud_revalidacion_extra->preparatoria ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Área: </label>
                                        <input type="text" id="area_sol" class="form-control" name="area_sol" value="<?= $solicitud_revalidacion_extra->area ?>" disabled>
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
                                        <input type="text" id="nombre_ins_sol" class="form-control" name="nombre_ins_sol" value="<?= $solicitud_revalidacion_extra->nombrehg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>10) Ubicada en: </label>
                                        <input type="text" id="ubicacion_sol" class="form-control" name="ubicacion_sol" value="<?= $solicitud_revalidacion_extra->ubicacionhg ?>" disabled>
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
                                        <input type="text" id="calle_num_ins_sol" class="form-control" name="calle_num_ins_sol" value="<?= $solicitud_revalidacion_extra->callenumhg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>11) Ciudad: </label>
                                        <input type="text" id="ciudad_ins_sol" class="form-control" name="ciudad_ins_sol" value="<?= $solicitud_revalidacion_extra->ciudadhg ?>" disabled>
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
                                        <input type="text" id="estado_ins_sol" class="form-control" name="estado_ins_sol" value="<?= $solicitud_revalidacion_extra->estadohg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>13) País: </label>
                                        <input type="text" id="pais_ins_sol" class="form-control" name="pais_ins_sol" value="<?= $solicitud_revalidacion_extra->paishg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>14) Zona Postal: </label>
                                        <input type="text" id="cp_ins_sol" class="form-control" name="cp_ins_sol" value="<?= $solicitud_revalidacion_extra->zonapostalhg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>15) En su caso Teléfono : </label>
                                        <input type="text" id="telefono_ins_sol" class="form-control" name="telefono_ins_sol" value="<?= $solicitud_revalidacion_extra->telefonohg ?>" disabled>
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
                                        <input type="text" id="fecha_hs_sol" class="form-control" name="fecha_hs_sol" value="<?= $solicitud_revalidacion_extra->fechahg ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label> , en el inmueble de </label>
                                        <input type="text" id="nombre_ins_niv_sol" class="form-control" name="nombre_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->nombrehgniv ?>" disabled>
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
                                        <input type="text" id="calle_num_ins_niv_sol" class="form-control" name="calle_num_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->callenumhgniv ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_niv_sol" class="form-control" name="colonia_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->coloniahgniv ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_ins_niv_sol" class="form-control" name="ciudad_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->ciudadhgniv ?>" disabled>
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
                                        <input type="text" id="estado_ins_niv_sol" class="form-control" name="estado_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->estadohgniv ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>País: </label>
                                        <input type="text" id="pais_ins_niv_sol" class="form-control" name="pais_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->paishgniv ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Zona Postal: </label>
                                        <input type="text" id="cp_ins_niv_sol" class="form-control" name="cp_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->zonapostalhgniv ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_niv_sol" class="form-control" name="telefono_ins_niv_sol" value="<?= $solicitud_revalidacion_extra->telefonohgniv ?>" disabled>
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
                                        <input type="text" id="nombre_ins_equi_sol" class="form-control" name="nombre_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->nombreins ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>18) Ciudad/Municipio: </label>
                                        <input type="text" id="ciudad_mun_ins_equi_sol" class="form-control" name="ciudad_mun_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->ciudadmunins ?>" disabled>
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
                                        <input type="text" id="calle_num_ins_equi_sol" class="form-control" name="calle_num_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->callenumins ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_equi_sol" class="form-control" name="colonia_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->coloniains ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegcion_ins_equi_sol" class="form-control" name="delegcion_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->delegacionins ?>" disabled>
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
                                        <input type="text" id="ciudad_ins_equi_sol" class="form-control" name="ciudad_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->ciudadins ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_equi_sol" class="form-control" name="estado_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->estadoins ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_ins_equi_sol" class="form-control" name="cp_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->codigopostalins ?>" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_equi_sol" class="form-control" name="telefono_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->telefonoins ?>" disabled>
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
                                        <input type="text" id="pe_ins_equi_sol" class="form-control" name="pe_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->clavepeins ?>" disabled>
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
                                        <input type="text" id="fecha_ing_ins_equi_sol" class="form-control" name="fecha_ing_ins_equi_sol" value="<?= $solicitud_revalidacion_extra->fechaingins ?>" disabled>
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