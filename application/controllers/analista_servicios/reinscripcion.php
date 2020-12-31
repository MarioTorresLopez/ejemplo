<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inscripcion_analista
 *
 * @author UTEQ
 */
class reinscripcion extends CI_Controller {

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
        $this->load->model('alumno_model');
        $this->load->model('materia_model');
        $this->load->model('calificacion_model');
        $this->load->model('inscripcion_model');
        $this->load->model('carrera_model');
        $this->load->model('notificacion_model');
        $global;
    }

    //put your code here
    public function index() {

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
        $data['titulo'] = app_title() . " | Inicio";


        /*
         * arrays de js para las alertas
         */
        $data['scripts'] = array();
        $data['scripts'][] = 'eliminarInscripcion';
        $data['scripts'][] = 'aceptarInscripcionAnalista';
        $data['scripts'][] = 'subir_excel';
        $data['scripts'][] = 'cambioDeColor';


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
        $data['breadcrumbs']['titulo'] = "Reinscripción";
        $data['breadcrumbs']['subtitulo'] = " ";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), array('Inscripción', ''));

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
        $data['app_fragment'] = $this->load->view('app/private/fragments/modules/Modulo2/analista_servicios/reinscripcion', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }

    public function reinscribir_post() {
        require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
        $val = $this->input->post('validador');
        $output = '';
        $tabla_no_inscritos = '';
        /**
         * Cargando el archivo en una variable para su lectura
         */
        $fileObj = PHPExcel_IOFactory::load('static/excel/' . $val);
        $fileObj->setActiveSheetIndex(0);

        /**
         * Lectura del archivo
         */
        $sheetObj = $fileObj->setActiveSheetIndex(0)->getHighestRow();
        /**
         * Inicialización de variables para la matriz que contendra los datos del archivo
         */
        $fila1 = 0;
        /**
         * Declaración del array en el que se guardara los datos leidos
         */
        $excel = array();

        $acuerdo = $fileObj->getActiveSheet()->getCell('C5')->getCalculatedValue();
        $nivel = $fileObj->getActiveSheet()->getCell('C6')->getCalculatedValue();
        $clave_plan_estudios = $fileObj->getActiveSheet()->getCell('C7')->getCalculatedValue();
        $modalidad = $fileObj->getActiveSheet()->getCell('C8')->getCalculatedValue();
        $carrera = $fileObj->getActiveSheet()->getCell('C9')->getCalculatedValue();
        $ciclo_escolar = $fileObj->getActiveSheet()->getCell('C10')->getCalculatedValue();
        $escuela = $fileObj->getActiveSheet()->getCell('C11')->getCalculatedValue();
        $clave_centro_trabajo = $fileObj->getActiveSheet()->getCell('C12')->getCalculatedValue();
        $direccion = $fileObj->getActiveSheet()->getCell('C13')->getCalculatedValue();
        $telefono = $fileObj->getActiveSheet()->getCell('C14')->getCalculatedValue();
        $turno = $fileObj->getActiveSheet()->getCell('C15')->getCalculatedValue();
        $tipo = $fileObj->getActiveSheet()->getCell('C16')->getCalculatedValue();
        $correo = $fileObj->getActiveSheet()->getCell('C17')->getCalculatedValue();
        $director = $fileObj->getActiveSheet()->getCell('C18')->getCalculatedValue();
        $repre_legal = $fileObj->getActiveSheet()->getCell('C19')->getCalculatedValue();
        $estado = $fileObj->getActiveSheet()->getCell('C20')->getCalculatedValue();
        $municipio = $fileObj->getActiveSheet()->getCell('C21')->getCalculatedValue();

        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);

        for ($i = 26; $i < $sheetObj; $i ++) {

            $cell1 = $fileObj->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
            $excel[$fila1][0] = $cell1;
            $cell2 = $fileObj->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
            $excel[$fila1][1] = $cell2;
            $cell3 = $fileObj->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
            $excel[$fila1][2] = $cell3;
            $cell4 = $fileObj->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
            $excel[$fila1][3] = $cell4;
            $cell5 = $fileObj->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
            $excel[$fila1][4] = $cell5;
            $cell6 = $fileObj->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
            $excel[$fila1][5] = $cell6;
            $cell7 = $fileObj->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
            $excel[$fila1][6] = $cell7;
            $cell8 = $fileObj->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
            $excel[$fila1][7] = $cell8;
            $cell9 = $fileObj->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
            $excel[$fila1][8] = $cell9;
            $cell10 = $fileObj->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
            $excel[$fila1][9] = $cell10;
            $cell11 = $fileObj->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
            $excel[$fila1][10] = $cell11;
            $cell12 = $fileObj->getActiveSheet()->getCell('O' . $i)->getCalculatedValue();
            $excel[$fila1][11] = $cell12;
            $excel[$fila1][12] = $i;
            $fila1++;
        }
        $data = array();
        $data['carrera'] = $this->carrera_model->existente($carrera);
        $idinstitucion = $this->inscripcion_model->consultar_escuela($escuela);
        $result = substr($ciclo_escolar, 0, 4);
        $alumnos_inscritos = 0;
        $alumnos_no_inscritos = 0;
        $noinscritos = array();
        $contnoinscritos = 0;
        $tabla_no_inscritos .= "<div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Especialización</th><th>Periodo</th><th>Materia</th><th>Apellido Paterno</th><th>Apellido Materno</th><th>Nombre</th><th>Curp</th><th>Genero</th><th>Grupo</th><th>Escuela procedencia</th><th>Tipo de ingreso</th><th>Aprobación</th></tr></thead><tbody>";
        for ($cont = 0; $cont < $fila1; $cont++) {
            $cadena = $excel[$cont][1];
            $array = explode(" ", $cadena);
            $tamanio = count($array);

            /*
             * Educación inicial
             */
            if ($idnivel->idnivel == 11) {
                
            }
            /*
             * Educación preescolar
             */
            if ($idnivel->idnivel == 12) {
                
            }
            /*
             * Educación primaria
             */
            if ($idnivel->idnivel == 13) {
                
            }
            /*
             * Educación secundaria
             */
            if ($idnivel->idnivel == 14) {
                
            }
            /*
             * #Educación Media superior
             */
            if ($idnivel->idnivel == 15) {
                if ($cont == 0) {
                    $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                    if ($alumno == null) {
                        $arr_alumno = array();
                        $arr_alumno['nombre'] = $excel[$cont][5];
                        $arr_alumno['apellido1'] = $excel[$cont][3];
                        $arr_alumno['apellido2'] = $excel[$cont][4];
                        $arr_alumno['curp'] = $excel[$cont][6];
                        $arr_alumno['genero'] = $excel[$cont][10];
                        $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                        $arr_alumno['estatus'] = 1;
                        $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                        $arr_inscripcion['fecha'] = date('Y-m-d');
                        $arr_inscripcion['estatus'] = 1;
                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                        if ($excel[$cont][0] != NULL) {
                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                        } else {
                            $arr_inscripcion['idespecialidad'] = NULL;
                        }
                        $arr_inscripcion['idalumno'] = $alumno_id;
                        $arr_inscripcion['idmodalidad'] = $modalidad;
                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                        $arr_inscripcion['idturno'] = $idturno->idturno;
                        $arr_inscripcion['idestado'] = $idestado->idestado;
                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = null;
                        }
                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                        $alumnos_inscritos++;
                    } else {
                        //if ($tamanio > 1) {
                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                        $historial = $this->inscripcion_model->historial($alumno->idalumno);
                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                        $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                        if ($tamanio > 1) {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                        } else {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo);
                        }
                        //$reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                        if ($cont == 0) {
                            $cont_historial = 0;
                            foreach ($historial as $periodo_cursado) {
                                if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                    //echo 'Quiere repetir este semestre';
                                    $cont_historial++;
                                } else {
                                    //echo 'Esta normal';
                                }
                            }
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $cont_historial = 0;
                                foreach ($historial as $periodo_cursado) {
                                    if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                        //echo 'Quiere repetir este semestre';
                                        $cont_historial++;
                                    } else {
                                        //echo 'Esta normal';
                                    }
                                }
                            }
                        }
                        /*
                         * Cuando va a tomar su oportunidad de repetir un semestre
                         */
                        if ($cont_historial == 1) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 9) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    /*
                                                     * Aqui va lo de inscribir a los nuevos alumnos
                                                     */
                                                    if ($cont == 0) {

                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Va en forma
                         */
                        if ($cont_historial == 0) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 9) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Ya repitio un semestre ya no puede volver a hacerlo
                         */
                        if ($cont_historial == 2) {
                            echo 'Error';
                        }
