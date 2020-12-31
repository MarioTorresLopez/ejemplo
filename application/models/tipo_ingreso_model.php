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
class tipo_ingreso_model extends CI_Model {

    //put your code here

    public function crear_tipo_ingreso($arr) {
        $this->db->insert('tipoingreso', $arr);
        return TRUE;
    }

    public function lista_de_tipo_ingreso() {
        $cmd = "SELECT * FROM tipoingreso WHERE estatus = 1 ORDER BY idingreso DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consulta_tipo_ingreso($id) {
        $cmd="SELECT * FROM tipoingreso WHERE idingreso='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function  editar_tipo_ingreso($id,$nom){
        $cmd = "UPDATE tipoingreso SET nomingreso='$nom' WHERE idingreso='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function eliminar($id){
    	$cmd = "UPDATE tipoingreso SET estatus=0 WHERE idingreso='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM tipoingreso WHERE nomingreso LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE tipoingreso SET estatus=1 WHERE idingreso='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
