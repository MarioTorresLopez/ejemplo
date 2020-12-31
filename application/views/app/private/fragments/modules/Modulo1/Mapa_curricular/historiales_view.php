<?php
/**
 * Vista de la seccion de historiales
 *
 * Vista que muestra al usuario la interfaz grafica para la consulta de los diferentes historiales de los modulos
 * 
 * @since      1.0
 * @version    1.0
 * @link       /historiales
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo1.Historiales
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/incorporacion/historico
 */
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    Historiales
                </div>
                <div class="panel-body">

                    <form name="simpleForm" novalidate id="simpleForm" action="#" method="post">
                        <div class="text-center m-b-md" id="wizardControl">
                            <a class="btn btn-primary" href="#step1" data-toggle="tab">Propietario</a>
                            <a class="btn btn-default" href="#step2" data-toggle="tab">Institucion</a>
                            <a class="btn btn-default" href="#step3" data-toggle="tab">Plantel</a>
                            <a class="btn btn-default" href="#step4" data-toggle="tab">Plan de estudios</a>
                            <a class="btn btn-default" href="#step5" data-toggle="tab">Mapa curricular</a>
                            <a class="btn btn-default" href="#step6" data-toggle="tab">Acuerdo</a>
                        </div>

                        <div class="tab-content">
                            <div id="step1" class="p-m tab-pane active">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Propietario</th>
                                                <th>idPropietario</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Alondra R.F</td>
                                                <td>12</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_prop">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Alondra R.F</td>
                                                <td>15</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_prop">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>

                            <div id="step2" class="p-m tab-pane">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ruta</th>
                                                <th>fecha modificación</th>
                                                <th>idInstitucion</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>23</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_inst">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>24</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_inst">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>

                            <div id="step3" class="p-m tab-pane">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ruta</th>
                                                <th>fecha modificación</th>
                                                <th>idPlantel</th>
                                                <th>Detalle</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>31</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_plantel">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>32</td>
                                                <td>
                                                    <a href="<?= base_url() ?>incorporacion/historico/detalle_plantel">
                                                        <button class="btn btn-info" type="button">
                                                            <i></i> 
                                                            <span class="fa fa-folder-open-o"></span>
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>

                            <div id="step4" class="p-m tab-pane">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ruta</th>
                                                <th>fecha modificación</th>
                                                <th>modalidad</th>
                                                <th>Tipo institucion</th>
                                                <th>Documento</th>
                                                <th>id Plan</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>Escolarizado</td>
                                                <td>Media superior</td>
                                                <td>----</td>
                                                <td>12</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>Mixto</td>
                                                <td>Superior</td>
                                                <td>----</td>
                                                <td>13</td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>

                            <div id="step5" class="p-m tab-pane">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ruta</th>
                                                <th>fecha modificación</th>
                                                <th>asignatura</th>
                                                <th>id Mapa</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>Matematicas</td>
                                                <td>32</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>-----</td>
                                                <td>01/01/2018</td>
                                                <td>Matematicas</td>
                                                <td>33</td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>

                            <div id="step6" class="p-m tab-pane">
                                <div class="row">
                                    <!-- table START -->
                                    <table class="table table-striped table-bordered table-hover">
                                        <!-- thead START -->
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Acud. anterior</th>
                                                <th>Acud. nuevo</th>
                                                <th>fecha modificación</th>
                                                <th>id Acuerdo</th>
                                            </tr>
                                        </thead>
                                        <!-- thead END -->
                                        <!-- tbody START -->
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>hgjhgh23</td>
                                                <td>jbhbj56</td>
                                                <td>01/01/2018</td>
                                                <td>9</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>iohlhj45</td>
                                                <td>dfsgfd123</td>
                                                <td>01/01/2018</td>
                                                <td>10</td>
                                            </tr>
                                        </tbody>
                                        <!-- tbody END -->
                                    </table>
                                    <!-- table END -->
                                </div>
                                <div class="text-right m-t-xs">
                                    <a class="btn btn-default prev" href="#">Anterior</a>
                                    <a class="btn btn-default next" href="#">Siguiente</a>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="m-t-md">

                        <p>

                        </p>

                    </div>

                </div>
            </div>
        </div>

    </div>