<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of micuenta
 *
 * @author marioeduardo
 */
class micuenta extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('institucion_model');
        $this->load->model('acuerdo_model');
        $this->load->model('login_model');
        $this->load->model('notificacion_model');
        $this->load->model('usuario_model');
        $this->load->model('roles_model');
    }
    
    public function index() {
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $id = $this->session->userdata('idusu');
        
        /*
          array de los datos que se van a guardar
         *          */
        $data = array();
        $data['scripts'] = array();
        $data['scripts'][] = 'micuenta';
        $data['institucion_solicitud'] = $this->institucion_model->consultar_institucion_solicitud($id);
        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        //Consultar acuerdos pertenecinetes al usuario
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        $data['titulo'] = app_title() . " | Mi cuenta";
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
        $data['datoscuenta'] = $this->usuario_model->cuenta($this->session->userdata('idusu'));
//        $texto = "5e8667a439c68f5145dd2fcbecf02209";
//
//        function desencriptar($texto) {
//            $key = '87654321';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
//            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($texto), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
//            return $decrypted;
//        }
//        $tt=desencriptar();
//        $msg = 'My secret message';
//        $key = 'super-secret-key';

//        $encrypted_string = $this->encrypt->encode($msg, $key);

        //$encrypted_string = 'APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84';

//        $plaintext_string = $this->encrypt->decode($encrypted_string);
//        $data['des'] = $plaintext_string;

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
        $data['breadcrumbs']['titulo'] = "Mi cuenta";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'),'Inicio');

        /**
         * el indice app_right_sidebar indica
         * la vista o fragmento en cuestion cuenta con 
         * menu lateral derecho o no (en caso de no contar desaparecerá el menu 'news')
         * delhgeader
         */
        $data['app_right_sidebar'] = $this->load->view('app/private/fragments/main_right_sidebar', $data, TRUE);
        
        /*
         * Invocar la consulta de los modulos que tiene dicho usuario (menu izquierdo)
         */
        //$id = $this->session->userdata('idusu');
        //$data['menus'] = $this->login_model->cargar_modulos($id);

        /*
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        

        /*
         * Utilizar un foreach para recorrer el rol y 
         * en una matriz almacenar los permisos 
         */
//                foreach ($data['valor'] as $aux) {
//                    $data['modulos'][] = $this->login_model->cargar_modulos2($aux->rol);
//                }
        //echo $data['valor']->rol;
        $a = $data['valor']->rol;
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/micuenta_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function editar_post() {
        $correo = $this->input->post('correo1');
        $password = md5($this->input->post('password1'));
        $id = $this->session->userdata('idusu');

        $variable = $this->roles_model->existente_usuario_rol($correo, $id);

        if (!is_null($variable)) {
            $this->session->set_flashdata('rol_incorrecta', 'El correo ya existe');
            redirect(base_url() . 'app/micuenta', 'refresh');
        } else {
            
        $arr_usuario = array(
                "correousu" => $correo,
                "passwordusu" => $password,
                "usuariomodificacion" => $this->session->userdata('idusu'),
                "fechamodificacion" => date('Y-m-d')
            );

            $this->usuario_model->editar_usuario($id,$arr_usuario);
            redirect(base_url() . "app/inicio", 'refresh');
        }
    }

}
