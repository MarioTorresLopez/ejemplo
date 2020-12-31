<?php

/**
 * Controlador para la vista acreditacion_view
 *
 * Clase que visualiza la tabla de grupos por institucion
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

class acreditacion_controller extends CI_Controller {

	/**
	 * Función principal por defecto del controlador
	 * 
	 * Incluye la vista de acreditaciones por grupo 
	 * 
	 * @since 1.0
	 * 
	 * @version 1.0
	 * @link /acreditacion_controller/gestion
	 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
	 * @return View
	 */

	public function gestion()
	{
		$data = array();
        $data['header']         = $this->load->view('fragmentos/header', $data, TRUE);
        $data['navigation']     = $this->load->view('fragmentos/navigation', $data, TRUE);
        $data['right_siderbar'] = $this->load->view('fragmentos/right_siderbar', $data, TRUE);
        $data['area_de_trabajo'] = $this->load->view('area_de_trabajo/Acreditacion/acreditacion_view', $data, TRUE);
        $data['footer']         = $this->load->view('fragmentos/footer', $data, TRUE);
        $this->load->view("main_view", $data, FALSE);
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
