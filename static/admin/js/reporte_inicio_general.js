$(document).on("ready", inicio);
var chart;
        function inicio(){
            primerparametro = 12;
            var datos1 = primerparametro;
            localStorage.setItem("datos1", JSON.stringify(datos1));
            console.log(datos1);
        //aqui se va a validar el formulario despegable
        $("#filtro").change(function(event) {

        $('#row_filtro2').show();
        });
                //validacion ´para que muestre los municipios a partir del filtro de nivel educativo


                $("#filtro").change(function () {

        $("#filtro option:selected").each(function () {
        parametro = $('#filtro').val();
                //  alert(nivel);
                $.post(base_url() + "analista_servicios/reporte_inicio_general/buscar_filtro", {
                filtro: parametro
                }, function (data) {
                $("#filtro2").html(data);
                });
        });
        });
        }







jQuery(document).ready(function ($) {
$("#btn-reporte-inicio-general").click(function (event) {
event.preventDefault();
        event.stopPropagation();
        var primero = $("#filtro").val();
        var segundo = $("#filtro2").val();
         
                
        
//        alert( primero);
//        alert( idnivel);

        if (primero == 1){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_ini/" + segundo);
}
if (primero == 2){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_ins/" + segundo);
}
if (primero == 3){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_ica/" + segundo);
}
if (primero == 4){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_ici/" + segundo);
}
if (primero == 5){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_itu/" + segundo);
}
if (primero == 6){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_imo/" + segundo);
}
if (primero == 7){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio_general/get_reporte_imu/" + segundo);
}

//estadisticas



});


//estadisticas

 });
 
 