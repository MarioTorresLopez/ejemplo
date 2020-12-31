<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of planestudios_model
 *
 * @author UTEQ
 */
class planestudios_model extends CI_Model {

    public function consultar_planes($idinsti) {
        
        $cmd = "SELECT idpe, nomplanestudios, claplanestudios, 
            estatus, fechamodificacion, usuariomodificacion, 
            idmodalidad, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad = planestudios.idmodalidad) nommodalidad, 
            idnivel, (SELECT nomnivel FROM nivel WHERE nivel.idnivel = planestudios.idnivel) nomnivel, 
            idespecialidad, (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = planestudios.idespecialidad) nomespecialidad, 
            idtipedu, (SELECT nomeducativo FROM tipoeducativo WHERE tipoeducativo.ideducativo = planestudios.idtipedu) nomeducativo, 
            idacuerdo, idinstitucion 
            FROM planestudios WHERE  idinstitucion = '$idinsti'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }

    public function crear_plan_estudio($data) {
        
        $cmd = "INSERT INTO planestudios (nomplanestudios, claplanestudios, estatus, fechamodificacion, usuariomodificacion, idmodalidad, idnivel, idespecialidad, idtipedu, idinstitucion, idacuerdo, fechacreacion)  "
                . " VALUES( '" . $data['nomplanestudios'] . "','" . $data['claplanestudios'] . "','" . $data['estatus'] . "','" . $data['fechamodificacion'] . "','" . $data['usuariomodificacion'] . "','" . $data['idmodalidad'] . "','" . $data['idnivel'] . "',"
                . "'" . $data['idespecialidad'] . "','" . $data['idtipedu'] . "','" . $data['idinstitucion'] . "','" . $data['idacuerdo'] . "','" . $data['fechacreacion']."')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    public function consultar_plan($idinsti, $idpe) {
        
        $cmd = "SELECT idpe, nomplanestudios, claplanestudios, 
            estatus, fechamodificacion, usuariomodificacion,  
            idmodalidad, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad = planestudios.idmodalidad) nommodalidad, 
            idnivel, (SELECT nomnivel FROM nivel WHERE nivel.idnivel = planestudios.idnivel) nomnivel, 
            idespecialidad, (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = planestudios.idespecialidad) nomespecialidad, 
            idtipedu, (SELECT nomeducativo FROM tipoeducativo WHERE tipoeducativo.ideducativo = planestudios.idtipedu) nomeducativo, 
            idacuerdo, idinstitucion 
            FROM planestudios WHERE  idinstitucion = '$idinsti' AND idpe = '$idpe'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function consultar_planes_estudio() {
        
        $cmd = "SELECT idpe, nomplanestudios, claplanestudios, 
            estatus, fechamodificacion, usuariomodificacion, 
            idmodalidad, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad = planestudios.idmodalidad) nommodalidad, 
            idnivel, (SELECT nomnivel FROM nivel WHERE nivel.idnivel = planestudios.idnivel) nomnivel, 
            idespecialidad, (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = planestudios.idespecialidad) nomespecialidad, 
            idtipedu, (SELECT nomeducativo FROM tipoeducativo WHERE tipoeducativo.ideducativo = planestudios.idtipedu) nomeducativo, 
            idacuerdo, idinstitucion 
            FROM planestudios";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function crear_plan_estudio_anterior($data) {
        
        $cmd = "INSERT INTO planestudios (nomplanestudios, claplanestudios, estatus, fechamodificacion, usuariomodificacion, idmodalidad, idnivel, idespecialidad, idtipedu, idinstitucion, idacuerdo, fechacreacion, nominstitucion, nomacuerdo)  "
                . " VALUES( '" . $data['nomplanestudios'] . "','" . $data['claplanestudios'] . "','" . $data['estatus'] . "','" . $data['fechamodificacion'] . "','" . $data['usuariomodificacion'] . "','" . $data['idmodalidad'] . "','" . $data['idnivel'] . "',"
                . "'" . $data['idespecialidad'] . "','" . $data['idtipedu'] . "','" . $data['idinstitucion'] . "','" . $data['idacuerdo'] . "','" . $data['fechacreacion'] . "','" . $data['nominstitucion'] . "','" . $data['nomacuerdo'] ."')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    public function consultar_planes_estudio_anterior() {
        
        $cmd = "SELECT idpe, nomplanestudios, claplanestudios, 
            estatus, fechamodificacion, usuariomodificacion, 
            idmodalidad, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad = planestudios.idmodalidad) nommodalidad, 
            idnivel, (SELECT nomnivel FROM nivel WHERE nivel.idnivel = planestudios.idnivel) nomnivel, 
            idespecialidad, (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = planestudios.idespecialidad) nomespecialidad, 
            idtipedu, (SELECT nomeducativo FROM tipoeducativo WHERE tipoeducativo.ideducativo = planestudios.idtipedu) nomeducativo, 
            idacuerdo, idinstitucion, nominstitucion, nomacuerdo  
            FROM planestudios";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }    
    
    public function consultar_plan_estudio($idpe) {
        
        $cmd = "SELECT idpe, nomplanestudios, claplanestudios, 
            estatus, fechamodificacion, usuariomodificacion,  
            idmodalidad, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad = planestudios.idmodalidad) nommodalidad, 
            idnivel, (SELECT nomnivel FROM nivel WHERE nivel.idnivel = planestudios.idnivel) nomnivel, 
            idespecialidad, (SELECT nomespecialidad FROM especialidad WHERE especialidad.idespecialidad = planestudios.idespecialidad) nomespecialidad, 
            idtipedu, (SELECT nomeducativo FROM tipoeducativo WHERE tipoeducativo.ideducativo = planestudios.idtipedu) nomeducativo, 
            idacuerdo, idinstitucion, nominstitucion, nomacuerdo, fechacreacion  
            FROM planestudios WHERE idpe = '$idpe'";
        $query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
        
    }
    
    public function editar_plan_estudios($data, $idpe){
        $cmd = "UPDATE planestudios 
            SET nomplanestudios = '" . $data['nomplanestudios'] . "', claplanestudios = '" . $data['claplanestudios'] . "', 
            fechamodificacion = '" . $data['fechamodificacion'] . "', usuariomodificacion = '" . $data['usuariomodificacion'] . "', 
            idmodalidad = '" . $data['idmodalidad'] . "', idnivel = '" . $data['idnivel'] . "', 
            idtipedu = '" . $data['idtipedu'] . "', fechacreacion = '" . $data['fechacreacion'] . "',
            nominstitucion = '" . $data['nominstitucion'] . "', nomacuerdo = '" . $data['nomacuerdo'] . "' 
            WHERE idpe = '$idpe'";
        $this->db->query($cmd);
        return TRUE;
    }
    
    public function editar_plan_estudios_especialidad($data, $idpe){
        $cmd = "UPDATE planestudios 
            SET nomplanestudios = '" . $data['nomplanestudios'] . "', claplanestudios = '" . $data['claplanestudios'] . "', 
            fechamodificacion = '" . $data['fechamodificacion'] . "', usuariomodificacion = '" . $data['usuariomodificacion'] . "', 
            idmodalidad = '" . $data['idmodalidad'] . "', idnivel = '" . $data['idnivel'] . "', 
            idespecialidad = '" . $data['idespecialidad'] . "', 
            idtipedu = '" . $data['idtipedu'] . "', fechacreacion = '" . $data['fechacreacion'] . "',
            nominstitucion = '" . $data['nominstitucion'] . "', nomacuerdo = '" . $data['nomacuerdo'] . "' 
            WHERE idpe = '$idpe'";
        $this->db->query($cmd);
        return TRUE;
    }

}
