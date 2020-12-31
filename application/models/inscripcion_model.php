<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of inscripcion_model
 *
 * @author UTEQ
 */
class inscripcion_model extends CI_Model {
    
    public function consultar_grupo($grupo,$acuerdo) {
        $cmd = "SELECT * FROM gruposacuerdo WHERE idacuerdo='$acuerdo' and grupo LIKE '$grupo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function capacidad($idga) {
        $cmd = "SELECT count(idga) actuales from inscripcion WHERE idga='$idga'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function crear_inscripcion($arr) {
        $this->db->insert('inscripcion', $arr);
        return true;
    }
    
    public function consultar_grupos($acuerdo) {
        $cmd = "select gruposautorizado from acuerdo where idacuerdo ='$acuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_ciclo($ciclo) {
        $cmd="SELECT * FROM ciclo WHERE fechainicio LIKE '$ciclo'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_nivel($nivel) {
        $cmd="SELECT * FROM nivel WHERE nomnivel LIKE '$nivel'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_turno($turno) {
        $cmd="SELECT * FROM turno WHERE descturno LIKE '$turno'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_estado($estado) {
        $cmd="SELECT * FROM estado WHERE nomestado LIKE '$estado'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_municipio($municipio) {
        $cmd="SELECT * FROM municipio WHERE nombremunicipio LIKE '$municipio'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_especialidad($espe) {
        $cmd="SELECT * FROM especialidad WHERE nomespecialidad LIKE '$espe'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_escuela($escuela) {
        $cmd="SELECT * FROM institucion WHERE nombreinstitucion LIKE '$escuela'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_periodo($periodo) {
        $cmd="SELECT * FROM periodo WHERE nomperiodo LIKE '$periodo'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_n($n) {
        $cmd="SELECT * FROM noperiodo  WHERE nomnoperiodo LIKE '$n'";
        $query=$this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function historial($idalumno) {
        $cmd="select idnoperiodo from inscripcion where idalumno='$idalumno'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
}
