<?php
/**
 * Vista de listado pare expedir kardex de
 * escuelas media superior y supériores
 * 
 * @since      1.0
 * @version    1.0
 * @link       NA
 * @package    application.views
 * @subpackage app.private.fragments.modules.Modulo2.usuario
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./app/detalle_kardex_medisup_superior
 */
?>

<div class="row">

    <!--col-lg-12 START-->
    <div class="col-lg-12">

        <!--hpanel START-->
        <div class="hpanel hblue">

            <!--panel-heading START-->
            <div class="panel-heading">

                <!--panel-tools START-->
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
                <!--panel-tools END-->

                <h2>Generar Reporte</h2>
            </div>
            <!--panel-heading END-->


            <!--panel-body START-->
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <div class="col-lg-4" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                            <label for="tipo">Buscar por:</label> 
                            <select name="filtro" id="filtro"  class="form-control m-b">
                                <option>---Seleccione---</option>
                                <option value="1">Nivel Educativo</option>
                                <option value="2">Escuela</option>
                                <option value="3">Carrera</option>
                                <option value="4">Ciclo escolar</option>
                                <option value="5">Turno</option>
                                <option value="6">Modalidad</option>
                                <option value="7">Municipio</option>


                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-4" id="row_filtro2" hidden="">
                            <label for="tipo">Por medio de:</label> 
                            <select name="filtro2" id="filtro2"  class="form-control m-b">
                                <option>---Seleccione---</option>



                            </select>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <div class="col-sm-4">
                            <button id="btn-reporte-inicio-general" class="btn btn-primary">
                                <i class="fa fa-filter"></i> Generar
                            </button>
                        </div>
                    </div>

                </div>




<!--SERA PARA CADA INSTITUCION-->
                <!--well well-lg START-->
                <div class="well well-lg">
                    <h3 class="font-bold text-center">
                        REPORTE INICIO DE CURSOS
                    </h3>
                    
                    <div id="data-reporte" class="row">
                                 <!--well well-lg START-->
                        <div class="well well-lg">
                           
                           
                       
                        </div>
                        <!--well well-lg END-->
                                              
                    </div>
                    
                   
                    <div class="col-lg-12">
                        <label>  </label>
                    </div>



                </div>
                <!--well well-lg END-->

               

            </div>
            <!--panel-body END-->

        </div>
        <!--hpanel hblue END-->

    </div>
    <!--col-lg-12 END-->

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
<!--row END-->



