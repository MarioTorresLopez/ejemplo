<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registro_documentacion_infraestructura
 *
 * @author CIDTAI
 */
class registro_documentacion_infraestructura extends CI_Controller {

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
        //Invocar el models necesario para registrar los documentos
        $this->load->model('documento_model');
    }

    public function subir_documentacion_proteccion_civil() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Protección Civil
        $carpeta_documento_PC = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PC';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PC)) {

                    mkdir($carpeta_documento_PC, 0777, TRUE);

                    //Enviar archivo de protección civil
                    $proteccion_civil = 'proteccion_civil';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($proteccion_civil)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PC)) {

                    mkdir($carpeta_documento_PC, 0777, TRUE);

                    //Enviar archivo de protección civil
                    $proteccion_civil = 'proteccion_civil';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($proteccion_civil)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_PC)) {

                    mkdir($carpeta_documento_PC, 0777, TRUE);

                    //Enviar archivo de protección civil
                    $proteccion_civil = 'proteccion_civil';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($proteccion_civil)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de protección civil
                    $proteccion_civil = 'proteccion_civil';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PC/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($proteccion_civil)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PC';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_const_seg() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Constancia de Seguridad
        $carpeta_documento_CS = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CS';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CS)) {

                    mkdir($carpeta_documento_CS, 0777, TRUE);

                    //Enviar archivo de constancia de seguridad
                    $const_seg = 'const_seg';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($const_seg)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CS)) {

                    mkdir($carpeta_documento_CS, 0777, TRUE);

                    //Enviar archivo de constancia de seguridad
                    $const_seg = 'const_seg';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($const_seg)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_CS)) {

                    mkdir($carpeta_documento_CS, 0777, TRUE);

                    //Enviar archivo de constancia de seguridad
                    $const_seg = 'const_seg';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($const_seg)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de constancia de seguridad
                    $const_seg = 'const_seg';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($const_seg)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_croquis() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Croquis de la Instalación
        $carpeta_documento_CI = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_CI)) {

                    mkdir($carpeta_documento_CI, 0777, TRUE);

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de croquis de la instalación
                    $croquis = 'croquis';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($croquis)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_plano() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Plano Arquitectónico
        $carpeta_documento_PA = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PA';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PA)) {

                    mkdir($carpeta_documento_PA, 0777, TRUE);

                    //Enviar archivo de plano arquitectónico
                    $plano = 'plano';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plano)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_PA)) {

                    mkdir($carpeta_documento_PA, 0777, TRUE);

                    //Enviar archivo de plano arquitectónico
                    $plano = 'plano';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plano)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_PA)) {

                    mkdir($carpeta_documento_PA, 0777, TRUE);

                    //Enviar archivo de plano arquitectónico
                    $plano = 'plano';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plano)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de plano arquitectónico
                    $plano = 'plano';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/PA/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($plano)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-PA';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_perito() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Registro de Perito
        $carpeta_documento_RP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/RP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_RP)) {

                    mkdir($carpeta_documento_RP, 0777, TRUE);

                    //Enviar archivo de registro de perito
                    $perito = 'perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/RP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_RP)) {

                    mkdir($carpeta_documento_RP, 0777, TRUE);

                    //Enviar archivo de registro de perito
                    $perito = 'perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/RP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_RP)) {

                    mkdir($carpeta_documento_RP, 0777, TRUE);

                    //Enviar archivo de registro de perito
                    $perito = 'perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/RP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de registro de perito
                    $perito = 'perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/RP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-RP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_cedula_perito() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Cédula Profesional Perito
        $carpeta_documento_CPP = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_CPP)) {

                    mkdir($carpeta_documento_CPP, 0777, TRUE);

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de cédula profesional perito
                    $cedula_perito = 'cedula_perito';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/CPP/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($cedula_perito)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-CPP';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_dictamen() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Dictamen de Uso de Suelo
        $carpeta_documento_DUS = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DUS';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DUS)) {

                    mkdir($carpeta_documento_DUS, 0777, TRUE);

                    //Enviar archivo de dictamen de uso de suelo
                    $dictamen = 'dictamen';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DUS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($dictamen)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DUS)) {

                    mkdir($carpeta_documento_DUS, 0777, TRUE);

                    //Enviar archivo de dictamen de uso de suelo
                    $dictamen = 'dictamen';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DUS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($dictamen)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_DUS)) {

                    mkdir($carpeta_documento_DUS, 0777, TRUE);

                    //Enviar archivo de dictamen de uso de suelo
                    $dictamen = 'dictamen';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DUS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($dictamen)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de dictamen de uso de suelo
                    $dictamen = 'dictamen';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DUS/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($dictamen)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DUS';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

    public function subir_documentacion_desc_inst() {

        $id_acuerdo = $this->input->post('id_acuerdo');
        $id_usuario = $this->input->post('id_usuario');
        $usu_login = $this->input->post('usu_login');
        $sin_codigo = $this->input->post('sin_codigo');

        //Crear carpeta de acuerdos
        $carpeta_acuerdos = 'static/acuerdos';

        //URL que ayuda a crear una carpeta del acuerdo generado 
        //identificando la carpeta por el id del acuerdo
        $carpeta_acuerdo_generado = 'static/acuerdos/acuerdo_' . $id_acuerdo;

        //URL que genera la carpeta de documento solicitado 
        // Descripción de las Instalaciones
        $carpeta_documento_DI = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DI';


        if (!file_exists($carpeta_acuerdos)) {

            mkdir($carpeta_acuerdos, 0777, TRUE);

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DI)) {

                    mkdir($carpeta_documento_DI, 0777, TRUE);

                    //Enviar archivo de la descripción de las instalaciones
                    $desc_inst = 'desc_inst';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($desc_inst)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        } else {

            if (!file_exists($carpeta_acuerdo_generado)) {

                mkdir($carpeta_acuerdo_generado, 0777, TRUE);

                if (!file_exists($carpeta_documento_DI)) {

                    mkdir($carpeta_documento_DI, 0777, TRUE);

                    //Enviar archivo de la descripción de las instalaciones
                    $desc_inst = 'desc_inst';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($desc_inst)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            } else {

                if (!file_exists($carpeta_documento_DI)) {

                    mkdir($carpeta_documento_DI, 0777, TRUE);

                    //Enviar archivo de la descripción de las instalaciones
                    $desc_inst = 'desc_inst';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($desc_inst)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                } else {

                    //Enviar archivo de la descripción de las instalaciones
                    $desc_inst = 'desc_inst';
                    $config['upload_path'] = 'static/acuerdos/acuerdo_' . $id_acuerdo . '/DI/';
                    $config['file_name'] = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size'] = '50000';
                    $config['max_width'] = '2000';
                    $config['max_height'] = '2000';

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload($desc_inst)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('error_documento', 'Error al cargar su documento.');
                        redirect(base_url() . 'analista/gestion_acuerdos/documentacion_acuerdo/' . $id_acuerdo, 'refresh');
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                        $nombredocumento = $id_usuario . '-' . $id_acuerdo . '-' . $sin_codigo . '-' . $usu_login . '-DI';

                        $arr_reg_documento = array();
                        $arr_reg_documento['nombre_pdf'] = $nombredocumento;
                        $arr_reg_documento['sin_codigo'] = $sin_codigo;
                        $arr_reg_documento['id_usuario'] = $id_usuario;
                        $arr_reg_documento['id_acuerdo'] = $id_acuerdo;

                        $this->documento_model->registrar_documento($arr_reg_documento);

                        redirect(base_url() . "analista/gestion_acuerdos/documentacion_acuerdo/" . $id_acuerdo, 'refresh');
                    }
                }
            }
        }
    }

}
