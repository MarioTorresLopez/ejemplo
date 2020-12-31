<?php

/**
 * Controlador para imrpimir mapa curricular
 *
 * Mostrara la vista de mapa curricular donde se visualizaran
 *  el listado de materias por periodo 
 * 
 * @since      1.0
 * @version    1.0
 * @link       /app/detalle_mapa_curricular
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */

class imprimir_mapa_curricular extends CI_Controller{
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
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('mapa_curricular_model');
        $this->load->model('materias_model');
        $this->load->model('planestudios_model');
    }
    
    
    public function visualizar_mapa_curricular($idpe) {

        $data = array();
        $data['titulo'] = app_title() . " | Mapa Curricular";
        $data['mapas_curriculares'] = $this->mapa_curricular_model->consultar_mapas_curriculares($idpe);
        $data['datos_pe'] = $this->planestudios_model->consultar_plan_estudio($idpe);
                
        $this->load->view("app/private/fragments/modules/Modulo2/analista_servicios/imprimir_mapa_curricular_view", $data, FALSE);
        
    }
    
}
