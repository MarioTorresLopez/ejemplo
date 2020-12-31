/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {

    var dialog, form, tips = $(".validateTips");


    dialog = $("#documento").dialog({
        autoOpen: false,
        height: 550,
        width: 550,
        modal: true,
        show: "blind",
        hide: "scale",
        buttons: {
            Cerrar: function () {
                dialog.dialog("close");
            }
        }
    });

    form = dialog.find("form").on("submit", function (event) {
        event.preventDefault();
    });

//    $(".mostrarDocumento").button().on("click", function () {
//        dialog.dialog("open");
//    });
    
    $(document).on("click", ".mostrarDocumento", function (e) { 
        
        var ifr = document.getElementById("viewer");
        var srcifr = ifr.getAttribute("src");
        var cont = $(this).attr("x");
        var newValue = $("#doc-"+cont+"").val();
        var i = srcifr.indexOf("/");
//        if(i>-1){
//            i = (i+1);
//            var changestr = srcifr.substring(i,srcifr.length);
//            var newVal = srcifr.substring(0,i) + newValue;
//            ifr.setAttribute("src", newVal);
//        }
        ifr.setAttribute("src",newValue);
        dialog.dialog( "open" );
        
    });
    
});
