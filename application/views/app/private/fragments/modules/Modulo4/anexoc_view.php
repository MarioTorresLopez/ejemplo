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
                            <div class="col-sm-12 text-center">
                                <label>DATOS GENERALES</label>
                            </div>   
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Nombre(AP-AM- nombre(s))</label>
                                        <input type="text" id="name" class="form-control" name="fecha_sol" placeholder="GARRIGOS MENDEZ ANGELINA" style="text-transform: uppercase;" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>RFC</label>
                                        <input type="text" id="rfc" class="form-control" name="fecha_sol" placeholder="GAMA611217LZ5" style="text-transform: uppercase;" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Domicilio</label>
                                        <input type="text" id="domicilio" class="form-control" name="fecha_sol" placeholder="FRAY BERNARDO DE LA TORRE 254" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Teléfono</label>
                                        <input type="text" id="telefono" class="form-control" name="fecha_sol" placeholder="4422238055" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Tipo de autorización</label>
                                        <input type="text" id="tipoautorizacion" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Vigencia</label>
                                        <input type="text" id="vigencia" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Fecha de inicio de labores</label>
                                        <input type="text" id="fechalab" class="form-control" name="fecha_sol" placeholder="14/07/2003" disabled>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <label>Correo electrónico</label>
                                        <input type="text" id="correo" class="form-control" name="fecha_sol" placeholder="angelina.garrigos@colegioanglo.com" disabled>
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
                            <label>CICLO ESCOLAR 2019-2020</label>
                        </div>  
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Función que desempeña</label>
                                <input type="text" id="funciondesem" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Materia que imparte</label>
                                <input type="text" id="materiaimpor" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Grupos que atiende</label>
                                <input type="number" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>DATOS DE PROFESIÓN</label>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Perfil profesional</label>
                                <input type="perfilprof" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Cédula profesional</label>
                                <input type="cedulaprof" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Inst que expide</label>
                                <input type="intsexp" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>

                        <div class="col-sm-12 text-center">
                            <label>EXPERIENCIA LABORAL</label>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Institución</label>
                                <input type="institucion" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Función</label>
                                <input type="funcion" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Periodo</label>
                                <input type="periodo" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>Folio de forma migratoria</label>
                                <input type="periodo" id="grupos" class="form-control" name="fecha_sol" placeholder="*CAMPO REQUERIDO" >
                                <span class="help-block"></span>
                            </div>
                        </div>


                        <div class="col-sm-12">
                            <div class="form-group">
                                <hr style="border-color: black; width: 100%">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <label>OBSERVACIONES</label>
                                <textarea id="obse_acreditacion_legal" name="obse_acreditacion_legal" rows="3" cols="30" d></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>

                    </form>
                    <!--form END-->


                </div> 
                <!-- ROW END --> 

                <div class="text-right m-t-xs">
                    <a class="btn btn-primary validargrupo" href="#" id="">Guardar</a>
                    <a class="btn btn-danger" id="">Cancelar</a>
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