<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of imprimir_reportes_model
 *
 * @author CIDTAI-UTEQ
 */
class imprimir_reportes_model extends CI_Model {
    
     public function consultar_tramites_recibidos($municipio, $nivel) {
        $cmd = "select (select nombremunicipio from municipio where idmunicipio='$municipio') municipio,(select nomnivel from nivel where idnivel='$nivel') nivel,count(idinstitucion) recibidos from institucion where idmunicipio='$municipio'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function consultar_tramites_recibidos_basica($municipio) {
        $cmd = "select count(idinstitucion) recibidos from institucion where (idnivel=11 or idnivel=12 or idnivel=13 or idnivel=14) and idmunicipio='$municipio'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function consultar_tramites_recibidos_nivel_basica() {
        
        $cmd = "SELECT COUNT(idinstitucion) totalinibas 
                FROM institucion 
                WHERE idnivel = 11 OR idnivel = 12 OR idnivel = 13 OR idnivel = 14";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_tramites_recibidos_nivel_medias() {
        
        $cmd = "SELECT COUNT(idinstitucion) totalmediasup 
                FROM institucion 
                WHERE idnivel = 15";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_tramites_recibidos_nivel_superior() {
        
        $cmd = "SELECT COUNT(idinstitucion) totalsuperior 
            FROM institucion 
            WHERE idnivel = 16 OR idnivel = 17 OR idnivel =18";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    //put your code here
}
