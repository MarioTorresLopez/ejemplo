<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calificacion_analista
 *
 * @author UTEQ
 */
class calificacion_gestion extends CI_Controller {

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
        $this->load->model('notificacion_model');
        $this->load->model('filtrados_escolar_model');
        $this->load->model('tipo_evaluacion_model');
    }

    //put your code here
    public function mostrar_calificaciones_alumno_analista($idinstitucion, $idnivel, $idalumno, $idnoperiodo) {

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        //$correousu = $this->input->post('username');
        //$passwordusu = md5($this->input->post('password'));

        $this->load->model('login_model');

        $data = array();
        $data['titulo'] = app_title() . " | Calificación";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

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
        $data['breadcrumbs']['titulo'] = "Lista de calificaciones";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión de alumnos', base_url() . 'analista_servicios/gestion_alumnos'), array('Lista de periodos', base_url() . 'analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/' . $idinstitucion . '/' . $idnivel . '/' . $idalumno), 'Lista de calificaciones');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo2\analista_servicios\calificacion_gestion_analista_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar($idinstitucion, $idalumno, $idmateria, $idoptativa) {

        $this->load->model('login_model');
        $data = array();
        $data['titulo'] = app_title() . " | Editar calificación";

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);

        $data['datos_calificacion'] = $this->filtrados_escolar_model->consultar_datos_calificacion($idalumno, $idmateria, $idoptativa);
        $data['tipos_evaluacion'] = $this->tipo_evaluacion_model->consultar_tipo_evaluaciones();

        $data['idinstitucion'] = $idinstitucion;
        $info_cali = $this->filtrados_escolar_model->consultar_datos_calificacion($idalumno, $idmateria, $idoptativa);
        $idnoperiodo = $info_cali->idnoperiodo;
        $idnivel = $info_cali->idnivel;
        $data['idnivel'] = $idnivel;

        if ($a != 2 && $a != 3) {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a);
        } else {
            $data['notificaciones'] = $this->notificacion_model->get_notificaciones($a, $id);
        }

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
        $data['breadcrumbs']['titulo'] = "Editar calificación";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Gestión de alumnos', base_url() . 'analista_servicios/gestion_alumnos'), array('Lista de periodos', base_url() . 'analista_servicios/periodo_alumno/mostrar_periodos_alumno_analista/' . $idinstitucion . '/' . $idnivel . '/' . $idalumno), array('Lista de calificaciones', base_url() . 'analista_servicios/calificacion_gestion/mostrar_calificaciones_alumno_analista/' . $idinstitucion . '/' . $idnivel . '/' . $idalumno . '/' . $idnoperiodo), 'Editar calificación');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo2\analista_servicios\calificacion_editar_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function editar_calificacion_alumno() {

        $this->form_validation->set_rules('calificacion', 'calificacion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('tipo_evaluacion', 'tipo_evaluacion', 'trim|required|xss_clean');
        $this->form_validation->set_rules('fec_evaluacion', 'fec_evaluacion', 'trim|required|xss_clean');

        //Si pasamos la validación
        if ($this->form_validation->run()) {

            $idinstitucion = $this->input->post('id_institucion');
            $idalumno = $this->input->post('id_alumno');
            $idmateria = $this->input->post('id_materia');
            $idnoperiodo = $this->input->post('id_noperiodo');
            $idoptativa = $this->input->post('id_optativa');
            $idnivel = $this->input->post('id_nivel');

            if ($idmateria === '0') {
                //echo 'cambiar optativa';
                $arr_calificacion_alumno = array(
                    'calificacion' => $this->input->post('calificacion'),
                    'nomenclatura' => $this->input->post('tipo_evaluacion'),
                    'fechaexamen' => $this->input->post('fec_evaluacion')
                );

                $this->filtrados_escolar_model->editar_calificacion_alumno_optativa($idalumno, $idoptativa, $arr_calificacion_alumno);

                redirect(base_url() . "analista_servicios/calificacion_gestion/mostrar_calificaciones_alumno_analista/" . $idinstitucion . '/' . $idnivel . '/' . $idalumno . '/' . $idnoperiodo, 'refresh');
            } else {
                //echo 'cambiar materia';
                $arr_calificacion_alumno = array(
                    'calificacion' => $this->input->post('calificacion'),
                    'nomenclatura' => $this->input->post('tipo_evaluacion'),
                    'fechaexamen' => $this->input->post('fec_evaluacion')
                );

                $this->filtrados_escolar_model->editar_calificacion_alumno($idalumno, $idmateria, $arr_calificacion_alumno);

                redirect(base_url() . "analista_servicios/calificacion_gestion/mostrar_calificaciones_alumno_analista/" . $idinstitucion . '/' . $idnivel . '/' . $idalumno . '/' . $idnoperiodo, 'refresh');
            }
        }
    }

}
