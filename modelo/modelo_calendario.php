<html>
<head>
<title>calendario</title>
</head>
<body>
<?php

require_once("modelo_conexion.php");

class calendario extends conexion 
{
	private $id_calendario;
	private $nombre_calendario;
	private $estado_calendario;
	private $fecha_calendario;
	private $descripcion_calendario;
  private $funcionario;
  private $conec;

public function __construct()
{
      
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
}

public function setId($identificador)
{
       $this->id_calendario=$identificador;
}
public function getId()
{
       return $this->id_calendario;
}


public function setNombre($nombre)
{
       $this->nombre_calendario=$nombre;	
}
public function getNombre()
{
       return $this->nombre_calendario;	
}


public function setEstado($estado)
{
       $this->estado_calendario=$estado;	
}
public function getEstado()
{
       return $this->estado_calendario;	
}


public function setFecha_calendario($fecha_calendario)
{
       $this->fecha_calendario=$fecha_calendario;	
}
public function getFecha_calendario()
{
       return $this->fecha_calendario;	
}

public function setDescripcion($descripcion)
{
       $this->descripcion_calendario=$descripcion;	
}
public function getDescripcion()
{
       return $this->descripcion_calendario;	
}
public function setFuncionario($funcionario)
{
        $this->funcionario = $funcionario;  
}
public function getFuncionario()
{
       return $this->funcionario;  
}
public function insertar($tabla,$datos)
{
 $sql="insert into ".$tabla." 
 (id_calendario,nombre,estado,fecha,descripcion,funcionario) values
 ('".$this->getId()."',
 '".$this->getNombre()."',
 '".$this->getEstado()."',
 '".$this->getFecha_calendario()."',
 '".$this->getDescripcion()."',
 '".$this->getFuncionario()."'    
    )";
 $resultado = $this->conec->query($sql);
 if ($resultado) 
 {
 	return true;
 }
 else
 {
 	return false;
 }
}

public function contar()
   {
       $sql="select count(*) as num_cal from calendario";
       $conteo=$this->conec->query($sql);
       if($conteo)
       {
           return $conteo->fetch_all(MYSQLI_ASSOC);; 
       }
       else
       {
           return false;
       }
   }

public function buscar($condicion)
   {
      if ($condicion==null)
      {
         $sql="select 
         c.id_calendario as ID, 
         c.nombre as nombre, 
         c.estado as estado, 
         c.fecha as fecha, 
         c.descripcion as descripcion, 
         f.nombres as nombre_f, 
         f.apellidos as apellido_f   
         from calendario as c 
         inner join funcionario as f 
         on c.funcionario = f.id_funcionario
         order by ID desc" ;
      }
      else
      {     
       $sql="select 
       c.id_calendario as ID, 
       c.nombre as nombre, 
       c.estado as estado, 
       c.fecha as fecha, 
       c.descripcion as descripcion, 
       f.nombres as nombre_f, 
       f.apellidos as apellido_f   
       from calendario as c 
       inner join funcionario as f 
       on c.funcionario = f.id_funcionario
       where c.nombre like '%".$condicion."%'
       or f.nombre like '%".$condicion."%'
       or c.fecha like '%".$condicion."%'
       order by ID desc";
      } 
   
      $resultado=$this->conec->query($sql);
      if($resultado)
      {
          return $resultado->fetch_all(MYSQLI_ASSOC);
      }
      else
      {     
          return false;
      }
   }

   
public function actualizar($tabla,$datos)
{
       $sql="UPDATE ".$tabla." 
       set nombre = '".$this->getNombre()."', 
       estado = '".$this->getEstado()."', 
       fecha = '".$this->getFecha_calendario()."', 
       descripcion = '".$this->getDescripcion()."',
       funcionario = '".$this->getFuncionario()."' 
       WHERE id_calendario = '".$this->getId()."'";
       $resultado = $this->conec->query($sql);
       if ($resultado)
       {
           return true;
       }
       else 
       {
           return false;
       }
}
public function editar($tabla,$condicion)
   {
      
         $sql="Select * from ".$tabla." where id_calendario = ".$condicion; 
		 
      
       
      $resultado=$this->conec->query($sql);
      if($resultado)
      {
		  $row_cnt = $resultado->num_rows;
          return $resultado->fetch_all(MYSQLI_ASSOC);
      }
      else
      {     
          return false;
      }
   }

public function borrar($tabla,$condicion)
{
 $sql="delete from ".$tabla." where id_calendario =".$condicion;
      $resultado=$this->conec->query($sql);
      if ($resultado)
       {
           return true;
       }
       else 
       {
           return false;
       }   
   }     
   
}

?>