//                        } else {
//                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
//                            $idnoperiodo->idnoperiodo = 1;
//                        }
                    }
                } else {
                    $aux = $cont - 1;
                    $comparar_anterior = $excel[$aux][6];
                    if ($excel[$cont][6] == $comparar_anterior) {
                        
                    } else {
                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                        if ($alumno == null) {
                            $arr_alumno = array();
                            $arr_alumno['nombre'] = $excel[$cont][5];
                            $arr_alumno['apellido1'] = $excel[$cont][3];
                            $arr_alumno['apellido2'] = $excel[$cont][4];
                            $arr_alumno['curp'] = $excel[$cont][6];
                            $arr_alumno['genero'] = $excel[$cont][10];
                            $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                            $arr_alumno['estatus'] = 1;
                            $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                            $arr_inscripcion['fecha'] = date('Y-m-d');
                            $arr_inscripcion['estatus'] = 1;
                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_inscripcion['idespecialidad'] = NULL;
                            }
                            $arr_inscripcion['idalumno'] = $alumno_id;
                            $arr_inscripcion['idmodalidad'] = $modalidad;
                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                            $arr_inscripcion['idturno'] = $idturno->idturno;
                            $arr_inscripcion['idestado'] = $idestado->idestado;
                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = null;
                            }
                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                            $alumnos_inscritos++;
                        } else {
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $historial = $this->inscripcion_model->historial($alumno->idalumno);
                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                                $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                                if ($cont == 0) {
                                    $cont_historial = 0;
                                    foreach ($historial as $periodo_cursado) {
                                        if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                            //echo 'Quiere repetir este semestre';
                                            $cont_historial++;
                                        } else {
                                            //echo 'Esta normal';
                                        }
                                    }
                                } else {
                                    $aux = $cont - 1;
                                    $comparar_anterior = $excel[$aux][6];
                                    if ($excel[$cont][6] == $comparar_anterior) {
                                        
                                    } else {
                                        $cont_historial = 0;
                                        foreach ($historial as $periodo_cursado) {
                                            if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                                //echo 'Quiere repetir este semestre';
                                                $cont_historial++;
                                            } else {
                                                //echo 'Esta normal';
                                            }
                                        }
                                    }
                                }
                                /*
                                 * Cuando va a tomar su oportunidad de repetir un semestre
                                 */
                                if ($cont_historial == 1) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 9) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            /*
                                                             * Aqui va lo de inscribir a los nuevos alumnos
                                                             */
                                                            if ($cont == 0) {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {

                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Va en forma
                                 */
                                if ($cont_historial == 0) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 9) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {
                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Ya repitio un semestre ya no puede volver a hacerlo
                                 */
                                if ($cont_historial == 2) {
                                    echo 'Error';
                                }
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idnoperiodo->idnoperiodo = 1;
                            }
                        }
                    }
                }
            }

            /*
             * Educación Superior
             */
            if ($idnivel->idnivel == 16) {
                if ($cont == 0) {
                    $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                    if ($alumno == null) {
                        $arr_alumno = array();
                        $arr_alumno['nombre'] = $excel[$cont][5];
                        $arr_alumno['apellido1'] = $excel[$cont][3];
                        $arr_alumno['apellido2'] = $excel[$cont][4];
                        $arr_alumno['curp'] = $excel[$cont][6];
                        $arr_alumno['genero'] = $excel[$cont][10];
                        $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                        $arr_alumno['estatus'] = 1;
                        $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                        $arr_inscripcion['fecha'] = date('Y-m-d');
                        $arr_inscripcion['estatus'] = 1;
                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                        if ($excel[$cont][0] != NULL) {
                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                        } else {
                            $arr_inscripcion['idespecialidad'] = NULL;
                        }
                        $arr_inscripcion['idalumno'] = $alumno_id;
                        $arr_inscripcion['idmodalidad'] = $modalidad;
                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                        $arr_inscripcion['idturno'] = $idturno->idturno;
                        $arr_inscripcion['idestado'] = $idestado->idestado;
                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = null;
                        }
                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                        $alumnos_inscritos++;
                    } else {
                        //if ($tamanio > 1) {
                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                        $historial = $this->inscripcion_model->historial($alumno->idalumno);
                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                        $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                        if ($tamanio > 1) {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                        } else {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo);
                        }
                        //$reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                        if ($cont == 0) {
                            $cont_historial = 0;
                            foreach ($historial as $periodo_cursado) {
                                if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                    //echo 'Quiere repetir este semestre';
                                    $cont_historial++;
                                } else {
                                    //echo 'Esta normal';
                                }
                            }
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $cont_historial = 0;
                                foreach ($historial as $periodo_cursado) {
                                    if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                        //echo 'Quiere repetir este semestre';
                                        $cont_historial++;
                                    } else {
                                        //echo 'Esta normal';
                                    }
                                }
                            }
                        }
                        /*
                         * Cuando va a tomar su oportunidad de repetir un semestre
                         */
                        if ($cont_historial == 1) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 11) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    /*
                                                     * Aqui va lo de inscribir a los nuevos alumnos
                                                     */
                                                    if ($cont == 0) {

                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';
                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Va en forma
                         */
                        if ($cont_historial == 0) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 11) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Ya repitio un semestre ya no puede volver a hacerlo
                         */
                        if ($cont_historial == 2) {
                            echo 'Error';
                        }
