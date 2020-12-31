<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of checklist_model
 *
 * @author CIDTAI
 */
class checklist_model extends CI_Model {
    
    //Función para enviar checklist de los documentos recibidos 
    public function crear_checklist($array){
        
        $cmd = "INSERT INTO checklist VALUES('$array[folio]','$array[iddocsol]','$array[idusuarioenv]','$array[idusuariorec]','$array[estatus]')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    //Función que regresa los datos del documento solicitado
    public function consultar_checklist($idfolio, $iddocsol, $idusu){
        
        $cmd = "SELECT * FROM checklist WHERE folio='$idfolio' AND iddocsol='$iddocsol' AND idusuariorec='$idusu'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //Función para editar el ckecklist, cambiando el registro a estatus = 1
    public function editar_checklist($idusuarioenv, $idusuariorec, $idfolio, $iddocumento) {
        
        $cmd = "UPDATE checklist SET idusuarioenv = '$idusuarioenv', idusuariorec = '$idusuariorec', estatus = 1 WHERE folio = '$idfolio' AND iddocsol = '$iddocumento'";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
}
