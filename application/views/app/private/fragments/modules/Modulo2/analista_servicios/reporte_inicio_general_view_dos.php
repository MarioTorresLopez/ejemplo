<script src="https://code.highcharts.com/modules/accessibility.js">
</script>


<?php if (!is_null($instituciones)) { ?> 

    <?php foreach ($instituciones as $i) : ?> 


        <!--row START-->
        <div class="row">

            <!--well well-lg START-->
            <div class="well well-lg col-lg-12" style="background-color: #FAE485 ">

                <!--col-lg-12 START-->
                <div class="col-lg-8">

                    <div class="form-group"> 
                        <div class="col-sm-12">
                            <label>Institución</label>
                            <input type="text" disabled="" class="form-control" value="<?= $i->nombreinstitucion ?>">

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
            <div class="col-sm-12">

                <?php
                $alumnos1h = 0;
                $alumnos2h = 0;
                $alumnos3h = 0;
                $alumnos4h = 0;
                $alumnos5h = 0;
                $alumnos1m = 0;
                $alumnos2m = 0;
                $alumnos3m = 0;
                $alumnos4m = 0;
                $alumnos5m = 0;
                $total1 = 0;
                $total2 = 0;
                $total3 = 0;
                $total4 = 0;
                $total5 = 0;

                if (!is_null($suma)) :
                    ?>
                    <?php foreach ($suma[$i->idinstitucion] as $sum) : ?>
                        <?php if ($sum->genero == 'H') { ?>
                            <?php if ($sum->idingreso == 1) { ?>
                                <?php $alumnos1h = $alumnos1h + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 2) { ?>
                                <?php $alumnos2h = $alumnos2h + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 3) { ?>
                                <?php $alumnos3h = $alumnos3h + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 4) { ?>
                                <?php $alumnos4h = $alumnos4h + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 5) { ?>
                                <?php $alumnos5h = $alumnos5h + $sum->total; ?>
                            <?php }
                        }
                        ?>
                        <?php if ($sum->genero == 'M') { ?>
                            <?php if ($sum->idingreso == 1) { ?>
                                <?php $alumnos1m = $alumnos1m + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 2) { ?>
                                <?php $alumnos2m = $alumnos2m + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 3) { ?>
                                <?php $alumnos3m = $alumnos3m + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 4) { ?>
                                <?php $alumnos4m = $alumnos4m + $sum->total; ?>
                            <?php } ?>
                            <?php if ($sum->idingreso == 5) { ?>
                                <?php $alumnos5m = $alumnos5m + $sum->total; ?>
                            <?php }
                        }
                        ?>
                    <?php
                    endforeach;
                endif;
                ?>
                <?php
                $total1 = $alumnos1m + $alumnos1h;
                $total2 = $alumnos2m + $alumnos2h;
                $total3 = $alumnos3m + $alumnos3h;
                $total4 = $alumnos4m + $alumnos4h;
                $total5 = $alumnos5m + $alumnos5h;
                ?>
            </div>
        </div>
        <!--row END-->

    <?php endforeach; ?>
    <!--col-lg-12 START  AQUI EMPIEZA-->
    <div class="col-lg-12">

        <!-- table-responsive START -->
        <div class="table-responsive">

            <!--table START-->
            <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped">

                <tr>

                    <th colspan="2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <input type="text" disabled="" class="form-control text-center" value="Nuevo ingreso" style="font-size: 15px;">

                    </th>
                    <th colspan="2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <input type="text" disabled="" class="form-control text-center" value="Alta por reingreso" style="font-size: 15px;">

                    </th>
                    <th colspan="2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <input type="text" disabled="" class="form-control text-center" value="Eqv. de estudios" style="font-size: 15px;">

                    </th>
                    <th colspan="2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;">

                        <input type="text" disabled="" class="form-control text-center" value="Rev. de estudios " style="font-size: 15px;">

                    </th>
                    <th colspan="2" style="font-family: 'Soberana Sans'; font-size: 1.5rem;" >

                        <input type="text" disabled="" class="form-control text-center" value="Alta por traslado" style="font-size: 15px;">

                    </th>
                </tr>
                <tr>

                    <!--                                         nuevo ingreso-->
                    <th colspan="1" class="text-center">mujeres</th>
                    <th colspan="1" class="text-center">hombres</th>

                    <!--                                            rein estudios-->
                    <th colspan="1" class="text-center">mujeres</th>
                    <th colspan="1" class="text-center">hombres</th>

                    <!--                                            equi de estudios-->
                    <th colspan="1" class="text-center">mujeres</th>
                    <th colspan="1" class="text-center">hombres</th>

                    <!--                                            rev por translado-->
                    <th colspan="1" class="text-center">mujeres</th>
                    <th colspan="1" class="text-center">hombres</th>

                    <!--                                            tras por reingreso-->
                    <th colspan="1" class="text-center">mujeres</th>
                    <th colspan="1" class="text-center">hombres</th>

                </tr>

                <tr>

                    <!--                                         nuevo ingreso-->
                    <td ><?= $alumnos1m ?></td>
                <input id="a1m" value="<?= $alumnos1m ?>" style="display: none">
                <td ><?= $alumnos1h ?></td>
                <input id="a1h" value="<?= $alumnos1h ?>" style="display: none">

                <!--                                            reingreso estudios-->
                <td ><?= $alumnos2m ?></td>
                <input id="a2m" value="<?= $alumnos2m ?>" style="display: none">
                <td ><?= $alumnos2h ?></td>
                <input id="a2h" value="<?= $alumnos2h?>" style="display: none">

                <!--                                            equi de estudios-->
                <td ><?= $alumnos3m ?></td>
                <input id="a3m" value="<?= $alumnos3m ?>" style="display: none">
                <td ><?= $alumnos3h ?></td>
                <input id="a3h" value="<?= $alumnos3h ?>" style="display: none">

                <!--                                            rev por translado-->
                <td ><?= $alumnos4m ?></td>
                <input id="a4m" value="<?= $alumnos4m ?>" style="display: none">
                <td ><?= $alumnos4h ?></td>
                <input id="a4h" value="<?= $alumnos4h ?>" style="display: none">

                <!--                                            tras por reingreso-->
                <td ><?= $alumnos5m ?></td>
                <input id="a5m" value="<?= $alumnos5m ?>" style="display: none">
                <td ><?= $alumnos5h ?></td>
                <input id="a5h" value="<?= $alumnos5h ?>" style="display: none">
                </tr>
                <tr>

                    <!--                                         nuevo ingreso-->
                    <th colspan="2" style="text-align: right"> total <?= $total1 ?></th>
                    <input id="total1" value="<?= $total1 ?>" style="display: none">

                    <!--                                            reingreso estudios-->
                    <th colspan="2" style="text-align: right"> total <?= $total2 ?></th>
                    <input id="total2" value="<?= $total2 ?>" style="display: none">
                    <!--                                            equi de estudios-->
                    <th colspan="2" style="text-align: right"> total <?= $total3 ?></th>
                    <input id="total3" value="<?= $total3 ?>" style="display: none">
                    <!--                                            rev por translado-->
                    <th colspan="2" style="text-align: right"> total <?= $total4 ?></th>
                    <input id="total4" value="<?= $total4 ?>" style="display: none">
                    <!--                                            tras por reingreso-->
                    <th colspan="2" style="text-align: right"> total <?= $total5 ?></th>
                    <input id="total5" value="<?= $total5 ?>" style="display: none">
                </tr>
            </table>
            <!--table END-->
        </div>
        <!-- table-responsive END -->
    </div>
    <!--col-lg-12 END AQUI TERMINAAAA-->

<!--    <div class="form-group">
        <label>&nbsp;</label>
        <div class="col-sm-4">
            <button id="btn-reporte-inicio-grafica" class="btn btn-primary">
                <i class="fa fa-amazon"></i> Generar Grafica
            </button>
        </div>
    </div>-->
    <!--        aqui comienza las estadisticas-->
    <script>
        Highcharts.chart({
            chart: {
                renderTo: 'grafica',
                type: 'column'
            },
            title: {
                text: 'TIPOS DE INGRESO'
            },
            subtitle: {
                text: 'ESTADISTICA'
            },
            xAxis: {
                categories: [
                    'Ingreso',
                    'Reingreso',
                    'Equivalencia de estudios',
                    'Revalidación de  estudios',
                    'Traslado'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'NO. de alumnos'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px"></span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:10"><b>{point.y:f} personas</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.1,
                    borderWidth: 0
                }
            },
            series: [{
                    name: 'Mujeres',
                    data: [<?= $alumnos1m ?>, <?= $alumnos2m ?>,
    <?= $alumnos3m ?>, <?= $alumnos4m ?>, <?= $alumnos5m ?>],
                    color: '#E4C225'


                }, {
                    name: 'Hombres',
                    data: [
    <?= $alumnos1h ?>, <?= $alumnos2h ?>, <?= $alumnos3h ?>, <?= $alumnos4h ?>, <?= $alumnos5h ?>],
                    color: '#2590E4'

                }]
        });
                
    
//    jQuery(document).ready(function ($) {
//$("#imprimir_reporte_inicio_general").click(function (event) {
//event.preventDefault();
//        event.stopPropagation();
      // var a1m =document.getElementById('a1m').value;
        var a1m = $("#a1m").val();
    localStorage.setItem("a1m", JSON.stringify(a1m));
     var a2m = $("#a2m").val();
    localStorage.setItem("a2m", JSON.stringify(a2m));
     var a3m = $("#a3m").val();
    localStorage.setItem("a3m", JSON.stringify(a3m));
     var a4m = $("#a4m").val();
    localStorage.setItem("a4m", JSON.stringify(a4m));
     var a5m = $("#a5m").val();
    localStorage.setItem("a5m", JSON.stringify(a5m));
     var a1h = $("#a1h").val();
    localStorage.setItem("a1h", JSON.stringify(a1h));
     var a2h = $("#a2h").val();
    localStorage.setItem("a2h", JSON.stringify(a2h));
     var a3h = $("#a3h").val();
    localStorage.setItem("a3h", JSON.stringify(a3h));
    var a4h = $("#a4h").val();
    localStorage.setItem("a4h", JSON.stringify(a4h));
      var a5h = $("#a5h").val();
    localStorage.setItem("a5h", JSON.stringify(a5h));
    //TOTALES
 
      var total1 = $("#total1").val();
    localStorage.setItem("total1", JSON.stringify(total1));
     var total2 = $("#total2").val();
    localStorage.setItem("total2", JSON.stringify(total2));
     var total3 = $("#total3").val();
    localStorage.setItem("total3", JSON.stringify(total3));
     var total4 = $("#total4").val();
    localStorage.setItem("total4", JSON.stringify(total4));
     var total5 = $("#total5").val();
    localStorage.setItem("total5", JSON.stringify(total5));
    
        
      //  alert( a1m);
//        alert( idnivel);



//});
// });
 </script>
    <div class="hpanel hblue">
        <!--panel-heading START-->
        <div class="panel-heading">

            <!--panel-tools START-->
            <div class="panel-tools">
                <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            </div>
            <!--panel-tools END-->

            <h2>Estadistica</h2>
        </div>
        <!--panel-heading END-->
        <!--panel-body START-->
        <div class="panel-body">
            <div class="row">
                <div id="grafica" style="min-width: 310px; height: 400px; margin: 0 auto">
                </div>
            </div>
        </div>


    </div>
       <div class="form-group text-right">
           <a  href="<?php base_url() ?>imprimir_reporte_inicio_general" class="btn btn-info btn-mini" data-toggle="tooltip" title='Cargar archivo' target="_blank" 
                           style="background-color: grey" id="imprimir_reporte_inicio_general">
                            <i class="fa fa-file-pdf-o"></i>
                            Imprimir
           </a>
                    </div>

<?php } else { ?> 
    <h2 style="text-align: center">No hay disponibles</h2>
<?php } ?> 