//                        } else {
//                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
//                            $idnoperiodo->idnoperiodo = 1;
//                        }
                    }
                } else {
                    $aux = $cont - 1;
                    $comparar_anterior = $excel[$aux][6];
                    if ($excel[$cont][6] == $comparar_anterior) {
                        
                    } else {
                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                        if ($alumno == null) {
                            $arr_alumno = array();
                            $arr_alumno['nombre'] = $excel[$cont][5];
                            $arr_alumno['apellido1'] = $excel[$cont][3];
                            $arr_alumno['apellido2'] = $excel[$cont][4];
                            $arr_alumno['curp'] = $excel[$cont][6];
                            $arr_alumno['genero'] = $excel[$cont][10];
                            $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                            $arr_alumno['estatus'] = 1;
                            $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                            $arr_inscripcion['fecha'] = date('Y-m-d');
                            $arr_inscripcion['estatus'] = 1;
                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_inscripcion['idespecialidad'] = NULL;
                            }
                            $arr_inscripcion['idalumno'] = $alumno_id;
                            $arr_inscripcion['idmodalidad'] = $modalidad;
                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                            $arr_inscripcion['idturno'] = $idturno->idturno;
                            $arr_inscripcion['idestado'] = $idestado->idestado;
                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = null;
                            }
                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                            $alumnos_inscritos++;
                        } else {
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $historial = $this->inscripcion_model->historial($alumno->idalumno);
                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                                $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                                if ($cont == 0) {
                                    $cont_historial = 0;
                                    foreach ($historial as $periodo_cursado) {
                                        if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                            //echo 'Quiere repetir este semestre';
                                            $cont_historial++;
                                        } else {
                                            //echo 'Esta normal';
                                        }
                                    }
                                } else {
                                    $aux = $cont - 1;
                                    $comparar_anterior = $excel[$aux][6];
                                    if ($excel[$cont][6] == $comparar_anterior) {
                                        
                                    } else {
                                        $cont_historial = 0;
                                        foreach ($historial as $periodo_cursado) {
                                            if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                                //echo 'Quiere repetir este semestre';
                                                $cont_historial++;
                                            } else {
                                                //echo 'Esta normal';
                                            }
                                        }
                                    }
                                }
                                /*
                                 * Cuando va a tomar su oportunidad de repetir un semestre
                                 */
                                if ($cont_historial == 1) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 11) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            /*
                                                             * Aqui va lo de inscribir a los nuevos alumnos
                                                             */
                                                            if ($cont == 0) {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {

                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Va en forma
                                 */
                                if ($cont_historial == 0) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 11) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {
                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Ya repitio un semestre ya no puede volver a hacerlo
                                 */
                                if ($cont_historial == 2) {
                                    echo 'Error';
                                }
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idnoperiodo->idnoperiodo = 1;
                            }
                        }
                    }
                }
            }


            /*
             * Educación Superior
             */
            if ($idnivel->idnivel == 17) {
                if ($cont == 0) {
                    $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                    if ($alumno == null) {
                        $arr_alumno = array();
                        $arr_alumno['nombre'] = $excel[$cont][5];
                        $arr_alumno['apellido1'] = $excel[$cont][3];
                        $arr_alumno['apellido2'] = $excel[$cont][4];
                        $arr_alumno['curp'] = $excel[$cont][6];
                        $arr_alumno['genero'] = $excel[$cont][10];
                        $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                        $arr_alumno['estatus'] = 1;
                        $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                        $arr_inscripcion['fecha'] = date('Y-m-d');
                        $arr_inscripcion['estatus'] = 1;
                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                        if ($excel[$cont][0] != NULL) {
                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                        } else {
                            $arr_inscripcion['idespecialidad'] = NULL;
                        }
                        $arr_inscripcion['idalumno'] = $alumno_id;
                        $arr_inscripcion['idmodalidad'] = $modalidad;
                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                        $arr_inscripcion['idturno'] = $idturno->idturno;
                        $arr_inscripcion['idestado'] = $idestado->idestado;
                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = null;
                        }
                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                        $alumnos_inscritos++;
                    } else {
                        //if ($tamanio > 1) {
                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                        $historial = $this->inscripcion_model->historial($alumno->idalumno);
                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                        $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                        if ($tamanio > 1) {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                        } else {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo);
                        }
                        //$reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                        if ($cont == 0) {
                            $cont_historial = 0;
                            foreach ($historial as $periodo_cursado) {
                                if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                    //echo 'Quiere repetir este semestre';
                                    $cont_historial++;
                                } else {
                                    //echo 'Esta normal';
                                }
                            }
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $cont_historial = 0;
                                foreach ($historial as $periodo_cursado) {
                                    if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                        //echo 'Quiere repetir este semestre';
                                        $cont_historial++;
                                    } else {
                                        //echo 'Esta normal';
                                    }
                                }
                            }
                        }
                        /*
                         * Cuando va a tomar su oportunidad de repetir un semestre
                         */
                        if ($cont_historial == 1) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 11) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    /*
                                                     * Aqui va lo de inscribir a los nuevos alumnos
                                                     */
                                                    if ($cont == 0) {

                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';
                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Va en forma
                         */
                        if ($cont_historial == 0) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                if ($reprobadas_carrera->reprobadas < 11) {
                                    if ($reprobadas_periodo->reprobadas < 4) {
                                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                        //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                        $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                        if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                            $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                            if ($cont == 0) {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        } else {
                                            //echo 'El grupo llego a su totalidad';
                                            if ($cont == 0) {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            } else {
                                                $aux = $cont - 1;
                                                $comparar_anterior = $excel[$aux][6];
                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                    
                                                } else {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                }
                                            }
                                        }
                                    }
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 5) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 5° semestre';
                                }
                            }

                            if ($idnoperiodo->idnoperiodo == 6) {
                                $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';

                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {


                                        //echo 'El grupo llego a su totalidad';

                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                } else {
                                    echo 'No tiene derecho a reinscripción de 6° semestre';
                                }
                            }
                        }
                        /*
                         * Ya repitio un semestre ya no puede volver a hacerlo
                         */
                        if ($cont_historial == 2) {
                            echo 'Error';
                        }
