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
 * Función que inicializa el uso de jQuery
 *
 * @since 1.0
 * @version 1.0
 * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @return  {void} desaparece la capa del loader
 */
 jQuery(document).ready(function($) {

    /**
     *Funcion de validacion del formnulario Login
     *
     * Funcion asociada al evento submit (boton) del 
     * formulario de Login
     *
     * @since 1.0
     * @version 1.0
     * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return  {void} valida y envia el formulario al home
     *                 de la aplicación
     */
     $("#login-form").submit(function(event) {
        event.preventDefault();
        init_loading();
        window.setTimeout(function () {
            window.location.href= base_url() + "app/inicio/";
        }, 1500);
    });
 });
