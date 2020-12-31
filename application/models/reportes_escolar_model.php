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
class reportes_escolar_model extends CI_Model {

    //put your code here

    public function consultar_niveles() {
         $cmd = "SELECT * FROM nivel WHERE estatus = 1 order by idnivel asc ";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_escuelas() {
        $cmd = "select * from institucion where estatusincorporado=1 or estatusincorporado=0 "
                . "or estatusincorporado=4 order by idinstitucion desc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_carreras() {
        $cmd="select * from carrera where estatus =1";
    	$query = $this->db->query($cmd);
    return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_especialidades() {
        $cmd="select * from especialidad where estatus =1";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
      public function consultar_ciclos() {
        $cmd="select idciclo, concat(fechainicio,'-', fechafinal) ciclo from ciclo order by idciclo desc";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
       public function consultar_turnos() {
        $cmd="select * from turno where estatus=1";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    

       public function consultar_modalidades() {
        $cmd="select * from modalidad where estatus=1";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
       public function consultar_municipios() {
        $cmd="select * from municipio where idestado=22";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
         public function consultar_por_nivel() {
        $cmd="select * from municipio where idestado=22";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    

   
}