//                        } else {
//                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
//                            $idnoperiodo->idnoperiodo = 1;
//                        }
                    }
                } else {
                    $aux = $cont - 1;
                    $comparar_anterior = $excel[$aux][6];
                    if ($excel[$cont][6] == $comparar_anterior) {
                        
                    } else {
                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                        if ($alumno == null) {
                            $arr_alumno = array();
                            $arr_alumno['nombre'] = $excel[$cont][5];
                            $arr_alumno['apellido1'] = $excel[$cont][3];
                            $arr_alumno['apellido2'] = $excel[$cont][4];
                            $arr_alumno['curp'] = $excel[$cont][6];
                            $arr_alumno['genero'] = $excel[$cont][10];
                            $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                            $arr_alumno['estatus'] = 1;
                            $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                            $arr_inscripcion['fecha'] = date('Y-m-d');
                            $arr_inscripcion['estatus'] = 1;
                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_inscripcion['idespecialidad'] = NULL;
                            }
                            $arr_inscripcion['idalumno'] = $alumno_id;
                            $arr_inscripcion['idmodalidad'] = $modalidad;
                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                            $arr_inscripcion['idturno'] = $idturno->idturno;
                            $arr_inscripcion['idestado'] = $idestado->idestado;
                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = null;
                            }
                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                            $alumnos_inscritos++;
                        } else {
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $historial = $this->inscripcion_model->historial($alumno->idalumno);
                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                                $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                                if ($cont == 0) {
                                    $cont_historial = 0;
                                    foreach ($historial as $periodo_cursado) {
                                        if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                            //echo 'Quiere repetir este semestre';
                                            $cont_historial++;
                                        } else {
                                            //echo 'Esta normal';
                                        }
                                    }
                                } else {
                                    $aux = $cont - 1;
                                    $comparar_anterior = $excel[$aux][6];
                                    if ($excel[$cont][6] == $comparar_anterior) {
                                        
                                    } else {
                                        $cont_historial = 0;
                                        foreach ($historial as $periodo_cursado) {
                                            if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                                //echo 'Quiere repetir este semestre';
                                                $cont_historial++;
                                            } else {
                                                //echo 'Esta normal';
                                            }
                                        }
                                    }
                                }
                                /*
                                 * Cuando va a tomar su oportunidad de repetir un semestre
                                 */
                                if ($cont_historial == 1) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 11) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            /*
                                                             * Aqui va lo de inscribir a los nuevos alumnos
                                                             */
                                                            if ($cont == 0) {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {

                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);



                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Va en forma
                                 */
                                if ($cont_historial == 0) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4) {
                                        if ($reprobadas_carrera->reprobadas < 11) {
                                            if ($reprobadas_periodo->reprobadas < 4) {
                                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                                //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                                $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                                if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                    $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                    if ($cont == 0) {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            if ($validar_curp != NULL) {

                                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                                $arr_inscripcion['estatus'] = 1;
                                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                                if ($excel[$cont][0] != NULL) {
                                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                                } else {
                                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                                }
                                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                                if ($tamanio > 1) {
                                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                                } else {
                                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                                }
                                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                                $alumnos_inscritos++;
                                                            } else {
                                                                //echo 'Alumno ya existente';
                                                                if ($cont == 0) {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                } else {
                                                                    $aux = $cont - 1;
                                                                    $comparar_anterior = $excel[$aux][6];
                                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                                        
                                                                    } else {
                                                                        $fila = $excel[$cont][12];
                                                                        $especialidad_noi = $excel[$cont][0];
                                                                        $periodo_noi = $excel[$cont][1];
                                                                        $materia_noi = $excel[$cont][2];
                                                                        $ap_noi = $excel[$cont][3];
                                                                        $am_noi = $excel[$cont][4];
                                                                        $nombres_noi = $excel[$cont][5];
                                                                        $curp_noi = $excel[$cont][6];
                                                                        $genero_noi = $excel[$cont][10];
                                                                        $grupo_noi = $excel[$cont][7];
                                                                        $escuela_noi = $excel[$cont][8];
                                                                        $tipoingreso_noi = $excel[$cont][9];

                                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                        $alumnos_no_inscritos++;
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    //echo 'El grupo llego a su totalidad';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 5) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_quintoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_quintoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 5° semestre';
                                        }
                                    }

                                    if ($idnoperiodo->idnoperiodo == 6) {
                                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        $reprobadasA = $this->calificacion_model->reprobadas_sextoA($alumno->idalumno);
                                        $reprobadasB = $this->calificacion_model->reprobadas_sextoB($alumno->idalumno);

                                        if ($reprobadasA->reprobadas <= 2 && $reprobadasB->reprobadas <= 2) {
                                            $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';

                                                        if ($cont == 0) {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';

                                                            if ($cont == 0) {
                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {
                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {


                                                //echo 'El grupo llego a su totalidad';

                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            echo 'No tiene derecho a reinscripción de 6° semestre';
                                        }
                                    }
                                }
                                /*
                                 * Ya repitio un semestre ya no puede volver a hacerlo
                                 */
                                if ($cont_historial == 2) {
                                    echo 'Error';
                                }
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idnoperiodo->idnoperiodo = 1;
                            }
                        }
                    }
                }
            }

            /*
             * Educación normal
             */
            if ($idnivel->idnivel == 18) {
                if ($cont == 0) {
                    $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                    if ($alumno == null) {
                        $arr_alumno = array();
                        $arr_alumno['nombre'] = $excel[$cont][5];
                        $arr_alumno['apellido1'] = $excel[$cont][3];
                        $arr_alumno['apellido2'] = $excel[$cont][4];
                        $arr_alumno['curp'] = $excel[$cont][6];
                        $arr_alumno['genero'] = $excel[$cont][10];
                        $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                        $arr_alumno['estatus'] = 1;
                        $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                        $arr_inscripcion['fecha'] = date('Y-m-d');
                        $arr_inscripcion['estatus'] = 1;
                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                        if ($excel[$cont][0] != NULL) {
                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                        } else {
                            $arr_inscripcion['idespecialidad'] = NULL;
                        }
                        $arr_inscripcion['idalumno'] = $alumno_id;
                        $arr_inscripcion['idmodalidad'] = $modalidad;
                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                        $arr_inscripcion['idturno'] = $idturno->idturno;
                        $arr_inscripcion['idestado'] = $idestado->idestado;
                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                        if ($tamanio > 1) {
                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                        } else {
                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                            $arr_inscripcion['idnoperiodo'] = null;
                        }
                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                        $alumnos_inscritos++;
                    } else {
                        //if ($tamanio > 1) {
                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                        $historial = $this->inscripcion_model->historial($alumno->idalumno);
                        $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                        $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                        $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                        if ($tamanio > 1) {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);
                        } else {
                            $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo);
                        }
                        //$reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                        if ($cont == 0) {
                            $cont_historial = 0;
                            foreach ($historial as $periodo_cursado) {
                                if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                    //echo 'Quiere repetir este semestre';
                                    $cont_historial++;
                                } else {
                                    //echo 'Esta normal';
                                }
                            }
                        } else {
                            $aux = $cont - 1;
                            $comparar_anterior = $excel[$aux][6];
                            if ($excel[$cont][6] == $comparar_anterior) {
                                
                            } else {
                                $cont_historial = 0;
                                foreach ($historial as $periodo_cursado) {
                                    if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                        //echo 'Quiere repetir este semestre';
                                        $cont_historial++;
                                    } else {
                                        //echo 'Esta normal';
                                    }
                                }
                            }
                        }
                        /*
                         * Va en forma
                         */
                        if ($cont_historial == 0) {
                            if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4 || $idnoperiodo->idnoperiodo == 5 || $idnoperiodo->idnoperiodo == 6) {
                                if ($reprobadas_periodo->reprobadas <= 4) {
                                    $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                    $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                    //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                    $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                    if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                        $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                        if ($cont == 0) {
                                            if ($validar_curp != NULL) {

                                                $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                $arr_inscripcion['fecha'] = date('Y-m-d');
                                                $arr_inscripcion['estatus'] = 1;
                                                $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                if ($excel[$cont][0] != NULL) {
                                                    $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                    $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                } else {
                                                    $arr_inscripcion['idespecialidad'] = NULL;
                                                }
                                                $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                $arr_inscripcion['idmodalidad'] = $modalidad;
                                                $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                $arr_inscripcion['idturno'] = $idturno->idturno;
                                                $arr_inscripcion['idestado'] = $idestado->idestado;
                                                $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                if ($tamanio > 1) {
                                                    $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                } else {
                                                    $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                    $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                    $arr_inscripcion['idnoperiodo'] = null;
                                                }
                                                $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                $alumnos_inscritos++;
                                            } else {
                                                //echo 'Alumno ya existente';
                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                if ($validar_curp != NULL) {

                                                    $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                    $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                    $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                    $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                    $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                    $arr_inscripcion['fecha'] = date('Y-m-d');
                                                    $arr_inscripcion['estatus'] = 1;
                                                    $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                    $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                    $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                    if ($excel[$cont][0] != NULL) {
                                                        $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                        $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                    } else {
                                                        $arr_inscripcion['idespecialidad'] = NULL;
                                                    }
                                                    $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                    $arr_inscripcion['idmodalidad'] = $modalidad;
                                                    $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                    $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                    $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                    $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                    $arr_inscripcion['idturno'] = $idturno->idturno;
                                                    $arr_inscripcion['idestado'] = $idestado->idestado;
                                                    $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                    $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                    if ($tamanio > 1) {
                                                        $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                    } else {
                                                        $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                        $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                        $arr_inscripcion['idnoperiodo'] = null;
                                                    }
                                                    $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                    $alumnos_inscritos++;
                                                } else {
                                                    //echo 'Alumno ya existente';
                                                    if ($cont == 0) {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    } else {
                                                        $aux = $cont - 1;
                                                        $comparar_anterior = $excel[$aux][6];
                                                        if ($excel[$cont][6] == $comparar_anterior) {
                                                            
                                                        } else {
                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    } else {
                                        //echo 'El grupo llego a su totalidad';
                                        if ($cont == 0) {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        } else {
                                            $aux = $cont - 1;
                                            $comparar_anterior = $excel[$aux][6];
                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                
                                            } else {
                                                $fila = $excel[$cont][12];
                                                $especialidad_noi = $excel[$cont][0];
                                                $periodo_noi = $excel[$cont][1];
                                                $materia_noi = $excel[$cont][2];
                                                $ap_noi = $excel[$cont][3];
                                                $am_noi = $excel[$cont][4];
                                                $nombres_noi = $excel[$cont][5];
                                                $curp_noi = $excel[$cont][6];
                                                $genero_noi = $excel[$cont][10];
                                                $grupo_noi = $excel[$cont][7];
                                                $escuela_noi = $excel[$cont][8];
                                                $tipoingreso_noi = $excel[$cont][9];

                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                $alumnos_no_inscritos++;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        /*
                         * Quiere repetir semestre; no aplica para normal
                         */
                        if ($cont_historial == 1) {
                            if ($cont == 0) {

                                $fila = $excel[$cont][12];
                                $especialidad_noi = $excel[$cont][0];
                                $periodo_noi = $excel[$cont][1];
                                $materia_noi = $excel[$cont][2];
                                $ap_noi = $excel[$cont][3];
                                $am_noi = $excel[$cont][4];
                                $nombres_noi = $excel[$cont][5];
                                $curp_noi = $excel[$cont][6];
                                $genero_noi = $excel[$cont][10];
                                $grupo_noi = $excel[$cont][7];
                                $escuela_noi = $excel[$cont][8];
                                $tipoingreso_noi = $excel[$cont][9];

                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                $alumnos_no_inscritos++;
                            } else {
                                $aux = $cont - 1;
                                $comparar_anterior = $excel[$aux][6];
                                if ($excel[$cont][6] == $comparar_anterior) {
                                    
                                } else {

                                    $fila = $excel[$cont][12];
                                    $especialidad_noi = $excel[$cont][0];
                                    $periodo_noi = $excel[$cont][1];
                                    $materia_noi = $excel[$cont][2];
                                    $ap_noi = $excel[$cont][3];
                                    $am_noi = $excel[$cont][4];
                                    $nombres_noi = $excel[$cont][5];
                                    $curp_noi = $excel[$cont][6];
                                    $genero_noi = $excel[$cont][10];
                                    $grupo_noi = $excel[$cont][7];
                                    $escuela_noi = $excel[$cont][8];
                                    $tipoingreso_noi = $excel[$cont][9];

                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                    $alumnos_no_inscritos++;
                                }
                            }
                        }
                        /*
                         * Ya repitio un semestre ya no puede volver a hacerlo
                         */
                        if ($cont_historial == 2) {
                            echo 'Error';
                        }
//                        } else {
//                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
//                            $idnoperiodo->idnoperiodo = 1;
//                        }
                    }
                } else {
                    $aux = $cont - 1;
                    $comparar_anterior = $excel[$aux][6];
                    if ($excel[$cont][6] == $comparar_anterior) {
                        
                    } else {
                        $alumno = $this->alumno_model->alumno_existente($excel[$cont][6]);
                        if ($alumno == null) {
                            $arr_alumno = array();
                            $arr_alumno['nombre'] = $excel[$cont][5];
                            $arr_alumno['apellido1'] = $excel[$cont][3];
                            $arr_alumno['apellido2'] = $excel[$cont][4];
                            $arr_alumno['curp'] = $excel[$cont][6];
                            $arr_alumno['genero'] = $excel[$cont][10];
                            $arr_alumno['idestatusalumno'] = $excel[$cont][11];
                            $arr_alumno['estatus'] = 1;
                            $alumno_id = $this->alumno_model->crear_alumno($arr_alumno);

                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                            $arr_inscripcion['fecha'] = date('Y-m-d');
                            $arr_inscripcion['estatus'] = 1;
                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                            if ($excel[$cont][0] != NULL) {
                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                            } else {
                                $arr_inscripcion['idespecialidad'] = NULL;
                            }
                            $arr_inscripcion['idalumno'] = $alumno_id;
                            $arr_inscripcion['idmodalidad'] = $modalidad;
                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                            $arr_inscripcion['idturno'] = $idturno->idturno;
                            $arr_inscripcion['idestado'] = $idestado->idestado;
                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                $arr_inscripcion['idnoperiodo'] = null;
                            }
                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                            $alumnos_inscritos++;
                        } else {
                            if ($tamanio > 1) {
                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                $historial = $this->inscripcion_model->historial($alumno->idalumno);
                                $idacuerdo=$this->calificacion_model->consultar_acuerdo($acuerdo);
                                $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $idacuerdo->idacuerdo);
                                $reprobadas_carrera = $this->calificacion_model->reprobadas_carrera($alumno->idalumno, $data['carrera']->idcarrera);
                                $reprobadas_periodo = $this->calificacion_model->reprobadas_periodo($alumno->idalumno, $idperiodo->idperiodo, $idnoperiodo->idnoperiodo);


                                if ($cont == 0) {
                                    $cont_historial = 0;
                                    foreach ($historial as $periodo_cursado) {
                                        if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                            //echo 'Quiere repetir este semestre';
                                            $cont_historial++;
                                        } else {
                                            //echo 'Esta normal';
                                        }
                                    }
                                } else {
                                    $aux = $cont - 1;
                                    $comparar_anterior = $excel[$aux][6];
                                    if ($excel[$cont][6] == $comparar_anterior) {
                                        
                                    } else {
                                        $cont_historial = 0;
                                        foreach ($historial as $periodo_cursado) {
                                            if ($periodo_cursado->idnoperiodo == $idnoperiodo->idnoperiodo) {
                                                //echo 'Quiere repetir este semestre';
                                                $cont_historial++;
                                            } else {
                                                //echo 'Esta normal';
                                            }
                                        }
                                    }
                                }
                                /*
                                 * Va en forma
                                 */
                                if ($cont_historial == 0) {
                                    if ($idnoperiodo->idnoperiodo == 2 || $idnoperiodo->idnoperiodo == 3 || $idnoperiodo->idnoperiodo == 4 || $idnoperiodo->idnoperiodo == 5 || $idnoperiodo->idnoperiodo == 6) {
                                        if ($reprobadas_periodo->reprobadas <= 4) {
                                            $data['alumnosxgrupo'] = $this->inscripcion_model->consultar_grupo($excel[$cont][7], $acuerdo);
                                            //$idga = $this->inscripcion_model->consultar_grupo($excel[$cont][7],$acuerdo);
                                            $capacidad_actual = $this->inscripcion_model->capacidad($data['alumnosxgrupo']->idga);
                                            if ($capacidad_actual->actuales < $data['alumnosxgrupo']->alumnosxgrupo) {
                                                $validar_curp = $this->alumno_model->alumno_existente($excel[$cont][6]);
                                                if ($cont == 0) {
                                                    if ($validar_curp != NULL) {

                                                        $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                        $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                        $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                        $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                        $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                        $arr_inscripcion['fecha'] = date('Y-m-d');
                                                        $arr_inscripcion['estatus'] = 1;
                                                        $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                        $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                        $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                        if ($excel[$cont][0] != NULL) {
                                                            $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                            $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                        } else {
                                                            $arr_inscripcion['idespecialidad'] = NULL;
                                                        }
                                                        $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                        $arr_inscripcion['idmodalidad'] = $modalidad;
                                                        $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                        $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                        $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                        $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                        $arr_inscripcion['idturno'] = $idturno->idturno;
                                                        $arr_inscripcion['idestado'] = $idestado->idestado;
                                                        $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                        $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                        if ($tamanio > 1) {
                                                            $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                        } else {
                                                            $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                            $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                            $arr_inscripcion['idnoperiodo'] = null;
                                                        }
                                                        $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                        $alumnos_inscritos++;
                                                    } else {
                                                        //echo 'Alumno ya existente';
                                                        /*
                                                         * Aqui va lo de inscribir a los nuevos alumnos
                                                         */
                                                        if ($cont == 0) {

                                                            $fila = $excel[$cont][12];
                                                            $especialidad_noi = $excel[$cont][0];
                                                            $periodo_noi = $excel[$cont][1];
                                                            $materia_noi = $excel[$cont][2];
                                                            $ap_noi = $excel[$cont][3];
                                                            $am_noi = $excel[$cont][4];
                                                            $nombres_noi = $excel[$cont][5];
                                                            $curp_noi = $excel[$cont][6];
                                                            $genero_noi = $excel[$cont][10];
                                                            $grupo_noi = $excel[$cont][7];
                                                            $escuela_noi = $excel[$cont][8];
                                                            $tipoingreso_noi = $excel[$cont][9];

                                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                            $alumnos_no_inscritos++;
                                                        } else {
                                                            $aux = $cont - 1;
                                                            $comparar_anterior = $excel[$aux][6];
                                                            if ($excel[$cont][6] == $comparar_anterior) {
                                                                
                                                            } else {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            }
                                                        }
                                                    }
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        if ($validar_curp != NULL) {

                                                            $idciclo = $this->inscripcion_model->consultar_ciclo($result);
                                                            $idnivel = $this->inscripcion_model->consultar_nivel($nivel);
                                                            $idturno = $this->inscripcion_model->consultar_turno($turno);
                                                            $idestado = $this->inscripcion_model->consultar_estado($estado);
                                                            $idmunicipio = $this->inscripcion_model->consultar_municipio($municipio);
                                                            $arr_inscripcion['fecha'] = date('Y-m-d');
                                                            $arr_inscripcion['estatus'] = 1;
                                                            $arr_inscripcion['usuariomodificacion'] = $this->session->userdata('idusu');
                                                            $arr_inscripcion['idciclo'] = $idciclo->idciclo;
                                                            $arr_inscripcion['idcarrera'] = $data['carrera']->idcarrera;
                                                            if ($excel[$cont][0] != NULL) {
                                                                $idespecialidad = $this->inscripcion_model->consultar_especialidad($excel[$cont][0]);
                                                                $arr_inscripcion['idespecialidad'] = $idespecialidad->idespecialidad;
                                                            } else {
                                                                $arr_inscripcion['idespecialidad'] = NULL;
                                                            }
                                                            $arr_inscripcion['idalumno'] = $validar_curp->idalumno;
                                                            $arr_inscripcion['idmodalidad'] = $modalidad;
                                                            $arr_inscripcion['cvecentrotrab'] = $clave_centro_trabajo;
                                                            $arr_inscripcion['idingreso'] = $excel[$cont][9];
                                                            $arr_inscripcion['idga'] = $data['alumnosxgrupo']->idga;
                                                            $arr_inscripcion['idnivel'] = $idnivel->idnivel;
                                                            $arr_inscripcion['idturno'] = $idturno->idturno;
                                                            $arr_inscripcion['idestado'] = $idestado->idestado;
                                                            $arr_inscripcion['idmunicipio'] = $idmunicipio->idmunicipio;
                                                            $arr_inscripcion['idinstitucion'] = $idinstitucion->idinstitucion;

                                                            if ($tamanio > 1) {
                                                                $idnoperiodo = $this->inscripcion_model->consultar_n($array[0]);
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[1]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = $idnoperiodo->idnoperiodo;
                                                            } else {
                                                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                                                $arr_inscripcion['idperiodo'] = $idperiodo->idperiodo;
                                                                $arr_inscripcion['idnoperiodo'] = null;
                                                            }
                                                            $this->inscripcion_model->crear_inscripcion($arr_inscripcion);
                                                            $alumnos_inscritos++;
                                                        } else {
                                                            //echo 'Alumno ya existente';
                                                            if ($cont == 0) {

                                                                $fila = $excel[$cont][12];
                                                                $especialidad_noi = $excel[$cont][0];
                                                                $periodo_noi = $excel[$cont][1];
                                                                $materia_noi = $excel[$cont][2];
                                                                $ap_noi = $excel[$cont][3];
                                                                $am_noi = $excel[$cont][4];
                                                                $nombres_noi = $excel[$cont][5];
                                                                $curp_noi = $excel[$cont][6];
                                                                $genero_noi = $excel[$cont][10];
                                                                $grupo_noi = $excel[$cont][7];
                                                                $escuela_noi = $excel[$cont][8];
                                                                $tipoingreso_noi = $excel[$cont][9];

                                                                $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                $alumnos_no_inscritos++;
                                                            } else {
                                                                $aux = $cont - 1;
                                                                $comparar_anterior = $excel[$aux][6];
                                                                if ($excel[$cont][6] == $comparar_anterior) {
                                                                    
                                                                } else {

                                                                    $fila = $excel[$cont][12];
                                                                    $especialidad_noi = $excel[$cont][0];
                                                                    $periodo_noi = $excel[$cont][1];
                                                                    $materia_noi = $excel[$cont][2];
                                                                    $ap_noi = $excel[$cont][3];
                                                                    $am_noi = $excel[$cont][4];
                                                                    $nombres_noi = $excel[$cont][5];
                                                                    $curp_noi = $excel[$cont][6];
                                                                    $genero_noi = $excel[$cont][10];
                                                                    $grupo_noi = $excel[$cont][7];
                                                                    $escuela_noi = $excel[$cont][8];
                                                                    $tipoingreso_noi = $excel[$cont][9];

                                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                                    $alumnos_no_inscritos++;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            } else {
                                                //echo 'El grupo llego a su totalidad';
                                                if ($cont == 0) {
                                                    $fila = $excel[$cont][12];
                                                    $especialidad_noi = $excel[$cont][0];
                                                    $periodo_noi = $excel[$cont][1];
                                                    $materia_noi = $excel[$cont][2];
                                                    $ap_noi = $excel[$cont][3];
                                                    $am_noi = $excel[$cont][4];
                                                    $nombres_noi = $excel[$cont][5];
                                                    $curp_noi = $excel[$cont][6];
                                                    $genero_noi = $excel[$cont][10];
                                                    $grupo_noi = $excel[$cont][7];
                                                    $escuela_noi = $excel[$cont][8];
                                                    $tipoingreso_noi = $excel[$cont][9];

                                                    $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                    $alumnos_no_inscritos++;
                                                } else {
                                                    $aux = $cont - 1;
                                                    $comparar_anterior = $excel[$aux][6];
                                                    if ($excel[$cont][6] == $comparar_anterior) {
                                                        
                                                    } else {
                                                        $fila = $excel[$cont][12];
                                                        $especialidad_noi = $excel[$cont][0];
                                                        $periodo_noi = $excel[$cont][1];
                                                        $materia_noi = $excel[$cont][2];
                                                        $ap_noi = $excel[$cont][3];
                                                        $am_noi = $excel[$cont][4];
                                                        $nombres_noi = $excel[$cont][5];
                                                        $curp_noi = $excel[$cont][6];
                                                        $genero_noi = $excel[$cont][10];
                                                        $grupo_noi = $excel[$cont][7];
                                                        $escuela_noi = $excel[$cont][8];
                                                        $tipoingreso_noi = $excel[$cont][9];

                                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                                        $alumnos_no_inscritos++;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                                /*
                                 * Va en forma
                                 */
                                if ($cont_historial == 1) {
                                    if ($cont == 0) {
                                        $fila = $excel[$cont][12];
                                        $especialidad_noi = $excel[$cont][0];
                                        $periodo_noi = $excel[$cont][1];
                                        $materia_noi = $excel[$cont][2];
                                        $ap_noi = $excel[$cont][3];
                                        $am_noi = $excel[$cont][4];
                                        $nombres_noi = $excel[$cont][5];
                                        $curp_noi = $excel[$cont][6];
                                        $genero_noi = $excel[$cont][10];
                                        $grupo_noi = $excel[$cont][7];
                                        $escuela_noi = $excel[$cont][8];
                                        $tipoingreso_noi = $excel[$cont][9];

                                        $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                        $alumnos_no_inscritos++;
                                    } else {
                                        $aux = $cont - 1;
                                        $comparar_anterior = $excel[$aux][6];
                                        if ($excel[$cont][6] == $comparar_anterior) {
                                            
                                        } else {
                                            $fila = $excel[$cont][12];
                                            $especialidad_noi = $excel[$cont][0];
                                            $periodo_noi = $excel[$cont][1];
                                            $materia_noi = $excel[$cont][2];
                                            $ap_noi = $excel[$cont][3];
                                            $am_noi = $excel[$cont][4];
                                            $nombres_noi = $excel[$cont][5];
                                            $curp_noi = $excel[$cont][6];
                                            $genero_noi = $excel[$cont][10];
                                            $grupo_noi = $excel[$cont][7];
                                            $escuela_noi = $excel[$cont][8];
                                            $tipoingreso_noi = $excel[$cont][9];

                                            $tabla_no_inscritos .= '<tr><td>' . $fila . '</td><td>' . $especialidad_noi . '</td><td>' . $periodo_noi . '</td><td>' . $materia_noi . '</td><td>' . $ap_noi . '</td><td>' . $am_noi . '</td><td>' . $nombres_noi . '</td><td>' . $curp_noi . '</td><td>' . $genero_noi . '</td><td>' . $grupo_noi . '</td><td>' . $escuela_noi . '</td><td>' . $tipoingreso_noi . '</td><td></td></tr>';
                                            $alumnos_no_inscritos++;
                                        }
                                    }
                                }
                                /*
                                 * Ya repitio un semestre ya no puede volver a hacerlo
                                 */
                                if ($cont_historial == 2) {
                                    echo 'Error';
                                }
                            } else {
                                $idperiodo = $this->inscripcion_model->consultar_periodo($array[0]);
                                $idnoperiodo->idnoperiodo = 1;
                            }
                        }
                    }
                }
            }
        }
        $tabla_no_inscritos .= '</tbody></table></div><button type="button" class="btn btn-warning next text-left" id="btnNotif" name="btnNotif">
                                    <i class="fa fa-exclamation-triangle">Notificar</i>
                                </button>';
//        $output.='<div class="hidden">'
//                . '<form action="" method="post" id="form-inscripcion">'
//                . '<input type="hidden"  name="inscritos" id="inscritos" value="'.$alumnos_inscritos.'"/>'
//                . '</form>'
//                . '</div>';
        //$output.='<input type="hidden"  name="inscritos" id="inscritos" value="'.$alumnos_inscritos.'"/>';
        //echo json_encode(array("response_code" => 200, "alumnos_inscritos" => $alumnos_inscritos, "alumnos_no_inscritos" => $alumnos_no_inscritos, array("otro" => $noinscritos)));
        echo json_encode(array("response_code" => 200, "alumnos_inscritos" => $alumnos_inscritos, "alumnos_no_inscritos" => $alumnos_no_inscritos, "tabla" => $tabla_no_inscritos));
        /**
         * Imprimimos el excel para ver el contenido de la matriz
         */
        //print_r($excel);
    }

    public function notificar() {
        $arr_notificacion = array(
            "tipo" => 10,
            "leido" => 0,
            "idusuarioorigen" => $this->session->userdata('idusu'),
            "idrol" => 12,
            "idusuariodestino" => null,
            "fecha" => date('Y-m-d H:i:s')
        );
        $this->notificacion_model->crear_notificacion($arr_notificacion);
        echo json_encode(array("response_code" => 200));
    }

}
