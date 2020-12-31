<?php

/**
 * Controlador para la vista kardex_view
 *
 * Clase que visualiza el kardex del alumno seleccionado
 * 
 * @since 1.0
 * @version 1.0
 * @link   /
 * @global constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package application.controllers
 * @subpackage NA 
 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses ./application/config/autoload.php ???
 * @see ./system/core/Controller.php  
  */

class kardex_controller extends CI_Controller {

        /**
	 * Función gestion
	 * 
	 * Incluye la vista de avances del alumno e imprimir kardex 
	 * 
	 * @since 1.0
	 * 
	 * @version 1.0
	 * @link /kardex_controller/gestion
	 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
	 * @return View
	 */
    
	public function gestion()
	{
		$data = array();
		$data['titulo'] = app_title() . " | Kardex";
        $data['header']         = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation']     = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Acreditacion/kardex_view', $data, TRUE);
        $data['footer']         = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */ 