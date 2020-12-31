<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
        }
    }

    public function index()
    {
        $arreglo_sesiones = array(
            'idusu' => FALSE,
            'nomusu' => FALSE,
            'correousu' => FALSE,
            'idsolicitud' => FALSE,
            'is_login' => FALSE
        );
        $this->session->unset_userdata($arreglo_sesiones);
        $this->session->sess_destroy();
        redirect(base_url()."login", 'refresh');
    }

}

/* End of file logout.php */
/* Location: ./application/controllers/app/logout.php */
