<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plantilla_docente
 *
 * @author UTEQ
 */
class plantilla_docente extends CI_Controller{
    
    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url() . "login", 'refresh');
        }
        $this->load->model('notificacion_model');
        $this->load->model('filtrados_escolar_model');
        $this->load->model('tipo_evaluacion_model');
        $this->load->model('equivalencia_model');
    }
    
    public function anexob() {
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
        $data['titulo'] = app_title() . " | Plantilla docente";
        $data['scripts'] = array();
        $data['scripts'][] = 'subir_plantilla_excel';

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
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
        $data['breadcrumbs']['titulo'] = "Anexo B";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Listado de solicitudes');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo4\anexob_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function anexoc() {
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
        $data['titulo'] = app_title() . " | Plantilla docente";
        $data['scripts'] = array();

        /**
          Invocar la consulta para saber el rol del usuario
         */
        $id = $this->session->userdata('idusu');
        $data['valor'] = $this->login_model->cargar_rol($id);
        $a = $data['valor']->rol;
        $data['modulos'] = $this->login_model->cargar_modulos2($a);
//        $data['thead_calificaciones'] = $this->filtrados_escolar_model->consultar_thead_calificacion_alumno($idinstitucion, $idalumno, $idnoperiodo);
//        $data['calificaciones'] = $this->filtrados_escolar_model->consultar_calificaciones_alumno($idalumno, $idnoperiodo);
        
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
        $data['breadcrumbs']['titulo'] = "Anexo C";
        $data['breadcrumbs']['subtitulo'] = "Subtitulo";

        /**
         * Este secciíon muestra la descendencia de la sección 
         * en la que nos encontremos navegando
         * El arreglo Links contiene un arreglo con el nombre y la URL al controlador
         * El último elemento del arreglo NO ES UN ARREGLO, pues es la seccion 
         * donde nos encontramos
         */
        $data['breadcrumbs']['links'] = array(array('AIDE', '#'), array('Inicio', base_url() . 'app/inicio'), 'Listado de solicitudes');

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
        $data['app_fragment'] = $this->load->view('app\private\fragments\modules\Modulo4\anexoc_view', $data, TRUE);

        /**
         * Cargamos la vista completa de la seccion correspondiente
         */
        $this->load->view('app/private/main_view.php', $data, FALSE);
    }
    
    public function subir_excel() {
        $cont = 0;
        if (!empty($_FILES["file"])) {
            //$connect = mysqli_connect("localhost", "root", "12345", "");
            $file_array = explode(".", $_FILES["file"]["name"]);
            $nombre_archivo = $_FILES["file"]["name"];
            $aux_btn = 0;
            if ($file_array[1] == "xlsx") {
                include("PHPExcel-1.8/Classes/PHPExcel/IOFactory.php");

                $object = PHPExcel_IOFactory::load($_FILES["file"]["tmp_name"]);
//                $acuerdo = $object->getActiveSheet()->getCell('C5')->getCalculatedValue();
//                $nivel = $object->getActiveSheet()->getCell('C6')->getCalculatedValue();
//                $clave_plan_estudios = $object->getActiveSheet()->getCell('C7')->getCalculatedValue();
//                $modalidad = $object->getActiveSheet()->getCell('C8')->getCalculatedValue();
//                $carrera = $object->getActiveSheet()->getCell('C9')->getCalculatedValue();
//                $ciclo_escolar = $object->getActiveSheet()->getCell('C10')->getCalculatedValue();
//                $escuela = $object->getActiveSheet()->getCell('C11')->getCalculatedValue();
//                $clave_centro_trabajo = $object->getActiveSheet()->getCell('C12')->getCalculatedValue();
//                $direccion = $object->getActiveSheet()->getCell('C13')->getCalculatedValue();
//                $telefono = $object->getActiveSheet()->getCell('C14')->getCalculatedValue();
//                $turno = $object->getActiveSheet()->getCell('C15')->getCalculatedValue();
//                $tipo = $object->getActiveSheet()->getCell('C16')->getCalculatedValue();
//                $correo = $object->getActiveSheet()->getCell('C17')->getCalculatedValue();
//                $director = $object->getActiveSheet()->getCell('C18')->getCalculatedValue();
//                $repre_legal = $object->getActiveSheet()->getCell('C19')->getCalculatedValue();
//                $estado = $object->getActiveSheet()->getCell('C20')->getCalculatedValue();
//                $municipio = $object->getActiveSheet()->getCell('C21')->getCalculatedValue();
                $output = '';
                $output .= "  
           <label class='text-success'>Lectura completa</label>
                <div class='table-responsive'><table id='example2' class='table table-striped table-bordered table-hover'><thead><tr><th>Fila</th><th>Nombre</th><th>CURP</th><th>RFC</th><th>Sexo</th><th>País origen</th><th>Estado de residencia</th><th>Municipio de residencia</th><th>Domicilio</th><th>Teléfono</th><th>Correo eletrónico</th><th>Función que desempeña</th><th>Nivel académico</th><th>Perfil profesional</th><th>Cédula profesional</th><th>Fecha emisión cédula</th><th>Fecha de ingreso a institución</th><th>Institución expide documento de grado</th><th>Grado</th><th>Grupo</th><th>Total de alumnos</th><th>Asignatura</th><th>Extraescolar</th><th>Autonomía curricular</th></tr></thead><tbody>";
                $cont_grupos = 0;
                foreach ($object->getWorksheetIterator() as $worksheet) {
                    $highestRow = $worksheet->getHighestRow();
                    for ($row = 30; $row < $highestRow; $row++) {
                        $nombre = $object->getActiveSheet()->getCell('A' . $row)->getCalculatedValue();
                        $curp = $object->getActiveSheet()->getCell('B' . $row)->getCalculatedValue();
                        $rfc = $object->getActiveSheet()->getCell('C' . $row)->getCalculatedValue();
                        $sexo = $object->getActiveSheet()->getCell('D' . $row)->getCalculatedValue();
                        $pais_origen = $object->getActiveSheet()->getCell('E' . $row)->getCalculatedValue();
                        $estado_residencia = $object->getActiveSheet()->getCell('F' . $row)->getCalculatedValue();
                        $municipio_residencia = $object->getActiveSheet()->getCell('G' . $row)->getCalculatedValue();
                        $domicilio = $object->getActiveSheet()->getCell('H' . $row)->getCalculatedValue();
                        $telefono = $object->getActiveSheet()->getCell('I' . $row)->getCalculatedValue();
                        $correo = $object->getActiveSheet()->getCell('J' . $row)->getCalculatedValue();
                        $funcion = $object->getActiveSheet()->getCell('K' . $row)->getCalculatedValue();
                        $nivel = $object->getActiveSheet()->getCell('L' . $row)->getCalculatedValue();
                        $perfil_profesional = $object->getActiveSheet()->getCell('M' . $row)->getCalculatedValue();
                        $cedula = $object->getActiveSheet()->getCell('N' . $row)->getCalculatedValue();
                        $fecha_cedula = $object->getActiveSheet()->getCell('O' . $row)->getCalculatedValue();
                        /**
                         * Pasamos ese valor a otra variable para realizar el calculo de la fecha
                         */
                        $xls_date = $fecha_cedula;

                        /**
                         * Este claculo se realiza para saber la fecha que se encuentra en esa celda,
                         * ya que algunos formatos de fecha marcan como numeros las fechas en las celdas
                         */
                        $unix_date = ($xls_date - 25569) * 86400;
                        $xls_date = 25569 + ($unix_date / 86400);
                        $unix_date = ($xls_date - 25568) * 86400;
                        /**
                         * En esta variable guardamos el valor obtenido de los calculos y transformamos al formato de fecha que queramos
                         */
                        $value = date("Y-m-d", $unix_date);

                        $fecha_cedula = $value;
                        $fecha_ingreso = $object->getActiveSheet()->getCell('P' . $row)->getCalculatedValue();
                        /**
                         * Pasamos ese valor a otra variable para realizar el calculo de la fecha
                         */
                        $xls_date = $fecha_ingreso;

                        /**
                         * Este claculo se realiza para saber la fecha que se encuentra en esa celda,
                         * ya que algunos formatos de fecha marcan como numeros las fechas en las celdas
                         */
                        $unix_date = ($xls_date - 25569) * 86400;
                        $xls_date = 25569 + ($unix_date / 86400);
                        $unix_date = ($xls_date - 25568) * 86400;
                        /**
                         * En esta variable guardamos el valor obtenido de los calculos y transformamos al formato de fecha que queramos
                         */
                        $value = date("Y-m-d", $unix_date);

                        $fecha_ingreso = $value;
                        $inst_expide_doc_grado = $object->getActiveSheet()->getCell('Q' . $row)->getCalculatedValue();
                        $grado = $object->getActiveSheet()->getCell('R' . $row)->getCalculatedValue();
                        $grupo = $object->getActiveSheet()->getCell('S' . $row)->getCalculatedValue();
                        $total_alumnos = $object->getActiveSheet()->getCell('T' . $row)->getCalculatedValue();
                        $asignatura = $object->getActiveSheet()->getCell('U' . $row)->getCalculatedValue();
                        $extraescolar = $object->getActiveSheet()->getCell('V' . $row)->getCalculatedValue();
                        $autonomia_curricular = $object->getActiveSheet()->getCell('W' . $row)->getCalculatedValue();
                        
                        $output .= '
                     <tr>  
                        <td>' . $row . '</td>
                          <td>' . $nombre . '</td>  
                          <td>' . $curp . '</td>  
                          <td>' . $rfc . '</td>  
                          <td>' . $sexo . '</td>  
                          <td>' . $pais_origen . '</td>  
                          <td>' . $estado_residencia . '</td>  
                          <td>' . $municipio_residencia . '</td>  
                          <td>' . $domicilio . '</td>  
                          <td>' . $telefono . '</td>  
                          <td>' . $correo . '</td>  
                          <td>' . $funcion . '</td>
                          <td>' . $nivel . '</td>
                          <td>' . $perfil_profesional . '</td>
                          <td>' . $cedula . '</td>
                          <td>' . $fecha_cedula . '</td>
                          <td>' . $fecha_ingreso . '</td>
                          <td>' . $inst_expide_doc_grado . '</td>
                          <td>' . $grado . '</td>
                          <td>' . $grupo . '</td>
                          <td>' . $total_alumnos . '</td>
                          <td>' . $asignatura . '</td>
                          <td>' . $extraescolar . '</td>
                          <td>' . $autonomia_curricular . '</td>
                     </tr>  
                     ';
                        
                        $cont++;
                    }
                }
                $output .= '</tbody></table></div><br>';
                $output .= '<form method="post" action="' . base_url() . 'analista_servicios/inscripcion/inscribir_post" id="form-inscripcion-data">
                                <input type="hidden" id="validador" name="validador" value="' . $nombre_archivo . '">
                                <div class="col-sm-4">
                                   <select class="form-control" style="width: 100%" name="nivel_procedencia" id="nivel_procedencia">
                                        <option value="---Seleccione---">---Seleccione---</option>
                                        <option value="0">Revisado</option>
                                        <option value="1">Revisión</option>
                                        <option value="2">Atendido</option>
                                    </select>
                                </div>    
                                <button type="button" class="btn btn-primary next text-left pruebaBit" id="btnValidador" name="btnValidador">
                                    <i class="fa fa-check">Aceptar</i>
                                </button>
                            </form>
                            ';
                        echo $output;
                //if($aux_btn==0){
                //move_uploaded_file($_FILES['file']['tmp_name'], 'static/excel/'.$nombre_archivo);
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    copy($_FILES['file']['tmp_name'], "static/plantillas/$nombre_archivo");
                    //echo "El archivo se ha subido correctamente al servidor, muchas gracias <p>";
                } else {
                    //echo "Error al subir el archivo";
                }
            } else {
                echo '<label class="text-danger">Archivo no válido</label>';
            }
        } else {
            echo 'Nada';
        }
    }
}
