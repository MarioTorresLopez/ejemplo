<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tramite_catalogo_model
 *
 * @author CIDTAI-UTEQ
 */
class tramite_catalogo_model extends CI_Model {
    //put your code here
    
    public function consultar_tramite_catalogo() {
        $cmd = "SELECT * FROM tipotramite WHERE estatus = 1 ORDER BY idtipotramite DESC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
      public function consultar_modalidad($id){
    	$cmd="SELECT * FROM tipotramite WHERE idtipotramite='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    //Metodo que inserte en la tabla tipotramite
	public function crear_tramite_catalogo($arr) {
		$this->db->insert('tipotramite', $arr);
		return TRUE;
	}

    /*public function crear_modalidad($nombre) {
        $cmd = "INSERT INTO modalidad (nommodalidad,estatus) VALUES ('$nombre',1)";
        $query = $this->db->query($cmd);
        return TRUE;
    }*/
    
    public function  editar_tramite_catalogo($id,$nom){
        $cmd = "UPDATE tipotramite SET descripcion='$nom' WHERE idtipotramite='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar($id){
    	$cmd = "UPDATE tipotramite SET estatus=0 WHERE idtipotramite='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($nombre){

        $cmd="SELECT * FROM tipotramite WHERE descripcion LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE tipotramite SET estatus=1 WHERE idtipotramite='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_modalidad_existente($nom)
    {
        $cmd="SELECT * FROM tipotramite WHERE idtipotramite LIKE '$nom'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
}
