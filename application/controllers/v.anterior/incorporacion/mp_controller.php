<?php

/**
 * Controlador para la seccion de mapas curriculares
 *
 * Clase que carga los modelos y vistas que pertenecen a la seccion de mapas curriculares
 * 
 * @since      1.0
 * 
 * @version    1.0
 * @link       /notfound
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage NA 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php ->???
 * @see        ./system/core/Controller.php
 */
class mp_controller extends CI_Controller{
    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista para el modulo de gestion de mapas curriculares
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /mp_controller/gestion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function gestion() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Mapa_curricular/mapacurricular_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    /**
     * Función para cargar la interfaz de edicion de la seccion de mapas curriculares
     * 
     * Incluye la vista para el modulo de edicion de mapas curriculares
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /mp_controller/editar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function editar() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Mapa_curricular/editar_mp_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    /**
     * Función para cargar la interfaz de eliminacion de la seccion de mapas curriculares
     * 
     * Incluye la vista para el modulo de eliminacion de mapas curriculares
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /mp_controller/eliminar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function eliminar() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Mapa_curricular/eliminar_mp_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    

    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista para la seccion de alta de alumnos
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /app/inscripcion/alta_alumnos
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function ges() {
        /**           
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | MP";

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la refeencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = "Prueba";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), array('Otro', '#'), array('Otro mas', '#'), 'Aqui mero');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);

        /**
         * Invoca al fragmento correspondiente al encabezado del sitio       
         */
        $data['app_header'] = $this->load->view('app/private/fragments/main_header', $data, TRUE);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/Mapa_curricular/mapacurricular_view.php', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

}
