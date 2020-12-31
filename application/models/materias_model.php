<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of materias_model
 *
 * @author CIDTAI-UTEQ
 */
class materias_model extends CI_Model {

    public function consultar_instituciones() {

        $cmd = "SELECT institucion.idinstitucion idinsti, institucion.folio folio, 
                institucion.expediente  expediente, institucion.estatussolicitud estatusinsti, 
                institucion.fechamodificacion fechainsti, institucion.idusuario idusu,
                institucion.fechacreacion fechacreacion,institucion.nombreinstitucion nombreinst,institucion.idusuario,
                concat(propietario.nompropietario, ' ', propietario.apellido1, ' ', propietario.apellido2) nombrepropietario, 
                (SELECT nombre FROM personamoral WHERE personamoral.idinstitucion=institucion.idinstitucion) persona_moral 
                FROM institucion 
                LEFT JOIN propietario ON propietario.idinstitucion=institucion.idinstitucion
                where institucion.estatusincorporado=1
                ORDER BY institucion.fechacreacion DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }
    
    public function consultar_acuerdos($institucion) {
        $cmd = "select * from acuerdo where idinst='$institucion'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_institucion($id) {

        $cmd = "SELECT * FROM institucion WHERE idusuario='$id'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function consultar_institucion_usuario($id) {

        $cmd = "SELECT * FROM institucion WHERE idusuario='$id' and estatussolicitud=2";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    //consulta para observar los documentos
    public function consultar_institucion_solicitud($id, $idinsti = NULL) {

        $cmd = " select usuario.idusuario idusu, usuario.nomusuario nombrecom, usuario.correousu correousu, usuario.passwordusu passwordusu , usuario.estatus estatususu, 
usuario.fechamodificacion fechausu,
usuario.usuariomodificacion modiusu, usuario.idplantel plantelusu, usuario.idsolicitud soliusu,
institucion.idinstitucion idinsti,  institucion.calle calleinsti, institucion.noint nointinsti, institucion.noext noextinsti, 
institucion.colonia coloniainsti, 
 institucion.telefono telefonoinsti, institucion.fechamodificacion fechainsti, 
 institucion.estatussolicitud estatusinsti, institucion.estatusincorporado estatusinstiincor,
 institucion.idmunicipio muninsti, (select nombremunicipio  from municipio where municipio.idmunicipio=institucion.idmunicipio) munininsti, 
  institucion.idestado estainsti, (select nomestado from estado where estado.idestado=institucion.idestado ) estaninsti,
  institucion.idnivel nivelinsti, (select nivel.nomnivel from nivel where nivel.idnivel=institucion.idnivel) nivelninsti,
  institucion.idmodalidad modalidadinsti, (select modalidad.nommodalidad from modalidad where modalidad.idmodalidad=institucion.idmodalidad) modalidadninsti,
  institucion.plan_estudios planinsti, 
    institucion.cp cpinsti, institucion.persona personainsti, institucion.terna1 terna1insti, institucion.terna2 terna2insti,
    institucion.terna3 terna3insti, institucion.idusuario usuinsti,  institucion.expediente expediente, institucion.folio folio, 
    propietario.idpropietario idpropie,propietario.idinstitucion propieinsti, propietario.nompropietario nompropie, propietario.apellido1 a1propie, propietario.apellido2 a2propie,
    propietario.correo correopropie, propietario.calle callepropie, propietario.noint nointpropie, propietario.noext noextpropie,
    propietario.colonia coloniapropie, propietario.telefono telefonopropie, propietario.fechamodificacion fechapropie, 
    propietario.usuariomodificacion modpropie, 
    propietario.idmunicipio munipropie, (select nombremunicipio  from municipio where municipio.idmunicipio=propietario.idmunicipio) muninpropie , 
    propietario.idestado estapropie, (select nomestado from estado where estado.idestado=propietario.idestado ) estanpropie,
    propietario.estatus estatupropie, propietario.rfc rfcpropie, propietario.cp cppropie, representante.idrepresentante idrepresentante, representante.idinstitucion repreinsti,
    representante.nombre nomrepre, representante.apellido1 a1repre, representante.apellido2 a2repre, representante.calle callerepre,
    representante.telefono telrepre, representante.noint nointrepre, representante.noext noextrepre, representante.colonia coloniarepre,
    representante.cp cprepre, 
    representante.idmunicipio munirepre,  (select nombremunicipio  from municipio where municipio.idmunicipio=representante.idmunicipio) muninrepre , 
     representante.idestado estarepre, (select nomestado from estado where estado.idestado=representante.idestado ) estanrepre,
     representante.estatus estatusrepre, (select nombre from personamoral where personamoral.idinstitucion=institucion.idinstitucion) persona_moral 
     from usuario inner join institucion on usuario.idusuario=institucion.idusuario
     left join propietario on institucion.idinstitucion=propietario.idinstitucion left join 
     representante on institucion.idinstitucion=representante.idinstitucion where usuario.idusuario = '$id'";

        if (!is_null($idinsti)) {
            $cmd .= "  and institucion.idinstitucion ='$idinsti'";
        }
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    //consulta para mostrar si si o no fue aceptada lan solicitud
    public function consultar_institucion_aceptacion($id, $idinsti = NULL) {

        $cmd = " select usuario.idusuario idusu, usuario.nomusuario nombrecom, usuario.correousu correousu, usuario.passwordusu passwordusu , usuario.estatus estatususu, 
usuario.fechamodificacion fechausu,
usuario.usuariomodificacion modiusu, usuario.idplantel plantelusu, usuario.idsolicitud soliusu,
institucion.idinstitucion idinsti,  institucion.calle calleinsti, institucion.noint nointinsti, institucion.noext noextinsti, 
institucion.colonia coloniainsti, 
 institucion.telefono telefonoinsti, institucion.fechamodificacion fechainsti, 
 institucion.estatussolicitud estatusinsti, institucion.estatusincorporado estatusinstiincor,
 institucion.idmunicipio muninsti, (select nombremunicipio  from municipio where municipio.idmunicipio=institucion.idmunicipio) munininsti, 
  institucion.idestado estainsti, (select nomestado from estado where estado.idestado=institucion.idestado ) estaninsti,
  institucion.idnivel nivelinsti, (select nivel.nomnivel from nivel where nivel.idnivel=institucion.idnivel) nivelninsti,
  institucion.idmodalidad modalidadinsti, (select modalidad.nommodalidad from modalidad where modalidad.idmodalidad=institucion.idmodalidad) modalidadninsti,
  institucion.plan_estudios planinsti, 
    institucion.cp cpinsti, institucion.persona personainsti, institucion.terna1 terna1insti, institucion.terna2 terna2insti,
    institucion.terna3 terna3insti, institucion.idusuario usuinsti,  institucion.expediente expediente, institucion.folio folio, 
     (select nombre from personamoral where personamoral.idinstitucion=institucion.idinstitucion) persona_moral 
      from usuario inner join institucion on usuario.idusuario=institucion.idusuario  where usuario.idusuario ='$id'";

        if (!is_null($idinsti)) {
            $cmd .= "  and institucion.idinstitucion ='$idinsti'";
        }
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    //Metodo que inserte en la tabla usuario
//	public function crear_institucion($arr) {
//		$this->db->insert('institucion', $arr);
//		return TRUE;
//	}

    public function crear_institucion_solicitud($data) {

        $cmd = "INSERT INTO institucion (calle,noint,noext,colonia,telefono,estatussolicitud,estatusincorporado,idmunicipio,idestado,idnivel,cp,persona, terna1, terna2, terna3,idusuario,tipotramite,idmodalidad,plan_estudios,expediente,fechacreacion)  "
                . " VALUES( '" . $data['calle'] . "','" . $data['noint'] . "','" . $data['noext'] . "','" . $data['colonia'] . "','" . $data['telefono'] . "',2,2,'" . $data['idmunicipio'] . "','" . $data['idestado'] . "','" . $data['idnivel'] . "',"
                . "'" . $data['cp'] . "','" . $data['persona'] . "','" . $data['terna1'] . "','" . $data['terna2'] . "','" . $data['terna3'] . "','" . $data['idusuario'] . "',1,'" . $data['idmodalidad'] . "','" . $data['plan_estudios'] . "','" . $data['expediente'] . "','" . $data['fechacreacion'] . "')";
        $this->db->query($cmd);
        return TRUE;
    }

    public function mayor() {

        $cmd = "select max(idinstitucion) id from institucion";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function editar_institucion($idinstitucion, $calle, $noint, $noext, $colonia, $telefono, $terna1, $idpropietario, $idmunicipio, $idnivel, $cp) {

        $cmd = "UPDATE institucion SET calle='$calle',noint='$noint',noext='$noext',colonia='$colonia',"
                . "telefono='$telefono', terna1='$terna1', idpropietario='$idpropietario' WHERE idinstitucion='$idinstitucion'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar_institucion($idinstitucion) {

        $cmd = "UPDATE institucion SET estatus=0 WHERE idinstitucion='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    public function existente($regterna) {

        $cmd = "SELECT * FROM institucion WHERE terna1 LIKE '$terna1'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    public function activar($idinstitucion) {

        $cmd = "UPDATE institucion SET estatus=1 WHERE idinstitucion='$id'";
        $query = $this->db->query($cmd);
        return TRUE;
    }

    //Función para validar si existe el número de folio en la tabla de institución
    public function existente_folio($folio) {

        $cmd = "SELECT * FROM institucion WHERE folio='$folio'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    //Función para editar el folio dependiendo de la institución 
    //que esta solicitando un acuerdo, ayudando a tener una carpetas de 
    //los archivos que se llevan durante el proceso 
    public function asignar_solicitud($idins, $folio, $hoy, $idanalista) {

        $cmd = "UPDATE institucion SET folio='$folio', fechamodificacion='$hoy', idanalista='$idanalista' WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function buscar_institucion_nivel($idnivel) {

        $cmd = "SELECT idinstitucion, terna1 FROM institucion WHERE idnivel='$idnivel'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_institucion_incorporacion($idusu, $idins) {

        $cmd = " SELECT 
	usuario.idusuario idusu, usuario.nomusuario nombrecom, usuario.correousu correousu, usuario.passwordusu passwordusu , usuario.estatus estatususu, 
	usuario.fechamodificacion fechausu,
	usuario.usuariomodificacion modiusu, usuario.idplantel plantelusu, usuario.idsolicitud soliusu,
	institucion.idinstitucion idinsti,  institucion.calle calleinsti, institucion.noint nointinsti, institucion.noext noextinsti, 
	institucion.colonia coloniainsti, 
 	institucion.telefono telefonoinsti, institucion.fechamodificacion fechainsti, 
 	institucion.estatussolicitud estatusinsti, institucion.estatusincorporado estatusinstiincor,
 	 institucion.plan_estudios planinsti, 
	institucion.idmodalidad modinsti, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad=institucion.idmodalidad) modalidadinsti,
 	institucion.idmunicipio muninsti, (select nombremunicipio  FROM municipio WHERE municipio.idmunicipio=institucion.idmunicipio) munininsti, 
  	institucion.idestado estainsti, (select nomestado FROM estado WHERE estado.idestado=institucion.idestado ) estaninsti,
  	institucion.idnivel nivelinsti, (select nivel.nomnivel FROM nivel WHERE nivel.idnivel=institucion.idnivel) nivelninsti,
	institucion.cp cpinsti, institucion.persona personainsti, institucion.terna1 terna1insti, institucion.terna2 terna2insti,
	institucion.terna3 terna3insti, institucion.idusuario usuinsti,  institucion.expediente expediente, institucion.folio folio
FROM usuario INNER JOIN institucion ON usuario.idusuario=institucion.idusuario
WHERE usuario.idusuario = '$idusu' AND institucion.idinstitucion = '$idins' ";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function consultar_institucion_folio($idins) {

        $cmd = "SELECT 
	usuario.idusuario idusu, usuario.nomusuario nombrecom, usuario.usulogin usulogin, usuario.correousu correousu,   
	usuario.passwordusu passwordusu , usuario.estatus estatususu, usuario.fechamodificacion fechausu,  
	usuario.usuariomodificacion modiusu, usuario.idplantel plantelusu, usuario.idsolicitud soliusu, 
	institucion.idinstitucion idinsti,  institucion.calle calleinsti, institucion.noint nointinsti, 
	institucion.noext noextinsti, institucion.colonia coloniainsti, institucion.telefono telefonoinsti, 
	institucion.fechamodificacion fechainsti, institucion.persona persona,
	institucion.estatussolicitud estatusinsti, institucion.estatusincorporado estatusinstiincor, 
	 institucion.plan_estudios planinsti, 
	institucion.idmodalidad modinsti, (SELECT nommodalidad FROM modalidad WHERE modalidad.idmodalidad=institucion.idmodalidad) modalidadinsti, 
	institucion.idmunicipio muninsti, (SELECT nombremunicipio  FROM municipio WHERE municipio.idmunicipio=institucion.idmunicipio) munininsti,  
	institucion.idestado estainsti, (SELECT nomestado FROM estado WHERE estado.idestado=institucion.idestado ) estaninsti,  
	institucion.idnivel nivelinsti, (SELECT nivel.nomnivel FROM nivel WHERE nivel.idnivel=institucion.idnivel) nivelninsti,
	institucion.idanalista idanalista, (SELECT nomusuario FROM usuario WHERE usuario.idusuario=institucion.idanalista) nombreanalista,
	institucion.cp cpinsti, institucion.persona personainsti, institucion.terna1 terna1insti, institucion.terna2 terna2insti, 
	institucion.terna3 terna3insti, institucion.idusuario usuinsti,  institucion.expediente expediente, institucion.folio folio 
FROM usuario INNER JOIN institucion ON usuario.idusuario=institucion.idusuario 
WHERE institucion.idinstitucion = '$idins'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function aceptar_informacion_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 1, estatusincorporado = 2 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar_informacion_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 0, estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function recibir_documentacion_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 3, estatusincorporado = 2 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function aceptar_documentacion_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 4, estatusincorporado = 2 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar_documentacion_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 5, estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function acreditar_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 6, estatusincorporado = 1 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function eliminar_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 7, estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function suspender_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 8, estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function pendiente_solicitud_incorporacion($idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = 9, estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function habilitar_solicitud_incorporacion($estatusanterior, $idins) {

        $cmd = "UPDATE institucion SET estatussolicitud = '$estatusanterior', estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_institucion_analista($idanalista) {

        $cmd = "SELECT institucion.idinstitucion idinsti, institucion.folio folio, 
                institucion.expediente  expediente, institucion.estatussolicitud estatusinsti, 
                institucion.fechamodificacion fechainsti, institucion.idusuario idusu, institucion.nombreinstitucion nombreinst,
                institucion.fechacreacion fechacreacion,
                concat(propietario.nompropietario, ' ', propietario.apellido1, ' ', propietario.apellido2) nombrepropietario,
                (SELECT nombre FROM personamoral WHERE personamoral.idinstitucion=institucion.idinstitucion) persona_moral 
                FROM institucion 
                LEFT JOIN propietario ON propietario.idinstitucion=institucion.idinstitucion
                WHERE institucion.idanalista = '$idanalista'
                ORDER BY institucion.fechacreacion DESC";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
    }

    public function consultar_expediente($anio) {

        $cmd = "select * from institucion where extract(year from fechacreacion)='$anio' and expediente = (SELECT max(expediente) FROM institucion)";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function actualizar_nombre_institucion($nombre_institucion, $clave_institucion, $correo_institucion, $director_institucion, $idinstitucion) {

        $cmd = "UPDATE institucion SET nombreinstitucion = '$nombre_institucion', claveinstitucion = '$clave_institucion', correoelectronico = '$correo_institucion', director = '$director_institucion' WHERE idinstitucion='$idinstitucion'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_estatus_solicitud_incorporacion($idins) {

        $cmd = "SELECT estatussolicitud
                FROM institucion 
                WHERE idinstitucion = '$idins'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

    public function insertar_estatus_anterior_incorporacion($estatusanterior, $idins) {

        $cmd = "UPDATE institucion SET estatusanterior = '$estatusanterior', estatusincorporado = 3 WHERE idinstitucion='$idins'";
        $this->db->query($cmd);
        return TRUE;
    }

    public function consultar_estatus_anterior_incorporacion($idins) {

        $cmd = "SELECT estatusanterior
                FROM institucion 
                WHERE idinstitucion = '$idins'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() == 1) ? $query->row() : NULL;
    }

        
    
    //Función para insertar una materia por mapa curricular
    public function crear_materia_mc($arr) {
        $this->db->insert('mapamateria', $arr);
        return TRUE;
    }
    
    //Función para consultar las materias por dicho mapa curricular
    public function consultar_materias_mc($idmc){
        
        $cmd = "SELECT idmc, fechamodificacion, idmateria, 
            (SELECT asignatura FROM materia WHERE materia.idmateria = mapamateria.idmateria) nommateria 
            FROM mapamateria 
            WHERE idmc = '$idmc'";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function eliminar_materia_mc($idmateria, $idmc){
    	$cmd = "DELETE FROM mapamateria WHERE idmateria = '$idmateria' AND idmc = '$idmc'";
        $this->db->query($cmd);
        return TRUE;
    }
    
    
    public function crear_materia_mc_anterior($data) {
        
        $cmd = "INSERT INTO materia (idmateria, asignatura, estatus, fechamodificacion, usuariomodificacion, idmc)  "
                . " VALUES((SELECT (MAX(idmateria)+1) idmax FROM materia), '" . $data['asignatura'] . "','" . $data['estatus'] . "','" . $data['fechamodificacion'] . "','" . $data['usuariomodificacion'] . "','" . $data['idmc'] ."')";
        $this->db->query($cmd);
        return TRUE;
        
    }
    
    //Función para consultar las materias por dicho mapa curricular
    public function consultar_materias_mc_anterior($idmc){
        
        $cmd = "SELECT idmc, fechamodificacion, idmateria, asignatura, estatus  
            FROM materia 
            WHERE idmc = '$idmc' order by idmateria asc";
        $query = $this->db->query($cmd);
        return ($query->num_rows() > 0) ? $query->result() : NULL;
        
    }
    
    public function eliminar_materia_mc_anterior($idmateria, $idmc){
    	$cmd = "DELETE FROM materia WHERE idmateria = '$idmateria' AND idmc = '$idmc'";
        $this->db->query($cmd);
        return TRUE;
    }
    
    public function crear_optativa($arr) {
        $this->db->insert('optativa', $arr);
        return true;
    }
    
}
