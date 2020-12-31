<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_alumnado_model
 *
 * @author CIDTAI
 */
class tipo_alumnado_model extends CI_Model {
    
    public function consultar_tipo_alumnado(){
        
        $cmd = "SELECT * FROM tipoalumnado";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
}
