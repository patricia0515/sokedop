<?php
 require_once("modelo_conexion.php");
 class usuario extends conexion
 {
   //Definición de los atributos
   private $doc_usuario;
   private $clave_usuario;
   private $mail_usuario;
   private $tipo_usuario;
   private $conec;     
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }
   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setDoc_usuario($doc_usuario)
   {
      $this->doc_usuario = $doc_usuario;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getDoc_usuario()
   {
       return $this->doc_usuario;  
   }    
	 
	 
   public function setClave_usuario($clave_usuario)
   {
      $this->clave_usuario = $clave_usuario;  
   }
   public function getClave_usuario()
   {
       return $this->clave_usuario;  
   }
	 
	 
   public function setMail_usuario($mail_usuario)
   {
      $this->mail_usuario = $mail_usuario;  
   }
   public function getMail_usuario()
   {
       return $this->mail_usuario;  
   }
	 
	 
	 
   public function setTipo_usuario($tipo_usuario)
   {
      $this->tipo_usuario = $tipo_usuario;  
   }
   public function getTipo_usuario()
   {
       return $this->tipo_usuario;  
   }
	 
	 

	 
	 
    
   public function insertar($tabla,$datos)
   {
      //INSERT INTO usuario   VALUES('','','','');   
      $sql="insert into ".$tabla." values(
	  '".$this->getDoc_usuario()."',
	  '".$this->getClave_usuario()."',
	  '".$this->getMail_usuario()."',
	  '".$this->getTipo_usuario()."'
	  )";
       $resultado = $this->conec->query($sql);
	   
       if ($resultado)
       {
           return true;
		   //header("location: ../vista/usuario/vista_index_usuario.php");      
       }
       
   }



     public function index($busqueda)
   {
	  if ($busqueda==null)
	  {
        $sql="select 
        f.id_funcionario as ID, 
        u.doc_usuario as Documento, 
        f.nombres as Nombre , 
        f.apellidos as Apellido, 
        u.clave_usuario as Clave, 
        u.mail_usuario as Mail, 
        u.tipo_usuario as Cargo,
        f.estado as Estado
		from usuario as u
		inner join funcionario as f
		on u.doc_usuario=f.usuario
		where u.tipo_usuario='Entrenador'
		order by f.id_funcionario desc";
		   
	  }
	  else{
            $sql= "select 
            f.id_funcionario as ID, 
            u.doc_usuario as Documento, 
            f.nombres as Nombre, 
            f.apellidos as Apellido, 
            u.clave_usuario as Clave, 
            u.mail_usuario as Mail, 
            u.tipo_usuario as Cargo,
            f.estado as Estado
			from usuario as u
			inner join funcionario as f
			on u.doc_usuario=f.usuario
            where f.nombres like '%".$busqueda."%' 
            or f.apellidos like '%".$busqueda."%' 
            or u.no_documento like '%".$busqueda."%'
			order by f.id_funcionario desc"; 
			
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
	 
	



   //Este es un ejemplo de requerimiento      
   public function contar()
   {
       $sql="select count(*) as usuarios from usuario";
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
      
      $sql="Select * from ".$tabla." where doc_usuario = ".$condicion;       
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
	 
	 
	 
	 
   public function actualizar($tabla)
   {
      //UPDATE usuario SET Tipo_usuario ='Docente' WHERE doc_usuario = '404444456';
       $sql="UPDATE".$tabla."SET
            clave_usuario      = '".$this->getClave_usuario()."', 
		    mail_usuario       = '".$this->getMail_usuario(). "', 
			tipo_usuario       = '".$this->getTipo_usuario()."'
			WHERE doc_usuario  = '".$this->getDoc_usuario()."'";
	   
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
      $sql="delete from ".$tabla." where doc_usuario =".$condicion;
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