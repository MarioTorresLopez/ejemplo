/**
 * funciones genericas de todo el fron del sitio
 * 
 * @since    1.0
 * @version  1.0
 * @author   CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses     ./static/scripts/app/libs/jquery-3.3.1.min.js
 * @internal El uso de este script depende de la vista que 
 *           invoque al resurso por medio de las etiquetas
 *           <script></script> 
 */

/**
  * Función inicial de jQuery
  *
  * @since 1.0
  * @version 1.0
  * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
  * @return  {void} 
  */
  jQuery(document).ready(function($) {

    /**
    * Funcion que muestra el loader antes de ejecutar 
    * cualquier atributo href
    *
    * @since 1.0
    * @version 1.0
    * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
    * @return  {void} aparece la capa del loader
    */
    $(document).on("click", ".loader-link", function(event) {
      event.preventDefault();
        var this_e = $(this);        
        if(this_e.attr("href") != "#") {
            $("#loader-wrapper, .loaderImageWrapper").fadeIn(500, function () {
                window.location.href = this_e.attr("href");
            });
        }
     });
  });

 /**
  * Funcion que desaparece el loader del sitio
  *
  * @since 1.0
  * @version 1.0
  * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
  * @return  {void} desaparece la capa del loader
  */
  function loading() {
  	window.setTimeout(function () {
  		$("#loader-wrapper, .loaderImageWrapper").fadeOut(500);
  	}, 500);
  }

/**
  * Funcion que aparece el loader del sitio
  *
  * @since 1.0
  * @version 1.0
  * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
  * @return  {void} aparece la capa del loader
  */
  function init_loading() {
    $("#loader-wrapper, .loaderImageWrapper").fadeIn(500);    
  }
 
