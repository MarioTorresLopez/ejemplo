<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class registrar_folio_aspirante extends CI_Controller {

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
        $this->load->model('evento_model');
        $this->load->model('notificacion_model');
        $this->load->model('propietario_model');
        $this->load->model('checklist_model');
        $this->load->model('documentoxnivel_model');
        $this->load->model('persona_moral_model');
    }

    public function folio_aspirante($idins) {

        /**
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        
        /**
          Invocar la consulta para saber el rol del usuario
         */
        $data['datos_persona_moral'] = $this->persona_moral_model->consultar_personamoral($idins);
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
        
        $data['usuario'] = $this->institucion_model->consultar_institucion_folio($idins);
        $data['datos_prop']= $this->propietario_model->consulta_datos_propietario($idins);
        
        $data['scripts'] = array();
        $data['scripts'][] = 'validarFolio';
        $data['titulo'] = app_title() . " | Registrar expediente";
        $data['analistas'] = $this->evento_model->get_analistas();
        $data['idinsti'] = $idins;

        /**
         * Si el indice show_header se encuentra en TRUE
         * La vista mostrará el encabezado general de la aplicación 
         * Pensado UNICAMENTE PARA LA SECCION DE INICIO
         */
        //$data['show_header'] = FALSE;

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
        $data['breadcrumbs']['titulo'] = "Registrar expediente";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url().'app/inicio'), array('Trámites de acuerdo', '#'), array('Instituciones', base_url().'analista/gestion_institucion/gestion_instituciones'), 'Registrar expediente');

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
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/analista/registro_folio_aspirante_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function registrar_folio() {

        $this->form_validation->set_rules('numero_folio', 'numero_folio', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {
            
            $idinst = $this->input->post('id_inst');
            $idusu = $this->input->post('id_usu');
            $numfolio = $this->input->post('numero_folio');
            $idanalista = $this->input->post('idanalista');
            $idnivel = $this->input->post('idNivel');
            $hoy = date("Y/m/d");
            $tipopersona = $this->input->post('persona');

            //Validamos si el número de folio ya existe en la base de datos
            $variable = $this->institucion_model->existente_folio($numfolio);

            if (!is_null($variable)) {
                
                $this->session->set_flashdata('folio_incorrecto', 'El folio ya ha sido asignado a otro usuario.');
                redirect(base_url() . 'analista/registrar_folio_aspirante/folio_aspirante/' . $idusu, 'refresh');
                
            } else {

                
                $arr_notificacion2 = array(
                    "tipo" => 7,
                    "leido" => 0,
                    "idusuarioorigen" => $this->session->userdata('idusu'),
                    "idrol" => 2,
                    "idusuariodestino" => $idanalista,
                    "fecha" => date('Y-m-d H:i:s')
                );
                $this->notificacion_model->crear_notificacion($arr_notificacion2);

                $this->institucion_model->asignar_solicitud($idinst, $numfolio, $hoy,$idanalista);
                
//                $documentos = $this->documentoxnivel_model->consultar_documentos($tipoPersona, $idnivel, $idtipoproceso)
                $documentos = $this->documentoxnivel_model->consultar_documentos($tipopersona, $idnivel, 1);
                
                foreach ($documentos as $doc)
                {
                    $arr_reg_checklist = array();
                    $arr_reg_checklist['folio'] = $numfolio;
                    $arr_reg_checklist['iddocsol'] = $doc->iddocumento;
                    $arr_reg_checklist['idusuarioenv'] = 0;
                    $arr_reg_checklist['idusuariorec'] = 0;
                    $arr_reg_checklist['estatus'] = 0;

                    $this->checklist_model->crear_checklist($arr_reg_checklist);
                }
                redirect(base_url() . 'analista/gestion_institucion/gestion_instituciones', 'refresh');
//                redirect(base_url() . 'app/eventos/index/'.$idinst, 'refresh');
                
                
            }
             
        }
    }

}
