<?php
/**
 * Error 404 personalizado
 *
 * Clase que permite el registro de instituciones 
 * para todos lso trámites subsecuentes de la 
 * Dirección de educación desde el portal de 
 * AIDE
 * 
 * @since      1.0
 * 
 * @version    1.0
 * @link       /registro
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage NA 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    /**
     * Función principal por defecto del controlador
     * 
     * Incluye la vista con el formulario de registro que define
     * si el uisuaerio registrante es persona física o moral.
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
        
    }

}

/* End of file registro.php */
/* Location: ./application/controllers/registro.php */
