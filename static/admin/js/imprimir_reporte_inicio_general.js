//$(document).on("ready", inicio);
//var chart;
$(document).on("ready", inicio);
function inicio(){
    var dataFromlocalStorage = JSON.parse(localStorage.getItem("datos1"));
iduno = dataFromlocalStorage;
console.log(iduno);
$("#a1m").val(iduno);
$("#imprimir_reporte_inicio_general").click(function (event) {
event.preventDefault();
        event.stopPropagation();
      // var a1m =document.getElementById('a1m').value;
        var a1m = $("#a1m").val();
                
        
        alert( a1m);
//        alert( idnivel);



});
}




//jQuery(document).ready(function ($) {
//    var dataFromlocalStorage = JSON.parse(localStorage.getItem("datos1"));
//iduno = dataFromlocalStorage;
//console.log(iduno);
//$("#a1m").val(iduno);
//$("#imprimir_reporte_inicio_general").click(function (event) {
//event.preventDefault();
//        event.stopPropagation();
//      // var a1m =document.getElementById('a1m').value;
//        var a1m = $("#a1m").val();
//                
//        
//        alert( a1m);
////        alert( idnivel);
//
//
//
//});
// });
 
 