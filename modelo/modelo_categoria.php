<?php
 require_once("modelo_conexion.php");
 class categoria extends conexion
 {
   //Definición de los atributos
   private $id_categoria;
   private $nombre;
   private $descripcion;
   private $condicion;
   private $conec;
     
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setNombre($nombre)
   {
      $this->nombre = $nombre;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getNombre()
   {
       return $this->nombre;  
   } 
	
	 public function setId_categoria($id_categoria)
   {
      $this->id_categoria = $id_categoria;  
   }
   public function getId_categoria()
   {
       return $this->id_categoria;  
   }
	 
	 

   public function setDescripcion($descripcion)
   {
      $this->descripcion = $descripcion;  
   }
   public function getDescripcion()
   {
       return $this->descripcion;  
   }




      public function insertar($datos)
   {
      //INSERT INTO categoria VALUES('autoincremental','nombre','Descripción','Condición');   
      $sql="insert into categoria (nombre,descripcion,condicion) values ('".$this->getNombre()."','".$this->getDescripcion()."','1')";
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



   public function index()
   {
      $sql="Select * from categoria where condicion = 1  order by id_categoria desc";      
      
       // Esta es la manera para ejecutar una sentencia SQL.
      $resultado=$this->conec->query($sql);
      if($resultado)

      return $resultado->fetch_all(MYSQLI_ASSOC);
     
   }


   //Este es un ejemplo de requerimiento      
   public function contar()
   {
       $sql="select count(*) as categorias from categoria";
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


   public function buscar($tabla,$condicion)
   {
      if ($condicion==null)
      {
         $sql="Select * from ".$tabla;
      }
      else
      {
         $sql="Select * from ".$tabla." where ".$condicion; 
		 
      }
       
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
     /* Esta funcion editar trae el registro que queremos 
     modificar y lo envia para visializarlo en el formulario*/
	 public function editar($tabla,$condicion)
   {
         $sql="Select * from ".$tabla." where id_categoria = ".$condicion; 
		        
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


   public function actualizar($tabla,$campos)
   {
      //UPDATE usuario SET Tipo_usuario ='Docente' WHERE doc_usuario = '404444456';
       $sql="UPDATE ".$tabla." SET 
	   nombre             = '".$this->getNombre()."', 
	   descripcion        = '".$this->getDescripcion()."' 
	   WHERE id_categoria = '".$this->getId_categoria()."'";
	   
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
   public function borrar($tabla,$condicion)
   {
      $sql="update ".$tabla." set condicion= 0  where id_categoria =".$condicion;
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