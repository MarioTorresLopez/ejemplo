<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_grupo_model
 *
 * @author CIDTAI
 */
class tipo_grupo_model extends CI_Model {
    
    public function consultar_tipo_grupos() {
        $cmd = "SELECT * FROM tipogrupo ORDER BY idtipogrupo ASC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
}
