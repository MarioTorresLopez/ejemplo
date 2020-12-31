
<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reporte_inicio_model
 *
 * @author UTEQ
 */
class reporte_inicio_model extends CI_Model {
    
     public function consultar_suma($idinstitucion) {
        
        $cmd="select sum(genero_i) total, idingreso, genero, nomingreso  from totales
where idinstitucion = '$idinstitucion'
 group by idingreso, genero,nomingreso  
  order by  idingreso asc;
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    
    public function consultar_por_nivel($idnivel) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and nivel.idnivel='$idnivel'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
      public function consultar_por_institucion($idinstitucion) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and institucion.idinstitucion='$idinstitucion'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
 public function consultar_por_carrera($idcarrera) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and carrera.idcarrera='$idcarrera'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function consultar_por_ciclo($idciclo) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and ciclo.idciclo='$idciclo'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
     public function consultar_por_turno($idturno) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and turno.idturno='$idturno'";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
     public function consultar_por_modalidad($idmodalidad) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, institucion.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and modalidad.idmodalidad='$idmodalidad'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    public function consultar_por_municipio($idmunicipio) {
        
        $cmd="select  institucion.idinstitucion,institucion.nombreinstitucion, municipio.idmunicipio, municipio.nombremunicipio, institucion.idnivel, nivel.nomnivel,
institucion.idmodalidad,
modalidad.nommodalidad,  carrera.idcarrera, carrera.nomcarrera, ciclo.idciclo,  fechas_ciclo.fecha as fecha_ciclo,
turno.idturno, turno.descturno
from institucion
inner join municipio on institucion.idmunicipio=municipio.idmunicipio
inner join nivel on institucion.idnivel=nivel.idnivel
inner join modalidad on modalidad.idmodalidad=institucion.idmodalidad
inner  join acuerdo on institucion.idinstitucion=acuerdo.idinst
inner join carrera on acuerdo.idacuerdo=carrera.idacuerdo
inner join ciclo on acuerdo.idciclo=ciclo.idciclo
inner join turno on acuerdo.turno=turno.idturno
inner join fechas_ciclo on ciclo.idciclo=fechas_ciclo.idciclo

where institucion.estatusincorporado=1 and municipio.idmunicipio='$idmunicipio'
";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
       
    public function grupos_alumnos($idinstitucion) {
        $cmd = "SELECT inscripcion.idperiodo,inscripcion.idnoperiodo, COUNT (DISTINCT inscripcion.idga) AS grupos, count (inscripcion.idalumno) alumnos, institucion.idinstitucion 
                    FROM inscripcion inner join institucion 
                    on inscripcion.idinstitucion=institucion.idinstitucion 
                    where institucion.estatusincorporado=1 AND institucion.idinstitucion =' $idinstitucion'
                    group by inscripcion.idperiodo, institucion.idinstitucion,inscripcion.idnoperiodo"; 
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
    }
    
     public function grupos_nombre($idinstitucion) {
        $cmd = "SELECT inscripcion.idperiodo,inscripcion.idnoperiodo,gruposacuerdo.idga, grupo, count (inscripcion.idalumno) alumnos,
 institucion.idinstitucion  FROM inscripcion inner join institucion  on inscripcion.idinstitucion=institucion.idinstitucion
 inner join gruposacuerdo on gruposacuerdo.idga=inscripcion.idga where institucion.estatusincorporado=1 AND institucion.idinstitucion ='$idinstitucion'
                    group by inscripcion.idperiodo, institucion.idinstitucion,inscripcion.idnoperiodo,gruposacuerdo.idga";
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
    }
    
    //NUEVO INGRESO
    public function personas_nuevo_ingresoh($idinstitucion){
        
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'H' and tipoingreso.idingreso = 1 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
     public function personas_nuevo_ingresom($idinstitucion){
        
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'M' and tipoingreso.idingreso = 1 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    //REINGRESO
public function personas_reingresoh($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'H' and tipoingreso.idingreso = 2 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function personas_reingresom($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'M' and tipoingreso.idingreso = 2 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    /// PERSONAS EQUIVALENCIA 
    public function personas_equivalenciah($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'H' and tipoingreso.idingreso = 3 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    public function personas_equivalenciam($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'M' and tipoingreso.idingreso = 3 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    /////// revalidacion
    
    
    
      public function personas_revalidacionh($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'H' and tipoingreso.idingreso = 4 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
      public function personas_revalidacionm($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'M' and tipoingreso.idingreso = 4 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
    
    
    //// traslado
    
    
     public function personas_trasladoh($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'H' and tipoingreso.idingreso = 5 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
     public function personas_trasladom($idinstitucion){
         $cmd = "SELECT COUNT(alumno.genero) genero_i, inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga from alumno left join inscripcion on inscripcion.idalumno=alumno.idalumno
left join tipoingreso  on inscripcion.idingreso=tipoingreso.idingreso left JOIN institucion on institucion.idinstitucion=inscripcion.idinstitucion
WHERE alumno.genero = 'M' and tipoingreso.idingreso = 5 and institucion.idinstitucion = '$idinstitucion' 
group by inscripcion.idinstitucion, inscripcion.idnoperiodo, inscripcion.idperiodo,inscripcion.idga
"; 
        $query = $this->db->query($cmd);
        
        return ($query->num_rows > 0) ? $query->result() : NULL;
        
    }
    
}
