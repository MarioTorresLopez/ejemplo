<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>



<!DOCTYPE  html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


        <link rel="shortcut icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">
        <link rel="icon" href="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="home.css" media="screen" />
<link rel="stylesheet" type="text/css" href="print.css" media="print" />
<link rel="stylesheet" type="text/css" href="estilos.css" />
        <!-- Vendor styles -->
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/fontawesome/css/font-awesome.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/metisMenu/dist/metisMenu.css" />
        <link rel="stylesheet" href="<?= base_url() ?>static/vendor/animate.css/animate.css" />
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        <?php
        $data = array();
        $data['scripts'] = array();

        $data['scripts'][] = 'imprimir_reporte_inicio_general';
        ?>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

        <title>REPORTE INICIO</title>
    </head>
    <body onload="window.print();">

        <div class="container" >


            <!--row START-->
            <div class="row">
                <div class="col-xs-2">
                    <img src="<?= base_url() ?>static\images\logos\logo_aide_ico.ico" width="60" height="60">
                </div>
                <div class="col-xs-10 text-center">
                    <div class="row">
                        <div class="col-xs-12">
                            <label style="font-family: sans-serif; font-size: 18px; font-weight: bold">
                                SECRETARÍA DE EDUCACIÓN DEL ESTADO DE QUERÉTARO
                            </label>
                        </div>
                        <div class="col-xs-12">
                            <label style="font-family: sans-serif; font-size: 10px; font-weight: bold">
                                COORDINACIÓN DE DESARROLLO EDUCATIVO 
                                <br>
                                DIRECCIÓN DE EDUCACIÓN
                            </label>


                        </div>
                    </div>
                </div>


            </div>
            <!--row END-->




            <!--row START-->
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-12">
                        <h3 class="font-bold text-center">
                            REPORTE INICIO DE CURSOS
                        </h3>
                    </div>
                    <div class="col-xs-10">

                    </div>
                   
                    <div class="col-xs-7">

                    </div>
                    <div class="col-xs-5">
   
                        
                   <?php if(date('N')==1){
                       ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Lunes'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   } if(date('N')==2){
                      ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Martes'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                   if(date('N')==3){
                      ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Miercoles'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                   if(date('N')==4){
                      ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Jueves'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                   if(date('N')==5){
                      
                        ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Viernes'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                   if(date('N')==6){
                      
                       ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Sabado'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                   if(date('N')==7){
                     ?>
                           <label style="font-family: sans-serif; font-size: 17px; font-weight: bold; text-align: left">
                               <?php echo'Domingo'.' '.date('d').' /'.date('m').' /'. date('Y') . ' '.date('g:i  a')."\n";?></h6>  
                            </label> 
                        <?php
                   }
                  
                   ?>
                            
                            
                     

<!--                            viernes 17 de octubre 2019 2:35 pm -->
                        </label> 
                    </div>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>
                <!--well well-lg START-->
<!--                <div class="well well-lg col-xs-12" style="background-color: #FAE485 ">-->
                    <!--col-lg-12 START  AQUI EMPIEZA-->
                    <div class="col-lg-12" >

                        <!-- table-responsive START -->
                        <!--        <div class="table-responsive">-->

                        <!--table START-->
                        <table cellpadding="1" cellspacing="1" class="table table-bordered table-striped" style="min-width: 250px;  max-width: 700px;">

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
                                <th  >
                                    <input type="text" disabled="" class="form-control text-center" id="a1m" value="" style="font-size: 15px;">
                                </th>
                                <th  >
                                    <input type="text" disabled="" class="form-control text-center" id="a1h" value="" style="font-size: 15px;">

                                </th>

                                <!--                                            reingreso estudios-->
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a2m" value="" style="font-size: 15px;">
                                </th>
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a2h" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            equi de estudios-->
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a3m" value="" style="font-size: 15px;">
                                </th>
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a3h" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            rev por translado-->
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a4m" value="" style="font-size: 15px;">
                                </th>
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a4h" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            tras por reingreso-->
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a5m" value="" style="font-size: 15px;">
                                </th>
                                <th >
                                    <input type="text" disabled="" class="form-control text-center" id="a5h" value="" style="font-size: 15px;">
                                </th>
                            </tr>
                            <tr>

                                <!--                                         nuevo ingreso-->
                                <th colspan="2" style="text-align: right" >
                                    <input type="text" disabled="" class="form-control text-center" id="total1" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            reingreso estudios-->
                                <th colspan="2" style="text-align: right" >
                                    <input type="text" disabled="" class="form-control text-center" id="total2" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            equi de estudios-->
                                <th colspan="2" style="text-align: right" >
                                    <input type="text" disabled="" class="form-control text-center" id="total3" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            rev por translado-->
                                <th colspan="2" style="text-align: right" >
                                    <input type="text" disabled="" class="form-control text-center" id="total4" value="" style="font-size: 15px;">
                                </th>

                                <!--                                            tras por reingreso-->
                                <th colspan="2" style="text-align: right">
                                    <input type="text" disabled="" class="form-control text-center" id="total5" value="" style="font-size: 15px;">
                                </th>
                            </tr>
                        </table>
                        <!--table END-->
                        <!--        </div>-->
                        <!-- table-responsive END -->
                    </div>
                    <!--col-lg-12 END AQUI TERMINAAAA-->






                    <!--                        </div>-->
                    <!-- table-responsive END -->

