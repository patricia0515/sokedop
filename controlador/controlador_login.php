<?php
	require_once("../modelo/modelo_usuario.php");

	$us=new usuario();
	 $doc_usuario=$_POST['usuario'];
 	$us->setClave_usuario($_POST['clave']);

	
	/* $condicion="select * from usuario where doc_usuario = '".$doc_usuario."' AND clave_usuario ='".$us->getClave_usuario(); */
	//SELECT * FROM usuario WHERE doc_usuario ='79629312' AND clave_usuario ='1625';
	
	//SELECT * from usuario WHERE doc_usuario = '79629312' AND clave_usuario='1625';
	if($resultado=$us->index(null))
	{
		session_start();//esta es la forma de incializar una sesión
		foreach($resultado as $dato)
		{
			//esta es la manera de enviar datos en forma global
			$_SESSION['doc_usuario'] = $dato['Documento'];
			$_SESSION['clave_usuario'] = $dato['Clave'];
			$_SESSION['nombre'] = $dato['Nombre'];
			$_SESSION['apellido'] = $dato['Apellido'];
		}
		
		header("location: ../vista/vista_inicio.php");
	}
	else
	{
		header("location: ../index.php?alerta=1");
	}
	
   ?>