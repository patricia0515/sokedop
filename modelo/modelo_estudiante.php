<?php
 require_once("modelo_conexion.php");
 class Estudiante extends conexion
 {
   //Definición de los atributos
   private $no_documento;
   private $tipo_documento;
   private $nombres;
   private $apellidos;
   private $estado;
   private $direccion;
   private $barrio;
   private $celular;
   private $email;
   private $foto;
   private $nombre_acudiente;
   private $apellidos_acudiente;
   private $tel_acudiente;
   private $email_acudiente;
   private $parentesco_acu;
   private $funcionario;
   private $categoria;
   
   
   private $conec;  
     
   public function __construct()
   {
       $this->conec = new conexion();
       $this->conec = $this->conec->conectar();
   }


   /* Los métodos set colocan datos en
   los atributos de las clases    */  
   public function setNo_documento($no_documento)
   {
      $this->no_documento = $no_documento;  
   }
   //Los métodos get extraen datos de
   //los atributos de las clases
   public function getNo_documento()
   {
       return $this->no_documento;  
   }


   public function setTipo_documento($tipo_documento)
   {
      $this->tipo_documento = $tipo_documento;  
   }
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

   public function setBarrio($barrio)
   {
      $this->barrio = $barrio;  
   }
   public function getBarrio()
   {
       return $this->barrio;  
   }

   public function setCelular($celular)
   {
      $this->celular = $celular;  
   }
   public function getCelular()
   {
       return $this->celular;  
   }

   public function setEmail($email)
   {
      $this->email = $email;  
   }
   public function getEmail()
   {
       return $this->email;  
   }

   public function setFoto($foto)
   {
      $this->foto = $foto;  
   }
   public function getFoto()
   {
       return $this->foto;  
   }

   public function setNombre_acudiente($nombre_acudiente)
   {
      $this->nombre_acudiente = $nombre_acudiente;  
   }
   public function getNombre_acudiente()
   {
       return $this->nombre_acudiente;  
   }

   public function setApellidos_acudiente($apellidos_acudiente)
   {
      $this->apellidos_acudiente = $apellidos_acudiente;  
   }
   public function getApellidos_acudiente()
   {
       return $this->apellidos_acudiente;  
   }

   public function setTel_Acudiente($tel_acudiente)
   {
      $this->tel_acudiente = $tel_acudiente;  
   }
   public function getTel_Acudiente()
   {
       return $this->tel_acudiente;  
   }

   public function setEmail_acudiente($email_acudiente)
   {
      $this->email_acudiente = $email_acudiente;  
   }
   public function getEmail_acudiente()
   {
       return $this->email_acudiente;  
   }

   
      public function setParentesco_acu($parentesco_acu)
   {
      $this->parentesco_acu = $parentesco_acu;  
   }
   public function getParentesco_acu()
   {
       return $this->parentesco_acu;  
   }
	 
	 public function setFuncionario($funcionario)
   {
      $this->funcionario = $funcionario;  
   }
   public function getFuncionario()
   {
       return $this->funcionario;  
   }

   public function setCategoria($categoria)
   {
      $this->categoria = $categoria;  
   }
   public function getCategoria()
   {
       return $this->categoria;  
   }
	 public function setDestino($destino)
   {
      $this->destino = $destino;  
   }
   public function getDestino()
   {
       return $this->destino;  
   }

  



    
   public function insertar($tabla,$datos)
   {
       
      $sql="insert into ".$tabla." values(
	  '".$this->getNo_documento()."',
	  '".$this->getTipo_documento()."',
	  '".$this->getNombres()."',
	  '".$this->getApellidos()."',
	  'Activo',
	  '".$this->getDireccion()."',
      '".$this->getBarrio()."',
      '".$this->getCelular()."',
      '".$this->getEmail()."',
      '".$this->getFoto()."',
	  '".$this->getNombre_acudiente()."',
      '".$this->getApellidos_acudiente()."',
      '".$this->getTel_acudiente()."',
      '".$this->getEmail_acudiente()."',
      '".$this->getParentesco_acu()."',
	  '".$this->getFuncionario()."',
	  '".$this->getCategoria()."'	  
	  )";
	  
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
   //Este es un ejemplo de requerimiento      
   public function contar()
   {
       $sql="select count(*) as estudiantes from estudiante";
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
      e.no_documento as Documento,
      e.tipo_documento as Tipo_doc,
      e.nombres as Nombre , 
      e.apellidos as Apellido, 
      c.nombre as Categoria, 
      e.foto as Foto, 
      e.estado as Estado
      from estudiante as e
      inner join categoria as c
      on e.categoria=c.id_categoria
      where estado='Activo'
      order by Nombre asc";  
	  }
	  else{
		 $sql="select 
         e.no_documento as Documento, 
         e.nombres as Nombre, 
         e.apellidos as Apellido, 
         c.nombre as Categoria, 
         e.foto as Foto, 
         e.estado as Estado
		from estudiante as e 
		inner join categoria as c
		on e.categoria=c.id_categoria 
		where e.nombres like '%".$busqueda."%' 
        or e.apellidos like '%".$busqueda."%' 
        or e.no_documento like '%".$busqueda."%'
        order by Nombre asc";
	  	  }
      
       // Esta es la manera para ejecutar una sentencia SQL.
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

   /* Esta funcion editar trae el rsgistro que queremos 
     modificar y lo envia para visualizarlo en el formulario*/
	 public function editar($tabla,$condicion)
     {
        $sql="Select * from ".$tabla." where no_documento = ".$condicion;
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
        tipo_documento      = '".$this->getTipo_documento()."',
        nombres             = '".$this->getNombres()."',
        apellidos           = '".$this->getApellidos()."',
        direccion           = '".$this->getDireccion()."',
        barrio              = '".$this->getBarrio()."',
        celular             = '".$this->getCelular()."',
        email               = '".$this->getEmail()."',
        foto                = '".$this->getFoto()."',
        nombre_acudiente    = '".$this->getNombre_acudiente()."',
        apellidos_acudiente = '".$this->getApellidos_acudiente()."',
        tel_acudiente       = '".$this->getTel_acudiente()."',
        email_acudiente     = '".$this->getEmail_acudiente()."',
        parentesco_acu      = '".$this->getParentesco_acu()."',
        funcionario         = '".$this->getFuncionario()."',
        categoria           = '".$this->getCategoria()."'
        WHERE no_documento  = '".$this->getNo_documento()."'";
       
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
   public function borrar($condicion)
   {
      $sql="update estudiante set estado='Inactivo' where no_documento =".$condicion;
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