<!--                </div>-->
                <!--col-xs-12 END AQUI TERMINAAAA-->

            </div>
  <!--row END-->
  
  <div class="panel-heading">
    <h2>Estadistica</h2>
</div>
<!--panel-heading END-->
<!--panel-body START-->


        <div id="grafica2" style="min-width: 250px;
  max-width: 700px; margin: 0 auto" >
        
    </div>
       




  
        </div>
        <!--container end-->

    <?php
      //  $a1m = document.getElementById("a1m").value;
    ?>



<script>
    //VARIABLES PARA LA TABLA
var primero =0;
    var a1m = JSON.parse(localStorage.getItem("a1m"));
    var a2m = JSON.parse(localStorage.getItem("a2m"));
    var a3m = JSON.parse(localStorage.getItem("a3m"));
    var a4m = JSON.parse(localStorage.getItem("a4m"));
    var a5m = JSON.parse(localStorage.getItem("a5m"));
    var a1h = JSON.parse(localStorage.getItem("a1h"));
    var a2h = JSON.parse(localStorage.getItem("a2h"));
    var a3h = JSON.parse(localStorage.getItem("a3h"));
    var a4h = JSON.parse(localStorage.getItem("a4h"));
    var a5h = JSON.parse(localStorage.getItem("a5h"));
    
    
    //totales

    var total1 = JSON.parse(localStorage.getItem("total1"));
    var total2 = JSON.parse(localStorage.getItem("total2"));
    var total3 = JSON.parse(localStorage.getItem("total3"));
    var total4 = JSON.parse(localStorage.getItem("total4"));
    var total5 = JSON.parse(localStorage.getItem("total5"));

//AQUI SE HACE EL PARSEO PARA QUE SEA EL VALUE DE LA TABLA
    document.getElementById("a1m").value = a1m;
    document.getElementById("a2m").value = a2m;
    document.getElementById("a3m").value = a3m;
    document.getElementById("a4m").value = a4m;
    document.getElementById("a5m").value = a5m;
    document.getElementById("a1h").value = a1h;
    document.getElementById("a2h").value = a2h;
    document.getElementById("a3h").value = a3h;
    document.getElementById("a4h").value = a4h;
    document.getElementById("a5h").value = a5h;
//totales
    document.getElementById("total1").value = "total  " + total1;
    document.getElementById("total2").value = "total  " + total2;
    document.getElementById("total3").value = "total  " + total3;
    document.getElementById("total4").value = "total  " + total4;
    document.getElementById("total5").value = "total  " + total5;
  
//// variables para las tablas las pasamos a enteros para poder utilizarlas
var a1m2 = parseInt(a1m); 
var a2m2 = parseInt(a2m); 
var a3m2 = parseInt(a3m); 
var a4m2 = parseInt(a4m); 
var a5m2 = parseInt(a5m); 
var a1h2 = parseInt(a1h); 
var a2h2 = parseInt(a2h); 
var a3h2 = parseInt(a3h); 
var a4h2 = parseInt(a4h); 
var a5h2 = parseInt(a5h); 




/// ESTA ES LA TABLA

///



    Highcharts.chart({
        chart: {
            renderTo: 'grafica2',
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
                    '<td style="padding:0"><b>{point.y:f} personas</b></td></tr>',
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
                data: [a1m2, a2m2, a3m2, a4m2, a5m2],
                color: '#E4C225'


            }, {
                name: 'Hombres',
                data: [ a1h2,a2h2, a3h2, a4h2, a5h2],
                color: '#2590E4'

            }]
    });

</script>



</body>
</html>




