<?Php
  require_once("../modelo/modelo_usuario.php");
  
  
  $doc=isset($_SESSION['doc_usuario']) ? $_SESSION['doc_usuario'] : null;//verificar, que la variable este definida
  $us=new usuario();
  
     if($_SESSION['buscar']=$us->index(null))
     {
         //echo "OK";
     }  
  
  else
  {
    $condicion="SELECT u.doc_usuario, u.clave_usuario f.nombres, f.apellidos, f.tipo.usuario FROM usuario AS u
    JOIN funcionario AS f ON u.doc_usuario=f.usuario
    WHERE u.doc_usuario = ".$doc;

    if($resultado=$us->index(null))
    {
        foreach($resultado as $dato)
        {
            $_SESSION['nombres'] = $dato['Nombre'];
            $_SESSION['apellidos'] = $dato['Apellido'];
            $_SESSION['cargo'] = $dato['Cargo'];
           
        }
    }    
  }

  //Está parte del código, busca en la tabla el usuario para mostrar la información del el y porder despues modificarlo.
  
      $doc_usuario=isset($_REQUEST['doc']) ? $_REQUEST['doc']:null;     
      $condicion="SELECT * FROM usuario WHERE doc_usuario = ".$doc_usuario;        
      //$_SESSION['buscar']==> está es un arreglo matricial para obtener los registros de la la busqueda
      if($_SESSION['buscar']=$us->buscaru(null,$condicion))
      {
         //echo "OK";
      }
  
   
    
?>