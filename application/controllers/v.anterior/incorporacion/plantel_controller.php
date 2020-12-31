<?php

/**
 * Controlador para la seccion de planteles
 *
 * Clase que carga los modelos y vistas que pertenecen a la seccion de planteles
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
class plantel_controller extends CI_Controller {

    /**
     * Constructor de la clase
     * 
     * Invoca al constrcutor del padre
     * 
     * @since    1.0
     * @version  1.0
     * @internal Se invoca unicamente partir del instanciamiento de la clase
     * @author   CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return   void 
     */ 
    
    public function __construct()
    {
        parent::__construct();
        
        if(!$this->session->userdata('is_login')){
            redirect(base_url."login",'refresh');
        }
    }
    
    public function consultar(){
    	$data = array();
		$this->load->view("plantel_view", $data, FALSE);
    }
     
	public function agregar()
	{
		$data = array();
		$this->load->view("plantelingresar_view", $data, FALSE);
               
	}

	public function editar(){
		$data = array();
		$this->load->view("planteleditar_view", $data, FALSE);
	}

	public function prueba(){
		$data = array();
		$this->load->view("planteles_view", $data, FALSE);
	}

	/**
	 * Función principal por defecto del controlador
	 * 
	 * Incluye la vista para el modulo de gestion de plateles
	 * 
	 * @since 1.0
	 * 
	 * @version 1.0
	 * @link /plantel_controller/gestion
	 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
	 * @return View
	 */

	/*public function gestion(){
		$data = array();
        $data['header']         = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation']     = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/planteles_view', $data, TRUE);
        $data['footer']         = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
	}*/

	/**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista para la seccion de alta de institucion
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /registro_institucion/institucion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function gestion() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Institucion";

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
        $data['breadcrumbs']['titulo'] = "Registro institucion";
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
        $data['app_fragment'] = $this->load->view('area_de_trabajo/planteles_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
}
