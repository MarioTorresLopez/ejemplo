<?php

/**
 * Controlador de detalle de kardex de media
 * superior y superiores
 *
 * Mostrara la vista de kardex donde se visualizaran
 *  los kardex para los alumnos de escuelas media
 * superiores y superiores.
 * 
 * @since      1.0
 * @version    1.0
 * @link       /app/detalle_kardex_mediasup_superior
 * @global     constant String BASEPATH Indica la ruta de la carpeta system de este proyecto
 * @package    application.controllers
 * @subpackage app 
 * @author     CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses       ./application/config/autoload.php
 * @see        ./system/core/Controller.php
 */
class reporte_inicio extends CI_Controller {

    /**
     * Constructor de la clase
     * 
     * Invoca al constructor del padre
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
        $this->load->model('reportes_escolar_model');
        $this->load->model('reporte_inicio_model');
    }

    public function index() {

        /**
          Modelo para consultar el rol del usuario que inicio sesión
         */
        $this->load->model('login_model');

        /** 		  
         * La variable data representa el contenedor de envio de
         * información entre la vista y los controladores
         * Dado que normalmente enviamos más de un dato a una vista
         * Creamos un arreglo sobre la variable $data
         */
        $data = array();
        /*
         * parametro  que se manda a la vista para vfisualizar el 
         * titulo de la pagina
         */
        $data['titulo'] = app_title() . " | Gestión de tramite de Kardex";

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
        //aqui van los js donde se encuentran las js
        $data['scripts'] = array();

        $data['scripts'][] = 'validacion_reporte_inicio';

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
        $data['breadcrumbs']['titulo'] = "Gestión de Reportes";
        $data['breadcrumbs']['subtitulo'] = "";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', '#'), array('Otro', '#'), array('Otro mas', '#'), 'Aqui mero');

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function buscar_filtro() {

        $options = "";
        if ($this->input->post('filtro') == 1) {
            // $filtro = $this->input->post('filtro');

            $niveles = $this->reportes_escolar_model->consultar_niveles();
            foreach ($niveles as $fila) {
                ?>
              <option value="<?= $fila->idnivel ?>"><?= $fila->nomnivel ?></option>
                <?php
             
            }
        }
        if ($this->input->post('filtro') == 2) {
            // $filtro = $this->input->post('filtro');

            $escuelas = $this->reportes_escolar_model->consultar_escuelas();
            foreach ($escuelas as $fila) {
                ?>
                <option value="<?= $fila->idinstitucion ?>"><?= $fila->nombreinstitucion ?></option>
                <?php
                
            }
        }

        if ($this->input->post('filtro') == 3) {
            // $filtro = $this->input->post('filtro');

            $carreras = $this->reportes_escolar_model->consultar_carreras();
            foreach ($carreras as $fila) {
                ?>
                <option value="<?= $fila->idcarrera ?>"><?= $fila->nomcarrera ?></option>
                <?php
            }
        }


        if ($this->input->post('filtro') == 4) {
            // $filtro = $this->input->post('filtro');

            $ciclos = $this->reportes_escolar_model->consultar_ciclos();
            foreach ($ciclos as $fila) {
                ?>
                <option value="<?= $fila->idciclo ?>"><?= $fila->ciclo ?></option>
                <?php
            }
        }
        if ($this->input->post('filtro') == 5) {
            // $filtro = $this->input->post('filtro');

            $turnos = $this->reportes_escolar_model->consultar_turnos();
            foreach ($turnos as $fila) {
                ?>
                <option value="<?= $fila->idturno ?>"><?= $fila->descturno ?></option>
                <?php
            }
        }

        if ($this->input->post('filtro') == 6) {
            // $filtro = $this->input->post('filtro');

            $modalidades = $this->reportes_escolar_model->consultar_modalidades();
            foreach ($modalidades as $fila) {
                ?>
                <option value="<?= $fila->idmodalidad ?>"><?= $fila->nommodalidad ?></option>
                <?php
            }
        }
        if ($this->input->post('filtro') == 7) {
            // $filtro = $this->input->post('filtro');

            $municipios = $this->reportes_escolar_model->consultar_municipios();
            foreach ($municipios as $fila) {
                ?>
                <option value="<?= $fila->idmunicipio ?>"><?= $fila->nombremunicipio ?></option>
                <?php
            }
        }
    }
    
    public function escuelas () {
        
    }
   
