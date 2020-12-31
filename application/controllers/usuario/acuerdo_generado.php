<?php

/**
 * Controlador para vizualizar acuerdo
 *
 * Calse que muestra las funciones de inicio junto con la 
 * GUI correspondiente al nivel de usuario
 * 
 * @since      1.0
 * @version    1.0
 * @link       /app/home
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class acuerdo_generado extends CI_Controller {

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

        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
        }
         $this->load->model('documento_model');
          $this->load->model('institucion_model');
          $this->load->model('acuerdo_model');
    }
    
    /**
     * Función de mostrar_acuerdo 
     * 
     * Incluye la vista para visualizar acuerdo
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/acuerdo_usuario/mostrar acuerdo
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    
    public function mostrar_acuerdo($acuerdo){

        /**
        Modelo para consultar el rol del usuario que inicio sesión
        */
        $this->load->model('login_model');
         
    
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        //Consultar acuerdos pertenecinetes al usuario
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        //$data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos(110);
        $data['acuerdoActual'] =$acuerdo;
         $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
         $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
                 
           /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_solicitud($id);   
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
         $data['scripts'] = array();
        $data['scripts'][] = 'editarAcuerdo';
        $data['scripts'][] = 'mostrarDocumento';
       
        $data['titulo'] = app_title() . " | Acuerdo";
        //Traer documentos pertenecientes a ese acuerdo y que correspondan a ese usuario
        $data['documentos'] = $this->documento_model->consultar_documentos_acuerdo($this->session->userdata('idusu'),$acuerdo);
        //$data['documentos'] = $this->documento_model->consultar_documentos_acuerdo(110,$acuerdo);
        //se genera aqui el arreglo para los scripts
       
        
        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        $data['show_header'] = TRUE;

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
        $data['breadcrumbs']['titulo'] = "Acuerdo";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
        Invocar la consulta para saber el rol del usuario
        */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/acuerdo_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
        
    }
   

    
}
