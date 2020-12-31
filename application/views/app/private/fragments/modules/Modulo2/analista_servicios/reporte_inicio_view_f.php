

<script>

jQuery(document).ready(function ($) {
$("#btn-reporte-inicio2").click(function (event) {
event.preventDefault();
        event.stopPropagation();
        var primero = $("#filtro").val();
        var segundo = $("#filtro3").val();
//        alert( primero);
//        alert( idnivel);

    $("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_ins/" + segundo);




});
        });
</script>


<?php if (!is_null($instituciones)) { ?> 

    <?php foreach ($instituciones as $i) : ?> 

        <!--row START-->
        <div class="row">
            
<div>
<div class="form-group">
                        <div class="col-lg-4" id="row_filtro3" >
                            <label for="tipo">Institución:</label> 
                            <select name="filtro3" id="filtro3"  class="form-control m-b">
                                <option>---Seleccione---</option>
                                    <?php
                                   
                               
                                        foreach ($instituciones as $i) :
                                       
                                            ?>
                                            <option value="<?= $i->idinstitucion ?>"><?= $i->nombreinstitucion ?></option> 
                                            <?php
                                        endforeach;
                                  
                                    ?>



                            </select>
                        </div>

                    </div>
            <div class="form-group">
                        <label>&nbsp;</label>
                        <div class="col-sm-4">
                            <button id="btn-reporte-inicio2" class="btn btn-primary">
                                <i class="fa fa-filter"></i> Generar segundo filtro
                            </button>
                        </div>
                    </div>
    </div>

            <!--well well-lg START-->
            <div class="well well-lg col-lg-12" style="background-color: #FAE485 ">

                <!--col-lg-12 START-->
                <div class="col-lg-8">

                    <div class="form-group"> 
                        <div class="col-sm-12">
                            <label>Institución</label>
                            <input type="text" disabled="" class="form-control" value="<?= $i->nombreinstitucion ?>">

                        </div>
                        <div class="col-sm-12">
                            <label>Carrera</label>
                            <input type="text" disabled="" class="form-control" value="<?= $i->nomcarrera ?>">

                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-6">
                            <label>Ciclo escolar</label>
                            <input type="text" disabled="" class="form-control" value="<?= $i->fecha_ciclo ?>">

                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-6">
                            <label>Nivel educativo</label>
                            <input type="text" disabled="" class="form-control" value="<?= $i->nomnivel ?>">
                        </div>
                    </div>

                </div>

                <!--col-lg-12 END-->
                <div class="col-lg-4">
                    <div class="form-group"> 
                        <div class="col-sm-12">
                            <h5 style="text-align: center">Grupos-Alumnos por periodo</h5>

                        </div>
                        <div class="col-sm-6">
                            <h5 style="text-align: center">Periodo</h5>
                            <?php foreach ($gruposAlumPeriodoInst[$i->idinstitucion] as $gapi) : ?>
                                <?php if ($gapi->idperiodo == 1) { ?>
                                    <input type="text" disabled="" class="form-control" value="<?= $gapi->idnoperiodo ?> anual" >
                                <?php } ?>
                                <?php if ($gapi->idperiodo == 2) { ?>
                                    <input type="text" disabled="" class="form-control" value="<?= $gapi->idnoperiodo ?> cuatrimestre">
                                <?php } ?>
                                <?php if ($gapi->idperiodo == 3) { ?>
                                    <input type="text" disabled="" class="form-control" value="<?= $gapi->idnoperiodo ?> trimestre">
                                <?php } ?>
                                <?php if ($gapi->idperiodo == 4) { ?>
                                    <input type="text" disabled="" class="form-control" value="<?= $gapi->idnoperiodo ?> modulo">
                                <?php } ?>
                                <?php if ($gapi->idperiodo == 5) { ?>
                                    <input type="text" disabled="" class="form-control" value="<?= $gapi->idnoperiodo ?> semestre">
                                <?php } ?>
                            <?php endforeach; ?>


                        </div>
                        <div class="col-sm-3">
                            <h5 style="text-align: center">Grupos</h5>
                            <?php foreach ($gruposAlumPeriodoInst[$i->idinstitucion] as $gapi) : ?>
                            <input type="text" disabled="" class="form-control" value="<?= $gapi->grupos ?> " >
                            <?php endforeach; ?>
                        </div>
                        <div class="col-sm-3">
                            <h5 style="text-align: center">Alumnos</h5>
                            <?php foreach ($gruposAlumPeriodoInst[$i->idinstitucion] as $gapi) : ?>
                                <input type="text" disabled="" class="form-control" value="<?= $gapi->alumnos ?>">
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--well well-lg END-->

            <?php foreach ($gruposAlumPeriodoInst[$i->idinstitucion] as $gapi) : ?>
             <div class="well well-lg col-lg-12" style="background-color: #FAE485">
                <?php if ($gapi->idperiodo == 1) { ?>
                    <div class=" col-lg-11">
                         <h3 style="text-align: center"><b><?= $gapi->idnoperiodo ?> anual </b></h3>
                    </div>
                <?php } ?>
                <?php if ($gapi->idperiodo == 2) { ?>
                    <div class=" col-lg-11">
                        <h3 style="text-align: center"><b><?= $gapi->idnoperiodo ?> cuatrimestre </b></h3>
                    </div>
                 <br>
                  
                <?php } ?>
                <?php if ($gapi->idperiodo == 3) { ?>
                     <div class=" col-lg-11">
                           <h3 style="text-align: center"><b><?= $gapi->idnoperiodo ?> trimestre </b></h3>
                    </div>
                <?php } ?>
                <?php if ($gapi->idperiodo == 4) { ?>
                     <div class=" col-lg-11">
                            <h3 style="text-align: center"><b><?= $gapi->idnoperiodo ?> modulo </b></h3>
                    </div>
                <?php } ?>
                <?php if ($gapi->idperiodo == 5) { ?>
                     <div class=" col-lg-11">
                            <h3 style="text-align: center"><b><?= $gapi->idnoperiodo ?> semestre </b></h3>
                    </div>
                <?php } ?>


                <?php foreach ($gruposnombre[$i->idinstitucion] as $gn) : ?>
                 
                    <?php if ($gn->idperiodo == $gapi->idperiodo && $gn->idnoperiodo == $gapi->idnoperiodo) { ?>
<!--                  <div class="well well-lg col-lg-12" style="background-color: #EA4E38">-->
             <div class=" col-lg-12">
                 
                          <input type="text" disabled="" class=" form-control" value=" GRUPO <?= $gn->grupo ?>" style="background-color: #C8B45B">
                    </div>
                     
                
                    <?php } ?>



                    <!--col-lg-12 START  AQUI EMPIEZA-->
                    <div class="col-lg-12">

                        <!-- table-responsive START -->
                        <div class="table-responsive">

                            <!--table START-->
                            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">

                                <tr>
                                    <!--                                         nuevo ingreso-->
                                    <?php if (!is_null($generosiInst1[$i->idinstitucion])) : ?>
                                                        <?php foreach ($generosiInst1[$i->idinstitucion] as $gni) : ?>

                                                            <?php
                                                            if ($gni->idperiodo == $gapi->idperiodo && $gni->idnoperiodo == $gapi->idnoperiodo && $gni->idga == $gn->idga && $gni->idnoperiodo == $gn->idnoperiodo &&
                                                                    $gni->idperiodo == $gn->idperiodo) {
                                                                ?>
                                <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gni->genero_i ?> HOMBRES NUEVO INGRESO" >  </div>
                                                           
                                                        <?php } ?>

                                                    <?php endforeach; ?>
                                                <?php endif; ?>

                                                
                                                
                                    <?php if (!is_null($generosiInst2[$i->idinstitucion])) : ?>
                                        <?php foreach ($generosiInst2[$i->idinstitucion] as $gni2) : ?>

                                            <?php
                                            if ($gni2->idperiodo == $gapi->idperiodo && $gni2->idnoperiodo == $gapi->idnoperiodo && $gni2->idga == $gn->idga && $gni2->idnoperiodo == $gn->idnoperiodo &&
                                                    $gni2->idperiodo == $gn->idperiodo) {
                                                ?>
                                 <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gni2->genero_i ?> MUJERES NUEVO INGRESO" >  </div>
                                   
                                              
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (!is_null($generosrInst1[$i->idinstitucion])) : ?>
                                        <?php foreach ($generosrInst1[$i->idinstitucion] as $gnr) : ?>

                                            <?php
                                            if ($gnr->idperiodo == $gapi->idperiodo && $gnr->idnoperiodo == $gapi->idnoperiodo && $gnr->idga == $gn->idga && $gnr->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnr->idperiodo == $gn->idperiodo) {
                                                ?>
                                 <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?=  $gnr->genero_i ?> HOMBRES REINGRESO" >  </div>
                                            
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                                                              <!--       <td> Hombres REINGRESO </td>  --> 
                                    <?php if (!is_null($generosrInst2[$i->idinstitucion])) : ?>
                                        <?php foreach ($generosrInst2[$i->idinstitucion] as $gnr2) : ?>

                                            <?php
                                            if ($gnr2 != null && $gnr2->idperiodo == $gapi->idperiodo && $gnr2->idnoperiodo == $gapi->idnoperiodo && $gnr2->idga == $gn->idga && $gnr2->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnr2->idperiodo == $gn->idperiodo) {
                                                ?>
                                  <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gnr2->genero_i ?> MUJERES REINGRESO" >  </div>
                                               
                                            <?php } else {
                                                ?>
                                        <!--       <td>0 Mujeres REINGRESO </td>  -->
                                            <?php }endforeach; ?>
                                    <?php endif; ?>

                                    <?php if (!is_null($generoseInst1[$i->idinstitucion])) : ?>
                                        <?php foreach ($generoseInst1[$i->idinstitucion] as $gne) : ?>

                                            <?php
                                            if ($gne->idperiodo == $gapi->idperiodo && $gne->idnoperiodo == $gapi->idnoperiodo && $gne->idga == $gn->idga && $gne->idnoperiodo == $gn->idnoperiodo &&
                                                    $gne->idperiodo == $gn->idperiodo) {
                                                ?>
                                   <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gne->genero_i ?> HOMBRES EQUIVALENCIA" >  </div>
                                             
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (!is_null($generoseInst2[$i->idinstitucion])) : ?>
                                        <?php foreach ($generoseInst2[$i->idinstitucion] as $gne2) : ?>

                                            <?php
                                            if ($gne2->idperiodo == $gapi->idperiodo && $gne2->idnoperiodo == $gapi->idnoperiodo && $gne2->idga == $gn->idga && $gne2->idnoperiodo == $gn->idnoperiodo &&
                                                    $gne2->idperiodo == $gn->idperiodo) {
                                                ?>
                                     <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gne2->genero_i ?> MUJERES EQUIVALENCIA" >  </div>
                                                 
                                            <?php } ?>
                                                

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                             
                                                
                                                
                                    <?php if (!is_null($generosrvInst1[$i->idinstitucion])) : ?>
                                        <?php foreach ($generosrvInst1[$i->idinstitucion] as $gnrv) : ?>

                                            <?php
                                            if ($gnrv->idperiodo == $gapi->idperiodo && $gnrv->idnoperiodo == $gapi->idnoperiodo && $gnrv->idga == $gn->idga && $gnrv->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnrv->idperiodo == $gn->idperiodo) {
                                                ?>
                                     <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value="<?= $gnrv->genero_i ?> HOMBRES REVALIDACIÓN" >  </div>
                                                
                                                 
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (!is_null($generosrvInst2[$i->idinstitucion])) : ?>
                                        <?php foreach ($generosrvInst2[$i->idinstitucion] as $gnrv2) : ?>

                                            <?php
                                            if ($gnrv2->idperiodo == $gapi->idperiodo && $gnrv2->idnoperiodo == $gapi->idnoperiodo && $gnrv2->idga == $gn->idga && $gnrv2->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnrv2->idperiodo == $gn->idperiodo) {
                                                ?>
                                       <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value=" <?= $gnrv2->genero_i ?> MUJERES REVALIDACIÓN" >  </div>
                                                  
                                            
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (!is_null($generostInst1[$i->idinstitucion])) : ?>
                                        <?php foreach ($generostInst1[$i->idinstitucion] as $gnt) : ?>

                                            <?php
                                            if ($gnt->idperiodo == $gapi->idperiodo && $gnt->idnoperiodo == $gapi->idnoperiodo && $gnt->idga == $gn->idga && $gnt->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnt->idperiodo == $gn->idperiodo) {
                                                ?>
                                       <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value=" <?= $gnt->genero_i ?> HOMBRES TRASLADO" >  </div>
                                                    
                                             
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if (!is_null($generostInst2[$i->idinstitucion])) : ?>
                                        <?php foreach ($generostInst2[$i->idinstitucion] as $gnt2) : ?>

                                            <?php
                                            if ($gnt2->idperiodo == $gapi->idperiodo && $gnt2->idnoperiodo == $gapi->idnoperiodo && $gnt2->idga == $gn->idga && $gnt2->idnoperiodo == $gn->idnoperiodo &&
                                                    $gnt2->idperiodo == $gn->idperiodo) {
                                                ?>
                                       <div class="col-sm-3" >  <input type="text" disabled="" class="form-control" value=" <?= $gnt2->genero_i ?> MUJERES TRASLADO" >  </div>    
                                          
                                            <?php } ?>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
 
                                </tr>
                            </table>
                            <!--table END-->
<!--                        </div>-->
                        <!-- table-responsive END -->
                    </div>
                      </div>
                    <!--col-lg-12 END AQUI TERMINAAAA-->
                  
                <?php endforeach; ?>
                     </div>  
            <?php endforeach; ?>
                     
           
        </div>
        <!--row END-->

    <?php endforeach; ?> 
<?php } else { ?> 
    <h2 style="text-align: center">No hay disponibles</h2>
<?php } ?> 