<?php

/**
 * Controlador para la vista de gestion de plan de estudios
 *
 * Clase que visualiza los planes de la institución
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
class gestion_planes_estudios extends CI_Controller {

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
        $this->load->model('notificacion_model');
        $this->load->model('nivel_educativo_model');
        $this->load->model('tipo_educativo_model');
        $this->load->model('carrera_model');
        $this->load->model('especialidad_model');
        $this->load->model('modalidad_model');
        $this->load->model('institucion_model');
        $this->load->model('acuerdo_model');
        $this->load->model('planestudios_model');
    }

    /**
     * Función que permite acceder al panel administrativo de la institución
     * 
     * Incluye la vista para la sección de gestión de planes de estudio.
     * 
     * @since 1.0
     * 
     * @version 1.0
     * @link /gestion_planes_estudios
     * @author CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
     * @return View
     */
    public function index() {

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
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);

        //Validar las notificaciones por usuario
        $a = $data['valor']->rol;
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

        //Traer los modulos de acuerdo al los permisos que tiene dicho rol de usuario
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos($this->session->userdata('idusu'));

        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['tipos_educativos'] = $this->tipo_educativo_model->consultar_tipos_educativos();
        $data['carreras'] = $this->carrera_model->consultar_carreras();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();
        $data['institucion'] = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        
        $datos_institucion = $this->institucion_model->consultar_institucion($this->session->userdata('idusu'));
        $id_institucion = $datos_institucion->idinstitucion;
        $data['planes_estudios'] = $this->planestudios_model->consultar_planes($id_institucion);

        $data['scripts'] = array();
        $data['scripts'][] = 'validarPlanEstudios';
        $data['titulo'] = app_title() . " | Plan de estudios";

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
        $data['breadcrumbs']['titulo'] = "Gestión de planes de estudios";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Planes de estudio');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/usuario/gestion_planes_estudios_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function buscar_datos_acuerdo() {

        if ($this->input->post('idacuerdo')) {
            $idacuerdo = $this->input->post('idacuerdo');
            $datos_acuerdo = $this->acuerdo_model->consultar_acuerdo_institucion($idacuerdo);
            ?>
            <div class="form-group">
                <div class="col-sm-4">
                    <label>Nombre del plan de estudios</label>
                    <input type="text" id="" class="form-control" name="" value="<?= $datos_acuerdo->nomplanestudios ?>" style="text-transform: uppercase;" disabled>
                    <input type="hidden" id="nombre_plan_estudios" class="form-control" name="nombre_plan_estudios" value="<?= $datos_acuerdo->nomplanestudios ?>" style="text-transform: uppercase;">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label>Nivel educativo</label>
                    <input type="text" id="nivel_educativo" class="form-control" name="nivel_educativo" value="<?= $datos_acuerdo->nomnivel ?>" style="text-transform: uppercase;" disabled>
                    <input type="hidden" id="id_nivel_educativo" class="form-control" name="id_nivel_educativo" value="<?= $datos_acuerdo->idnivel ?>">
                    <span class="help-block"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-4">
                    <label>Modalidad</label>
                    <input type="text" id="" class="form-control" name="" value="<?= $datos_acuerdo->nommodalidad ?>" style="text-transform: uppercase;" disabled>
                    <input type="hidden" id="id_modalidad" class="form-control" name="id_modalidad" value="<?= $datos_acuerdo->idmodalidad ?>">
                    <span class="help-block"></span>
                </div>
            </div>
            <?php
        }
    }

    public function agregar_plan_estudios() {

        $this->form_validation->set_rules('idacuerdo', 'idacuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_educativo', 'tipo_educativo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('especialidad', 'especialidad', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_plan_estudios', 'clave_plan_estudios', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            if($this->input->post('especialidad') === '---Seleccione---'){
                $id_especialidad = 0;
            }
            else {
                $id_especialidad = $this->input->post('especialidad');
            }
            
            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_plan_estu = array();
            $arr_plan_estu['nomplanestudios'] = $this->input->post('nombre_plan_estudios');
            $arr_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
            $arr_plan_estu['estatus'] = 1;
            $arr_plan_estu['fechamodificacion'] = $hoy;
            $arr_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_plan_estu['idcarrera'] = $this->input->post('carrera');
            $arr_plan_estu['idmodalidad'] = $this->input->post('id_modalidad');
            $arr_plan_estu['idnivel'] = $this->input->post('id_nivel_educativo');
            $arr_plan_estu['idespecialidad'] = $id_especialidad;
            $arr_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
            $arr_plan_estu['idinstitucion'] = $this->input->post('id_institucion');
            $arr_plan_estu['idacuerdo'] = $this->input->post('idacuerdo');
            
            $this->planestudios_model->crear_plan_estudio($arr_plan_estu);
            
            redirect(base_url() . "usuario/gestion_planes_estudios" , 'refresh');
            
        }
    }

}
