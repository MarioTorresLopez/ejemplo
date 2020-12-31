<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of acuerdo_model
 *
 * @author CIDTAI
 */
class acuerdo_model extends CI_Model{
   
    public function consultar_acuerdos($idusuario) {
        
//        $cmd = "SELECT acuerdo.idacuerdo idacu, acuerdo.noacuerdo nomacu, 
//            acuerdo.fechaescrito fecescacu, acuerdo.fechavigencia fecvigacu, 
//            nivel.idnivel idniv, nivel.nomnivel nomniv, 
//            plantel.idplantel idpla, plantel.nombre nompla, 
//            institucion.idinstitucion idins, institucion.terna1 terna1ins, 
//            institucion.expediente expins, institucion.idusuario idusuins  
//            FROM acuerdo 
//            INNER JOIN nivel ON(acuerdo.idnivel=nivel.idnivel) 
//            INNER JOIN plantel ON(acuerdo.idplantel=plantel.idplantel) 
//            INNER JOIN institucion ON(plantel.idinstitucion=institucion.idinstitucion) 
//            WHERE acuerdo.estatus='1'";
        $cmd="select idacuerdo from solicituddocumentouser where idusuario='$idusuario' group by idacuerdo";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_acuerdos_institucion($idusuario) {
        
        $cmd="SELECT nombreinstitucion, idnivel, 
            (SELECT nivel.nomnivel FROM nivel WHERE nivel.idnivel=institucion.idnivel) nivelninsti, 
            (SELECT idacuerdo FROM solicituddocumentouser WHERE idusuario = '$idusuario' GROUP BY idacuerdo) idacuerdo 
            FROM institucion 
            WHERE idusuario = '$idusuario'";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }    
    
    public function consultar_acuerdo($idacuerdo){
        
        $cmd = "SELECT acuerdo.idacuerdo idacu, acuerdo.noacuerdo nomacu, 
            acuerdo.fechaescrito fecescacu, acuerdo.fechavigencia fecvigacu,
	    acuerdo.fisica perfis, acuerdo.moral permor, 
            nivel.idnivel idniv, nivel.nomnivel nomniv 
            FROM acuerdo 
            INNER JOIN nivel ON(acuerdo.idnivel=nivel.idnivel)
            WHERE acuerdo.idacuerdo = '$idacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
    
    public function registrar_acuerdo($data){
        
        $cmd = "INSERT INTO acuerdo VALUES((SELECT (MAX(idacuerdo)+1) idmax FROM acuerdo), "
                . "'" . $data['noacuerdo'] . "','" . $data['fisica'] . "','" . $data['moral'] . "','" . $data['fechasupervision'] 
                . "','" . $data['fechaescrito'] . "','" . $data['fechavigencia'] . "','" . $data['estatus'] . "','" . $data['idnivel']
                . "','" . $data['idplantel'] . "','" . $data['idciclo'] . "','" . $data['alumnado'] . "','" . $data['inscripcion'] 
                . "','" . $data['turno'] . "','" . $data['gruposautorizado'] ."','" . $data['idpe'] 
                . "','" . $data['nombreinstitucion'] . "','" . $data['alumnosautorizados'] . "','" . $data['idinst'] ."')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    public function consultar_acuerdos_documentos(){
        
        $cmd = "SELECT * FROM acuerdo ORDER BY idacuerdo ASC";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_acuerdo_documentos_existente($idacuerdo){
        
        $cmd = "SELECT * FROM acuerdo 
            WHERE idacuerdo NOT IN (
                SELECT idacuerdo FROM solicituddocumentouser WHERE sincodigo = 20) 
            AND idacuerdo = '$idacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_acuerdo_documentos_carpeta($idacuerdo){
        
        $cmd = "SELECT * FROM solicituddocumentouser 
            WHERE idacuerdo IN (
                SELECT idacuerdo FROM acuerdo) 
            AND idacuerdo = '$idacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_ultimo_acuerdo() {
        
        $cmd = "SELECT MAX(idacuerdo) idacuerdo FROM acuerdo";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
    
    public function numero_grupos_acuerdo($idacuerdo){
        
        $cmd="SELECT gruposautorizado FROM acuerdo WHERE idacuerdo = '$idacuerdo'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function numero_alumnos_acuerdo($idacuerdo){
        
        $cmd="SELECT alumnosautorizados FROM acuerdo WHERE idacuerdo = '$idacuerdo'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_acuerdo_institucion($idacuerdo){
        
        $cmd = "SELECT acuerdo.idacuerdo idacuerdo, acuerdo.noacuerdo noacuerdo, 
            acuerdo.nombreinstitucion nominstitucion, acuerdo.idnivel idnivel, 
            nivel.nomnivel nomnivel ,acuerdo.idinst idinstitucion, 
            institucion.plan_estudios nomplanestudios, institucion.idmodalidad idmodalidad, 
            modalidad.nommodalidad nommodalidad 
            FROM acuerdo 
            INNER JOIN nivel ON (acuerdo.idnivel = nivel.idnivel) 
            INNER JOIN institucion ON(acuerdo.idinst = institucion.idinstitucion) 
            INNER JOIN modalidad ON(institucion.idmodalidad = modalidad.idmodalidad) 
            WHERE acuerdo.idacuerdo = '$idacuerdo'";
        $query = $this->db->query($cmd);
        return ($query->num_rows == 1) ? $query->row() : NULL;
        
    }
       
    public function consultar_acuerdos_institucion_pe($idinstitucion) {
        
        $cmd="SELECT idacuerdo FROM acuerdo WHERE idinst = '$idinstitucion' GROUP BY idacuerdo";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    
}
