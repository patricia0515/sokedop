<?php

require_once("../modelo/modelo_usuario.php");
   
        //require_once("vista_usuario.php");
        $us=new usuario();
        $us->setDoc_usuario($_GET['doc']);
        $us->setClave_usuario($_GET['clave']);
        $us->setMail_usuario($_GET['mail']);
        $us->setTipo_usuario($_GET['tipo']);

        if ($us->actualizar('usuario',null))
       	{
          header("location: vista_index_usuario.php");   
        }
        else
        {
          echo "Registro, no se puede actualizar";
        }
      
        /*else
        {
          //echo "Registro, no se puede adicionar, porque ya existe un registro con el documento digitado";
        }
		echo $us->getDoc_usuario()."<br>";
        echo $us->getClave_usuario()."<br>";
		echo $us->getMail_usuario()."<br>";
        echo $us->getTipo_usuario();*/

?>