<?php
/**
 * Vista de registros de institución (administrador)
 *
 * Vista que muestra al usuario la interfaz gráfica para el llenado de datos que se requieren al momento de 
 * registrar una institución, además el aspirante podrá ver que documentos han sido aceptados y observaciones 
 * de los mismos. 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage app/private/fragments/modules/Modulo1/usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/tramites_usuario
 */
?>

<!-- ROW START -->
<div class="row">

    <!-- COL-LG-12 START -->
    <div class="col-lg-12">

        <!-- HPANEL HBLUE START -->
        <div class="hpanel hblue">

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                Registro de Institución
            </div>
            <!-- PANEL-HEADING START -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                    <div class="text-center m-b-md" id="wizardControl">
                        <a class="btn btn-primary" href="#step1" id="tab1-tab">Datos personales</a>
                        <a class="btn btn-default" href="#step2" id="tab2-tab">Documentos</a>
                    </div>

                    <!-- TAB-CONTENT START -->
                    <div class="tab-content">

                        <!-- STEP1 START -->
                        <div id="step1" class="p-m tab-pane active">
                            <div class="text-center">
                                <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                    <h1 class="">Alta de datos</h1>-->
                                </div>

                                <!-- ROW START -->
                                <div class="row">

                                    <!-- COL-LG-9 START -->
                                    <div class="col-lg-9">

                                        <!-- ROW START -->
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <label><h3>Institución</h3></label>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Persona</label>
                                                <select name="tipo_persona" id="tipo_persona"class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                    <option>Física</option>
                                                    <option>Moral</option>
                                                </select>
                                            </div>

                                            <div class="col-sm-6">
                                                <label>Nivel educativo</label>
                                                <select name="nivel_educativo" id="nivel_educativo" class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                    <option>Básica</option>
                                                    <option>Media Superior</option>
                                                    <option>Superior</option>
                                                </select>
                                            </div>

                                            <div class=" col-sm-12 tooltip-demo">
                                                <label><h3>Posibles nombres</h3></label>

                                                <a class="btn btn-primary btn-circle" data-toggle="tooltip" title="Deberá registrar los tres posibles nombre que tendrá su institución">
                                                    <i class="fa fa-question"></i> 
                                                </a>
                                            </div>

                                            <div class="col-sm-12">
                                                <label>Nombre 1</label>
                                                <input type="text" name="nombre1_institucion" id="nombre1_institucion" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-12">
                                                <label>Nombre 2</label>
                                                <input type="text" name="nombre2_institucion" id="nombre2_institucion" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-12">
                                                <label>Nombre 3</label>
                                                <input type="text" name="nombre3_institucion" id="nombre2_institucion" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-12">
                                                <label><h3>Datos del propietario</h3></label>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Apellido 1</label>
                                                <input type="text" name="apellido1_propietario" id="apellido1_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Apellido 2</label>
                                                <input type="text" name="apellido2_propietario" id="apellido2_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Nombre(s)</label>
                                                <input type="text" name="nombre_propietario" id="nombre_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-12">
                                                <label>RFC</label>
                                                <input type="text" name="rfc_propietario" id="rfc_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class=" col-sm-12">
                                                <label><h3>Domicilio del propietario</h3></label>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Calle</label>
                                                <input type="text" name="calle_propietario" id="calle_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Número exterior</label>
                                                <input type="text" name="no_exterior_propietario" id="no_exterior_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Número interior</label>
                                                <input type="text" name="no_interior_propietario" id="no_interior_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Colonia</label>
                                                <input type="text" name="colonia_propietario" id="colonia_propietario" class="form-control" placeholder="*Campo requerido">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Entidad federativa</label>
                                                <select name="entidad_propietario" id="entidad_propietario" class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Municipio</label>
                                                <select name="municipio_propietario" id="municipio_propietario" class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                </select>
                                            </div>


                                            <div class="col-sm-12">
                                                <label><h3>Datos del representante</h3></label>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Apellido 1</label>
                                                <input type="text" name="apellido1_representante" id="apellido1_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Apellido 2</label>
                                                <input type="text" name="apellido2_representante" id="apellido2_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Nombre(s)</label>
                                                <input type="text" name="nombre_representante" id="nombre_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class=" col-sm-12">
                                                <label><h3>Domicilio del representante</h3></label>
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Calle</label>
                                                <input type="text" name="calle_representante" id="calle_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Número exterior</label>
                                                <input type="text" name="no_exterior_representante" id="no_exterior_representante" class="form-control" placeholder="*campo requerido">
                                            </div>

                                            <div class="col-sm-4">
                                                <label>Número interior</label>
                                                <input type="text" name="no_interior_representante" id="no_interior_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>
                                            
                                            <div class="col-sm-4">
                                                <label>Colonia</label>
                                                <input type="text" name="colonia_representante" id="colonia_representante" class="form-control" placeholder="*Campo requerido">
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Entidad federativa</label>
                                                <select name="entidad_representante" id="entidad_representante" class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <label>Municipio</label>
                                                <select name="municipio_representante" id="municipio_representante" class="form-control m-b">
                                                    <option>---Seleccione---</option>
                                                </select>
                                            </div>

                                        </div>
                                        <!-- ROW END -->

                                    </div>
                                    <!-- COL-LG-9 END -->

                                </div>
                                <!-- ROW END -->

                                <div class="text-right m-t-xs">
                                    <!--<a class="btn btn-default prev" href="#">Anterior</a>-->
                                    <a class="btn btn-default next" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                </div>
                            </div>
                            <!-- STEP1 END -->

                            <!-- STEP2 START -->

                            <div id="step2" class="p-m tab-pane">
                                <div class="text-center">
                                <!--<i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                    <h1 class="">Documentación</h1>-->
                                </div>

                                <!-- ROW START -->
                                <div class="row">

                                    <!-- FORM-GROUP COL-SM-12 START -->
                                    <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                                        <div class="col-sm-8">
                                            <label><h3>Identificación oficial vigente con fotografía del propietario</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_iden_propietario" name="docu_iden_propietario" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <ul>
                                                <li>Credencial para votar vigente, expedida por el Instituto Nacional Electoral.</li> 
                                                <li>Pasaporte vigente.</li>
                                                <li>Licencia de conducir vigente.</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_iden_propietario" name="obse_iden_propietario" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Identificación oficial vigente con fotografía del representante</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_iden_representante" name="docu_iden_representante" disabled="disabled"> No aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <ul>
                                                <li>Credencial para votar vigente, expedida por el Instituto Nacional Electoral.</li> 
                                                <li>Pasaporte vigente.</li>
                                                <li>Licencia de conducir vigente.</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_iden_representante" name="obse_iden_representante" rows="3" cols="30" disabled="disabled">No se entregó el documento</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Acta de nacimiento del propietario</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_acta_propietario" name="docu_acta_propietario" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            Recuerda que el acta de nacimiento es el documento oficial que acredita tu nombre, tu sexo, tu nacionalidad mexicana, indica la fecha y lugar de tu nacimiento, así como la filiación con tus padres o las personas que detenten la patria potestad.
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_acta_propietario" name="obse_acta_propietario" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Acta de nacimiento del representante</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_acta_representante" name="docu_acta_representante" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            Recuerda que el acta de nacimiento es el documento oficial que acredita tu nombre, tu sexo, tu nacionalidad mexicana, indica la fecha y lugar de tu nacimiento, así como la filiación con tus padres o las personas que detenten la patria potestad.
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_acta_representante" name="obse_acta_representante" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Recibo de derechos</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_recibo_derecho" name="docu_recibo_derecho" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">

                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_recibo_derecho" name="obse_recibo_derecho" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Acreditación legal</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_acreditacion_legal" name="docu_acreditacion_legal" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            Asegúrate de que el inmueble esté libre de gravamen,  problemas legales y administrativos.
                                            <ul>
                                                <li>Escritura pública que acredite la propiedad del inmueble.</li> 
                                                <li>Contrato de arrendamiento.</li>
                                                <li>Contrato de Comodato.</li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_acreditacion_legal" name="obse_acreditacion_legal" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                        <div class="col-sm-8">
                                            <label><h3>Solicitud</h3></label>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="checkbox">
                                                <label><input type="checkbox" class="i-checks" id="docu_solicitud" name="docu_solicitud" disabled="disabled" checked> Aceptado </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">

                                        </div>
                                        <div class="col-sm-4">
                                            <label>Observaciones</label>
                                            <textarea id="obse_solicitud" name="obse_solicitud" rows="3" cols="30" disabled="disabled">Sin observaciones</textarea>
                                        </div>

                                    </div>
                                    <!-- FORM-GROUP COL-SM-12 END -->

                                </div> 
                                <!-- ROW END --> 

                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                    <a class="btn btn-primary submitWizard" href="#">Enviar</a>
                                </div>
                            </div>
                            <!-- STEP2 END -->

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
        <div class="row">
            <div class="col-lg-12">
                <label>  </label>
            </div>
            <div class="col-lg-12">
                <label>  </label>
            </div>
        </div>
    </div>
    <!-- ROW END -->
