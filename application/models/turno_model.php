<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of turno_model
 *
 * @author UTEQ
 */
class turno_model extends CI_Model{
    //put your code here
    public function lista_turnos() {
        $cmd = "SELECT * FROM turno WHERE estatus = 1 ORDER BY idturno DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function crear_turno($arr) {
        $this->db->insert('turno', $arr);
        return TRUE;
    }
    
    public function consultar_turno($id) {
        $cmd="SELECT * FROM turno WHERE idturno='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function editar_turno($id, $nom ) {
        $cmd = "UPDATE turno SET descturno='$nom' WHERE idturno='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function eliminar($id) {
        $cmd = "UPDATE turno SET estatus=0 WHERE idturno='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM turno WHERE descturno LIKE '$nombre'";
        $query=$this->db->query($cmd);
        
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE turno SET estatus=1 WHERE idturno='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
