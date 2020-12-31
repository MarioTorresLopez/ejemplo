<?php
/**
 *  Vista de inscripcion
 *
 *  * Vista donde el usuario podra dar de alta sus alumnos por medio de adjunto de excel
 * 
 * @since      1.0
 * @version    1.0
 * @link       /notfound
 * @package    application.views
 * @subpackage area_de_trabajo
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/inscripcion_usuario
 */
?>


<!DOCTYPE html>

<style type="text/css">

    ::selection{ background-color: #E13300; color: white; }
    ::moz-selection{ background-color: #E13300; color: white; }
    ::webkit-selection{ background-color: #E13300; color: white; }

    body2 {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #body2{
        margin: 0 15px 0 15px;
    }

    p.footer{
        text-align: right;
        font-size: 11px;
        border-top: 1px solid #D0D0D0;
        line-height: 32px;
        padding: 0 10px 0 10px;
        margin: 20px 0 0 0;
    }

    #container{
        margin: 10px;
        border: 1px solid #D0D0D0;
        -webkit-box-shadow: 0 0 8px #D0D0D0;
    }
</style>
<!--<link rel="stylesheet" href="<?= base_url() ?>static/css/dropzone.css">-->
<!-- row START -->
<div class="row">

    <!-- col-lg-6 START -->
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
                Subir archivo
            </div>
            <!-- panel-heading END -->

            <!-- panel-body START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                <!-- step1 START -->
                <div class="col-lg-12">

                    <!-- row START -->
                    <div class="row">
                        <div class="hidden">algo
                            <input type="file"  name="resolucion_file" id="resolucion_file"/>
                        </div>
                        <div id="body" class="form-group col-lg-12">		
                            <form id="form-multimedia-data" class="dropzone" action="<?= base_url() ?>analista_servicios/dictamen_tecnico/subir_post" enctype="multipart/form-data"> </form>
                        </div>
                        <br>
                        <!-- col-lg-12 START -->


                        <!-- col-lg-12 END -->
                        <div class="form-group col-lg-12" id="result">


                        </div>



                        <!-- col-lg-12 START -->
                        <div class="col-lg-12 " class="form-control" id="tablaexcel">

                            <!-- col-lg-12 END -->
                            </form>
                        </div>
<!--                        <button type="button" class="btn btn-primary next text-left pruebaBit" id="btnValidador" name="btnValidador">
                                    <i class="fa fa-check">Aceptar</i>-->
                                </button>
                        <!-- col-lg-12 START -->
<!--                        <div class="col-lg-12" >
                            <button class="btn btn-primary next aceptarInscripcion text-left" 
                                    type="button" id="aceptarInscripcion" name="aceptarInscripcion" >
                                <i class="fa fa-check">Aceptar</i> 
                                <span class="bold">  </span>
                            </button>
                        </div>-->
                        <!-- col-lg-12 END -->


                    </div>
                    <!-- row END -->


                </div>
                <!-- step1 END -->
            </div>
            <!-- panel-body END -->
        </div>
        <!-- hpanel END -->
    </div>
    <!-- col-lg-6 END -->  
    <div class="row">
        <div class="col-lg-12">
            <label>  </label>
        </div>
        <div class="col-lg-12">
            <label>  </label>
        </div>
    </div>         
</div>
<!-- row END -->

<!--<script src="<?= base_url() ?>static/admin/js/jquery-2.1.4.min.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script src="<?= base_url() ?>static/admin/js/dropzone.js" type="text/javascript" charset="utf-8"></script>-->
<!--<script type="text/javascript" charset="utf-8">
    var dropzoneMultimedia = null;
    jQuery(document).ready(function ($) {
        Dropzone.options.formMultimediaData = {
            addRemoveLinks: false,
            autoDiscover: false,
            autoProcessQueue: true,
            dictDefaultMessage: 'Arrastre su archivo de Excel o de <br />Click aqui',
            dictRemoveFile: "Eliminar archivo",
            autoQueue: true,
            accept: function (file, done) {
                $('#example2').dataTable();
                dropzoneMultimedia = this;
                //if(file.type == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet") {
                if (file.type == "application/vnd.ms-excel") {
                    done();
                    
                } else {
                    this.removeFile(file);
                    swal({
                        title: "Antención",
                        text: "ERROR EN LA EXTENSION DE ARCHIVO.",
                        type: "warning"
                    });
                }
            },
            success: function (file, data) {
                //alert(file.name+"\nSubido correctamente");
                //vALIDACIÓN ESTATICA
                var ht = 1;
                window.setTimeout(function () {
                    dropzoneMultimedia.removeFile(file);
                }, 1000);
                //$('#example2').dataTable();
                $('#tablaexcel').html(data);
            },
            queuecomplete: function () {
                
            }
        }
    });
</script>-->