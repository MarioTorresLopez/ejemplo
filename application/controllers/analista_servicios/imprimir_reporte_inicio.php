<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imprimir_kardex_mediasup_sup
 *
 * @author CIDTAI
 */
class imprimir_reporte_inicio extends CI_Controller {
    
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
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('is_login')) {
            redirect(base_url()."login", 'refresh');
        }
    }

    //put your code here
    public function index(){
        
        $this->load->view("app/private/fragments/modules/Modulo2/analista_servicios/imprimir_reporte_inicio_view");
        
    }
    
}
