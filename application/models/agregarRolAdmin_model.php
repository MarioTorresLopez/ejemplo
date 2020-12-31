<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of agregarRolAdmin
 *
 * @author CIDTAI-UTEQ
 */
class agregarRolAdmin extends CI_Model{
    //put your code here
      public function consultar_rol() {
        $cmd = "SELECT * FROM rol  ORDER BY idrol DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_usuario_rol() {
        $cmd = "SELECT * FROM rol WHERE estatus = 1 ORDER BY idrol ASC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    //Metodo que inserte en la tabla usuario
	public function crear_rol($arr) {
		$this->db->insert('rol', $arr);
		return TRUE;
	}
       
     public function activar_rol($id){
        $cmd = "UPDATE rol SET estatus=1 WHERE idrol='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
}
