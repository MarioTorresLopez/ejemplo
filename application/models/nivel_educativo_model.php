<?php 

/*
 * Modelo del controlador de nivel educativo 
 *
 * Modelo que contenga las consultas necesarias para realizar el CRUD de nivel educativo. (create,read,update,delete)
 * 
 * @since       1.0
 * @version     1.0
 * @link        NA
 * @package     application.views
 * @subpackage  libs
 * @author      CIDTAI - UTEQ Dev Team <cidtai@uteq.edu.mx>
 * @uses        ./application/models/nivel_educativo_model.php
 */


class nivel_educativo_model extends CI_Model {
    
    //Función para consultar todos los registros de la tabla de nivel educativo 
    public function consultar_niveles() {

        $cmd = "SELECT * FROM nivel WHERE estatus = 1 ORDER BY idnivel DESC";
        $query = $this->db->query($cmd);
		return ($query->num_rows() > 0) ? $query->result() : NULL;

    }

    //Función para seleccionar un registro en especifico
    public function consultar_nivel_educativo($id){

    	$cmd = "SELECT * FROM nivel WHERE idnivel='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;

    }

    //Función para crear un nuevo nivel educativo
	public function crear_nivel_educativo($arr) {

		$this->db->insert('nivel', $arr);
		return TRUE;

	}
    
    //Función para editar un registro 
    public function  editar_nivel_educativo($id,$nombre){

        $cmd = "UPDATE nivel SET nomnivel='$nombre' WHERE idnivel='$id'";
        $query = $this->db->query($cmd);
        return TRUE;

    }

    //Función para eliminar un registro
    public function eliminar_nivel_educativo($id){

    	$cmd = "UPDATE nivel SET estatus=0 WHERE idnivel='$id'";
        $query = $this->db->query($cmd);
        return TRUE;

    }

    public function existente($nombre){

        $cmd="SELECT * FROM nivel WHERE nomnivel LIKE '$nombre'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE nivel SET estatus=1 WHERE idnivel='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
