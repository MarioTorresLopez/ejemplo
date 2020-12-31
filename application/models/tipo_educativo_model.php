<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_educativo_model
 *
 * @author CIDTAI
 */
class tipo_educativo_model extends CI_Model{
    
    //Función para consultar todos los registros de la tabla tipoeducativo 
    public function consultar_tipos_educativos() {

        $cmd = "SELECT * FROM tipoeducativo WHERE estatus = 1 ORDER BY ideducativo DESC";
        $query = $this->db->query($cmd);
		return ($query->num_rows() > 0) ? $query->result() : NULL;

    }
    
}
