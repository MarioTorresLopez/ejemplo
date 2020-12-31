<?php //

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mandarCorreo
 *
 * @author CIDTAI-UTEQ
 */

//Llamado de campos
$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono1'];

//Datos para el correo
$destinatario = "2016313125@uteq.edu.mx";
$asunto = "Contacto desde la SEP";

$carta = "De: $nombre \n";
$carta .= "De: $apellido1 \n";
$carta .= "De: $apellido2 \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono";

//Enviando mensaje

mail($destinatario,$asunto,$carta);





       




?>
