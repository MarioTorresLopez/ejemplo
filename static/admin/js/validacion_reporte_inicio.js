$(document).on("ready", inicio);
        function inicio(){
        //aqui se va a validar el formulario despegable
    $("#filtro").change(function (event) {

        $('#row_filtro2').show();
    });

//    $("#filtro2").change(function (event) {
//
//        $('#row_filtro3').show();
//    });

    //validacion ´para que muestre los municipios a partir del filtro de nivel educativo


    $("#filtro").change(function () {

        $("#filtro option:selected").each(function () {

            parametro = $('#filtro').val();

            // alert(parametro);
            $.post(base_url() + "analista_servicios/reporte_inicio/buscar_filtro", {
                filtro: parametro
            }, function (data) {
                $("#filtro2").html(data);
            });
        });
    });
    
    $("#filtro2").change(function(){
  $("#btn-reporte-inicio").trigger("click");
});

//    $("#filtro2").change(function () {
//
//        $("#filtro2 option:selected").each(function () {
//
//            parametro2 = $('#filtro2').val();
//            
//
//            // alert(parametro);
//            $.post(base_url() + "analista_servicios/reporte_inicio/buscar_filtro2", {
//                idnivel: parametro2
//            }, function (data) {
//                $("#filtro3").html(data);
//
//            });
//        });
//    });


}







jQuery(document).ready(function ($) {
$("#btn-reporte-inicio").click(function (event) {
event.preventDefault();
        event.stopPropagation();
        var primero = $("#filtro").val();
        var segundo = $("#filtro2").val();
//        alert( primero);
//        alert( idnivel);

        if (primero == 1){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_ini/" + segundo);
}
if (primero == 2){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_ins/" + segundo);
}
if (primero == 3){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_ica/" + segundo);
}
if (primero == 4){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_ici/" + segundo);
}
if (primero == 5){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_itu/" + segundo);
}
if (primero == 6){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_imo/" + segundo);
}
if (primero == 7){
$("#data-reporte").load(base_url() + "analista_servicios/reporte_inicio/get_reporte_imu/" + segundo);
}




});
        });