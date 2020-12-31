
<?php
/**
 * Vista principal de la aplicación
 *
 * Vista principal de la aplicación que muestra el conjunto de widgets correspondientes 
 * al nivel de usuario, relacionando los fragmentos correspondientes al contenido
 * 
 * @since      1.0
 * @version    1.0
 * @link       /inicio
 * @package    application.views
 * @subpackage app.private
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/inicio.php
 */
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Page title -->
        <title><?= $titulo ?></title>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!--    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->
        <link rel="shortcut icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/bootstrap/dist/css/bootstrap.css" />

        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/toastr/build/toastr.min.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/select2-3.5.2/select2.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/select2-bootstrap/select2-bootstrap.css" />
         <link href="https://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css">
        <!-- App styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/fonts/pe-icon-7-stroke/css/helper.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/loader.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/styles/style.css">
<!-- stylios y scrips para visualizar los documentos
   -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="<?= base_url() ?>static/css/dropzone.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--  scripts de las graficas-->
<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/modules/export-data.js"></script>
    </head>
    <body class="fixed-navbar fixed-sidebar">

        <!-- LOADING SCREEN START -->
        <div id="loading-screen">   
            <div class="loaderImageWrapper">
                <div id="loaderImage"></div>
            </div>
            <div id="loader-wrapper" style="background: #FFFFFF !important; z-index: 1001 !important;">
                <div style="position: absolute;top: 15%; width: 100%;">
                    <h3 style="text-align: center; color: #545657;">AIDE</h3>
                    <img src="<?= base_url() ?>static/images/sedeq_web.jpg" alt="<?= app_name() ?>" class="img img-responsive hidden-sm hidden-xs" style="max-height: 80px; display: block; margin: auto;">
                </div>
                <div id="loader"></div>
            </div>
        </div>  
        <!-- LOADING SECREEN END -->


        <!--[if lt IE 7]>
        <p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?= $app_header ?>

        <?= $app_nav ?>

        <!-- Main Wrapper -->
        <div id="wrapper">

            <div class="content animate-panel">
                <?php if (isset($show_header)) : ?>
                    <div class="row">
                        <div class="col-lg-12 text-center m-t-md">
                            <h2>
                                <?= app_title(); ?>
                            </h2>

                            <p>
                                <?= app_name(); ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>  

            <?php if (isset($breadcrumbs)) : ?>
                <div class="normalheader transition animated fadeIn">
                    <div class="hpanel">
                        <div class="panel-body">
                            <div id="hbreadcrumb" class="pull-right m-t-lg">
                                <ol class="hbreadcrumb breadcrumb">
                                    <?php foreach ($breadcrumbs['links'] as $link) : ?>
                                        <li>
                                            <?php if (is_array($link)) : ?>                                        
                                                <a href="<?= $link[1] ?>"><?= $link[0] ?></a>
                                            <?php else : ?>
                                                <span><?= $link ?></span>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>                            
                                </ol>
                            </div>
                            <h2 class="font-light m-b-xs">
                                <?= $breadcrumbs['titulo'] ?>
                            </h2>
                            <small><?= $breadcrumbs['subtitulo'] ?></small>
                        </div>
                    </div>

                    <?= $app_fragment ?>

                </div>
            <?php endif; ?>

            <!-- Right sidebar -->
            <?= (isset($app_right_sidebar)) ? $app_right_sidebar : NULL ?>



        </div>
        <!-- Footer-->
        <footer class="footer" style="margin-top: 10px">
            <span class="pull-right">
                <?= app_name() ?>
            </span>
            <strong><?= app_title() ?> <?= date("Y") ?></strong>
        </footer>



        <!-- Vendor scripts -->
        <script src="<?= base_url() ?>static/vendor/jquery/dist/jquery.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.resize.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery-flot/jquery.flot.pie.js"></script>
        <script src="<?= base_url() ?>static/vendor/flot.curvedlines/curvedLines.js"></script>
        <script src="<?= base_url() ?>static/vendor/jquery.flot.spline/index.js"></script>
        <script src="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/iCheck/icheck.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/peity/jquery.peity.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/sparkline/index.js"></script>
        
        
        <script src="<?= base_url() ?>static/vendor/select2-3.5.2/select2.min.js"></script>

        <script src="<?= base_url() ?>static/vendor/datatables/media/js/jquery.dataTables.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-bs/js/dataTables.bootstrap.js"></script>

        <!-- DataTables buttons scripts -->
        <script src="<?= base_url() ?>static/vendor/pdfmake/build/pdfmake.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/pdfmake/build/vfs_fonts.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="<?= base_url() ?>static/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>

        <!--Alertas scripts-->
        <script src="<?= base_url() ?>static/vendor/sweetalert/lib/sweet-alert.js"></script>
        <script src="<?= base_url() ?>static/vendor/toastr/build/toastr.min.js"></script>

        <!-- App scripts -->
        <script src="<?= base_url() ?>static/scripts/homer.js"></script>
        <script src="<?= base_url() ?>static/scripts/app/libs/common.js"></script>
        <script src="<?= base_url() ?>static/admin/js/dropzone.js" type="text/javascript" charset="utf-8"></script>

        <script type="text/javascript">
            function base_url() {
                return "<?= base_url() ?>";
            }

            jQuery(document).ready(function ($) {
                loading();

                $(".sig1").click(function (event) {
                    $("#tab1-tab").removeClass('btn-primary');
                    $("#tab1-tab").addClass('btn-default');
                    $("#tab2-tab").removeClass('btn-default');
                    $("#tab2-tab").addClass('btn-primary');
                });

                $(".ant2").click(function (event) {
                    $("#row_media").empty();
                    $("#row_superior").empty();
                    var select = $('#tipo_institucion');
                    select.val($('option:first', select).val());
                    $("#tab1-tab").removeClass('btn-default');
                    $("#tab1-tab").addClass('btn-primary');
                    $("#tab2-tab").removeClass('btn-primary');
                    $("#tab2-tab").addClass('btn-default');
                });

                $(".sig2").click(function (event) {
                    $("#tab2-tab").removeClass('btn-primary');
                    $("#tab2-tab").addClass('btn-default');
                    $("#tab3-tab").removeClass('btn-default');
                    $("#tab3-tab").addClass('btn-primary');
                });

                $(".ant3").click(function (event) {
                    $("#tab3-tab").removeClass('btn-primary');
                    $("#tab3-tab").addClass('btn-default');
                    $("#tab2-tab").removeClass('btn-default');
                    $("#tab2-tab").addClass('btn-primary');
                });

		$(".sig3").click(function (event) {
                    $("#tab3-tab").removeClass('btn-primary');
                    $("#tab3-tab").addClass('btn-default');
                    $("#tab4-tab").removeClass('btn-default');
                    $("#tab4-tab").addClass('btn-primary');
                });

		$(".ant4").click(function (event) {
                    $("#tab4-tab").removeClass('btn-primary');
                    $("#tab4-tab").addClass('btn-default');
                    $("#tab3-tab").removeClass('btn-default');
                    $("#tab3-tab").addClass('btn-primary');
                });
                
                $(".sig4").click(function (event) {
                    $("#tab4-tab").removeClass('btn-primary');
                    $("#tab4-tab").addClass('btn-default');
                    $("#tab5-tab").removeClass('btn-default');
                    $("#tab5-tab").addClass('btn-primary');
                });
                
                $(".ant5").click(function (event) {
                    $("#tab5-tab").removeClass('btn-primary');
                    $("#tab5-tab").addClass('btn-default');
                    $("#tab4-tab").removeClass('btn-default');
                    $("#tab4-tab").addClass('btn-primary');
                });
                
                $(".sig5").click(function (event) {
                    $("#tab5-tab").removeClass('btn-primary');
                    $("#tab5-tab").addClass('btn-default');
                    $("#tab6-tab").removeClass('btn-default');
                    $("#tab6-tab").addClass('btn-primary');
                });
                
                $(".ant6").click(function (event) {
                    $("#tab6-tab").removeClass('btn-primary');
                    $("#tab6-tab").addClass('btn-default');
                    $("#tab5-tab").removeClass('btn-default');
                    $("#tab5-tab").addClass('btn-primary');
                });
				
            });
        </script>
        <script src="<?= base_url() ?>static/scripts/charts.js"></script>
        <script src="<?= base_url() ?>static/admin/js/notificaciones.js"></script>

        <script>

            $(function () {
                $(".js-source-states").select2();
                $(".js-source-states-2").select2();

                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    $('a[data-toggle="tab"]').removeClass('btn-primary');
                    $('a[data-toggle="tab"]').addClass('btn-default');
                    $(this).removeClass('btn-default');
                    $(this).addClass('btn-primary');
                });

                $('.next').click(function () {
                    var nextId = $(this).parents('.tab-pane').next().attr("id");
                    //$('[href=#' + nextId + ']').tab('show');
                })

                $('.prev').click(function () {
                    var prevId = $(this).parents('.tab-pane').prev().attr("id");
                    //$('[href=#' + prevId + ']').tab('show');
                })

                $('.submitWizard').click(function () {

                    var approve = $(".approveCheck").is(':checked');
                    if (approve) {
                        // Got to step 1
                        $('[href=#step1]').tab('show');

                        // Serialize data to post method
                        var datastring = $("#simpleForm").serialize();

                        // Show notification
                        swal({
                            title: "Thank you!",
                            text: "You approved our example form!",
                            type: "success"
                        });
                        //            Example code for post form
                        //            $.ajax({
                        //                type: "POST",
                        //                url: "your_link.php",
                        //                data: datastring,
                        //                success: function(data) {
                        //                    // Notification
                        //                }
                        //            });
                    } else {
                        // Show notification
                        swal({
                            title: "Error!",
                            text: "You have to approve form checkbox.",
                            type: "error"
                        });
                    }
                })

                // Initialize Example 1
                $('#example1').dataTable({
                    "ajax": 'api/datatables.json',
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[5, 25, 50, -1], [5, 25, 50, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

                // Initialize Example 2
                $('#example2').dataTable();
                $('#example3').dataTable();
            });
        </script>
        <?php if (isset($scripts)) : foreach ($scripts as $script) : ?><script type="text/javascript" src="<?= base_url() ?>static/admin/js/<?= $script ?>.js"></script><?php endforeach;endif; ?>

    </body>
</html>
