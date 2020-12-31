<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tipo_ingreso_model
 *
 * @author UTEQ
 */
class periodo_model extends CI_Model {

    //put your code here

    public function crear_periodo($arr) {
        $this->db->insert('periodo', $arr);
        return TRUE;
    }

    public function lista_de_periodo() {
        $cmd = "SELECT * FROM periodo WHERE "
                . "estatus = 1 ORDER BY idperiodo DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consulta_periodo($id) {
        $cmd="SELECT * FROM periodo WHERE idperiodo='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function  editar_periodo($id,$nom){
        $cmd = "UPDATE periodo SET nomperiodo='$nom' WHERE idperiodo='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function eliminar($id){
    	$cmd = "UPDATE periodo SET estatus=0 WHERE idperiodo='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM periodo WHERE nomperiodo LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE periodo SET estatus=1 WHERE idperiodo='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
