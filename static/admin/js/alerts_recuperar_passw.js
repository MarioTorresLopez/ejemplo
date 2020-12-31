/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function ($) {
    $('.demo2').click(function () {
        swal({
            title: "Enviado",
            text: "Se le ha enviado un correo electrónico con una contraseña temporal",
            type: "success"
        },
                function () {
                    location.href = "../login";
                });
    });

    $('.alertRegistroC').click(function () {
        swal({
            title: "Datos Capturados",
            text: "",
            type: "success"
        },
                function () {
                    location.href = "../login";
                });
    });
});