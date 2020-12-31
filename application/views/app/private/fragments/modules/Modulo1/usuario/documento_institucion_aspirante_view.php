
<?php
/**
 * Vista de datos de institución (aspirante)
 *
 * vista que muestra los documentos que hay que llevas a la sedeq y asi mismo subir su plan de estudios
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage app/private/fragments/modules/Modulo1/usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses  ./application/controllers/usuario/tramite
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
                Documentos
            </div>

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <!--<form name="simpleForm" novalidate id="simpleForm" action="#" method="post">-->
                <?php
                if (!is_null($institucion_solicitud_aceptacion)):
                    foreach ($institucion_solicitud_aceptacion as $wwe):
                        if ($wwe->estatusinsti == '2') {
                            ?>
                            <div class="row well well-lg">
                                <div class="col-sm-12">
                                    <label><h3>Su solicitud está en proceso.</h3></label>
                                </div>
                            </div>
                            <!-- ROW START -->
                        <?php } if ($wwe->estatusinsti == '0') { ?> 
                            <div class="row well well-lg">
                                <div class="col-sm-12">
                                    <label><h3>Su solicitud no fue aceptada.</h3></label>
                                </div>
                            </div>
                        <?php } if ($wwe->estatusinsti == '1' || $wwe->estatusinsti == '3') { ?>


                            <div id="todo">
                                <div class="text-center m-b-md" id="wizardControl">
                                    <a class="btn btn-primary" href="#step1" id="tab1-tab" disabled="disabled">Datos solicitud</a>
                                    <a class="btn btn-default" href="#step2" id="tab2-tab" disabled="disabled">Documentos generales</a>
                                    <a class="btn btn-default" href="#step3" id="tab3-tab" disabled="disabled">Documentos institución</a>
                                    <a class="btn btn-default" href="#step4" id="tab4-tab" disabled="disabled">Cita</a>

                                </div>

                                <!-- TAB-CONTENT START -->
                                <div class="tab-content">
                                    <!-- STEP1 START -->
                                    <div id="step1" class="p-m tab-pane active">
                                        <div class="text-right m-t-xs">
                                            <!--<a class="btn btn-default prev" id="idprueba">Anterior</a>-->
                                            <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                        </div>
                                        <div class="text-center">
                                            <!--<i class="pe-7s-user fa-5x text-muted"></i>
                                            <h1 class="">Alta datos</h1>-->
                                        </div>

                                        <!-- ROW START -->
                                        <div class="row well well-lg">

                                            <!-- COL-SM-9 START -->
                                            <div class="col-sm-12">

                                                <!-- ROW START -->

                                                <div class="col-sm-12">
                                                    <label><h3>Institución</h3></label>
                                                </div>

                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Persona</label>
                                                        <input type="text" name="persona" id="persona" class="form-control" 
                                                               value="<?php if ($wwe->personainsti == '1') { ?> FÍSICA <?php } else { ?> MORAL <?php } ?>" disabled="disabled">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-lg-4">
                                                        <label>Nivel educativo:</label>
                                                        <input type="text" name="nivelninsti" id="nivelninsti" class="form-control" 
                                                               value="<?= $wwe->nivelninsti ?>" disabled="disabled">

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-lg-4">
                                                        <label>Modalidad:</label>
                                                        <input type="text" name="idmodalidad" id="idmodalidad" class="form-control" 
                                                               value="<?= $wwe->modalidadninsti ?>" disabled="disabled">

                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Nombre del plan de estudios</label>
                                                        <input type="text" name="plan_estudios" id="plan_estudios" disabled="disabled" class="form-control" value="<?= $wwe->planinsti ?>" style="text-transform: uppercase;">

                                                    </div>
                                                </div>



                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Teléfono</label>
                                                        <input type="text" name="telefonoinsti" id="telefonoinsti" class="form-control" 
                                                               value="<?= $wwe->telefonoinsti ?>" disabled="disabled">
                                                    </div>
                                                </div>

                                                <div class=" col-sm-12 tooltip-demo">
                                                    <label><h3>Posibles nombres</h3></label>
                                                </div>


                                                <div class="form-group"> 
                                                    <div class="col-sm-12">
                                                        <label>Nombre 1</label>
                                                        <input type="text" name="terna1insti" id="terna1insti" class="form-control" 
                                                               value="<?= $wwe->terna1insti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-12">
                                                        <label>Nombre 2</label>
                                                        <input type="text" name="terna2insti" id="terna2insti" class="form-control" 
                                                               value="<?= $wwe->terna2insti ?>" disabled="disabled">
                                                    </div>
                                                </div>

                                                <div class="form-group"> 
                                                    <div class="col-sm-12">
                                                        <label>Nombre 3</label>
                                                        <input type="text" name="terna3insti" id="terna3insti" class="form-control" 
                                                               value="<?= $wwe->terna3insti ?>" disabled="disabled">
                                                    </div>
                                                </div>


                                                <div class=" col-sm-12">
                                                    <label><h3>Domicilio de la institución</h3></label>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Calle</label>
                                                        <input type="text" name="calleinsti" id="calleinsti" class="form-control" 
                                                               value="<?= $wwe->calleinsti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Número exterior</label>
                                                        <input type="text" name="noextinsti" id="noextinsti" class="form-control" 
                                                               value="<?= $wwe->noextinsti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Número interior</label>
                                                        <input type="text" name="nointinsti" id="nointinsti" class="form-control" 
                                                               value="<?= $wwe->nointinsti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Colonia</label>
                                                        <input type="text" name="coloniainsti" id="coloniainsti" class="form-control" 
                                                               value="<?= $wwe->coloniainsti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <div class="form-group"> 
                                                    <div class="col-sm-4">
                                                        <label>Código postal</label>
                                                        <input type="text" name="cpinsti" id="cpinsti" class="form-control" 
                                                               value="<?= $wwe->cpinsti ?>" disabled="disabled">
                                                    </div>
                                                </div>
                                                <!-- datos de otra tabla start -->
                                                <div class="form-group">
                                                    <div class="col-lg-4">
                                                        <label>Entidad federativa:</label>
                                                        <input type="text" name="estaninsti" id="estaninsti" class="form-control" 
                                                               value="<?= $wwe->estaninsti ?>" disabled="disabled">

                                                    </div>
                                                </div>
                                                <!-- datos de otra tabla start -->
                                                <div class="form-group">
                                                    <div class="col-lg-4">
                                                        <label>Municipio:</label>
                                                        <input type="text" name="munininsti" id="munininsti" class="form-control" 
                                                               value="<?= $wwe->munininsti ?>" disabled="disabled">
                                                    </div>
                                                </div>

                                                <?php if (!is_null($datos_prop)): ?>
                                                    <div class="col-sm-12">
                                                        <label><h3>Datos del propietario</h3></label>

                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Apellido 1</label>
                                                            <input type="text" name="a1propie" id="a1propie" class="form-control" 
                                                                   value="<?= $datos_prop->apellido1 ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Apellido 2</label>
                                                            <input type="text" name="a2propie" id="a2propie" class="form-control" 
                                                                   value="<?= $datos_prop->apellido2 ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Nombre(s)</label>
                                                            <input type="text" name="nompropie" id="nompropie" class="form-control" 
                                                                   value="<?= $datos_prop->nompropietario ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Teléfono</label>
                                                            <input type="text" name="telefonopropie" id="telefonopropie" class="form-control" 
                                                                   value="<?= $datos_prop->telefono ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Correo</label>
                                                            <input type="text" name="correopropie" id="correopropie" class="form-control" 
                                                                   value="<?= $datos_prop->correo ?>" disabled="disabled">
                                                        </div>
                                                    </div>

                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>RFC</label>
                                                            <input type="text" name="rfcpropie" id="rfcpropie" class="form-control" 
                                                                   value="<?= $datos_prop->rfc ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                                <?php if (!is_null($datos_notificacion)): ?>

                                                    <div class=" col-sm-12">
                                                        <label><h3>Domicilio para oir y recibir notificaciones</h3></label>
                                                    </div>

                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Calle</label>
                                                            <input type="text" name="calleoirnotificacion" id="calleoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->calle ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Número exterior</label>
                                                            <input type="text" name="noextoirnotificacion" id="noextoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->noext ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Número interior</label>
                                                            <input type="text" name="nointoirnotificacion" id="nointoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->noint ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Colonia</label>
                                                            <input type="text" name="coloniaoirnotificacion" id="coloniaoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->colonia ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-4">
                                                            <label>Código postal</label>
                                                            <input type="text" name="cpoirnotificacion" id="cpoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->cp ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                    <!-- datos de otra tabla start -->
                                                    <div class="form-group">
                                                        <div class="col-lg-4">
                                                            <label>Entidad federativa:</label>
                                                            <input type="text" name="estaoirnotificacion" id="estaoirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->estaoirnotificacion ?>" disabled="disabled">

                                                        </div>
                                                    </div>
                                                    <!-- datos de otra tabla start -->
                                                    <div class="form-group">
                                                        <div class="col-lg-4">
                                                            <label>Municipio:</label>
                                                            <input type="text" name="munioirnotificacion" id="munioirnotificacion" class="form-control" 
                                                                   value="<?= $datos_notificacion->munioirnotificacion ?>" disabled="disabled">
                                                        </div>
                                                    </div>
                                                <?php endif ?>

                                                <?php if ($wwe->personainsti == 0) { ?>
                                                    <!--  datos de una persona moral-->
                                                    <div class="col-sm-12">
                                                        <label><h3>Asociación Moral</h3></label>
                                                    </div>
                                                    <div class="form-group"> 
                                                        <div class="col-sm-12">
                                                            <label>Nombre</label>
                                                            <?php if (!is_null($datos_persona_moral)) { ?>    
                                                                <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="<?= $datos_persona_moral->nombre ?>" disabled="disabled">
                                                            <?php } else { ?>
                                                                <input type="text" name="nombremoral" id="nombremoral" class="form-control" value="" disabled="disabled">
                                                            <?php } ?>
                                                        </div>
                                                    </div>

                                                <?php } ?>

                                                <!--para los datos del representante-->
                                                <?php
                                                if (!is_null($datos_repre)):
                                                    foreach ($datos_repre as $rp):
                                                        ?>
                                                        <div class="row col-lg-12" id="row_media" >
                                                            <div class="col-sm-12">
                                                                <label><h3>Datos del representante</h3></label>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <div class="col-sm-4">
                                                                    <label>Apellido 1</label>
                                                                    <input type="text" name="a1repre" id="a1repre" class="form-control" 
                                                                           value="<?= $rp->apellido1 ?>" disabled="disabled">
                                                                </div></div>


                                                            <div class="form-group"> 
                                                                <div class="col-sm-4">
                                                                    <label>Apellido 2</label>
                                                                    <input type="text" name="a2repre" id="a2repre" class="form-control" 
                                                                           value="<?= $rp->apellido2 ?>" disabled="disabled">
                                                                </div>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <div class="col-sm-4">
                                                                    <label>Nombre(s)</label>
                                                                    <input type="text" name="nomrepre" id="nomrepre" class="form-control" 
                                                                           value="<?= $rp->nombre ?>" disabled="disabled">
                                                                </div>
                                                            </div>
                                                            <div class="form-group"> 
                                                                <div class="col-sm-4">
                                                                    <label>Teléfono</label>
                                                                    <input type="text" name="telrepre" id="telrepre" class="form-control" 
                                                                           value="<?= $rp->telefono ?>" disabled="disabled">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <?php
                                                    endforeach;
                                                endif;
                                                ?>

                                                <!-- ROW END -->

                                            </div>
                                            <!-- COL-SM-9 END -->

                                        </div>
                                        <!-- ROW END -->

                                        <div class="text-right m-t-xs">
                                            <!--<a class="btn btn-default prev" id="idprueba">Anterior</a>-->
                                            <a class="btn btn-default next sig1" href="#step2" data-toggle="tab" id="btnnextStep1">Siguiente</a>
                                        </div>
                                    </div>
                                    <!-- STEP1 END -->


                                    <!-- STEP2 START -->
                                    <div id="step2" class="p-m tab-pane">
                                        <div class="text-right m-t-xs">
                                            <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                            <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                                        </div>
                                        <div class="text-center">
                                            <!--<i class="fa fa-file-pdf-o fa-5x text-muted"></i>
                                            <h1 class="">Documentación</h1>-->
                                        </div>

                                        <!-- ROW START -->
                                        <div class="row well well-lg">
                                            <div class=" form-group">
                                                <div class="col-sm-12" align="justify">
                                                    <label><h4>NOTA: Los documentos listados a continuación se deberán llevar en físico, para el día de su cita.</h4></label>
                                                </div> 
                                            </div>

                                            <!-- FORM-GROUP COL-SM-12 START -->
                                            <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                                <!--  Documentos del propietario -->


                                                <div id="propietario"> 

                                                    <div class="row well well-lg">
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h3>Acta de nacimiento del propietario si es persona física</h3></label>
                                                            <br>Es el documento por el cual se otorga constancia de los datos básicos acerca 
                                                            del nacimiento de una persona. A partir de esa acta, a la persona se le otorgará un
                                                            documento de identidad, que lo identifica como ciudadano.
                                                        </div>
                                                        <div class="col-sm-8" align="justify">

                                                        </div>
                                                    </div>
                                                    <div class="row well well-lg">
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h3>Recibo de pago de derechos correspondientes</h3></label>
                                                        </div>
                                                        <div class="col-sm-8" align="justify">

                                                        </div>
                                                    </div>

                                                    <div class=" row well well-lg"> 
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h3>Identificación oficial del propietario si es persona física</h3></label>
                                                            <br>Es el documento oficial que identifica de manera inequívoca que se trata de una persona 
                                                            en particular y puede ser mediante cualquiera de los siguientes documentos:
                                                        </div>
                                                        <div class="col-sm-8" align="justify">
                                                            <ul>
                                                                <br><li>1. Credencial para votar</li>
                                                                <li>2. Cartilla del servicio militar</li> 
                                                                <li>3. Pasaporte</li>
                                                                <li>4. Cédula profesional</li>
                                                            </ul>
                                                        </div>


                                                    </div> 
                                                </div> 
                                                <!--    Documentos del propietario end  -->

                                                <!--    Documentos del representante  -->
                                                <?php if ($wwe->personainsti == '0') { ?>
                                                    <div id="representante"> 
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Acta de nacimiento del representante legal si es persona moral</h3></label>
                                                                <br>Es el documento por el cual se otorga constancia de los datos básicos acerca 
                                                                del nacimiento de una persona. A partir de esa acta, a la persona se le otorgará un
                                                                documento de identidad, que lo identifica como ciudadano.
                                                            </div>
                                                           
                                                        </div>
                                                        <div class=" row well well-lg"> 
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Identificación oficial vigente con fotografía del representante</h3></label>
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <li>Credencial para votar vigente, expedida por el Instituto Nacional Electoral.</li>
                                                                    <li>Cartilla del servicio militar.</li> 
                                                                    <li>Pasaporte vigente.</li>
                                                                    <li>Cédula profesional.</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                        <!--  acta constitutiva  -->
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Acta constitutiva si es persona moral</h3></label>
                                                        <br>Es la escritura pública mediante la que se constituye una persona moral, 
                                                        misma que se protocoliza ante un notario público o corredor público    
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <ul>
                                                            <br><li>Número de escritura pública</li>
                                                            <li>Fecha de emisión: día/mes/año</li>
                                                            <li>Nombre del Notario Público que la emite; Nombre completo; apellido paterno, apellido materno</li>
                                                            <li>Número de notaría</li>
                                                            <li>Ciudad y estado en que se expide; ciudad y estado</li>
                                                            <li>Nombre de la persona moral</li>
                                                            <li>Especificar el objeto social de la persona moral. Impartir servicios educativos</li>
                                                            <li>Número de folio de inscripción al Registro Público de la Propiedad y del Comercio, folio de personas morales; folio/ 0</li>
                                                            <li>Fecha de inscripción al registro público: día/mes/año</li>

                                                        </ul>
                                                    </div>

                                                </div>
                                                <!--  acta constitutiva end -->
                                                        
                                                    </div>
                                                <?php } ?>
                                                  <h3 class=""><li>Para el caso de media superior se deberá de adjuntar el plan de estudios en 5 memorias usb.</li></h3>

                                                

<!--                                                 ocupacion legal del inmueble 
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                        <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                        Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                        Puede ser mediante cualquiera de los siguientes documentos:
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                        <br> 2. Contrato de arrendamiento<br/>
                                                        <br> 3. Contrato de Comodato<br/>
                                                        <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                        jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>

                                                    </div>

                                                </div>

                                                 Dictamen del uso del suelo 
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Dictamen de uso de suelo</h3></label>
                                                        <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                        para un determinado servicio educativo, de conformidad con lo establecido 
                                                        en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                        correspondiente. Información que contiene:
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <ul>
                                                            <br><li>Clave catastral</li>
                                                            <li>Fecha de emisión día/mes/año</li>
                                                            <li>Dirección</li>
                                                            <li>Calle</li>
                                                            <li>Número</li>
                                                            <li>Colonia</li>
                                                            <li>Ciudad</li>
                                                            <li>Superficie del inmueble; M2</li>
                                                            <li>Está condicionado: si, no</li>
                                                            <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                            <br>Factible para:

                                                            <br><li>Educación inicial</li>
                                                            <li>Preescolar</li>
                                                            <li>Primaria</li>
                                                            <li>Secundaria</li>
                                                            <li>Media superior</li>
                                                            <li>Superior</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                 Dictamen del uso del suelo end
                                                 Constancia de seguridad estructural
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Constancia de seguridad estructural</h3></label>
                                                        <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                        Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                        de utilizarse para un determinado servicio educativo
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <ul>
                                                            <li>Dirección del inmueble</li>
                                                            <li>Calle</li>
                                                            <li>Número</li>
                                                            <li>Colonia</li>
                                                            <li>Ciudad</li>
                                                            <li>Fecha de expedición; día/mes/año</li>
                                                            <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                            <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                            <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                            <ul> <li>Número de registro:</li>
                                                                <li>Número de registro de perito de director responsable de obra</li>
                                                                <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                            </ul>
                                                            <ul>
                                                                <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                    Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                            </ul>
                                                            <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                 Constancia de seguridad estructural end
                                                 visto bueno de proteccion civil
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                        <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                        el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                        en materia de protección civil.
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <ul>
                                                            <br><li>1. Fecha de emisión: día/mes/año</li>
                                                            <li>2. Fecha de vigencia: día/mes/año</li>
                                                            <li>3. Emitido para;</li>
                                                            <ul>
                                                                <li>a. Educación inicial,</li>
                                                                <li>b. Educación preescolar</li>
                                                                <li>c. Educación primaria</li>
                                                                <li>d. Educación secundaria</li>
                                                                <li>e. Educación media superior</li>
                                                                <li>f. Educación superior</li>
                                                            </ul>
                                                            <li>4. Domicilio.</li>
                                                            <ul>
                                                                <li>a. Calle</li>
                                                                <li>b. Número</li>
                                                                <li>c. Colonia</li>
                                                                <li>d. Ciudad</li>
                                                            </ul>
                                                        </ul>
                                                    </div>
                                                </div>
                                                 visto bueno de proteccion civil end 
                                                 numero oficial  
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Certificado del número oficial </h3></label>
                                                        <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                        un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                    </div>
                                                    <div class="col-sm-8" align="justify">
                                                        <ul>
                                                            <br><li>Clave catastral:</li>
                                                            <li>Fecha de emisión: día/mes/año/</li>
                                                            <li>Autoridad que lo emite:</li>
                                                            <li>Calle</li>
                                                            <li>Número</li>
                                                            <li>Colonia</li>
                                                            <li>Ciudad</li>
                                                        </ul>
                                                        Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                        anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                        constancia de seguridad estructural.
                                                    </div>
                                                </div>
                                                 numero oficial  end 
                                                 pago derechos 
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Pago de derechos</h3></label>
                                                        <br>Es el pago de derechos que realiza el particular por el servicio que presta la Dirección de Educación de acuerdo
                                                        a la Ley de Hacienda del Estado de Querétaro. Varía según el nivel educativo que se pretende incorporar.
                                                    </div>

                                                </div>
                                                 pago derechos end 
                                                plano arquitectonico  
                                                <div class=" row well well-lg">
                                                    <div class="col-sm-8" align="justify">
                                                        <label><h3>Plano  del inmueble </h3></label>
                                                        <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                        señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                        educativo que pretende ofertar.
                                                    </div>

                                                </div>
                                                plano arquitectonico  end-->

                                            </div>
                                            <!-- FORM-GROUP COL-SM-12 END -->

                                        </div>
                                        <!-- ROW END -->

                                        <div class="text-right m-t-xs">
                                            <a class="btn btn-default prev ant2" id="btnprevStep2" href="#step1" data-toggle="tab">Anterior</a>
                                            <a class="btn btn-default next sig2" href="#step3" data-toggle="tab" id="btnnextStep2">Siguiente</a>
                                        </div>
                                    </div>
                                    <!-- STEP2 END -->

                                    <!-- STEP3 START -->
                                    <div id="step3" class="p-m tab-pane">
                                        <div class="text-right m-t-xs">
                                            <a class="btn btn-default prev ant3" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                            <a class="btn btn-default next sig3" href="#step4" data-toggle="tab" id="btnnextStep3">Siguiente</a>
                                            <!--<a class="btn btn-default next" href="#">Siguiente</a>-->
                                            <!--<a class="btn btn-primary submitWizard" href="#">Enviar</a>-->
                                        </div>
                                        <div class="text-center">
                                            <div class=" form-group">
                                                <div class="col-sm-12" align="justify">
                                                    <label><h4>NOTA: Los documentos listados a continuación se deberan llevar en físico, para el día de tu cita.</h4></label>
                                                </div> 
                                            </div>
                                        </div>


                                        <!-- ROW START -->
                                        <div class="row well well-lg">

                                            <!-- FORM-GROUP COL-SM-12 START -->
                                            <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                                <!--EDUCACION INICIAL-->
                                                <?php if ($wwe->nivelinsti == '11') { ?>

                                                    <div id="inicial">
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h1>Eduación Inicial </h1></label>
                                                        </div>
                                                        <!--personal directivo y docente -->     
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Personal directivo y docente
                                                                        educación inicial, preescolar, primaria y secundaria
                                                                    </h3></label>
                                                                <br> Es el formato mediante el cual el particular persona física o moral registrará los nombres 
                                                                del personal directivo y docente propuesto; señalando si es directivo o docente de grupo.
                                                                Es importante que los docentes propuestos tengan el perfil profesional de acuerdo al profesiograma 
                                                                de cada nivel educativo y tengan título y cédula profesional.
                                                            </div>
                                                            <!--                                                            <div class="col-sm-8" align="justify">
                                                                                                                            Datos personales de las personas que trabajan en la institución y sus cargos dentro de ella
                                                                                                                        </div>-->

                                                        </div>  

                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Descripción de Instalaciones</h3></label>
                                                                <br>Es el formato mediante el cual el particular persona física o moral,
                                                                realiza una descripción sintética de los documentos que presenta y de 
                                                                las instalaciones con que cuenta para ofertar un servicio educativo de 
                                                                Educación Inicial ó Preescolar ó Primaria ó Secundaria ó Media Superior.
                                                                <br>El formato del Anexo 2 se encuentra en los requisitos que son proporcionados
                                                                al particular para el trámite
                                                            </div>

                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                                <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                                Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                                Puede ser mediante cualquiera de los siguientes documentos:
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                                <br> 2. Contrato de arrendamiento<br/>
                                                                <br> 3. Contrato de Comodato<br/>
                                                                <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                                jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>

                                                            </div>

                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Dictamen de uso de suelo</h3></label>
                                                                <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                                para un determinado servicio educativo, de conformidad con lo establecido 
                                                                en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                                correspondiente. Información que contiene:
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>Clave catastral</li>
                                                                    <li>Fecha de emisión día/mes/año</li>
                                                                    <li>Dirección</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                    <li>Superficie del inmueble; M2</li>
                                                                    <li>Está condicionado: si, no</li>
                                                                    <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                                    <br>Factible para:

                                                                    <br><li>Educación inicial</li>
                                                                    <li>Preescolar</li>
                                                                    <li>Primaria</li>
                                                                    <li>Secundaria</li>
                                                                    <li>Media superior</li>
                                                                    <li>Superior</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Constancia de seguridad estructural</h3></label>
                                                                <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                                Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                                de utilizarse para un determinado servicio educativo
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <li>Dirección del inmueble</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                    <li>Fecha de expedición; día/mes/año</li>
                                                                    <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                                    <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                        lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                        (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                                    <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                                    <ul> <li>Número de registro:</li>
                                                                        <li>Número de registro de perito de director responsable de obra</li>
                                                                        <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                                    </ul>
                                                                    <ul>
                                                                        <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                        <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                        <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                        <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                        <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                        <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                            Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                                    </ul>
                                                                    <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                                <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                                el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                                en materia de protección civil.
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>1. Fecha de emisión: día/mes/año</li>
                                                                    <li>2. Fecha de vigencia: día/mes/año</li>
                                                                    <li>3. Emitido para;</li>
                                                                    <ul>
                                                                        <li>a. Educación inicial,</li>
                                                                        <li>b. Educación preescolar</li>
                                                                        <li>c. Educación primaria</li>
                                                                        <li>d. Educación secundaria</li>
                                                                        <li>e. Educación media superior</li>
                                                                        <li>f. Educación superior</li>
                                                                    </ul>
                                                                    <li>4. Domicilio.</li>
                                                                    <ul>
                                                                        <li>a. Calle</li>
                                                                        <li>b. Número</li>
                                                                        <li>c. Colonia</li>
                                                                        <li>d. Ciudad</li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Certificado del número oficial </h3></label>
                                                                <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                                un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>Clave catastral:</li>
                                                                    <li>Fecha de emisión: día/mes/año/</li>
                                                                    <li>Autoridad que lo emite:</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                </ul>
                                                                Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                                anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                                constancia de seguridad estructural.
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Plano  del inmueble </h3></label>
                                                                <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                                señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                                educativo que pretende ofertar.
                                                            </div>

                                                        </div>
                                                        <!--personal directivo y docente end-->
                                                        <!--instalaciones-->
                                                        <!--                                                        <div class=" row well well-lg">
                                                                                                                    <div class="col-sm-8" align="justify">
                                                                                                                        <label><h3>Inventario de las Instalaciones</h3></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8" align="justify">
                                                                                                                        <ul>
                                                                                                                            <li>Original del Inventario de las instalaciones</li>
                                                                                                                        </ul>
                                                                                                                    </div>
                                                                                                                </div>-->

                                                        <!--instalaciones end-->
                                                    </div>

                                                <?php } ?>
                                                <!--EDUCACION INICIAL END-->
                                                <!--EDUCACION BASICA-->
                                                <?php if ($wwe->nivelinsti == '12' || $wwe->nivelinsti == '13' || $wwe->nivelinsti == '14') { ?>

                                                    <div id="educacion_basica">
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h1>Educación Básica</h1></label>
                                                        </div>
                                                        <!--personal directivo y docente -->     
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Personal directivo y docente
                                                                        educación inicial, preescolar, primaria y secundaria
                                                                    </h3></label>
                                                                <br> Es el formato mediante el cual el particular persona física o moral registrará los nombres 
                                                                del personal directivo y docente propuesto; señalando si es directivo o docente de grupo.
                                                                Es importante que los docentes propuestos tengan el perfil profesional de acuerdo al profesiograma 
                                                                de cada nivel educativo y tengan título y cédula profesional.
                                                            </div>
                                                            <!--                                                            <div class="col-sm-8" align="justify">
                                                                                                                            Datos personales de las personas que trabajan en la institución y sus cargos dentro de ella
                                                                                                                        </div>-->
                                                        </div>  
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Descripción de Instalaciones</h3></label>
                                                                <br>Es el formato mediante el cual el particular persona física o moral,
                                                                realiza una descripción sintética de los documentos que presenta y de 
                                                                las instalaciones con que cuenta para ofertar un servicio educativo de 
                                                                Educación Inicial ó Preescolar ó Primaria ó Secundaria ó Media Superior.
                                                                <br>El formato del Anexo 2 se encuentra en los requisitos que son proporcionados
                                                                al particular para el trámite
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                                <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                                Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                                Puede ser mediante cualquiera de los siguientes documentos:
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                                <br> 2. Contrato de arrendamiento<br/>
                                                                <br> 3. Contrato de Comodato<br/>
                                                                <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                                jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Dictamen de uso de suelo</h3></label>
                                                                <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                                para un determinado servicio educativo, de conformidad con lo establecido 
                                                                en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                                correspondiente. Información que contiene:
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>Clave catastral</li>
                                                                    <li>Fecha de emisión día/mes/año</li>
                                                                    <li>Dirección</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                    <li>Superficie del inmueble; M2</li>
                                                                    <li>Está condicionado: si, no</li>
                                                                    <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                                    <br>Factible para:

                                                                    <br><li>Educación inicial</li>
                                                                    <li>Preescolar</li>
                                                                    <li>Primaria</li>
                                                                    <li>Secundaria</li>
                                                                    <li>Media superior</li>
                                                                    <li>Superior</li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Constancia de seguridad estructural</h3></label>
                                                                <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                                Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                                de utilizarse para un determinado servicio educativo
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <li>Dirección del inmueble</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                    <li>Fecha de expedición; día/mes/año</li>
                                                                    <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                                    <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                        lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                        (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                                    <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                                    <ul> <li>Número de registro:</li>
                                                                        <li>Número de registro de perito de director responsable de obra</li>
                                                                        <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                                    </ul>
                                                                    <ul>
                                                                        <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                        <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                        <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                        <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                        <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                        <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                            Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                                    </ul>
                                                                    <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                                <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                                el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                                en materia de protección civil.
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>1. Fecha de emisión: día/mes/año</li>
                                                                    <li>2. Fecha de vigencia: día/mes/año</li>
                                                                    <li>3. Emitido para;</li>
                                                                    <ul>
                                                                        <li>a. Educación inicial,</li>
                                                                        <li>b. Educación preescolar</li>
                                                                        <li>c. Educación primaria</li>
                                                                        <li>d. Educación secundaria</li>
                                                                        <li>e. Educación media superior</li>
                                                                        <li>f. Educación superior</li>
                                                                    </ul>
                                                                    <li>4. Domicilio.</li>
                                                                    <ul>
                                                                        <li>a. Calle</li>
                                                                        <li>b. Número</li>
                                                                        <li>c. Colonia</li>
                                                                        <li>d. Ciudad</li>
                                                                    </ul>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Certificado del número oficial </h3></label>
                                                                <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                                un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <br><li>Clave catastral:</li>
                                                                    <li>Fecha de emisión: día/mes/año/</li>
                                                                    <li>Autoridad que lo emite:</li>
                                                                    <li>Calle</li>
                                                                    <li>Número</li>
                                                                    <li>Colonia</li>
                                                                    <li>Ciudad</li>
                                                                </ul>
                                                                Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                                anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                                constancia de seguridad estructural.
                                                            </div>
                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Plano  del inmueble </h3></label>
                                                                <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                                señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                                educativo que pretende ofertar.
                                                            </div>

                                                        </div>
                                                        <!--material bibliografico-->
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Material Bibliográfico</h3></label>
                                                            </div>
                                                            <div class="col-sm-8" align="justify">
                                                                <ul>
                                                                    <li>Bibliografía educación primaria y secundaria </li>
                                                                    <br>Es un listado que reportará el particular persona física o moral del acervo bibliográfico 
                                                                    con los que pretenda trabajar el plan y programas de estudio vigente; Primaria (50 títulos por grado)
                                                                    y Secundaria (100 títulos por grado), cuyos contenidos apoyen el estudio de las diversas asignaturas o 
                                                                    áreas de conocimiento; este acervo deberá enriquecerse y actualizarse cada ciclo escolar.
                                                                    <li>Bibliografía educación media superior</li>
                                                                    <br>Es un listado de la bibliografía, reportando al menos tres títulos por asignatura, de acuerdo al plan
                                                                    y programas de estudio oficial, estos lo podrá obtener de cada programa de estudio, en la página de la DGB 
                                                                    en la siguiente dirección https://www.dgb.sep.gob.mx/ en el menú “información académica” en “programas de 
                                                                    estudio” https://www.dgb.sep.gob.mx/informacion-academica/programas-de-estudio.php.
                                                                    <li>Bibliografía educación superior</li>
                                                                    <br>Es la propuesta bibliográfica que realizará el particular persona física o moral, reportando al menos
                                                                    tres títulos por asignatura de todo el plan de estudios, mismos que serán evaluados por la Comisión Estatal 
                                                                    para la Planeación de la Educación Superior (COEPES) o el Comité Estatal Interinstitucional para la Formación 
                                                                    y Capacitación de Recursos Humanos e Investigación en Salud del Estado de Querétaro (CEIFRHS) de conformidad al
                                                                    acuerdo secretarial 171117 y los LINEAMIENTOS para obtener la opinión técnico académica de la Comisión 
                                                                    Interinstitucional para la Formación de Recursos Humanos para la Salud, respecto de la apertura y funcionamiento 
                                                                    de Instituciones Particulares de Educación Superior dedicadas a la formación de Recursos Humanos para la Salud.

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Equipamiento de laboratorio polifuncional solo si es secundaria</h3></label>
                                                                <br>Es un inventario que presentará el particular persona física o moral, del material y equipo del 
                                                                laboratorio polifuncional, con los que pretenda trabajar el plan y programas de estudio vigente, para
                                                                Secundaria ó Media Superior: en el mismo considerar; mesas de trabajo, cristalería, reactivos, anaqueles
                                                                de resguardo y equipo para las asignaturas de biología, física y química de acuerdo al plan y programas
                                                                de estudio vigente y a las necesidades del servicio educativo.
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php } ?>
                                                <!--EDUCACION BASICA END-->
                                                <!--Media superior-->
                                                <?php if ($wwe->nivelinsti == '15') { ?>

                                                    <div id="media_superior">
                                                        <div class="col-sm-8" align="justify">
                                                            <label><h1>Media Superior</h1</label>
                                                        </div>
                                                        <!--personal directivo y docente -->     
                                                        <div class=" row well well-lg">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h3>Personal directivo y docente
                                                                        educación inicial, preescolar, primaria y secundaria
                                                                    </h3></label>
                                                                <br> Es el formato mediante el cual el particular persona física o moral registrará los nombres 
                                                                del personal directivo y docente propuesto; señalando si es directivo o docente de grupo.
                                                                Es importante que los docentes propuestos tengan el perfil profesional de acuerdo al profesiograma 
                                                                de cada nivel educativo y tengan título y cédula profesional.
                                                            </div>
                                                        </div>
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Descripción de Instalaciones</h3></label>
                                                                    <br>Es el formato mediante el cual el particular persona física o moral,
                                                                    realiza una descripción sintética de los documentos que presenta y de 
                                                                    las instalaciones con que cuenta para ofertar un servicio educativo de 
                                                                    Educación Inicial ó Preescolar ó Primaria ó Secundaria ó Media Superior.
                                                                    <br>El formato del Anexo 2 se encuentra en los requisitos que son proporcionados
                                                                    al particular para el trámite
                                                                </div>
                                                            </div>
                                                            <!-- ocupacion legal del inmueble -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                                    <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                                    Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                                    Puede ser mediante cualquiera de los siguientes documentos:
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                                    <br> 2. Contrato de arrendamiento<br/>
                                                                    <br> 3. Contrato de Comodato<br/>
                                                                    <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                                    jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>

                                                                </div>
                                                            </div>
                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Dictamen de uso de suelo</h3></label>
                                                                        <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                                        para un determinado servicio educativo, de conformidad con lo establecido 
                                                                        en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                                        correspondiente. Información que contiene:
                                                                    </div>
                                                                    <div class="col-sm-8" align="justify">
                                                                        <ul>
                                                                            <br><li>Clave catastral</li>
                                                                            <li>Fecha de emisión día/mes/año</li>
                                                                            <li>Dirección</li>
                                                                            <li>Calle</li>
                                                                            <li>Número</li>
                                                                            <li>Colonia</li>
                                                                            <li>Ciudad</li>
                                                                            <li>Superficie del inmueble; M2</li>
                                                                            <li>Está condicionado: si, no</li>
                                                                            <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                                            <br>Factible para:

                                                                            <br><li>Educación inicial</li>
                                                                            <li>Preescolar</li>
                                                                            <li>Primaria</li>
                                                                            <li>Secundaria</li>
                                                                            <li>Media superior</li>
                                                                            <li>Superior</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Constancia de seguridad estructural</h3></label>
                                                                        <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                                        Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                                        de utilizarse para un determinado servicio educativo
                                                                    </div>
                                                                    <div class="col-sm-8" align="justify">
                                                                        <ul>
                                                                            <li>Dirección del inmueble</li>
                                                                            <li>Calle</li>
                                                                            <li>Número</li>
                                                                            <li>Colonia</li>
                                                                            <li>Ciudad</li>
                                                                            <li>Fecha de expedición; día/mes/año</li>
                                                                            <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                                            <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                                lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                                (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                                            <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                                            <ul> <li>Número de registro:</li>
                                                                                <li>Número de registro de perito de director responsable de obra</li>
                                                                                <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                                            </ul>
                                                                            <ul>
                                                                                <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                                <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                                <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                                <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                                <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                                <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                                    Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                                            </ul>
                                                                            <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- ocupacion legal del inmueble end -->

                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                                        <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                                        el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                                        en materia de protección civil.
                                                                    </div>
                                                                    <div class="col-sm-8" align="justify">
                                                                        <ul>
                                                                            <br><li>1. Fecha de emisión: día/mes/año</li>
                                                                            <li>2. Fecha de vigencia: día/mes/año</li>
                                                                            <li>3. Emitido para;</li>
                                                                            <ul>
                                                                                <li>a. Educación inicial,</li>
                                                                                <li>b. Educación preescolar</li>
                                                                                <li>c. Educación primaria</li>
                                                                                <li>d. Educación secundaria</li>
                                                                                <li>e. Educación media superior</li>
                                                                                <li>f. Educación superior</li>
                                                                            </ul>
                                                                            <li>4. Domicilio.</li>
                                                                            <ul>
                                                                                <li>a. Calle</li>
                                                                                <li>b. Número</li>
                                                                                <li>c. Colonia</li>
                                                                                <li>d. Ciudad</li>
                                                                            </ul>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <!-- numero oficial  -->
                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Certificado del número oficial </h3></label>
                                                                        <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                                        un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                                    </div>
                                                                    <div class="col-sm-8" align="justify">
                                                                        <ul>
                                                                            <br><li>Clave catastral:</li>
                                                                            <li>Fecha de emisión: día/mes/año/</li>
                                                                            <li>Autoridad que lo emite:</li>
                                                                            <li>Calle</li>
                                                                            <li>Número</li>
                                                                            <li>Colonia</li>
                                                                            <li>Ciudad</li>
                                                                        </ul>
                                                                        Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                                        anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                                        constancia de seguridad estructural.
                                                                    </div>
                                                                </div>
                                                                <!-- numero oficial  end -->

                                                                <!--plano arquitectonico  -->
                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Plano  del inmueble </h3></label>
                                                                        <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                                        señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                                        educativo que pretende ofertar.
                                                                    </div>

                                                                </div>
                                                                <!--plano arquitectonico  end-->

                                                                <div class=" row well well-lg">
                                                                    <div class="col-sm-8" align="justify">
                                                                        <label><h3>Equipamiento de laboratorio polifuncional</h3></label>
                                                                        <br>Es un inventario que presentará el particular persona física o moral, del material y equipo del 
                                                                        laboratorio polifuncional, con los que pretenda trabajar el plan y programas de estudio vigente, para
                                                                        Secundaria ó Media Superior: en el mismo considerar; mesas de trabajo, cristalería, reactivos, anaqueles
                                                                        de resguardo y equipo para las asignaturas de biología, física y química de acuerdo al plan y programas
                                                                        de estudio vigente y a las necesidades del servicio educativo.
                                                                    </div>
                                                                </div>

                                                        </div>
                                                    <?php } ?>
                                                    <!--Media superior END-->
                                                    <!--SUPERIOR-->
                                                    <?php if ($wwe->nivelinsti == '16') { ?>

                                                        <div id="superior">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h1>Superior </h1></label>
                                                            </div>

                                                            <!-- ocupacion legal del inmueble -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                                    <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                                    Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                                    Puede ser mediante cualquiera de los siguientes documentos:
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                                    <br> 2. Contrato de arrendamiento<br/>
                                                                    <br> 3. Contrato de Comodato<br/>
                                                                    <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                                    jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>

                                                                </div>

                                                            </div>
                                                            <!-- ocupacion legal del inmueble end -->
                                                            <!-- Dictamen del uso del suelo -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Dictamen de uso de suelo</h3></label>
                                                                    <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                                    para un determinado servicio educativo, de conformidad con lo establecido 
                                                                    en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                                    correspondiente. Información que contiene:
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>Clave catastral</li>
                                                                        <li>Fecha de emisión día/mes/año</li>
                                                                        <li>Dirección</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                        <li>Superficie del inmueble; M2</li>
                                                                        <li>Está condicionado: si, no</li>
                                                                        <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                                        <br>Factible para:

                                                                        <br><li>Educación inicial</li>
                                                                        <li>Preescolar</li>
                                                                        <li>Primaria</li>
                                                                        <li>Secundaria</li>
                                                                        <li>Media superior</li>
                                                                        <li>Superior</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- Dictamen del uso del suelo end-->
                                                            <!-- Constancia de seguridad estructural-->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Constancia de seguridad estructural</h3></label>
                                                                    <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                                    Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                                    de utilizarse para un determinado servicio educativo
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <li>Dirección del inmueble</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                        <li>Fecha de expedición; día/mes/año</li>
                                                                        <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                                        <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                            lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                            (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                                        <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                                        <ul> <li>Número de registro:</li>
                                                                            <li>Número de registro de perito de director responsable de obra</li>
                                                                            <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                                        </ul>
                                                                        <ul>
                                                                            <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                            <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                            <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                            <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                            <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                            <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                                Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                                        </ul>
                                                                        <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                            <!-- Constancia de seguridad estructural end-->
                                                            <!-- visto bueno de proteccion civil-->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                                    <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                                    el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                                    en materia de protección civil.
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>1. Fecha de emisión: día/mes/año</li>
                                                                        <li>2. Fecha de vigencia: día/mes/año</li>
                                                                        <li>3. Emitido para;</li>
                                                                        <ul>
                                                                            <li>a. Educación inicial,</li>
                                                                            <li>b. Educación preescolar</li>
                                                                            <li>c. Educación primaria</li>
                                                                            <li>d. Educación secundaria</li>
                                                                            <li>e. Educación media superior</li>
                                                                            <li>f. Educación superior</li>
                                                                        </ul>
                                                                        <li>4. Domicilio.</li>
                                                                        <ul>
                                                                            <li>a. Calle</li>
                                                                            <li>b. Número</li>
                                                                            <li>c. Colonia</li>
                                                                            <li>d. Ciudad</li>
                                                                        </ul>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- visto bueno de proteccion civil end -->
                                                            <!-- numero oficial  -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Certificado del número oficial </h3></label>
                                                                    <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                                    un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>Clave catastral:</li>
                                                                        <li>Fecha de emisión: día/mes/año/</li>
                                                                        <li>Autoridad que lo emite:</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                    </ul>
                                                                    Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                                    anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                                    constancia de seguridad estructural.
                                                                </div>
                                                            </div>
                                                            <!-- numero oficial  end -->
                                                            <!--plano arquitectonico  -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Plano  del inmueble </h3></label>
                                                                    <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                                    señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                                    educativo que pretende ofertar.
                                                                </div>

                                                            </div>
                                                            <!--plano arquitectonico  end-->
                                                        </div>

                                                    <?php } ?>
                                                    <!--SUPERIOR END-->
                                                    <!--SUPERIOR ÁREA DE SALUD -->
                                                    <?php if ($wwe->nivelinsti == '17') { ?>

                                                        <div id="superior">
                                                            <div class="col-sm-8" align="justify">
                                                                <label><h1>Superior Área de Salud</h1></label>
                                                            </div>

                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Opinión Técnica Académica favorable emitida por el 
                                                                            Comité Estatal Interinstitucional para la formación
                                                                            y Capacitación de Recursos Humanos e Investigación 
                                                                            en Salud del Estado de Querétaro</h3></label>
                                                                </div>
                                                            </div> 

                                                            <!-- ocupacion legal del inmueble -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Acreditación legal del inmueble(otros)</h3></label>
                                                                    <br>Es el documento mediante el cual el peticionario; persona física o moral acredita ocupar legalmente el inmueble donde ofertará el servicio educativo
                                                                    Asegúrate de que el inmueble esté libre de gravamen, problemas legales o administrativos.
                                                                    Puede ser mediante cualquiera de los siguientes documentos:
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <br> 1. Escritura pública que acredite la propiedad del inmueble a nombre del peticionario<br/>
                                                                    <br> 2. Contrato de arrendamiento<br/>
                                                                    <br> 3. Contrato de Comodato<br/>
                                                                    <br> 4. Otro: Cualquier otro instrumento jurídico que cumpla con las formalidades previstas en las disposiciones
                                                                    jurídicas aplicables que acredite la ocupación legal del inmueble.<br/>

                                                                </div>

                                                            </div>
                                                            <!-- ocupacion legal del inmueble end -->

                                                            <!-- Dictamen del uso del suelo -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Dictamen de uso de suelo</h3></label>
                                                                    <br> Es el documento donde se dictamina que el inmueble es factible de usarse 
                                                                    para un determinado servicio educativo, de conformidad con lo establecido 
                                                                    en la norma vigente correspondiente, emitido por la Autoridad Municipal 
                                                                    correspondiente. Información que contiene:
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>Clave catastral</li>
                                                                        <li>Fecha de emisión día/mes/año</li>
                                                                        <li>Dirección</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                        <li>Superficie del inmueble; M2</li>
                                                                        <li>Está condicionado: si, no</li>
                                                                        <li>Autoridad que lo emitió: nombre de la dependencia</li>

                                                                        <br>Factible para:

                                                                        <br><li>Educación inicial</li>
                                                                        <li>Preescolar</li>
                                                                        <li>Primaria</li>
                                                                        <li>Secundaria</li>
                                                                        <li>Media superior</li>
                                                                        <li>Superior</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- Dictamen del uso del suelo end-->
                                                            <!-- Constancia de seguridad estructural-->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Constancia de seguridad estructural</h3></label>
                                                                    <br>Es el documento mediante el cual un perito Director Responsable de Obra o Corresponsable en
                                                                    Seguridad Estructural, garantiza en materia de Seguridad Estructural, que el inmueble es factible
                                                                    de utilizarse para un determinado servicio educativo
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <li>Dirección del inmueble</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                        <li>Fecha de expedición; día/mes/año</li>
                                                                        <li>Fecha de Vigencia de la constancia; día/mes/año</li>
                                                                        <li>Leyenda: “que el inmueble cumple con las normas mínimas de construcción aplicables al
                                                                            lugar donde se encuentra ubicado y que es seguro para el uso del servicio educativo de: 
                                                                            (Inicial, preescolar, primaria, secundaria, media superior o superior)</li>
                                                                        <li>Nombre del perito que la firma: nombre completo, apellido paterno, apellido materno, nombre (s)</li>
                                                                        <ul> <li>Número de registro:</li>
                                                                            <li>Número de registro de perito de director responsable de obra</li>
                                                                            <li>Número de registro de perito de corresponsable de seguridad estructural</li>
                                                                        </ul>
                                                                        <ul>
                                                                            <li>Nombre del colegio que emitió el registro del perito:</li>
                                                                            <li>Colegio de Ingenieros Civiles del Estado de Querétaro A.C.</li>
                                                                            <li>Colegio de Ingenieros Civiles de San Juan del Rio A.C.</li>
                                                                            <li>Colegio de Arquitectos del Estado de Querétaro A.C.</li>
                                                                            <li>Colegio de Arquitectos de San Juan del Rio A.C.</li>
                                                                            <li>Colegio de Ingenieros, Directores Responsables de Obra, 
                                                                                Corresponsables y especialistas de la Ingeniería del Estado de Querétaro A.C.</li>
                                                                        </ul>
                                                                        <li>Fecha de vigencia del registro del perito: día/mes/año</li>
                                                                    </ul>
                                                                </div>

                                                            </div>
                                                            <!-- Constancia de seguridad estructural end-->
                                                            <!-- visto bueno de proteccion civil-->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Visto bueno de protección civil municipal</h3></label>
                                                                    <br>Es el documento emitido por la Autoridad Municipal de Protección Civil mediante
                                                                    el que garantiza el uso de las instalaciones para un determinado servicio educativo, 
                                                                    en materia de protección civil.
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>1. Fecha de emisión: día/mes/año</li>
                                                                        <li>2. Fecha de vigencia: día/mes/año</li>
                                                                        <li>3. Emitido para;</li>
                                                                        <ul>
                                                                            <li>a. Educación inicial,</li>
                                                                            <li>b. Educación preescolar</li>
                                                                            <li>c. Educación primaria</li>
                                                                            <li>d. Educación secundaria</li>
                                                                            <li>e. Educación media superior</li>
                                                                            <li>f. Educación superior</li>
                                                                        </ul>
                                                                        <li>4. Domicilio.</li>
                                                                        <ul>
                                                                            <li>a. Calle</li>
                                                                            <li>b. Número</li>
                                                                            <li>c. Colonia</li>
                                                                            <li>d. Ciudad</li>
                                                                        </ul>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <!-- visto bueno de proteccion civil end -->
                                                            <!-- numero oficial  -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Certificado del número oficial </h3></label>
                                                                    <br>Es el documento emitido por Autoridad Municipal competente, mediante el que asigna 
                                                                    un domicilio al inmueble donde se pretende ofertar el servicio educativo
                                                                </div>
                                                                <div class="col-sm-8" align="justify">
                                                                    <ul>
                                                                        <br><li>Clave catastral:</li>
                                                                        <li>Fecha de emisión: día/mes/año/</li>
                                                                        <li>Autoridad que lo emite:</li>
                                                                        <li>Calle</li>
                                                                        <li>Número</li>
                                                                        <li>Colonia</li>
                                                                        <li>Ciudad</li>
                                                                    </ul>
                                                                    Nota: El domicilio que aparezca en este documento debe coincidir con todos los documentos presentados para el trámite de incorporación: 
                                                                    anexos, ocupación legal del inmueble, dictamen de uso de suelo, visto bueno de protección civil Municipal,
                                                                    constancia de seguridad estructural.
                                                                </div>
                                                            </div>
                                                            <!-- numero oficial  end -->

                                                            <!--plano arquitectonico  -->
                                                            <div class=" row well well-lg">
                                                                <div class="col-sm-8" align="justify">
                                                                    <label><h3>Plano  del inmueble </h3></label>
                                                                    <br>Es el plano Arquitectónico que identifica la distribución de las instalaciones con la que cuenta el particular, 
                                                                    señalando el uso y superficie de cada espacio, mismos que deben corresponder a las especificaciones del nivel 
                                                                    educativo que pretende ofertar.
                                                                </div>

                                                            </div>
                                                            <!--plano arquitectonico  end-->

                                                        </div>

                                                    <?php } ?>
                                                    <!--SUPERIOR ÁREA DE SALUD  END-->




                                                </div>
                                                <!-- FORM-GROUP COL-SM-12 END -->

                                            </div>
                                            <!-- ROW END --> 

                                            <div class="text-right m-t-xs">
                                                <a class="btn btn-default prev ant3" href="#step2" data-toggle="tab" id="btnprevStep3">Anterior</a>
                                                <a class="btn btn-default next sig3" href="#step4" data-toggle="tab" id="btnnextStep3">Siguiente</a>
                                                <!--<a class="btn btn-default next" href="#">Siguiente</a>-->
                                                <!--<a class="btn btn-primary submitWizard" href="#">Enviar</a>-->
                                            </div>
                                        </div>
                                        <!-- STEP3 END -->


                                        <!-- STEP4 START -->
                                        <div id="step4" class="p-m tab-pane ">
                                            <div class="text-right m-t-xs">
                                                <!--<a class="btn btn-default prev" id="idprueba">Anterior</a>-->
                                                <a class="btn btn-default prev ant4" href="#step3" data-toggle="tab" id="btnprevStep4">Anterior</a>

                                            </div>
                                            <br>
                                            <?php if (is_null($verifcitas)) { ?>
                                                <div class="text-center" style="text-align: left">
                                                    <h3 class=""><li>Para la entrega física de sus documentos tendrá que solicitar una cita.</li></h3>
                                                    <h3 class=""><li>También recuerde llevar sus documentos escaneados en formato pdf en una memoria.</li></h3>
                                                    <h3 class=""><li>Cada archivo adjuntado en la memoria usb no sobrepasara los 5MB de tamaño.</li></h3>
                                                  
                                                    <input type="hidden" id="idparacita" value="<?= $solicitudevento ?>">
                                                </div>

                                                <!-- ROW START -->
                                                <div class="row well well-lg">

                                                    <!-- COL-SM-12 START -->
                                                    <div class="col-sm-12">

                                                        <!-- ROW START -->

                                                        <a class="btn btn-default" href="<?= base_url() ?>app/eventos/solicitar_cita/<?= $wwe->idinsti ?>/<?= $wwe->folio ?>">Solicitar cita</a>

                                                        <!-- ROW END -->

                                                    </div>
                                                    <!-- COL-SM-12 END -->

                                                </div>
                                                <!-- ROW END -->
                                            <?php } else { ?>
                                                <div class="">
                                                    <h1 class="">Ya cuentas con una cita agendada para el día <?= $verifcitas->fechaini ?> a las <?= $verifcitas->horaini ?> en punto con el Lic. <?= $analistacita->nomusuario ?></h1>
                                                    <ul>
                                                        <h3 class=""><li>Rrecuerde llevar sus documentos escaneados en formato pdf en una memoria.</li></h3>
                                                        <h3 class=""><li>Cada archivo adjuntado en la memoria usb no deberá sobrepasara los 5MB de tamaño.</li></h3>
                                                      
                                                    </ul>
                                                </div>
                                            <?php } ?>

                                            <div class="text-right m-t-xs">
                                                <!--<a class="btn btn-default prev" id="idprueba">Anterior</a>-->
                                                <a class="btn btn-default prev ant4" href="#step3" data-toggle="tab" id="btnprevStep4">Anterior</a>

                                            </div>
                                        </div>
                                        <!-- STEP4 END -->

                                    </div>
                                    <!-- TAB-CONTENT END -->
                                </div>
                                <?php
                            }
                        endforeach;
                    endif;
                    ?>
                    <!-- todo END -->

                    <!--</form>-->
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
