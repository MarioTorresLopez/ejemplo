<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        /*
        Validamos los $_POST
         */
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        if ($this->form_validation->run()) {
            $correousu = $this->input->post('username');
            $passwordusu = md5($this->input->post('password'));

            $this->load->model('login_model');
            $datos_usuario = $this->login_model->consultar_usuario($correousu, $passwordusu);

            if (!is_null($datos_usuario)) {

                $arreglo_sesiones = array(
                    'idusu' => $datos_usuario->idusu,
                    'nomusu' => $datos_usuario->nomusu,
                    'correousu' => $datos_usuario->correousu,
                    'is_login' => TRUE
                );
                
                $this->session->set_userdata( $arreglo_sesiones );

                //Gestioar una solsa sesion
                $this->session->set_userdata("OTRA_SESION", "OTRO_VALOR");
                $this->session->unset_userdata('OTRA_SESION');

                redirect(base_url()."app/inicio",'refresh');

            } else {
                $this->session->set_flashdata('usuario_incorrecto', 'Los datos introducidos son incorrectos');
                redirect(base_url() . 'login', 'refresh');
            }
        }
        
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */
