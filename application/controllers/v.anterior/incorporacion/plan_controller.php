<?php

/**
 * Controlador para la seccion de planes de estudios
 *
 * Clase que carga los modelos y vistas que pertenecen a la seccion de planes de estudios
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
class plan_controller extends CI_Controller{

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
    
    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista para el modulo de gestion de planes de estudios
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /plan_controller/gestion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function gestion() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Plan_estudios/planestudios_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    /**
     * Función para cargar la interfaz de edicion de la seccion de planes de estudios
     * 
     * Incluye la vista para el modulo de edicion de planes de estudios
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /plan_controller/editar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function editar() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Plan_estudios/editar_plan_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    /**
     * Función para cargar la interfaz de eliminacion de la seccion de planes de estudios
     * 
     * Incluye la vista para el modulo de eliminacion de planes de estudios
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /plan_controller/eliminar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function eliminar() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Plan_estudios/eliminar_plan_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    
    /**
     * Función para cargar la interfaz del detalle de la seccion de planes de estudios
     * 
     * Incluye la vista para el modulo del detalle  de planes de estudios
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /plan_controller/detalle
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function detalle() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Plan_estudios/detalle_plan_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    
    /**
     * Función para cargar la interfaz de eliminar el detalle de la seccion de planes de estudios
     * 
     * Incluye la vista para el modulo de eliminacion del detalle  de planes de estudios
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /plan_controller/detalle_eliminar
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */

    public function detalle_eliminar() {
        $data = array();
        $data['header'] = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation'] = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Plan_estudios/detalle_eliminacion_plan_view', $data, TRUE);
        $data['footer'] = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
    }
    

}
