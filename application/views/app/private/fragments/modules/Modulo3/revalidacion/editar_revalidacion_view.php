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
                    <form id="form" action="<?= base_url() ?>analista_servicios/revalidacion/editar_datos_revalidacion" method="post" style="font-family: 'Soberana Sans'; font-size: 1.5rem;"> 

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Fecha: </label>
                                        <input type="text" id="fecha_sol" class="form-control" name="fecha_sol"  value="<?= $solicitud_revalidacion->fecha ?>" disabled>
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
                                        <input type="text" id="folio_sol" class="form-control" name="folio_sol" value="<?= $solicitud_revalidacion->folio ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="apellido1_sol" class="form-control" name="apellido1_sol" value="<?= $solicitud_revalidacion->ape1 ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Apellido 2: </label>
                                        <input type="text" id="apellido2_sol" class="form-control" name="apellido2_sol" value="<?= $solicitud_revalidacion->ape2 ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nombre(s): </label>
                                        <input type="text" id="nombres_sol" class="form-control" name="nombres_sol" value="<?= $solicitud_revalidacion->nombre ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="calle_num_sol" class="form-control" name="calle_num_sol" value="<?= $solicitud_revalidacion->callenum ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_sol" class="form-control" name="colonia_sol" value="<?= $solicitud_revalidacion->colonia ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegacion_sol" class="form-control" name="delegacion_sol" value="<?= $solicitud_revalidacion->delegacion ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Ciudad: </label>
                                        <input type="text" id="ciudad_sol" class="form-control" name="ciudad_sol" value="<?= $solicitud_revalidacion->ciudad ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_sol" class="form-control" name="estado_sol" value="<?= $solicitud_revalidacion->estado ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_sol" class="form-control" name="cp_sol" value="<?= $solicitud_revalidacion->codigopostal ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="telefono_sol" class="form-control" name="telefono_sol" value="<?= $solicitud_revalidacion->telefono ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>4) Nacionalidad: </label>
                                        <input type="text" id="nacionalidad_sol" class="form-control" name="nacionalidad_sol" value="<?= $solicitud_revalidacion->nacionalidad ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>5) Entidad de nacimiento: </label>
                                        <input type="text" id="entidad_nac_sol" class="form-control" name="entidad_nac_sol" value="<?= $solicitud_revalidacion->entidadnac ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>6) Fecha de nacimiento: </label>
                                        <input type="text" id="fecha_nac_sol" class="form-control" name="fecha_nac_sol" value="<?= $solicitud_revalidacion->fechanacimiento ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>6) Sexo: </label>
                                        <input type="text" id="se_sol" class="form-control" name="se_sol" value="<?= $solicitud_revalidacion->genero ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>8) CURP: </label>
                                        <input type="text" id="curp_sol" class="form-control" name="curp_sol" value="<?= $solicitud_revalidacion->curp ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                            <label>ESTUDIE EN: </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>9) Nombre completo de la intitución: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>Nombre: </label>
                                        <input type="text" id="nombre_ins_sol" class="form-control" name="nombre_ins_sol" value="<?= $solicitud_revalidacion->nombreins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>País: </label>
                                        <input type="text" id="pais_sol" class="form-control" name="pais_sol" value="<?= $solicitud_revalidacion->paisins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                    <div class="col-sm-4">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_sol" class="form-control" name="calle_num_ins_sol" value="<?= $solicitud_revalidacion->callenumins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_sol" class="form-control" name="colonia_ins_sol" value="<?= $solicitud_revalidacion->coloniains ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegcion_ins_sol" class="form-control" name="delegcion_ins_sol" value="<?= $solicitud_revalidacion->delegacionins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="ciudad_ins_sol" class="form-control" name="ciudad_ins_sol" value="<?= $solicitud_revalidacion->ciudadins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_sol" class="form-control" name="estado_ins_sol" value="<?= $solicitud_revalidacion->estadoins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_ins_sol" class="form-control" name="cp_ins_sol" value="<?= $solicitud_revalidacion->codigopostalins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_sol" class="form-control" name="telefono_ins_sol" value="<?= $solicitud_revalidacion->telefonoins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>10) Nivel: </label>
                                        <input type="text" id="nivel_ins_sol" class="form-control" name="nivel_ins_sol" value="<?= $solicitud_revalidacion->nivelins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label>11) Carrera: </label>
                                        <input type="text" id="carrera_ins_sol" class="form-control" name="carrera_ins_sol" value="<?= $solicitud_revalidacion->carrerains ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Clave*: </label>
                                        <input type="text" id="clave_ins_sol" class="form-control" name="clave_ins_sol" value="<?= $solicitud_revalidacion->claveins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>12) Semestre: </label>
                                        <input type="text" id="semestre_ins_sol" class="form-control" name="semestre_ins_sol" value="<?= $solicitud_revalidacion->semestreins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>13) Area: </label>
                                        <input type="text" id="area_ins_sol" class="form-control" name="area_ins_sol" value="<?= $solicitud_revalidacion->areains ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>14) De fecha: </label>
                                        <input type="text" id="de_fecha_sol" class="form-control" name="de_fecha_sol" value="<?= $solicitud_revalidacion->defechains ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>15) A fecha: </label>
                                        <input type="text" id="a_fecha_sol" class="form-control" name="a_fecha_sol" value="<?= $solicitud_revalidacion->afechains ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                            <label>LLENAR SOLO EN CASO DE PRESENTAR MÁS DE UN CERTIFICADO DEL MISMO NIVEL: </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Nombre completo de la intitución: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>Nombre: </label>
                                        <input type="text" id="nombre_ins_niv_sol" class="form-control" name="nombre_ins_niv_sol" value="<?= $solicitud_revalidacion->nombreinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>País: </label>
                                        <input type="text" id="pais_ins_niv_sol" class="form-control" name="pais_ins_niv_sol" value="<?= $solicitud_revalidacion->paisinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                    <div class="col-sm-4">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_niv_sol" class="form-control" name="calle_num_ins_niv_sol" value="<?= $solicitud_revalidacion->callenuminsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_niv_sol" class="form-control" name="colonia_ins_niv_sol" value="<?= $solicitud_revalidacion->coloniainsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegcion_ins_niv_sol" class="form-control" name="delegcion_ins_niv_sol" value="<?= $solicitud_revalidacion->delegacioninsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="ciudad_ins_niv_sol" class="form-control" name="ciudad_ins_niv_sol" value="<?= $solicitud_revalidacion->ciudadinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_niv_sol" class="form-control" name="estado_ins_niv_sol" value="<?= $solicitud_revalidacion->estadoinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_ins_niv_sol" class="form-control" name="cp_ins_niv_sol" value="<?= $solicitud_revalidacion->codigopostalinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_niv_sol" class="form-control" name="telefono_ins_niv_sol" value="<?= $solicitud_revalidacion->telefonoinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nivel: </label>
                                        <input type="text" id="nivel_ins_niv_sol" class="form-control" name="nivel_ins_niv_sol" value="<?= $solicitud_revalidacion->nivelinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label>Carrera: </label>
                                        <input type="text" id="carrera_ins_niv_sol" class="form-control" name="carrera_ins_niv_sol" value="<?= $solicitud_revalidacion->carrerainsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Clave*: </label>
                                        <input type="text" id="clave_ins_niv_sol" class="form-control" name="clave_ins_niv_sol" value="<?= $solicitud_revalidacion->claveinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Semestre: </label>
                                        <input type="text" id="semestre_ins_niv_sol" class="form-control" name="semestre_ins_niv_sol" value="<?= $solicitud_revalidacion->semestreinsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>Area: </label>
                                        <input type="text" id="area_ins_niv_sol" class="form-control" name="area_ins_niv_sol" value="<?= $solicitud_revalidacion->areainsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>De fecha: </label>
                                        <input type="text" id="de_fecha_niv_sol" class="form-control" name="de_fecha_niv_sol" value="<?= $solicitud_revalidacion->defechainsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>A fecha: </label>
                                        <input type="text" id="a_fecha_niv_sol" class="form-control" name="a_fecha_niv_sol" value="<?= $solicitud_revalidacion->afechainsniv ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                            <label>INSTITUCIÓN EDUCATIVA A LA QUE DESEO REALICEN LA EQUIPARACIÓN DE MIS ESTUDIOS: </label>
                        </div> 

                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Nombre completo de la intitución: </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                        <label>Nombre: </label>
                                        <input type="text" id="nombre_ins_equi_sol" class="form-control" name="nombre_ins_equi_sol" value="<?= $solicitud_revalidacion->nombreinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Ciudad/Municipio: </label>
                                        <input type="text" id="ciudad_mun_ins_equi_sol" class="form-control" name="ciudad_mun_ins_equi_sol" value="<?= $solicitud_revalidacion->ciudadmuninsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                    <div class="col-sm-4">
                                        <label>Calle y Número: </label>
                                        <input type="text" id="calle_num_ins_equi_sol" class="form-control" name="calle_num_ins_equi_sol" value="<?= $solicitud_revalidacion->callenuminsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Colonia: </label>
                                        <input type="text" id="colonia_ins_equi_sol" class="form-control" name="colonia_ins_equi_sol" value="<?= $solicitud_revalidacion->coloniainsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Delegación: </label>
                                        <input type="text" id="delegcion_ins_equi_sol" class="form-control" name="delegcion_ins_equi_sol" value="<?= $solicitud_revalidacion->delegacioninsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                                        <input type="text" id="ciudad_ins_equi_sol" class="form-control" name="ciudad_ins_equi_sol" value="<?= $solicitud_revalidacion->ciudadinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Estado: </label>
                                        <input type="text" id="estado_ins_equi_sol" class="form-control" name="estado_ins_equi_sol" value="<?= $solicitud_revalidacion->estadoinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>C.P.: </label>
                                        <input type="text" id="cp_ins_equi_sol" class="form-control" name="cp_ins_equi_sol" value="<?= $solicitud_revalidacion->codigopostalinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Teléfono: </label>
                                        <input type="text" id="telefono_ins_equi_sol" class="form-control" name="telefono_ins_equi_sol" value="<?= $solicitud_revalidacion->telefonoinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>16) Nivel: </label>
                                        <input type="text" id="nivel_ins_equi_sol" class="form-control" name="nivel_ins_equi_sol" value="<?= $solicitud_revalidacion->nivelinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-5">
                                        <label>17) Carrera: </label>
                                        <input type="text" id="carrera_ins_equi_sol" class="form-control" name="carrera_ins_equi_sol" value="<?= $solicitud_revalidacion->carrerainsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <label>Plan de estudios: </label>
                                        <input type="text" id="pe_ins_equi_sol" class="form-control" name="pe_ins_equi_sol" value="<?= $solicitud_revalidacion->peinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>18) Semestre: </label>
                                        <input type="text" id="semestre_ins_equi_sol" class="form-control" name="semestre_ins_equi_sol" value="<?= $solicitud_revalidacion->semestreinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <label>19) Area/Especialidad: </label>
                                        <input type="text" id="area_esp_ins_equi_sol" class="form-control" name="area_esp_ins_equi_sol" value="<?= $solicitud_revalidacion->areaespinsequi ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
                                        <span class="help-block"></span>
                                    </div>
                                </div>

                            </div>    
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-8">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>20) Fecha de ingreso a la institución: </label>
                                    <input type="text" id="fecha_ing_ins_equi_sol" class="form-control" name="fecha_ing_ins_equi_sol" value="<?= $solicitud_revalidacion->fechaingins ?>" placeholder="*CAMPO REQUERIDO" style="text-transform: uppercase;">
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
                    <a class="btn btn-primary validargrupo" href="#" id="btnvalidar">Guardar cambios</a>
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