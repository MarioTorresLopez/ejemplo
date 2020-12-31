<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of municipio_model
 *
 * @author UTEQ
 */
class municipio_model extends CI_Model{
    
    //put your code here
    
    public function consultar_municipios(){
         $cmd = "SELECT * FROM municipio  ORDER BY idmunicipio DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    public function consultar_municipio($id){
         $cmd = "SELECT * FROM municipio  where idmunicipio='$id'";
        $query = $this->db->query($cmd);

        return ($query->num_rows() == 1) ? $query->result() : NULL;
        
    }
     public function consultar_municipios_estado($id){
         $cmd = "SELECT * FROM municipio where idestado='$id' ORDER BY idmunicipio asc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
}
