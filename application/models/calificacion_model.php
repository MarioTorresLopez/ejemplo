<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calificacion_model
 *
 * @author UTEQ
 */
class calificacion_model extends CI_Model {
    public function calificacion_inscripcion($arr) {
        $this->db->insert('calificacion', $arr);
        return true;
    }
    
    public function checar_cal_inscripcion($alumno,$materia,$periodo,$numperiodo = 0) {
        $cmd = "select count(clf.calificacion) oportunidades from calificacion clf where clf.calificacion<=5 and clf.idmateria='$materia' and clf.idalumno='$alumno' and clf.idperiodo='$periodo'";
        if($numperiodo != 0) {
            $cmd .= " and clf.idnoperiodo='$numperiodo'";
        }
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function checar_cal_inscripcion_opt($alumno,$materia,$periodo,$numperiodo = 0) {
        $cmd = "select count(clf.calificacion) oportunidades from calificacion clf where clf.calificacion<=5 and clf.idopt='$materia' and clf.idalumno='$alumno' and clf.idperiodo='$periodo'";
        if($numperiodo != 0) {
            $cmd .= " and clf.idnoperiodo='$numperiodo'";
        }
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_carrera($alumno,$carrera) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and clf.idcarrera='$carrera'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_periodo($alumno,$periodo,$numperiodo = 0) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and clf.idperiodo='$periodo'";
        if($numperiodo != 0) {
            $cmd .= " and clf.idnoperiodo='$numperiodo'";
        }
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_quintoA($alumno) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and (clf.idnoperiodo=1 or clf.idnoperiodo=2 or clf.idnoperiodo=3)";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_quintoB($alumno) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and clf.idnoperiodo=4";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_sextoA($alumno) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and (clf.idnoperiodo=2 or clf.idnoperiodo=3 or clf.idnoperiodo=4)";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function reprobadas_sextoB($alumno) {
        $cmd = "select count(clf.calificacion) reprobadas from calificacion clf where clf.calificacion<=5 and clf.idalumno='$alumno' and clf.idnoperiodo=5";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function ultima_calf($alumno,$materia) {
        $cmd = "SELECT max(clf.fechaexamen),clf.calificacion FROM   calificacion clf WHERE  clf.idalumno='$alumno' and clf.idmateria='$materia' GROUP BY clf.calificacion";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function ultima_calf_opt($alumno,$materia) {
        $cmd = "SELECT max(clf.fechaexamen),clf.calificacion FROM   calificacion clf WHERE  clf.idalumno='$alumno' and clf.idopt='$materia' GROUP BY clf.calificacion";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function actualizar_alumno($alumno,$estatus) {
        $cmd = "UPDATE alumno SET idestatusalumno='$estatus' WHERE idalumno='$alumno'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    
    public function consultar_mapa_curricular($periodo,$noperiodo,$idpe) {
        $cmd = "select * from mapacurricular where idperiodo='$periodo' and idnoperiodo='$noperiodo' and idpe='$idpe'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_materias_plan($idmc) {
        $cmd = "select * from materia where idmc='$idmc'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_plan($clave,$nomplan,$noacuerdo) {
        $cmd = "select * from planestudios where claplanestudios like '$clave' and nomplanestudios like '$nomplan' and nomacuerdo like '$noacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_acuerdo($noacuerdo) {
        $cmd = "select * from acuerdo where noacuerdo like '$noacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
    
    public function consultar_optativas($idpe) {
        $cmd = "select * from optativa where idpe='$idpe'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_optativa($nombre,$idplan) {
        $cmd = "select * from optativa where nomoptativa like '$nombre' and idpe='$idplan'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
    }
}
