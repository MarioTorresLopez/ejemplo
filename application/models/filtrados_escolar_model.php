<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of filtrados_escolar_model
 *
 * @author CIDTAI
 */
class filtrados_escolar_model extends CI_Model {
    
    //Función para mostrar el listado de todos los alumnos de dicha institución
    //Administrador institución 
    public function consultar_listado_alumnos($idinsti) {
        
        $cmd = "SELECT DISTINCT idnivel, 
            (SELECT nomnivel FROM nivel WHERE nivel.idnivel = inscripcion.idnivel) nomnivel, 
            idcarrera, 
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomcompletoalumno, 
            (SELECT curp FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) curp, 
            estatus, idinstitucion, idga, idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = inscripcion.idperiodo) nomperiodo
            FROM inscripcion 
            WHERE idinstitucion = '$idinsti'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    //Función para mostrar los datos del <THEAD> de la tabla "Periodos del alumno"
    //Administrador institución - Analista servicios escolares (SEP)
    public function consultar_thead_periodos_alumno($idinsti, $idnivel,$idalumno){
        
    	$cmd="SELECT DISTINCT  
            (SELECT nombreinstitucion FROM institucion WHERE institucion.idinstitucion = inscripcion.idinstitucion) nominstitucion, 
            idnivel, 
            (SELECT nomnivel FROM nivel WHERE nivel.idnivel = inscripcion.idnivel) nomnivel, 
            idcarrera, 
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera, 
            idinstitucion, idalumno 
            FROM inscripcion 
            WHERE idinstitucion = '$idinsti' AND idnivel = '$idnivel' AND idalumno = '$idalumno'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //Función para mostrar el listado de periodos que tiene el alumno seleccionado
    //Administrador institución - Analista servicios escolares (SEP)
    public function consultar_listado_periodos_alumno($idinsti, $idnivel, $idalumno) {
        
        $cmd = "SELECT idinscripcion, idnivel, idinstitucion, 
            (SELECT nombreinstitucion FROM institucion WHERE institucion.idinstitucion = inscripcion.idinstitucion) nominstitucion, 
            idciclo, 
            (SELECT concat(fechainicio, '-', fechafinal ) tiempo FROM ciclo WHERE ciclo.idciclo = inscripcion.idciclo) cicloescolar,
            idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = inscripcion.idnoperiodo) nomnoperiodo, 
            idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = inscripcion.idperiodo) nomperiodo, 
            idespecialidad, 
            (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = inscripcion.idespecialidad) nomespecialidad, 
            idga, 
            (SELECT grupo FROM gruposacuerdo WHERE gruposacuerdo.idga = inscripcion.idga) nomgrupo,  
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomcompletoalumno, 
            (SELECT curp FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) curp, 
            estatus, idingreso, 
            (SELECT nomingreso FROM tipoingreso WHERE tipoingreso.idingreso = inscripcion.idingreso) nomingreso
            FROM inscripcion 
            WHERE idinstitucion = '$idinsti' AND idnivel = '$idnivel' AND idalumno = '$idalumno'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    //Función para mostrar los datos del <THEAD> de la tabla "calificaciones" del alumno seleccionado
    //Administrador institución - Analista servicios escolares (SEP)
    public function consultar_thead_calificacion_alumno($idinsti, $idalumno, $idnoperiodo){
        
    	$cmd="SELECT DISTINCT idcarrera,  
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera, 
            idespecialidad, 
            (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = inscripcion.idespecialidad) nomespecialidad, 
            idga, 
            (SELECT grupo FROM gruposacuerdo WHERE gruposacuerdo.idga = inscripcion.idga) nomgrupo, 
            idinstitucion, idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomalumno,  
            idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = inscripcion.idnoperiodo) nomnoperiodo, 
            idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = inscripcion.idperiodo) nomperiodo 
            FROM inscripcion 
            WHERE idinstitucion = '$idinsti' AND idalumno = '$idalumno' AND idnoperiodo = '$idnoperiodo'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //Función para mostrar el listado de todos los alumnos 
    //Analista de servicio escolares (SEP)
    public function consultar_listado_alumnos_analista() {
        
        $cmd = "SELECT DISTINCT idnivel, 
            (SELECT nomnivel FROM nivel WHERE nivel.idnivel = inscripcion.idnivel) nomnivel, 
            idcarrera, 
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomcompletoalumno, 
            (SELECT curp FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) curp, 
            estatus, idinstitucion, 
            (SELECT nombreinstitucion FROM institucion WHERE institucion.idinstitucion = inscripcion.idinstitucion) nominstitucion, 
            idga, idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = inscripcion.idperiodo) nomperiodo 
            FROM inscripcion";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }

    //Función para consultar los datos del alumno 
    //Analista de servicio escolares (SEP)
    public function consultar_datos_alumno($idinscripcion) {
        
        $cmd = "SELECT idinscripcion, idnivel, 
            idalumno, 
            (SELECT nombre FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomalumno, 
            (SELECT apellido1 FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) ape1alumno, 
            (SELECT apellido2 FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) ape2alumno,   
            (SELECT curp FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) curp, 
            idcarrera, 
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera, 
            idespecialidad, 
            (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = inscripcion.idespecialidad) nomespecialidad, 
            idga, 
            (SELECT grupo FROM gruposacuerdo WHERE gruposacuerdo.idga = inscripcion.idga) nomgrupo, 
            (SELECT idacuerdo FROM gruposacuerdo WHERE gruposacuerdo.idga = inscripcion.idga) idacuerdo, 
            idturno, 
            (SELECT descturno FROM turno WHERE turno.idturno = inscripcion.idturno) nomturno, 
            estatus, idingreso, 
            (SELECT nomingreso FROM tipoingreso WHERE tipoingreso.idingreso = inscripcion.idingreso) nomingreso, 
            idinstitucion, 
            (SELECT nombreinstitucion FROM institucion WHERE institucion.idinstitucion = inscripcion.idinstitucion) nominstitucion, 
            idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = inscripcion.idperiodo) nomperiodo  
            FROM inscripcion WHERE idinscripcion = '$idinscripcion'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //Función para editar los datos de la inscripción seleccionada del alumno
    //Analista servicios escolares(SEP)
    public function editar_incripcion_alumno($idinscripcion, $data) {
        
        $this->db->where('idinscripcion', $idinscripcion);
        $this->db->update('inscripcion', $data);
        return TRUE;
        
    }
    
    //Función para mostrar las calificaciones del periodo seleccionado de tal alumno
    //Analista servicios escolares(SEP)
    public function consultar_calificaciones_alumno($idalumno, $idnoperiodo) {
        
        $cmd = "SELECT idnoperiodo, calificacion, fechaexamen, idciclo, 
            (SELECT concat(fechainicio, '-', fechafinal ) tiempo FROM ciclo WHERE ciclo.idciclo = calificacion.idciclo) ciclo_escolar, 
            idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = calificacion.idmateria) nommateria, 
            estatus, 
            (SELECT nombre FROM estatusalumno WHERE estatusalumno.idestatusalumno = calificacion.estatus) descestatusalumno, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = calificacion.idalumno) nomcompletoalumno, 
            nomenclatura, 
            (SELECT nombre FROM tipoevaluacion WHERE tipoevaluacion.idevaluacion = calificacion.nomenclatura) nomtipoevaluacion, 
            idopt, 
            (SELECT concat(nuoptativa, ' (', nomoptativa, ')') nomoptativa FROM optativa WHERE optativa.idoptativa = calificacion.idopt) nomoptativa    
            FROM calificacion 
            WHERE idalumno = '$idalumno' AND idnoperiodo = '$idnoperiodo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    //Función para consultar los datos de la calificación del alumno 
    //Analista de servicio escolares (SEP)
    public function consultar_datos_calificacion($idalumno, $idmateria, $idoptativa) {
        
        $cmd = "SELECT idalumno, idnoperiodo, idnivel, calificacion, fechaexamen, 
            idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = calificacion.idmateria) nommateria, 
            idopt, 
            (SELECT concat(nuoptativa, ' (', nomoptativa, ')') nomoptativa FROM optativa WHERE optativa.idoptativa = calificacion.idopt) nomoptativa,  
            nomenclatura, 
            (SELECT nombre FROM tipoevaluacion WHERE tipoevaluacion.idevaluacion = calificacion.nomenclatura) nomevaluacion 
            FROM calificacion
            WHERE idalumno = '$idalumno' AND idmateria = '$idmateria' AND idopt = '$idoptativa'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    //Función para editar la calificación seleccionada del alumno
    //Analista servicios escolares(SEP)
    public function editar_calificacion_alumno($idalumno, $idmateria, $data) {
        
        $this->db->where('idalumno', $idalumno);
        $this->db->where('idmateria', $idmateria);
        $this->db->update('calificacion', $data);
        return TRUE;
        
    }
    
    //Función para editar la calificación seleccionada del alumno en caso de ser optativa
    //Analista servicios escolares(SEP)
    public function editar_calificacion_alumno_optativa($idalumno, $idoptativa, $data) {
        
        $this->db->where('idalumno', $idalumno);
        $this->db->where('idopt', $idoptativa);
        $this->db->update('calificacion', $data);
        return TRUE;
        
    }
    
    //Función para mostrar las calificaciones del alumno (kardex)
    //Analista servicios escolares(SEP)
    public function consultar_kardex_alumno($idnivel, $idalumno) {
        
        $cmd = "SELECT idnivel, calificacion, fechaexamen, idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = calificacion.idnoperiodo) nomnoperiodo, 
            idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = calificacion.idperiodo) nomperiodo, 
            idciclo,
            (SELECT concat(fechainicio, '-', fechafinal ) tiempo FROM ciclo WHERE ciclo.idciclo = calificacion.idciclo) ciclo_escolar, 
            idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = calificacion.idmateria) nommateria, 
            estatus, 
            (SELECT nombre FROM estatusalumno WHERE estatusalumno.idestatusalumno = calificacion.estatus) descestatusalumno, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = calificacion.idalumno) nomcompletoalumno, 
            nomenclatura, 
            (SELECT nombre FROM tipoevaluacion WHERE tipoevaluacion.idevaluacion = calificacion.nomenclatura) nomtipoevaluacion, 
            idopt, 
            (SELECT concat(nuoptativa, ' (', nomoptativa, ')') nomoptativa FROM optativa WHERE optativa.idoptativa = calificacion.idopt) nomoptativa 
            FROM calificacion
            WHERE idnivel = '$idnivel' AND idalumno = '$idalumno'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function encabezado_kardex_alumno($idinstitucion, $idnivel, $idalumno) {
        
        $cmd = "SELECT DISTINCT idinstitucion, idnivel,  
            (SELECT nombreinstitucion FROM institucion WHERE institucion.idinstitucion = inscripcion.idinstitucion) nominstitucion, 
            idalumno, 
            (SELECT concat(apellido1, ' ', apellido2, ' ', nombre) nomalumno FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) nomalumno, 
            (SELECT curp FROM alumno WHERE alumno.idalumno = inscripcion.idalumno) curp, 
            cvecentrotrab, idcarrera, 
            (SELECT nomcarrera FROM carrera WHERE carrera.idcarrera = inscripcion.idcarrera) nomcarrera 
            FROM inscripcion 
            WHERE idinstitucion = '$idinstitucion' AND idnivel = '$idnivel' AND idalumno = '$idalumno'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function periodos_kardex($idnivel, $idalumno) {
        
        $cmd = "SELECT DISTINCT idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = calificacion.idnoperiodo) nomnoperiodo, 
            idperiodo, 
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = calificacion.idperiodo), 
            idalumno 
            FROM calificacion 
            WHERE idnivel = '$idnivel' AND idalumno = '$idalumno'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_materia_periodo($idalumno, $idnoperiodo) {
        
        $cmd = "SELECT DISTINCT idnoperiodo, idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = calificacion.idmateria) nommateria, 
            idopt, 
            (SELECT concat(nuoptativa, ' (', nomoptativa, ')') nomoptativa FROM optativa WHERE optativa.idoptativa = calificacion.idopt) nomoptativa, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = calificacion.idalumno) nomcompletoalumno 
            FROM calificacion 
            WHERE idalumno = '$idalumno' AND idnoperiodo = '$idnoperiodo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_calificacion_materia_kardex($idalumno, $idmateria, $idoptativa) {
        
        $cmd = "SELECT idnoperiodo, calificacion, fechaexamen, idciclo, 
            (SELECT concat(fechainicio, '-', fechafinal ) tiempo FROM ciclo WHERE ciclo.idciclo = calificacion.idciclo) ciclo_escolar, 
            idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = calificacion.idmateria) nommateria, 
            estatus, 
            (SELECT nombre FROM estatusalumno WHERE estatusalumno.idestatusalumno = calificacion.estatus) descestatusalumno, 
            idalumno, 
            (SELECT concat(nombre, ' ', apellido1, ' ', apellido2) nomalumno FROM alumno WHERE alumno.idalumno = calificacion.idalumno) nomcompletoalumno, 
            nomenclatura, 
            (SELECT nombre FROM tipoevaluacion WHERE tipoevaluacion.idevaluacion = calificacion.nomenclatura) nomtipoevaluacion, 
            idopt, 
            (SELECT concat(nuoptativa, ' (', nomoptativa, ')') nomoptativa FROM optativa WHERE optativa.idoptativa = calificacion.idopt) nomoptativa 
            FROM calificacion 
            WHERE idalumno = '$idalumno' AND idmateria = '$idmateria' AND idopt = '$idoptativa'
            ORDER BY fechaexamen DESC LIMIT 1";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
                
    }
    
}
