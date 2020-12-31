<?php
/**
 * Controlador para las vistas de registro: institución, plantel, plan de estudios y mapa curricular
 *
 * Clase que visualiza los formularios que el usuario aspirante deberá llenar para generar un acuerdo
 * 
 * @since       1.0
 * @version     1.0
 * @link        app/home
 * @global      constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package     application.controllers
 * @subpackage  app 
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/config/autoload.php 
 * @see         ./system/core/Controller.php  
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class tramite extends CI_Controller {

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
    //aqui se encuentra todos los models que manda a llamr pra las consultas qu se requieran
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('nivel_educativo_model');
        $this->load->model('municipio_model');
        $this->load->model('estado_model');
        $this->load->model('institucion_model');

        $this->load->model('checklist_model');
        $this->load->model('observacion_model');
        $this->load->model('plantel_model');
        $this->load->model('observacion_model');
        $this->load->model('documento_model');
         $this->load->model('planestudios_model');
          $this->load->model('acuerdo_model');
          $this->load->model('persona_moral_model');
        $this->load->model('oirnotificacion_model');
        $this->load->model('notificacion_model');
          $this->load->model('modalidad_model');
    }

    /**
     * Función de registro_institucion 
     * 
     * Incluye la vista para visualizar los datos 
     * solicitados para registrar una institución.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/tramite/registro_institucion
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function registro_institucion() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('institucion_model');


        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['municipios'] = $this->municipio_model->consultar_municipios();
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));

        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['estados'] = $this->estado_model->consultar_estados();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();
        $data['queretaro'] = $this->estado_model->consultar_estado_queretaro();
        $data['scripts'] = array();

        $data['scripts'][] = 'validacion_registro_institucion';
        $data['titulo'] = app_title() . " | Institución";

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
        $data['breadcrumbs']['titulo'] = "Institución";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Registro institución');

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
         $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        if($a!=2 && $a!=3){
            $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a);
        }
        else{
           $data['notificaciones'] =  $this->notificacion_model->get_notificaciones($a,$id); 
        }
        
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

        

//        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/registro_institucion_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        //echo $data['valor'];
        $this->load->view('app/private/main_view.php', $data, FALSE);
        /*
         * se van a traer todos los models
         */
    }

    //funcion para crear la institucion
    public function crear_institucion() {
        //Validamos los campos del formulario para institucion
        $this->form_validation->set_rules('persona', 'persona', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idnivel', 'idnivel', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmodalidad', 'idmodalidad', 'trim|required|xss_clean');
        $this->form_validation->set_rules('plan_estudios', 'plan_estudios', 'trim|required|xss_clean');

        $this->form_validation->set_rules('nombre1_institucion', 'terna1', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nombre2_institucion', 'terna2', 'trim|xss_clean');
         $this->form_validation->set_rules('nombre3_institucion', 'terna3', 'trim|xss_clean');
        $this->form_validation->set_rules('calle_institucion', 'calle', 'trim|xss_clean');
        $this->form_validation->set_rules('telefono_institucion', 'telefono', 'trim|xss_clean');
        $this->form_validation->set_rules('no_interior_institucion', 'noint', 'trim|xss_clean');
        $this->form_validation->set_rules('no_exterior_institucion', 'noext', 'trim|xss_clean');
        $this->form_validation->set_rules('colonia_institucion', 'colonia', 'trim|xss_clean');
        $this->form_validation->set_rules('cp_institucion', 'cp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idestado_institucion', 'idestado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmunicipio_institucion', 'idmunicipio', 'trim|required|xss_clean');
        


        //validacion del formularion para propietario
        $this->form_validation->set_rules('apellido1_propietario', 'apellido1', 'trim|xss_clean');
        $this->form_validation->set_rules('apellido2_propietario', 'apellido2', 'trim|xss_clean');
        $this->form_validation->set_rules('nombre_propietario', 'nompropietario', 'trim|xss_clean');
        $this->form_validation->set_rules('correo_propietario', 'correo', 'trim|xss_clean');
        $this->form_validation->set_rules('rfc_propietario', 'rfc', 'trim|xss_clean');
        $this->form_validation->set_rules('telefono_propietario', 'telefono', 'trim|xss_clean');
        
        //validacion del formulario para oirnotifiacion
        $this->form_validation->set_rules('calle_oirnotificacion', 'calle', 'trim|required|xss_clean');
        $this->form_validation->set_rules('no_interior_oirnotificacion', 'noint', 'trim|xss_clean');
        $this->form_validation->set_rules('no_exterior_oirnotificacion', 'noext', 'trim|xss_clean');
        $this->form_validation->set_rules('colonia_oirnotificacion', 'colonia', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cp_oirnotificacion', 'cp', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idestado_oirnotificacion', 'idestado', 'trim|required|xss_clean');
        $this->form_validation->set_rules('idmunicipio_oirnotificacion', 'idmunicipio', 'trim|required|xss_clean');

        //validacion del fromulario para representante
//        $this->form_validation->set_rules('apellido1_representante', 'apellido1', 'trim|xss_clean');
//        $this->form_validation->set_rules('apellido2_representante', 'apellido2', 'trim|xss_clean');
//        $this->form_validation->set_rules('nombre_representante', 'nombre', 'trim|xss_clean');        
//        $this->form_validation->set_rules('telefono_representante', 'telefono', 'trim|xss_clean');        
        //validacon del formulario para persona moral
       $this->form_validation->set_rules('asociacion', 'nombre', 'trim|xss_clean');
        
        //validar los datos
        if ($this->form_validation->run()) {
            
          
            
     
         
            //array para insertar institucion
            $arr_institucion = array();
            $arr_institucion['persona'] = $this->input->post('persona');
            $arr_institucion['idnivel'] = $this->input->post('idnivel');
              $arr_institucion['idmodalidad'] = $this->input->post('idmodalidad');
            $arr_institucion['plan_estudios'] = $this->input->post('plan_estudios');$arr_institucion['programa'] = $this->input->post('programa');
            $arr_institucion['terna1'] = $this->input->post('nombre1_institucion');
            $arr_institucion['terna2'] = $this->input->post('nombre2_institucion');
            $arr_institucion['terna3'] = $this->input->post('nombre3_institucion');
            $arr_institucion['calle'] = $this->input->post('calle_institucion');
            $arr_institucion['telefono'] = $this->input->post('telefono_institucion');
            $arr_institucion['noint'] = $this->input->post('no_interior_institucion');
            $arr_institucion['noext'] = $this->input->post('no_exterior_institucion');
            $arr_institucion['colonia'] = $this->input->post('colonia_institucion');
            $arr_institucion['cp'] = $this->input->post('cp_institucion');
            $arr_institucion['idestado'] = $this->input->post('idestado_institucion');
            $arr_institucion['idmunicipio'] = $this->input->post('idmunicipio_institucion');
            $arr_institucion['idusuario'] = $this->session->userdata('idusu');
            $hoy = date("Y/m/d");
            $arr_institucion['fechacreacion'] = $hoy;
            /*
             * Folio automatico
             */
            $pru=date('Y');
            $data['verificarexp']=$this->institucion_model->consultar_expediente($pru);
            if(!is_null($data['verificarexp'])){
                $ult=$data['verificarexp']->expediente;
                $definitivo=$ult+1;
                $arr_institucion['expediente']=$definitivo;
            }
            else{
                $arr_institucion['expediente']=1;
            }
            $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
            $this->load->model('institucion_model');
            $this->institucion_model->crear_institucion_solicitud($arr_institucion);
            
              //array para insertar en oirnotifiacion
         
            $arr_oirnotificacion = array();
            $arr_oirnotificacion['calle'] = $this->input->post('calle_oirnotificacion');
            $arr_oirnotificacion['noint'] = $this->input->post('no_interior_oirnotificacion');
            $arr_oirnotificacion['noext'] = $this->input->post('no_exterior_oirnotificacion');
            $arr_oirnotificacion['colonia'] = $this->input->post('colonia_oirnotificacion');
            $arr_oirnotificacion['telefono'] = $this->input->post('telefono_oirnotificacion');
            $arr_oirnotificacion['idmunicipio'] = $this->input->post('idmunicipio_oirnotificacion');
            $arr_oirnotificacion['idestado'] = $this->input->post('idestado_oirnotificacion');
            $arr_oirnotificacion['estatus'] = 1;
            $arr_oirnotificacion['cp'] = $this->input->post('cp_oirnotificacion');
          
            $this->load->model('oirnotificacion_model');
            $this->oirnotificacion_model->crear_oirnotificacion($arr_oirnotificacion);
          
           
            //array para insertar propietario
            $arr_propietario = array();
            $arr_propietario['nompropietario'] = $this->input->post('nombre_propietario');
            $arr_propietario['apellido1'] = $this->input->post('apellido1_propietario');
            $arr_propietario['apellido2'] = $this->input->post('apellido2_propietario');
            $arr_propietario['correo'] = $this->input->post('correo_propietario');
            $arr_propietario['telefono'] = $this->input->post('telefono_propietario');
            $arr_propietario['estatus'] = 1;
            $arr_propietario['rfc'] = $this->input->post('rfc_propietario');
             if ($this->input->post('persona') == 1) {
            $this->load->model('propietario_model');
            $this->propietario_model->crear_propietario($arr_propietario);
             }
           
             
             // array para insertar en representante
               $ap1r = $_POST['apellido1_representante'];
            $ap2r = $_POST['apellido2_representante'];
            $nomr = $_POST['nombre_representante'];
            $telr = $_POST['telefono_representante'];
            
            $indiceArr = 0;
            
            foreach ($ap1r as $ap1) {
                
         

                $this->load->model('representante_model');
                $arr_repre = array();
                $arr_repre['apellido1']=$ap1r[$indiceArr];
                $arr_repre['apellido2']=$ap2r[$indiceArr];
                $arr_repre['nombre']=$nomr[$indiceArr];
                $arr_repre['telefono']=$telr[$indiceArr];
                if($indiceArr!=null){
                //$this->representante_model->crear_representante($arr_repre);
                $indiceArr++;
                }

                            
            }
            //array para insertar en persona moral
            $arr_moral['nombre'] = $this->input->post('asociacion');
               
                
            if ($this->input->post('persona') == 0) {
                $this->load->model('persona_moral_model');
                $this->persona_moral_model->crear_persona_moral($arr_moral);
            }
           
            
            $data['mayor']=$this->institucion_model->mayor();
            $idinsti=$data['mayor']->id;
            $rrr="usuario/tramite/documento_institucion_aspirante/".$idinsti;
            
            $arr_notificacion = array(
            "tipo" => 3,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 12,
            "idusuariodestino" => null,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
           redirect(base_url() . $rrr, 'refresh');
//           redirect(base_url()."usuario/tramite/documento_institucion_aspirante/".$idinsti, 'refresh');
//            echo $rrr;
        } else {
            echo validation_errors();
        }
    }

    //funcion para ver los datos de la solicitud para dar de alta una institucion 
    public function datos_solicitud_institucion() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('institucion_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $id = $this->session->userdata('idusu');
        $data = array();
        $data = array();
        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        $data['institucion_solicitud'] = $this->institucion_model->consultar_institucion_solicitud($id, $idinsti);
        $data['institucion_solicitud_aceptacion'] = $this->institucion_model->consultar_institucion_aceptacion($id, $idinsti);
        $data['datos_notificacion']= $this->oirnotificacion_model->consultar_oirnotificacion($idinsti);
        $data['titulo'] = app_title() . " | Datos de Solicitud";
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
         $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
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
        $data['breadcrumbs']['titulo'] = " Datos de Solicitud";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/datos_solicitud_institucion_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    //funcion para ver los datos de la solicitud para dar de alta una institucion 
    public function documento_institucion_aspirante($idinsti) {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');
        $this->load->model('institucion_model');
          $this->load->model('planestudios_model');
          $this->load->model('evento_model');
          $this->load->model('propietario_model');
          $this->load->model('representante_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $id = $this->session->userdata('idusu');


        /*array de los datos que se van a guardar */

        $data = array();
        $data['institucion_solicitud_menu'] = $this->institucion_model->consultar_institucion_aceptacion($id);
        $data['institucion_solicitud'] = $this->institucion_model->consultar_institucion_solicitud($id, $idinsti);
         $data['institucion_solicitud_aceptacion'] = $this->institucion_model->consultar_institucion_aceptacion($id, $idinsti);
         $data['datos_prop']= $this->propietario_model->consulta_datos_propietario($idinsti);
         $data['datos_repre']= $this->representante_model->consultar_datos_representante($idinsti);
        $data['datos_notificacion']= $this->oirnotificacion_model->consultar_oirnotificacion($idinsti);
        $data['datos_persona_moral']= $this->persona_moral_model->consultar_personamoral($idinsti);
        // $idinsti = $this->input->post('idinsti');
        $data['plan_estudios'] = $this->planestudios_model->consultar_planestudios($idinsti);
     $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
 
        //este es para ver si tiene alguna cita pendiente
        $data['verifcitas'] = $this->evento_model->get_verificar($idinsti);
        // para visualizar el nombre del analista que le corresponde su cita, yse muestre en la notificacion
        if(!is_null($data['verifcitas'])){
            $data['analistacita']= $this->notificacion_model->nombre_analista($data['verifcitas']->idanalista);
        }
        $data['solicitudevento'] = $idinsti;

        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['consultarcomentario1'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 1);
        $data['consultarcomentario2'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 2);
        $data['consultarcomentario3'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 3);
        $data['consultarcomentario33'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 33);
        $data['consultarcomentario15'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 15);
        $data['consultarcomentario4'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 4);
        $data['consultarcomentario26'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 26);
        $data['consultarcomentario5'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 5);
        $data['consultarcomentario13'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 13);
        $data['consultarcomentario58'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 58);
        $data['consultarcomentario66'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 66);
        $data['consultarcomentario68'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 68);
        $data['consultarcomentario62'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 62);
        $data['consultarcomentario64'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 64);
        $data['consultarcomentario14'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 14);
        $data['consultarcomentario59'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 59);
        $data['consultarcomentario18'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 18);
        $data['consultarcomentario69'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 69);
        $data['consultarcomentario19'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 19);
        $data['consultarcomentario21'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 21);
        $data['consultarcomentario28'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 28);
        $data['consultarcomentario61'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 61);
        $data['consultarcomentario16'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 16);
        $data['consultarcomentario63'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 63);
        $data['consultarcomentario23'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 23);
        $data['consultarcomentario65'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 65);
        $data['consultarcomentario6'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 6);
        $data['consultarcomentario7'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 7);
        $data['consultarcomentario9'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 9);
        $data['consultarcomentario8'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 8);
        $data['consultarcomentario11'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 11);
        $data['consultarcomentario56'] = $this->observacion_model->consultar_comentarios($this->session->userdata('idusu'), 56);

        $data['scripts'] = array();
        $data['scripts'][] = 'usuario_documento_institucion';
        $data['scripts'][] = 'subir_plan_estudios';
        $data['titulo'] = app_title() . " | Checklist de Documentos";
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
        $data['breadcrumbs']['titulo'] = " Documentos Solicitados";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Documentos');

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }
        
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/documento_institucion_aspirante_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /*
     * funcion para crear la carpeta y plan de estudios
     */

    public function registro_plan() {
/* GUARDAR PDF DE PLAN DE ESTUDIOS   */
        /* obtener el usuario conectado */
        $id_usuario = $this->session->userdata('idusu');
        $idinsti = $this->input->post('idinsti');
        $data[]= array();
        $this->load->model('planestudios_model');
        $data['plan_estudios'] = $this->planestudios_model->consultar_planestudios($idinsti);
        
        $carpeta_aspirante = 'static/aspirante';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_aspirante_plan = 'static/aspirante/plan_' . $id_usuario;
        /* programacion para guardar */
        if (!file_exists($carpeta_aspirante)) {

            mkdir($carpeta_aspirante, 0777, TRUE);
        
            
            if (!file_exists($carpeta_aspirante_plan)) {

                mkdir($carpeta_aspirante_plan, 0777, TRUE);
                
                //Enviar archivo con la siguiente nomenclatura
                $plan_estudios_asp = 'plan_subir';
                $config['upload_path'] = 'static/aspirante/plan_' . $id_usuario;
                $config['file_name'] =  $id_usuario . '-plan_estudios'.'-' . $idinsti ;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);
                // es para guardr el documento si existe lo redirecciona de nuevo ys ino se guarda
                
                if (!$this->upload->do_upload($plan_estudios_asp)) {
                    
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                   
                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    
                   
                    
                    $nombredocumento = $id_usuario . '-plan_estudios'.'-' . $idinsti ;

                    $arr_reg_documento = array();
                    $arr_reg_documento['nomplanestudios'] = $nombredocumento;
                    $arr_reg_documento['idinstitucion'] = $idinsti;
                    $hoy = date("Y/m/d");
                    $arr_reg_documento['fechamodificacion'] = $hoy;
                     $id_usuario = $this->session->userdata('idusu');
                     $arr_reg_documento['usuariomodificacion'] = $id_usuario;
                    
                    $this->documento_model->registrar_plan($arr_reg_documento);

                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                   
                    
                } 
                 
                 
                 
            }else{
                //Enviar archivo con los respectivos datos
                $plan_estudios_asp = 'plan_subir';
                $config['upload_path'] = 'static/aspirante/plan_' . $id_usuario;
                $config['file_name'] =  $id_usuario . '-plan_estudios'.'-' . $idinsti ;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);
                  // es para guardr el documento si existe lo redirecciona de nuevo ys ino se guarda
                if (!$this->upload->do_upload($plan_estudios_asp)) {
                    
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                   
                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                     
                   
                    
                    $nombredocumento = $id_usuario . '-plan_estudios'.'-' . $idinsti ;

                    $arr_reg_documento = array();
                    $arr_reg_documento['nomplanestudios'] = $nombredocumento;
                    $arr_reg_documento['idinstitucion'] = $idinsti;
                    $hoy = date("Y/m/d");
                    $arr_reg_documento['fechamodificacion'] = $hoy;
                     $id_usuario = $this->session->userdata('idusu');
                     $arr_reg_documento['usuariomodificacion'] = $id_usuario;
                    
                    $this->documento_model->registrar_plan($arr_reg_documento);

                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                   
                    
                } 
            }
            
        } else {
          if (!file_exists($carpeta_aspirante_plan)) {

                mkdir($carpeta_aspirante_plan, 0777, TRUE);
                
                //Enviar archivo 
                $plan_estudios_asp = 'plan_subir';
                $config['upload_path'] = 'static/aspirante/plan_' . $id_usuario;
                $config['file_name'] =  $id_usuario . '-plan_estudios'.'-' . $idinsti ;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($plan_estudios_asp)) {
                    
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                   
                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                    
                   
                    
                    $nombredocumento = $id_usuario . '-plan_estudios'.'-' . $idinsti ;

                    $arr_reg_documento = array();
                    $arr_reg_documento['nomplanestudios'] = $nombredocumento;
                    $arr_reg_documento['idinstitucion'] = $idinsti;
                    $hoy = date("Y/m/d");
                    $arr_reg_documento['fechamodificacion'] = $hoy;
                     $id_usuario = $this->session->userdata('idusu');
                     $arr_reg_documento['usuariomodificacion'] = $id_usuario;
                    
                    $this->documento_model->registrar_plan($arr_reg_documento);

                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                   
                    
                } 
                 
                 
                 
            }else{
                //Enviar archivo 
                $plan_estudios_asp = 'plan_subir';
                $config['upload_path'] = 'static/aspirante/plan_' . $id_usuario;
                $config['file_name'] =  $id_usuario . '-plan_estudios'.'-' . $idinsti ;
                $config['allowed_types'] = 'pdf';
                $config['max_size'] = '50000';
                $config['max_width'] = '2000';
                $config['max_height'] = '2000';

                $this->load->library('upload', $config);
                
                if (!$this->upload->do_upload($plan_estudios_asp)) {
                    
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                  
                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                } else {
                    $data = array('upload_data' => $this->upload->data());
                   
                   
                    
                    $nombredocumento = $id_usuario . '-plan_estudios'.'-' . $idinsti ;

                    $arr_reg_documento = array();
                    $arr_reg_documento['nomplanestudios'] = $nombredocumento;
                    $arr_reg_documento['idinstitucion'] = $idinsti;
                    $hoy = date("Y/m/d");
                    $arr_reg_documento['fechamodificacion'] = $hoy;
                     $id_usuario = $this->session->userdata('idusu');
                     $arr_reg_documento['usuariomodificacion'] = $id_usuario;
                    
                    $this->documento_model->registrar_plan($arr_reg_documento);

                   redirect(base_url() . "usuario/tramite/documento_institucion_aspirante/" . $idinsti, 'refresh');
                   
                    
                } 
            }
        }
       
        
    }

    /**
     * Función de registro_plantel
     * 
     * Incluye la vista para visualizar los datos 
     * solicitados para registrar un plantel
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/tramite/registro_plantel
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function registro_plantel() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Plantel";

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
        $data['breadcrumbs']['titulo'] = "Plantel";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/registro_plantel_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función de registro_plan_estudio
     * 
     * Incluye la vista para visualizar los datos 
     * solicitados para registrar un plan de estudio
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/tramite/registro_plan_estudio
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function registro_plan_estudios() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Plan de estudios";
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
         $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
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
        $data['breadcrumbs']['titulo'] = "Plan de estudios";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/registro_plan_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    /**
     * Función de registro_mapa_curricular
     * 
     * Incluye la vista para visualizar los datos 
     * solicitados para registrar un mapa curricular
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link app/tramite/registro_mapa_curricular
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function registro_mapa_curricular() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los contrladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        $data['titulo'] = app_title() . " | Mapa curricular";
        $data['scripts'] = array();
        $data['scripts'][] = 'form_dinamicos';
        $data['validar'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $data['validar2'] = $this->institucion_model->consultar_institucion_usuario($this->session->userdata('idusu'));
         $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
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
        $data['breadcrumbs']['titulo'] = "Mapa curricular";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), 'Aqui mero');

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
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        /**
         * Invoca al fragmento correspondiente menu lateral izquierdo (menu principal)
         */
        $data['app_nav'] = $this->load->view('app/private/fragments/main_nav', $data, TRUE);

        /**
         * Referencia al fragmento del contenido de esta sección
         */
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo1/usuario/registro_mapa_usuario_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
//esta funcion es para buscar los comentarios de los documentos entregados o no 
    public function buscar_comentario() {

        $idfolio = $this->input->post('idfolio');
        $observacion = $this->input->post('observacion');
        $iddocsol = $this->input->post('iddocsol');
        $idusuariorec = $this->input->post('idusuariorec');

        header('Content-Type: application/json');
        $data = array();
        $data = $this->observacion_model->consultar_comentarios($idfolio, $observacion, $iddocsol, $idusuariorec);
        echo json_encode($data, JSON_FORCE_OBJECT);
    }
//esta funcion es para buscar todos los municipios dependiendo del estado que se elija
    public function buscar_municipio1() {
        $data = array();
         $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        $options = "";
        if ($this->input->post('idestado_institucion')) {
            $estado = $this->input->post('idestado_institucion');
            $municipios = $this->municipio_model->consultar_municipios_estado($estado);
            foreach ($municipios as $fila) {
                ?>
                <option value="<?= $fila->idmunicipio ?>"><?= $fila->nombremunicipio ?></option>
                <?php
            }
        }
    }

    public function buscar_municipio2() {
        
        $data = array();
         $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));
        $options = "";
        if ($this->input->post('idestado_oirnotificacion')) {
            $estado = $this->input->post('idestado_oirnotificacion');
            $municipios = $this->municipio_model->consultar_municipios_estado($estado);
            foreach ($municipios as $fila) {
                ?>
                <option value="<?= $fila->idmunicipio ?>"><?= $fila->nombremunicipio ?></option>
                <?php
            }
        }
    }

}
