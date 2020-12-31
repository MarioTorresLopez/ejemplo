/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//Actualización
jQuery(document).ready(function ($) {
    //probando,probando
    var r=2;
    //var verificar =[];
    var t1 = document.getElementById("itp").value;
//    var e1 = document.getElementById("ch1").value;
//    var e2 = document.getElementById("ch2").value;
//    var e3 = document.getElementById("ch3").value;
//    var e4 = document.getElementById("ch4").value;

//    $("#ch1").change(function(){
//        verificar.push(1);
//    });
//    
//    $("#ch2").change(function(){
//        verificar.push(2);
//    });
//    
//    $("#ch3").change(function(){
//        verificar.push(3);
//    });
//    
//    $("#ch4").change(function(){
//        verificar.push(4);
//    });
//    
//    $('#botonmodulo').click(function(){
//        if(verificar.length===0){
//            swal({
//                title: "Alerta",
//                text: "Se requiere seleccionar el rol, módulo y mínimo un permiso",
//                type: "error"
//            },
//                    function () {
//                        
//                    });
//            return false;
//        }
//        else{
//            swal({
//                title: "Registrado",
//                text: "Se ha registado",
//                type: "success"
//            },
//                    function () {
//                        $("#form").submit();
//                    });
//            return false;
//        }
//    });

    if(t1.includes('1')){
        
    }
    else{
        $('#ch1').removeAttr("checked");
    }
    if(t1.includes('2')){
        
    }
    else{
        $('#ch2').removeAttr("checked");
    }
    if(t1.includes('3')){
        
    }
    else{
        $('#ch3').removeAttr("checked");
    }
    if(t1.includes('4')){
        
    }
    else{
        $('#ch4').removeAttr("checked");
    }
    
    
});
