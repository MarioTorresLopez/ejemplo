<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of plantel_model
 *
 * @author CIDTAI
 */
class plantel_model extends CI_Model {

    public function consultar_planteles() {

        $cmd = "SELECT usuario.idusuario idusu, usuario.nomusuario nombrecom, 
		usuario.correousu correousu, usuario.passwordusu passwordusu, 
		usuario.estatus estatususu, usuario.idplantel plantelusu, 
		usuario.idsolicitud soliusu, institucion.idinstitucion idinsti, 
		institucion.calle calleinsti, institucion.noint nointinsti, 
		institucion.noext noextinsti, institucion.colonia coloniainsti, 
		institucion.telefono telefonoinsti, institucion.fechamodificacion fechainsti,
                institucion.estatussolicitud estatusinsti, 
		institucion.expediente  expediente, institucion.folio folio,
		plantel.idplantel idpla, plantel.nombre nompla, plantel.nombrecorto nomcorpla  
                FROM usuario 
                INNER JOIN institucion ON (usuario.idusuario=institucion.idusuario)
                INNER JOIN plantel ON (institucion.idinstitucion=plantel.idinstitucion)
                WHERE plantel.estatus='True' ORDER BY plantel.idplantel ASC";
        $query = $this->db->query($cmd);

        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    //Función que regresa los datos del plantel que a sido registrado
    // por parte del aspirante 
    public function consultar_plantel_solicitud($idusu) {

        $cmd = "SELECT plantel.idplantel idpla, plantel.nombre nombrepla, plantel.nombrecorto nombrecorto, 
                plantel.clave clavepla, plantel.telefono telefonopla, plantel.plaemail correopla, 
                plantel.plasitioweb sitiowepla, plantel.plarfc rfcpla, plantel.calle callepla, 
                plantel.noint nointpla, plantel.noext noextpla, plantel.idmunicipio idmunpla, 
                municipio.nombremunicipio nommunpla, plantel.colonia colpla, plantel.alumnado idalupla, 
                tipoalumnado.tipoalumnado alupla, plantel.idturno idturpla, turno.descturno desturpla, 
                plantel.delegacion delpla, plantel.horario horpla, plantel.idinstitucion idinspla, 
                institucion.folio folioins, institucion.idusuario idusuins
                FROM plantel
                INNER JOIN municipio ON (plantel.idmunicipio=municipio.idmunicipio)
                INNER JOIN tipoalumnado ON (plantel.alumnado=tipoalumnado.idtipoalumnado)
                INNER JOIN turno ON (plantel.idturno=turno.idturno)
                INNER JOIN institucion ON (plantel.idinstitucion=institucion.idinstitucion)
                WHERE institucion.idusuario='$idusu'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function consultar_planteles_sin_estatus() {

        $cmd = "SELECT * FROM plantel";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

}
