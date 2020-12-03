<?php
 require_once("modelo_conexion.php");
 class Funcionario extends conexion
 {
   //Definición de los atributos
   private $id_funcionario;
   private $tipo_documento;
   private $nombres;
   private $apellidos;
   private $celular;
   private $direccion;
   private $estado;
   private $usuario;
   private $conec; 
	 
	 
	 
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }


   //Los métodos set colocan datos en
   //los atributos de las clases     
   public function setTipo_documento($tipo_documento)
   {
      $this->tipo_documento = $tipo_documento;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getTipo_documento()
   {
       return $this->tipo_documento;  
   }


   public function setNombres($nombres)
   {
      $this->nombres = $nombres;  
   }
   public function getNombres()
   {
       return $this->nombres;  
   }


   public function setApellidos($apellidos)
   {
      $this->apellidos = $apellidos;  
   }
   public function getApellidos()
   {
       return $this->apellidos;  
   } 

   public function setDireccion($direccion)
   {
      $this->direccion = $direccion;  
   }
   public function getDireccion()
   {
       return $this->direccion;  
   }

   
   public function setCelular($celular)
   {
      $this->celular = $celular;  
   }
   public function getCelular()
   {
       return $this->celular;  
   }

   public function setEstado($estado)
   {
      $this->estado = $estado;  
   }
   public function getEstado()
   {
       return $this->estado;  
   }

    public function setUsuario($usuario)
   {
      $this->usuario = $usuario;  
   }
   public function getUsuario()
   {
       return $this->usuario;  
   }
    public function setId_funcionario($id_funcionario)
   {
      $this->id_funcionario = $id_funcionario;  
   }
   public function getId_funcionario()
   {
       return $this->id_funcionario;  
   }



    
   public function insertar($tabla,$datos)
   {
      //INSERT INTO usuario VALUES('49888312','demo','buesquelo@hotmail.com','docente');   
      $sql="insert into ".$tabla." 
	  (
	  tipo_documento,
	  nombres,
	  apellidos,
	  celular,
	  direccion,
	  estado,
	  usuario
	  ) 
	  
	  values
	  (
	  '".$this->getTipo_documento()."',
	  '".$this->getNombres()."',
	  '".$this->getApellidos()."',
	  '".$this->getCelular()."',
	  '".$this->getDireccion()."',
	  'Activo',
	  '".$this->getUsuario()."'
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
		from funcionario as f
		inner join usuario as u
		on f.usuario = u.doc_usuario
		order by ID desc";  
	  }
	  else
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
			from funcionario as f
			inner join usuario as u
			on f.usuario = u.doc_usuario
			where f.nombres like '%".$busqueda."%' 
			or f.apellidos like '%".$busqueda."%' 
			or u.tipo_usuario like '%".$busqueda."%' 
			or u.doc_usuario like '%".$busqueda."%' 
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
      
    
   public function buscar1($tabla,$condicion)
   {
      if ($condicion==null)
      {
		  
         $sql="Select * from ".$tabla;
      }
      else
      {
         $sql="Select * from ".$tabla." where ".$condicion; 
      }
       
   public function buscar($tabla,$condicion)
   {
      if ($condicion==null)
      {
		  
         $sql="Select 
			f.id_funcionario as ID,
			u.doc_usuario as Documento,
			f.nombres as Nombre ,
			f.apellidos as Apellido,
            u.tipo_usuario
			from funcionario as f
			inner join usuario as u
			on f.usuario = u.doc_usuario
            where u.tipo_usuario = 'Entrenador'";
      }
      else
      {
          $sql="select 
			f.id_funcionario as ID,
			u.doc_usuario as Documento,
			f.nombres as Nombre ,
			f.apellidos as Apellido,
			from funcionario as f
			inner join usuario as u
			on f.usuario = u.doc_usuario
			where".$condicion; 
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
   public function buscar1($tabla,$condicion)
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
      
      $sql="Select * from ".$tabla." where id_funcionario = ".$condicion;       
       
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
	 
	 
   public function actualizar($tabla)
   {
      //UPDATE usuario SET Tipo_usuario ='Docente' WHERE doc_usuario = '404444456';
       $sql="UPDATE ".$tabla." SET  
			tipo_documento       = '".$this->getTipo_documento()."', 
			nombres              = '".$this->getNombres()."', 
			apellidos            = '".$this->getApellidos()."', 
			celular              = '".$this->getCelular()."', 
			direccion            = '".$this->getDireccion()."'
			WHERE id_funcionario = '".$this->getId_funcionario()."'";
	   
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
      $sql="delete from ".$tabla." where no_documento =".$condicion;
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