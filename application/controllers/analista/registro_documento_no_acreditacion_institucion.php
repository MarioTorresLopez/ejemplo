<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro_documento_no_acreditacion_institucion
 *
 * @author CIDTAI
 */
class registro_documento_no_acreditacion_institucion extends CI_Controller{
    
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
        $this->load->model('login_model');
        $this->load->model('institucion_model');
        $this->load->model('notificacion_model');
        
    }
    
    
    public function registrar_documento($idins) {
        
        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        
        $data = array();
        
        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        //Validar las notificaciones por usuario
        $a = $data['valor']->rol;
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        
        $data['institucion'] = $this->institucion_model->consultar_institucion_folio($idins);
        $data['scripts'] = array();
        $data['scripts'][] = 'validarDocumentoNoAcreditacion';
        
        /*
         * parametro  que se manda a la vista para vfisualizar el 
         * titulo de la pagina
         */
        $data['titulo'] = app_title() . " | Cancelar incorporación de institución";

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = TRUE;

        /**
         * Los breadcrumbs son los elementos que muestran 
         * la referencia entra cada sección, y la descendencia 
         * de los elementos 
         * Si el arreglo breadcrumbs NO EXISTE, no 
         * se mostrará ninguna sección de encabezado de la aplicación
         */
        $data['breadcrumbs'] = array();

        /**
         * Indica el titulo de la sección dentro del panel superior
         */
        $data['breadcrumbs']['titulo'] = " Cancelar incorporación de institución";
        $data['breadcrumbs']['subtitulo'] = "";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), 'Aceptación de aspirantes');

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
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        //$data['menus'] = $this->login_model->cargar_modulos();

        /**
        Invocar la consulta para saber el rol del usuario
        */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        
        $a=$data['valor']->rol;
        $data['modulos']= $this->login_model->cargar_modulos2($a);
        
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_documento_no_acreditacion_institucion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
        
    }
    
    public function subir_documentacion_no_acre_inco() {

        $id_institucion = $this->input->post('id_institucion');
        $id_usuario = $this->input->post('id_usuario');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de no acreditación
        $carpeta_no_acreditacion = 'static/no_acreditacion';

        //URL que ayuda a crear una carpeta del documento que no acredita la incorporación 
        //identificando la carpeta por el id del acuerdo
        $carpeta_no_acreditacion_generado = 'static/no_acreditacion/no_acreditacion_' . $id_institucion;

        //URL que genera la carpeta de documento a registrar en el sistema 
        // Documento de No Acreditación Para Incorporación
        $carpeta_documento_DNAPI = 'static/no_acreditacion/no_acreditacion_' . $id_institucion . '/DNAPI';


        if (!file_exists($carpeta_no_acreditacion)) {

            mkdir($carpeta_no_acreditacion, 0777, TRUE);

            if (!file_exists($carpeta_no_acreditacion_generado)) {

                mkdir($carpeta_no_acreditacion_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DNAPI)) {

                    mkdir($carpeta_documento_DNAPI, 0777, TRUE);

                    //Enviar archivo de plantilla de personal
                    $no_acre_inco = 'no_acre_inco';
                    $config['upload_path'] = 'static/no_acreditacion/no_acreditacion_' . $id_institucion . '/DNAPI/';
                    $config['file_name'] = $id_usuario . '-' . $id_institucion . '-' . $sin_codigo . '-DNAPI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($no_acre_inco)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/registro_documento_no_acreditacion_institucion/registrar_documento/' . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_no_acreditacion_generado)) {

                mkdir($carpeta_no_acreditacion_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DNAPI)) {

                    mkdir($carpeta_documento_DNAPI, 0777, TRUE);

                    //Enviar archivo de plantilla de personal
                    $no_acre_inco = 'no_acre_inco';
                    $config['upload_path'] = 'static/no_acreditacion/no_acreditacion_' . $id_institucion . '/DNAPI/';
                    $config['file_name'] = $id_usuario . '-' . $id_institucion . '-' . $sin_codigo . '-DNAPI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($no_acre_inco)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/registro_documento_no_acreditacion_institucion/registrar_documento/' . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_DNAPI)) {

                    mkdir($carpeta_documento_DNAPI, 0777, TRUE);

                    //Enviar archivo de plantilla de personal
                    $no_acre_inco = 'no_acre_inco';
                    $config['upload_path'] = 'static/no_acreditacion/no_acreditacion_' . $id_institucion . '/DNAPI/';
                    $config['file_name'] = $id_usuario . '-' . $id_institucion . '-' . $sin_codigo . '-DNAPI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($no_acre_inco)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/registro_documento_no_acreditacion_institucion/registrar_documento/' . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                } else {

                    //Enviar archivo de plantilla de personal
                    $no_acre_inco = 'no_acre_inco';
                    $config['upload_path'] = 'static/no_acreditacion/no_acreditacion_' . $id_institucion . '/DNAPI/';
                    $config['file_name'] = $id_usuario . '-' . $id_institucion . '-' . $sin_codigo . '-DNAPI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($no_acre_inco)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/registro_documento_no_acreditacion_institucion/registrar_documento/' . $id_institucion, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                }
            }
        }
    }
    
    
}
