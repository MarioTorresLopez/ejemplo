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
class propietario_model extends CI_Model {

    //put your code here

    public function crear_propietario($data) {
          $cmd = "INSERT INTO propietario (nompropietario,apellido1,apellido2,correo,telefono,estatus,rfc,idinstitucion )  "
                . " VALUES( '".$data['nompropietario']."','".$data['apellido1']."','".$data['apellido2']."','".$data['correo']."',"
                . "'".$data['telefono']."',1,'".$data['rfc']."',(SELECT (MAX(idinstitucion)) idmax FROM institucion))";
        
        
       $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_propietarios() {
        $cmd = "SELECT * FROM propietario WHERE estatus = 1 ORDER BY idpropietario DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consulta_propietario($id) {
        $cmd="SELECT * FROM propietario WHERE idpropietario='$id'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }
    
    public function consulta_datos_propietario($idinsti){
        $cmd="select propietario.*,(select nombremunicipio  from municipio where municipio.idmunicipio=propietario.idmunicipio) munininsti,(select nomestado from estado where estado.idestado=propietario.idestado ) estaninsti from propietario where idinstitucion='$idinsti'";
    	$query = $this->db->query($cmd);
    	return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

        public function  editar_propietario($id,$correo,$calle,$noint,$noext,
            $colonia, $telefono, $idmunicipio,$idestado, $rfc, $cp){
        $cmd = "UPDATE propietario SET correo='$correo',calle='$calle',noint='$noint',noext='$noext',"
                . "colonia='$colonia',telefono='$telefono',idmunicipio='$idmunicipio',idestado='$idestado',"
                . "rfc='$rfc',cp='$cp', WHERE idpropietario='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
    public function eliminar($id){
    	$cmd = "UPDATE propietario SET estatus=0 WHERE idpropietario'$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($rfc){

        $cmd="SELECT * FROM propietario WHERE rfc LIKE '$rfc'";
        $query=$this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;

    }

    public function activar($id){
        $cmd = "UPDATE propietario SET estatus=1 WHERE idpropietario='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }
}
