<?php
/**
 * Error 404 personalizado
 *
 * Clase que sobreescribe el error 404 (NotFound) con una vista
 * personalizada.
 * 
 * @since      1.0
 * 
 * @version    1.0
 * @link       /notfound
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage NA 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller {

	/**
	 * Función principal por defecto del controlador
	 * 
	 * Incluye la vista para el error http 404.
	 * 
	 * @since   1.0
	 * 
	 * @version 1.0
	 * @link    /notfound/index
	 * @author  CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
	 * @return  View
	 */
	public function index()
	{
		$data = array();		
		$data['app_title']  = app_title() . " | Registro";
		$this->load->view('app/public/registro_view.php', $data, FALSE);
	}
	
}

/* End of file notfound.php */
/* Location: ./application/controllers/notfound.php */
