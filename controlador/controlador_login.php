<?php
	require_once("../modelo/modelo_usuario.php");

	$doc_usuario = $_POST['usuario'];
	$clave_usuario = $_POST['clave'];

	$us= new usuario();
	//$condicion="select * from usuario where doc_usuario = ".$doc_usuario." AND clave_usuario = ".$clave_usuario;
	//SELECT * FROM usuario WHERE doc_usuario ='79629312' AND clave_usuario ='1625';
	//if ($resultado=$us->buscar(null,$condicion))
	if ($resultado=$us->buscar('usuario',"doc_usuario = ".$doc_usuario." AND clave_usuario  =".$clave_usuario))
	{
		/*session_start();//esta es la forma de incializar una sesión
		 foreach($resultado as $dato)
		 {
			 //esta es la manera de enviar datos en forma global
			 $_SESSION['docusuario'] = $dato['doc_usuario'];
			 $_SESSION['tipousuario'] = $dato['tipo_usuario'];
			 $_SESSION['clave'] = $dato['clave_usuario'];
		 }*/
		
	   // Esta parte del codigo se acciona, si el documento usuario y la clave existen en la tabla usuario         
	     header("location: ../vista/vista_inicio.php?modulo=incio");	    
	   //echo "Usuario y password validos";
	}
		else
		{
		   // Esta parte del codigo se acciona, si el documento usuario y la clave existen no existe tabla usuario   
		   header("location: ../index.php?alerta=1"); 
		}
?>