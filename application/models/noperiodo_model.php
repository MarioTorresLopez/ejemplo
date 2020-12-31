<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of noperiodo_model
 *
 * @author CIDTAI
 */
class noperiodo_model extends CI_Model {
    
    public function consultar_noperiodo() {
        
        $cmd = "SELECT * FROM noperiodo WHERE estatus = 1 ORDER BY idnoperiodo ASC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
}
