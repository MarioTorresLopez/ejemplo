<?php
/**
 * Vista de datos de institución (aspirante)
 *
 * vista que muestra los datos de la solictud para una nueva institucion.
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

            <!-- PANEL-HEADING START -->
            <div class="panel-heading" style="font-family: 'Soberana Sans'; font-size: 2rem;">
                <div class="panel-tools">
                    <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                </div>
       ACREDITACIÓN LEGAL DEL INMUEBLE (CONTRATO DE ARRENDAMIENTO)
            </div>
            <!-- PANEL-HEADING START -->

            <!-- PANEL-BODY START -->
            <div class="panel-body" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                <!-- FORM START -->
                <form role="form" id="form" action=""  method="post">
                    
                            <!-- ROW START -->
                            <div class="row well well-lg">
   <!-- FORM-GROUP COL-SM-12 START -->
                                <div class="form-group col-sm-12" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
           
                         <!-- COL-LG-6 START -->
                        <div class="col-lg-12">
                                 <!-- table START -->
                                 <div class="table-responsive"> 
                               
                 <table id="example3" class="table table-striped table-bordered table-hover">
                    <!-- thead START -->
                    <thead>
                        <tr>
                            <th>Fecha creación</th>
                            <th>Fecha cambio</th>
                            <th>Visualización</th>
                        </tr>
                    </thead>
                    
<!--                     thead END 
                     tbody START -->
                    <tbody>
                        
                        <tr>
                            <td>2016/02/05</td>
                           <td>                            
                              2018/02/05
                            </td>
                            <td>  
                           <a>
                                 <button class="btn btn-primary mostrarDocumentoHistorial" type="button" id="visualizar" name="mostrarDocumentoHistorial">
                                    <i class="pe-7s-copy-file"></i> 
                                    <span class="bold">  </span>
                                </button>       
                             </a>
                            </td>
                             
                        </tr>
                    
                    </tbody>
<!--                     tbody END -->

                </table>
                                       </div>
                                 <div id="documento" title="pdf" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">
                                     <form>
                                        
                                              <div class="col-lg-12 " class="form-control" >
                                                
                                                          <iframe src="//docs.google.com/gview?url=http://www.snee.com/xml/xslt/sample.doc&embedded=true" 
                                            style="width:500px; height:400px;" frameborder="5"  ></iframe>
                                            </div>
                                      
                                          

                                       </form>
                                 </div>
<!--                 table END -->
                        </div>
                        <!-- COL-LG-6 END -->
                             </div>

                            </div>
                            <!-- ROW END -->

                            

                </form>
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
