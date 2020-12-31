<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mapa_curricular_model
 *
 * @author CIDTAI
 */
class mapa_curricular_model extends CI_Model {

    //Función para insertar un mapa curricular a la base de datos
    public function crear_mapa_curricular($arr) {
        $this->db->insert('mapacurricular', $arr);
        return TRUE;
    }
    
    //Función para consultar todos los mapas curriculares que tiene dicho PE
    public function consultar_mapas_curriculares($idpe) {
        
        $cmd = "SELECT idmc, mapacurricular, idperiodo,
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = mapacurricular.idperiodo) nomperiodo, 
            estatus, fechamodificacion, usuariomodificacion, 
            idpe, idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = mapacurricular.idnoperiodo) 
            FROM mapacurricular 
            WHERE idpe = '$idpe'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    //Función para consultar información del mapa curricular
    public function consultar_mc($idmc, $idpe) {
        
        $cmd = "SELECT * FROM mapacurricular WHERE idmc = '$idmc' AND idpe = '$idpe'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
     public function consultar_mapa_curricular($idmc) {
        
         $cmd = "SELECT idmc, mapacurricular, idperiodo,
            (SELECT nomperiodo FROM periodo WHERE periodo.idperiodo = mapacurricular.idperiodo) nomperiodo, 
            estatus, fechamodificacion, usuariomodificacion, 
            idpe, idnoperiodo, 
            (SELECT nomnoperiodo FROM noperiodo WHERE noperiodo.idnoperiodo = mapacurricular.idnoperiodo) 
            FROM mapacurricular 
            WHERE idpe = '$idmc'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    public function editar_mapa_curricular($data, $idmc){
        $cmd = "UPDATE mapacurricular 
            SET mapacurricular = '" . $data['mapacurricular'] . "', idperiodo = '" . $data['idperiodo'] . "', 
            idnoperiodo = '" . $data['idnoperiodo'] . "' 
            WHERE idmc = '$idmc'";
        $this->db->query($cmd);
        return TRUE;
    }



}