    public function buscar_filtro2() {
        // $filtro2= $this->input->post('filtro2');
        $options = "";

          if ($this->input->post('filtro') == 17) {
            // $filtro = $this->input->post('filtro');

            $niveles = $this->reportes_escolar_model->consultar_niveles();
            foreach ($niveles as $fila) {
                ?>
             
                <?php
                $instituciones = $this->reporte_inicio_model->consultar_por_nivel($fila->idnivel);
                       if ($instituciones != null) {
            foreach ($instituciones as $insti) {
                ?>
   <option value="<?= $insti->idinstitucion ?>"><?= $insti->nombreinstitucion ?></option>
                                    
                <?php
                       }
                       
            }
            }
        }
        if ($this->input->post('filtro') == 2) {
            // $filtro = $this->input->post('filtro');

            $escuelas = $this->reportes_escolar_model->consultar_escuelas();
            foreach ($escuelas as $fila) {
                ?>
                <option value="<?= $fila->idinstitucion ?>"><?= $fila->nombreinstitucion ?></option>
                <?php
            }
        }

        if ($this->input->post('filtro') == 3) {
            // $filtro = $this->input->post('filtro');

            $carreras = $this->reportes_escolar_model->consultar_carreras();
            foreach ($carreras as $fila) {
                ?>
                <option value="<?= $fila->idcarrera ?>"><?= $fila->nomcarrera ?></option>
                <?php
            }
        }


        if ($this->input->post('filtro') == 4) {
            // $filtro = $this->input->post('filtro');

            $ciclos = $this->reportes_escolar_model->consultar_ciclos();
            foreach ($ciclos as $fila) {
                ?>
                <option value="<?= $fila->idciclo ?>"><?= $fila->ciclo ?></option>
                <?php
            }
        }
        if ($this->input->post('filtro') == 5) {
            // $filtro = $this->input->post('filtro');

            $turnos = $this->reportes_escolar_model->consultar_turnos();
            foreach ($turnos as $fila) {
                ?>
                <option value="<?= $fila->idturno ?>"><?= $fila->descturno ?></option>
                <?php
            }
        }

        if ($this->input->post('filtro') == 6) {
            // $filtro = $this->input->post('filtro');

            $modalidades = $this->reportes_escolar_model->consultar_modalidades();
            foreach ($modalidades as $fila) {
                ?>
                <option value="<?= $fila->idmodalidad ?>"><?= $fila->nommodalidad ?></option>
                <?php
            }
        }
        if ($this->input->post('filtro') == 7) {
            // $filtro = $this->input->post('filtro');

            $municipios = $this->reportes_escolar_model->consultar_municipios();
            foreach ($municipios as $fila) {
                ?>
                <option value="<?= $fila->idmunicipio ?>"><?= $fila->nombremunicipio ?></option>
                <?php
            }
        }
    }

    public function get_reporte_ini($idnivel) {

        $data = array();

        $instituciones = $this->reporte_inicio_model->consultar_por_nivel($idnivel);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_ins($idinstitucion) {

        $data = array();

        $instituciones = $this->reporte_inicio_model->consultar_por_institucion($idinstitucion);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_ica($idcarrera) {

        $data = array();
        $instituciones = $this->reporte_inicio_model->consultar_por_carrera($idcarrera);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_ici($idciclo) {

        $data = array();
        $instituciones = $this->reporte_inicio_model->consultar_por_ciclo($idciclo);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_itu($idturno) {

        $data = array();
        $instituciones = $this->reporte_inicio_model->consultar_por_turno($idturno);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_imo($idmodalidad) {

        $data = array();
        $instituciones = $this->reporte_inicio_model->consultar_por_modalidad($idmodalidad);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

    public function get_reporte_imu($idmunicipio) {

        $data = array();
        $instituciones = $this->reporte_inicio_model->consultar_por_municipio($idmunicipio);
//        
        $gruposAlumPeriodoInst = array();
        $gruposnombre = array();
        $generosiInst1 = array();
        $generosiInst2 = array();
        $generosrInst1 = array();
        $generosrInst2 = array();
        $generoseInst1 = array();
        $generoseInst2 = array();
        $generosrvInst1 = array();
        $generosrvInst2 = array();
        $generostInst1 = array();
        $generostInst2 = array();


        if ($instituciones != null) {

            foreach ($instituciones as $ins) {
                $gruposAlumPeriodoInst[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_alumnos($ins->idinstitucion);

                $gruposnombre[$ins->idinstitucion] = $this->reporte_inicio_model->grupos_nombre($ins->idinstitucion);

                $generosiInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresoh($ins->idinstitucion);
                $generosiInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_nuevo_ingresom($ins->idinstitucion);
                $generosrInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresoh($ins->idinstitucion);
                $generosrInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_reingresom($ins->idinstitucion);

                $generoseInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciah($ins->idinstitucion);
                $generoseInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_equivalenciam($ins->idinstitucion);
                $generosrvInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionh($ins->idinstitucion);
                $generosrvInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_revalidacionm($ins->idinstitucion);
                $generostInst1[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladoh($ins->idinstitucion);
                $generostInst2[$ins->idinstitucion] = $this->reporte_inicio_model->personas_trasladom($ins->idinstitucion);
            }
        }

        $data['instituciones'] = $instituciones;
        $data['gruposAlumPeriodoInst'] = $gruposAlumPeriodoInst;
        $data['gruposnombre'] = $gruposnombre;
        $data['generosiInst1'] = $generosiInst1;
        $data['generosiInst2'] = $generosiInst2;
        $data['generosrInst1'] = $generosrInst1;
        $data['generosrInst2'] = $generosrInst2;
        $data['generoseInst1'] = $generoseInst1;
        $data['generoseInst2'] = $generoseInst2;
        $data['generosrvInst1'] = $generosrvInst1;
        $data['generosrvInst2'] = $generosrvInst2;
        $data['generostInst1'] = $generostInst1;
        $data['generostInst2'] = $generostInst2;

        echo $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reporte_inicio_view_f', $data, TRUE);
    }

}
