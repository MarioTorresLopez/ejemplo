<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of institucion_model
 *
 * @author UTEQ
 */
class documento_model extends CI_Model {

    public function registrar_documento($data) {

        $cmd = "INSERT INTO solicituddocumentouser VALUES((SELECT (MAX(idsip)+1) idmax FROM solicituddocumentouser), "
                . "'" . $data['nombre_pdf'] . ".pdf','" . $data['sin_codigo'] . "','" . $data['id_usuario'] . "','" . $data['id_acuerdo'] . "')";
        $this->db->query($cmd);
        return TRUE;
    }

    public function registrar_plan($data) {

        $cmd = "INSERT INTO planestudios (nomplanestudios,estatus,fechamodificacion,usuariomodificacion,idinstitucion) VALUES ('" . $data['nomplanestudios'] . "',1,'" . $data['fechamodificacion'] . "','" . $data['usuariomodificacion'] . "','" . $data['idinstitucion'] . "')";
        $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_documentos() {
        $cmd = "SELECT * FROM solicituddocumentouser    ORDER BY idusuario DESC ";
        $query = $this->db->query($cmd);
        return TRUE;
        // return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_documentos_acuerdo($idusu, $idacu) {
        $cmd = "select 
	a.iddocsol iddoc, 
	a.nombredocsol nombredocumento,
	( select nombrepdf 
	  from solicituddocumentouser b 
	  where 
	     a.iddocsol = b.sincodigo and
		  idusuario  = '$idusu' and
		  idacuerdo  = '$idacu'
	) as pdf
	
from documentoxsolicitud a
		
";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_documentos_acuerdo_analista($idacu) {
        $cmd = "select 
	a.iddocsol iddoc, 
	a.nombredocsol nombredocumento,
	( select nombrepdf 
	  from solicituddocumentouser b 
	  where 
	     a.iddocsol = b.sincodigo and
		  idacuerdo  = '$idacu'
	) as pdf,
	( select idusuario 
	  from solicituddocumentouser b 
	  where 
		  idacuerdo  = '$idacu'
	  group by idusuario	  
	) as idusuario 
	
from documentoxsolicitud a
		
";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_historial_documento() {
        
    }

}
