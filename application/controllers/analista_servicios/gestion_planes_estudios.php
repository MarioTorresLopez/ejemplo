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
    public function institucion($idinstitucion) {

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
        $data['acuerdos'] = $this->acuerdo_model->consultar_acuerdos_institucion_pe($idinstitucion);

        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['tipos_educativos'] = $this->tipo_educativo_model->consultar_tipos_educativos();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();
        $data['institucion'] = $this->institucion_model->consultar_institucion_pe($idinstitucion);

        $datos_institucion = $this->institucion_model->consultar_institucion_pe($idinstitucion);
        $id_institucion = $datos_institucion->idinstitucion;
        $data['idusuariom'] = $id;
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
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Consultar instituciones', base_url() . 'analista_servicios/gestion_instituciones'), 'Planes de estudio');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_planes_estudios_view', $data, TRUE);

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
        $this->form_validation->set_rules('plan_estudios', 'plan_estudios', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_creacion', 'fecha_creacion', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            $idinstitucion = $this->input->post('id_institucion');
            if ($this->input->post('especialidad') === '---Seleccione---') {
                $id_especialidad = 0;
            } else {
                $id_especialidad = $this->input->post('especialidad');
            }

            //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
            $arr_plan_estu = array();
            $arr_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
            $arr_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
            $arr_plan_estu['estatus'] = 1;
            $arr_plan_estu['fechamodificacion'] = $hoy;
            $arr_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
            $arr_plan_estu['idmodalidad'] = $this->input->post('id_modalidad');
            $arr_plan_estu['idnivel'] = $this->input->post('id_nivel_educativo');
            $arr_plan_estu['idespecialidad'] = $id_especialidad;
            $arr_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
            $arr_plan_estu['idinstitucion'] = $idinstitucion;
            $arr_plan_estu['idacuerdo'] = $this->input->post('idacuerdo');
            $arr_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');

            $this->planestudios_model->crear_plan_estudio($arr_plan_estu);

            redirect(base_url() . "analista_servicios/gestion_planes_estudios/institucion/" . $idinstitucion, 'refresh');
        }
    }

    public function pe_anterior() {

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

        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['tipos_educativos'] = $this->tipo_educativo_model->consultar_tipos_educativos();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();

        $data['planes_estudios'] = $this->planestudios_model->consultar_planes_estudio_anterior();

        $data['scripts'] = array();
        $data['scripts'][] = 'validarPlanEstudiosAnterior';
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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/gestion_planes_estudios_anteriores_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function agregar_plan_estudios_anterior() {

        $this->form_validation->set_rules('nom_institucion', 'nom_institucion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nom_acuerdo', 'nom_acuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel', 'nivel', 'trim|required|xss_clean');
        $this->form_validation->set_rules('modalidad', 'modalidad', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_educativo', 'tipo_educativo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_plan_estudios', 'clave_plan_estudios', 'trim|required|xss_clean');
        $this->form_validation->set_rules('plan_estudios', 'plan_estudios', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_creacion', 'fecha_creacion', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            if ($this->input->post('especialidad') === '') {
                $id_especialidad = 0;

                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_plan_estu = array();
                $arr_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
                $arr_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
                $arr_plan_estu['estatus'] = 1;
                $arr_plan_estu['fechamodificacion'] = $hoy;
                $arr_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
                $arr_plan_estu['idmodalidad'] = $this->input->post('modalidad');
                $arr_plan_estu['idnivel'] = $this->input->post('nivel');
                $arr_plan_estu['idespecialidad'] = $id_especialidad;
                $arr_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
                $arr_plan_estu['idinstitucion'] = 0;
                $arr_plan_estu['idacuerdo'] = 0;
                $arr_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');
                $arr_plan_estu['nominstitucion'] = $this->input->post('nom_institucion');
                $arr_plan_estu['nomacuerdo'] = $this->input->post('nom_acuerdo');

                $this->planestudios_model->crear_plan_estudio_anterior($arr_plan_estu);

                redirect(base_url() . "analista_servicios/gestion_planes_estudios/pe_anterior", 'refresh');
            } else {

                $arr_especialidad = array();
                $arr_especialidad['nomespecialidad'] = $this->input->post('especialidad');
                $arr_especialidad['estatus'] = 1;

                $this->especialidad_model->crear_especialidad($arr_especialidad);

                $ultima_especialidad = $this->especialidad_model->consultar_ultima_especialidad();

                //Creamos un arreglo para enviar los datos y sean registrados en la base de datos
                $arr_plan_estu = array();
                $arr_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
                $arr_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
                $arr_plan_estu['estatus'] = 1;
                $arr_plan_estu['fechamodificacion'] = $hoy;
                $arr_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
                $arr_plan_estu['idmodalidad'] = $this->input->post('modalidad');
                $arr_plan_estu['idnivel'] = $this->input->post('nivel');
                $arr_plan_estu['idespecialidad'] = $ultima_especialidad->idespecialidad;
                $arr_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
                $arr_plan_estu['idinstitucion'] = 0;
                $arr_plan_estu['idacuerdo'] = 0;
                $arr_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');
                $arr_plan_estu['nominstitucion'] = $this->input->post('nom_institucion');
                $arr_plan_estu['nomacuerdo'] = $this->input->post('nom_acuerdo');

                $this->planestudios_model->crear_plan_estudio_anterior($arr_plan_estu);
                redirect(base_url() . "analista_servicios/gestion_planes_estudios/pe_anterior", 'refresh');
            }
        }
    }

    public function editar_plan_estudios_anterior($idpe) {

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

        $data['niveles'] = $this->nivel_educativo_model->consultar_niveles();
        $data['tipos_educativos'] = $this->tipo_educativo_model->consultar_tipos_educativos();
        $data['especialidades'] = $this->especialidad_model->consultar_especialidades();
        $data['modalidades'] = $this->modalidad_model->consultar_modalidades();

        $data['plan_estudios'] = $this->planestudios_model->consultar_plan_estudio($idpe);

        $data['scripts'] = array();
        $data['scripts'][] = 'validarPlanEstudiosAnterior';
        $data['titulo'] = app_title() . " | Editar plan de estudios";

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
        $data['breadcrumbs']['titulo'] = "Editar de planes de estudios";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Planes de estudios', base_url() . 'analista_servicios/gestion_planes_estudios/pe_anterior'), 'Editar plan de estudio');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/editar_planes_estudios_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_plan_anterior() {

        $this->form_validation->set_rules('nom_institucion', 'nom_institucion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nom_acuerdo', 'nom_acuerdo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('nivel', 'nivel', 'trim|required|xss_clean');
        $this->form_validation->set_rules('modalidad', 'modalidad', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_educativo', 'tipo_educativo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('clave_plan_estudios', 'clave_plan_estudios', 'trim|required|xss_clean');
        $this->form_validation->set_rules('plan_estudios', 'plan_estudios', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fecha_creacion', 'fecha_creacion', 'trim|required|xss_clean');

        //Si pasamos la validacion
        if ($this->form_validation->run()) {

            $hoy = date("Y/m/d");
            $idpe = $this->input->post('id_pe');

            if ($this->input->post('id_especialidad') != 0) {

                //echo 'Editar con especialidad';

                $nomespecialidad = $this->input->post('especialidad');
                $idespecialidad = $this->input->post('id_especialidad');
                
                //Creamos un arreglo para editar los datos
                $arr_edi_plan_estu = array();
                $arr_edi_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
                $arr_edi_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
                $arr_edi_plan_estu['fechamodificacion'] = $hoy;
                $arr_edi_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
                $arr_edi_plan_estu['idmodalidad'] = $this->input->post('modalidad');
                $arr_edi_plan_estu['idnivel'] = $this->input->post('nivel');
                $arr_edi_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
                $arr_edi_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');
                $arr_edi_plan_estu['nominstitucion'] = $this->input->post('nom_institucion');
                $arr_edi_plan_estu['nomacuerdo'] = $this->input->post('nom_acuerdo');

                $this->planestudios_model->editar_plan_estudios($arr_edi_plan_estu, $idpe);
                $this->especialidad_model->editar_especialidad($nomespecialidad, $idespecialidad);
                
                redirect(base_url() . "analista_servicios/gestion_planes_estudios/pe_anterior", 'refresh');
                
            } else {

                if ($this->input->post('especialidad') == 'N/A') {
                    //echo 'Editar sin especialidad';

                    //Creamos un arreglo para editar los datos
                    $arr_edi_plan_estu = array();
                    $arr_edi_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
                    $arr_edi_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
                    $arr_edi_plan_estu['fechamodificacion'] = $hoy;
                    $arr_edi_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
                    $arr_edi_plan_estu['idmodalidad'] = $this->input->post('modalidad');
                    $arr_edi_plan_estu['idnivel'] = $this->input->post('nivel');
                    $arr_edi_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
                    $arr_edi_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');
                    $arr_edi_plan_estu['nominstitucion'] = $this->input->post('nom_institucion');
                    $arr_edi_plan_estu['nomacuerdo'] = $this->input->post('nom_acuerdo');

                    $this->planestudios_model->editar_plan_estudios($arr_edi_plan_estu, $idpe);
                    
                    redirect(base_url() . "analista_servicios/gestion_planes_estudios/pe_anterior", 'refresh');
                    
                } else {
                    //echo 'Editar y crear especialidad';

                    $arr_especialidad = array();
                    $arr_especialidad['nomespecialidad'] = $this->input->post('especialidad');
                    $arr_especialidad['estatus'] = 1;

                    $this->especialidad_model->crear_especialidad($arr_especialidad);

                    $ultima_especialidad = $this->especialidad_model->consultar_ultima_especialidad();

                    //Creamos un arreglo para editar los datos
                    $arr_edi_plan_estu = array();
                    $arr_edi_plan_estu['nomplanestudios'] = $this->input->post('plan_estudios');
                    $arr_edi_plan_estu['claplanestudios'] = $this->input->post('clave_plan_estudios');
                    $arr_edi_plan_estu['fechamodificacion'] = $hoy;
                    $arr_edi_plan_estu['usuariomodificacion'] = $this->session->userdata('idusu');
                    $arr_edi_plan_estu['idmodalidad'] = $this->input->post('modalidad');
                    $arr_edi_plan_estu['idnivel'] = $this->input->post('nivel');
                    $arr_edi_plan_estu['idespecialidad'] = $ultima_especialidad->idespecialidad;
                    $arr_edi_plan_estu['idtipedu'] = $this->input->post('tipo_educativo');
                    $arr_edi_plan_estu['fechacreacion'] = $this->input->post('fecha_creacion');
                    $arr_edi_plan_estu['nominstitucion'] = $this->input->post('nom_institucion');
                    $arr_edi_plan_estu['nomacuerdo'] = $this->input->post('nom_acuerdo');

                    $this->planestudios_model->editar_plan_estudios_especialidad($arr_edi_plan_estu, $idpe);
                    
                    redirect(base_url() . "analista_servicios/gestion_planes_estudios/pe_anterior", 'refresh');
                    
                }
            }
        }
    }

}
