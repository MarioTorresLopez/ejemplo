/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
jQuery(document).ready(function ($) {

    $("#tramite_acptado").slideUp(100);
    $("#btn_aceptar").click(function (event) {
        $("#tramite_acptado").slideDown(1000);
        $("#btns_mostrar").slideUp(10)
        
         
    });

});
/*
 * Query(document).ready(function($) {
 
 $("#fiscal_tramite").slideUp(10);
 $("#moral_tramite").slideUp(10);
 $("#tipo_tramite").change(function(event) {
 var valor = $("#tipo_tramite").val();
 if(valor == 1){
 $("#moral_tramite").slideUp(10);
 $("#fiscal_tramite").slideDown(500);
 
 } else {
 $("#fiscal_tramite").slideUp(10);
 $("#moral_tramite").slideDown(500);
 */
