<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_proceso
 *
 * @author UTEQ
 */
class tipo_proceso_model extends CI_Model {
    
    public function consultar_tipo_proceso() {
        $cmd = "SELECT * FROM tipoproceso WHERE estatus = 1 ORDER BY idproceso DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
}
