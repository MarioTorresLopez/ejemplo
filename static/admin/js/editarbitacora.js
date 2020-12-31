/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function ($) {

    var dataFromlocalStorage = JSON.parse(localStorage.getItem("datos1"));
    var dataFromlocalStorage2 = JSON.parse(localStorage.getItem("datos2"));
    var tipo = document.getElementById("idtipobitacora").value;
    iduno = dataFromlocalStorage;
    iddos = dataFromlocalStorage2;
    console.log(iduno);
    console.log(iddos);

    var ifr = document.getElementById("form");

    if (tipo == 0)
    {
        var newValue = base_url() + "analista/gestion_institucion/editar_post_bitacora/" + iduno + "/" + iddos;
    }
    if (tipo == 1)
    {
        var newValue = base_url() + "analista/gestion_institucion/editar_post_bitacora_plantel/" + $("#idUsuarioPlantel").val();
    }
    ifr.setAttribute("action", newValue);

    console.log(newValue);

});
