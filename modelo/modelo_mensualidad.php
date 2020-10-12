<?php
 require_once("modelo_conexion.php");
 class mensualidad extends conexion
 {
   //Definición de los atributos
   private $id_mensualidad;
   private $valor;
   private $fecha_pago;
   private $mes;
   private $estudiante;
   private $funcionario;
   private $conec;     
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setId_mensualidad($id_mensualidad)
   {
      $this->id_mensualidad = $id_mensualidad;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getId_mensualidad()
   {
       return $this->id_mensualidad;  
   }     
   public function setValor($valor)
   {
      $this->valor = $valor;  
   }
   public function getValor()
   {
       return $this->valor;  
   }
   public function setFecha_pago($fecha_pago)
   {
      $this->fecha_pago = $fecha_pago;  
   }
   public function getFecha_pago()
   {
       return $this->fecha_pago;  
   }
   public function setMes($mes)
   {
      $this->mes = $mes;  
   }
   public function getMes()
   {
       return $this->mes;  
   }     
   public function setEstudiante($estudiante)
   {
      $this->estudiante = $estudiante;  
   }
   public function getEstudiante()
   {
       return $this->estudiante;  
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
      //INSERT INTO usuario VALUES('49888312','demo','buesquelo@hotmail.com','docente');   
$sql="insert into ".$tabla."(valor,fecha_pago,mes,estudiante,funcionario) values(
	  '".$this->getValor()."',
	  '".$this->getFecha_pago()."',
	  '".$this->getMes()."',
	  '".$this->getEstudiante()."',
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
   //Este es un ejemplo de requerimiento      
   public function contar()
   {
       $sql="select count(*) as mensualidades from mensualidad";
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
          return $resultado->fetch_all(MYSQLI_ASSOC);
      }
      else
      {     
          return false;
      }
   }
     public function editar($tabla,$condicion)
   {
      
         $sql="Select * from ".$tabla." where id_mensualidad = ".$condicion; 
		 
      
       
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
        valor = '".$this->getValor()."'
       , fecha_pago = '".$this->getFecha_pago()."'
       , mes = '".$this->getMes()."'
       , estudiante = '".$this->getEstudiante()."'
       , funcionario = '".$this->getFuncionario()."' 
       WHERE id_mensualidad = '".$this->getId_mensualidad()."'";
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
      $sql="delete from ".$tabla." where id_mensualidad =".$condicion;
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