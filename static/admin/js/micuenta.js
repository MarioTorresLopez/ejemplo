$(document).on("ready", inicio);

function inicio() {
    $('#cambiosUsuario').click(function () {


        if (validar('correo1') == false || validar('password1') == false) {
            return false;

        } else {
            swal({
                title: "Guardado",
                text: "Se han guardado los cambios conm exito",
                type: "success"
            },
            function () {
                //location.href = "../login";
                $("#form").submit();
            });
            return false;
        }

    });

    $("#cancelar").click(function () {
        var correo1 = document.getElementById("correo1").value;
        var password1 = document.getElementById("password1").value;
        if ((correo1.length !== 0 && correo1 !== null) || (password1.length !== 0 && password1 !== null)) {
            swal({
                title: "¿Seguro?, se perderan todo sus datos",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Si",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false},
            function (isConfirm) {
                if (isConfirm) {
                    location.href = base_url()+"app/inicio";


                } else {
                    swal("Cancelado");

                }
            });

        }
        else {
            location.href = base_url() + "app/inicio";
        }
    });
    
    $("#correo1").keyup(function () {
        validar('correo1');
    });
    
    $("#password1").keyup(function () {
        validar('password1');
    });
    
    
}

function validar(input) {
    if (input === 'correo1') {
        var correo1 = document.getElementById("correo1").value;
        if (!(/^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i.test(correo1)) && correo1.length > 0) {
            $("#iconotexto").remove();
            $("#correo1").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo1").parent().children("span").text("Ingresar un correo valido").show();
            $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        else if (correo1.length === 0 || correo1 == "") {
            $("#iconotexto").remove();
            $("#correo1").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#correo1").parent().children("span").text("Ingresar correo").show();
            $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        else {
            $("#iconotexto").remove();
            $("#correo1").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#correo1").parent().children("span").text("").hide();
            $("#correo1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
    
    if (input === 'password1') {
        var password1 = document.getElementById("password1").value;

        if (password1.length === 0 || password1 == "") {
            $("#iconotexto").remove();
            $("#password1").parent().parent().attr("class", "form-group has-error has-feedback");
            $("#password1").parent().children("span").text("Ingresar contraseña").show();
            $("#password1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-remove form-control-feedback' style='text-align-last: left;'></span>");
            return false;
        }
        else {
            $("#iconotexto").remove();
            $("#password1").parent().parent().attr("class", "form-group has-success has-feedback");
            $("#password1").parent().children("span").text("").hide();
            $("#password1").parent().append("<span id='iconotexto' class='glyphicon glyphicon-ok form-control-feedback' style='text-align-last: left;'></span>");

            return true;
        }
    }
}