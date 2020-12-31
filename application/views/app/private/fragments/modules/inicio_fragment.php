<?php
/**
 * Fragmento de inicio de la aplicacion
 *
 * Fragmento que contiene las gráficas e información que se muestra justo despues de 
 * inciar sesion
 * 
 * @since      1.0
 * @version    1.0
 * @internal   El uso de este fragmento solo es posible por medio de una vista            
 * @package    application.views
 * @subpackage app.private.fragments.modules
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/views/app/private/main_view.php
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
                Información
            </div>
            <!-- PANEL-HEADING START -->

            <!-- PANEL-BODY START -->
            <?php if($valor->rol==3):?>
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación inicial.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de Reconocimiento de Validez Oficial de Estudios para Impartir Educación Inicial
                            se llevará a cabo ante la Dirección de Educación y el acuerdo que recaiga del mismo se
                            extenderá a favor de la persona física o moral propietaria de la institución educativa particular,
                            siempre que satisfaga los requisitos señalados en el presente documento.
                        </label>
                    </div>
                </div>
                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación preescolar.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de autorización se llevará a cabo ante la Dirección de Educación y los acuerdos
                            que recaigan al mismo se extenderán a favor de la persona física o moral propietaria de la
                            institución educativa particular, siempre que satisfaga los requisitos señalados en el presente
                            documento.
                        </label>
                    </div>
                </div>

                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación primaria.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de autorización se llevará a cabo ante la Dirección de Educación y los acuerdos
                            que recaigan al mismo se extenderán a favor de la persona física o moral propietaria de la
                            institución educativa particular, siempre que satisfaga los requisitos señalados en el presente
                            documento.
                        </label>
                    </div>
                </div>

                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación secundaria.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de autorización se llevará a cabo ante la Dirección de Educación y los acuerdos
                            que recaigan al mismo se extenderán a favor de la persona física o moral propietaria de la
                            institución educativa particular, siempre que satisfaga los requisitos señalados en el presente
                            documento.
                        </label>
                    </div>
                </div>



                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación media superior.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de Reconocimiento de Validez Oficial de Estudios para Impartir Educación Media
                            Superior se llevará a cabo ante la Dirección de Educación y el acuerdo que recaiga del mismo
                            se extenderá a favor de la persona física o moral propietaria de la institución educativa
                            particular, siempre que satisfaga los requisitos señalados en el presente documento.
                        </label>
                    </div>
                </div>

                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Educación superior.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            El trámite de Reconocimiento de Validez Oficial de Estudios para impartir Educación
                            Superior se llevará a cabo ante la Dirección de Educación y el acuerdo que recaiga del mismo
                            se extenderá a favor de la persona física o moral propietaria de la institución educativa
                            particular, siempre que satisfaga los requisitos señalados en el presente documento.
                        </label>
                    </div>
                </div>

                <div class="row well well-lg">
                    <div class="col-sm-12">
                        <label><h3>Sector salud.</h3></label>
                    </div>
                    <div class="col-sm-12" align="justify">
                        <label>
                            Para llevar a cabo el trámite de Reconocimiento de Validez Oficial de Estudios con el fin de impartir Educación Superior del Sector Salud, primeramente se deberá entregar el plan de estudios a la Dirección de Educación quien lo enviará a la institución CIFRHS (COMITÉ ESTATAL INTERINSTITUCIONAL PARA LA FORMACIÓN DE RECURSOS HUMANOS E INVESTIGACIÓN PARA LA SALUD) para ser validado. 
                            <br><br>
                            <p>
                                Su finalidad es que las presentaciones de los planes de estudio al CIFRHS tengan un carácter homogéneo y a la vez contengan los información precisa que de un panorama general a los Miembros del Comité del plan de estudios que se va a aperturar o a reestructurar, para que posteriormente este sea evaluado a detalle por el grupo de especialistas correspondiente.
                            </p>

                        </label>
                    </div>
                </div>

            </div>
            <!-- PANEL-BODY END -->
            <?php endif; ?>

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