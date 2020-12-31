<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of recuperar_password
 *
 * @author UTEQ
 * 
 * * Clase que visualiza la vista de  recuperar contraseña 
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
class recuperar_password extends CI_Controller {

    //put your code here

    public function index() {
        

        $data = array();
        /*
         * para metro que indica que el controlador usa un archivo .js para 
         * realizar una funcion en la vista por medio de jQuery
         * @uses ./static/admin/js/alerts_recuperar_passw
         * 
         */
        $data['scripts'] = array();
        $data['scripts'][] = 'alerts_recuperar_passw';
        /*
         * parameto que se manda a la  vista para mostrar el titulo
         */
        $data['titulo'] = app_title() . " | Recuperar contraseña";
       /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $data = $this->load->view('app/public/usuario/recuperar_password_view', $data, FALSE);
    }

}
