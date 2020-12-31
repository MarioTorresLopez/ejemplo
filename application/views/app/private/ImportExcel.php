
<?php
/**
 * Vista principal de la aplicación
 *
 * Vista principal de la aplicación que muestra el conjunto de widgets correspondientes 
 * al nivel de usuario, relacionando los fragmentos correspondientes al contenido
 * 
 * @since      1.0
 * @version    1.0
 * @link       /inicio
 * @package    application.views
 * @subpackage app.private
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/controllers/app/inicio.php
 */
?>
<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8">

<!-- stylios y scrips para visualizar los documentos
   -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> 
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body class="fixed-navbar fixed-sidebar">


        <form action="calificaciones/subir" method="POST" enctype="multipart/form-data">
            <div class="row">
                <input type="file" name="excelFile" id="excelFile"/>
                <button class="btn btn-default" id="btnSubmitFile" name="btnSubmitFile">Subir Calificaciones</button>                
                <select name="validador" id="validador">
                    <option value="0">P1</option>
                    <option value="1">P2</option>
                </select>
            </div>
            
            
        </form>
    
    </body>
</html>
