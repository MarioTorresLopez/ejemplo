<?php
/**
 * Controlador para la landing_page 'En construcción'
 *
 * Clase que visualiza el landing_page provisional del sitio
 * 
 * @since 1.0
 * @version 1.0
 * @link   /
 * @global constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package application.controllers
 * @subpackage NA 
 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses ./application/config/autoload.php
 * @see ./system/core/Controller.php
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Coming_soon extends CI_Controller {

	/**
	 * Función principal por defecto del controlador
	 * 
	 * Incluye la vista para el landing 'En construcción'
	 * 
	 * @since 1.0
	 * 
	 * @version 1.0
	 * @link /index
	 * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
	 * @return View
	 */
	public function index()
	{
		$data = array();
		$data['app_title']  = app_title() . " | Aplicación Wreb en Construcción";
		$this->load->view('libs/coming_soon_view', $data, FALSE);		
	}

}

/* End of file coming_soon.php */
/* Location: ./application/controllers/coming_soon.php */