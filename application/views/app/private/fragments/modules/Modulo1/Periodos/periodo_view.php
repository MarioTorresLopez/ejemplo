<?php
/**
 * Vista de la gestion de periodos
 *
 * Vista que muestra al usuario la interfaz grafica para agregar, mostrar, editar y eliminar periodos
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo.Periodos
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/periodo_controller
 */
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<head>
    <meta charset="UTF-8">
    <title></title>
    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/vendor/toastr/build/toastr.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>static/styles/static_custom.css">
</head>
<body>

    <div class="content">

        <div class="row">
            <!-- col-lg-6 -->
            <div class="col-lg-12">
                <!-- hpanel -->
                <div class="hpanel hblue">
                    <!-- panel-heading -->
                    <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                        <!-- panel-tools -->
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        Agregar Periodo
                    </div>
                    <!-- /.panel-heading -->
                    <!-- panel-body -->
                    <div class="panel-body">
                        <p>
                            Formulario 
                        </p>
                        <!-- form -->
                        <form role="form" id="form">
                            <div class="form-group">
                                <label for="nombre" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Nombre del periodo</label> 
                                <input type="text" id="nombre_asig" name="nombre_asig" placeholder="*Campo requerido" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="fechaven" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Incio Vigencia</label>
                                <div class="input-group date" id="fechainiciovigencia">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="date" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fechaven" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">Fin Vigencia</label>
                                <div class="input-group date" id="fechainiciovigencia">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                    <input type="date" class="form-control"/>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                            </div>
                        </form>
                        <!-- ./form -->
                    </div>
                    <!-- ./panel-body -->
                </div>
                <!-- ./hpanel -->

                <!-- hpanel -->
                <div class="hpanel hblue">
                    <!-- panel-heading -->
                    <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                        <!-- panel-tools -->
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        <!-- /.panel-heading -->
                        Agregar Asignatura/Periodo
                    </div>
                    <!-- /.panel-heading -->
                    <!-- panel-body -->
                    <div class="panel-body">

                        <!-- form -->
                        <form role="form" id="form">
                            <div class="row" id="previa_select">
                                <div class="form-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                    <label for="tipo">Periodo</label> 
                                    <select name="institucion" class="form-control m-b">
                                        <option>---Seleccione---</option>
                                        <option value="">Sep18</option>
                                        <option value="">Agos18</option>1
                                        <option value="">Oct18</option>
                                        <option value="">Nov18</option>                                        
                                    </select>
                                </div>
                            </div>

                            <div class="row" id="previa_select">
                                <div class="form-group" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                    <label for="tipo">Asignatura</label> 
                                    <select name="institucion" class="form-control m-b">
                                        <option>---Seleccione---</option>
                                        <option value="">Matematicas</option>
                                        <option value="">Exprecion Oral y Escrita</option>
                                        <option value="">Ingles I</option>
                                        <option value="">Desarrollo de Aplicaciones</option>                                        
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-sm btn-primary m-t-n-xs" type="submit"><strong><i class="fa fa-file-text"> </i> Agregar</strong></button>
                            </div>
                        </form>
                        <!-- ./form -->
                    </div>
                    <!-- ./panel-body -->

                </div>
                <!-- ./hpanel -->
            </div>
            <!-- ./col-lg-6 -->

            <!-- col-lg-12 -->
            <div class="col-lg-12">
                <!-- hpanel -->
                <div class="hpanel hblue">
                    <!-- panel-heading -->
                    <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 3.5rem;">
                        <!-- panel-tools -->
                        <div class="panel-tools">
                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        </div>
                        <!-- ./panel-tools -->
                        Periodos
                    </div>
                    <!-- ./panel-heading -->


                    <!-- panel-body -->
                    <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                        <!-- table -->
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <!-- thead -->
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre Periodo</th>
                                    <th>Fecha Inicio</th>
                                    <th>Fecha Fin</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <!-- ./thead -->
                            <!-- tbody -->
                            <tbody>
                                <?php for ($i = 0; $i < 7; $i++) { ?>
                                    <tr> 
                                        <td>1</td>
                                        <td>Andres</td>
                                        <td>31/08/16</td>
                                        <td>31/08/18</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php base_url() ?>editar"><button class="btn btn-info " type="button"><i class="fa fa-paste"></i></button></a>
                                                <a href="<?php base_url() ?>eliminar"><button type="button" class="btn btn-danger">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button></a>
                                                <a href="<?php base_url() ?>detalle"><button class="btn btn-success " type="button"><i class="fa fa-folder-open-o"></i></button></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <!-- ./tbody -->                          

                        </table>
                        <!-- ./table -->
                    </div>
                    <!-- ./panel-body -->
                </div>
                <!-- ./hpanel -->
            </div>
            <!-- ./col-lg-12 -->

        </div>
    </div>
    <!-- Vendor scripts -->
    <script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>
    <script src="<?= base_url() ?>static/vendor/jquery-validation/jquery.validate.min.js"></script>

    <!-- DataTables -->
    <script src="<?= base_url() ?>static/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- DataTables buttons scripts -->
    <script src="<?= base_url() ?>static/vendor/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url() ?>static/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <!-- App scripts -->

</body>
