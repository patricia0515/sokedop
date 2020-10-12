  <?php
  
  
  /**
 * Autor: Rodrigo Chambi Q.
 * Mail:  filvovmax@gmail.com
 * web:   www.gitmedio.com
 * Script para hacer Paginacion en PHP, Mysql y HTML5
 */
$CantidadMostrar=5;
//Conexion  al servidor mysql
$conetar = new mysqli("localhost", "root", "", "turl");
if ($conetar->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conetar->connect_errno . ") " . $conetar->connect_error;
}else{
                    // Validado de la variable GET
    $compag         =(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag']; 
	$TotalReg       =$conetar->query("SELECT * FROM ejemplo_paginacion");
	//Se divide la cantidad de registro de la BD con la cantidad a mostrar 
	$TotalRegistro  =ceil($TotalReg->num_rows/$CantidadMostrar);
	echo "<b>La cantidad de registro se dividió a: </b>".$TotalRegistro." para mostrar 5 en 5<br>";
	//Consulta SQL
	$consultavistas ="SELECT
						ejemplo_paginacion.id,
						ejemplo_paginacion.Nombre,
						ejemplo_paginacion.Apellido
						FROM
						ejemplo_paginacion
						ORDER BY
						ejemplo_paginacion.id ASC
						LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
	$consulta=$conetar->query($consultavistas);
         echo "<table><tr><th>Codigo</th><th>Nombre</th><th>Apellido</th></tr>";
	while ($lista=$consulta->fetch_row()) {
	     echo "<tr><td>".$lista[0]."</td><td>".$lista[1]."</td><td>".$lista[2]."</td></tr>";
	}
	    echo "</table>";
     
    /*Sector de Paginacion */
    
    //Operacion matematica para botón siguiente y atrás 
	$IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):1;
  	$DecrementNum =(($compag -1))<1?1:($compag -1);
  
	echo "<ul><li class=\"btn\"><a href=\"?pag=".$DecrementNum."\">◀</a></li>";
    //Se resta y suma con el numero de pag actual con el cantidad de 
    //números  a mostrar
     $Desde=$compag-(ceil($CantidadMostrar/2)-1);
     $Hasta=$compag+(ceil($CantidadMostrar/2)-1);
     
     //Se valida
     $Desde=($Desde<1)?1: $Desde;
     $Hasta=($Hasta<$CantidadMostrar)?$CantidadMostrar:$Hasta;
     //Se muestra los números de paginas
     for($i=$Desde; $i<=$Hasta;$i++){
     	//Se valida la paginacion total
     	//de registros
     	if($i<=$TotalRegistro){
     		//Validamos la pag activo
     	  if($i==$compag){
           echo "<li class=\"active\"><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }else {
     	  	echo "<li><a href=\"?pag=".$i."\">".$i."</a></li>";
     	  }     		
     	}
     }
	echo "<li class=\"btn\"><a href=\"?pag=".$IncrimentNum."\">▶</a></li></ul>";
  
}
?>


CREATE DATABASE turl;

CREATE TABLE `ejemplo_paginacion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
);


/**
 * Autor: Rodrigo Chambi Q.
 * Mail:  filvovmax@gmail.com
 * web:   www.gitmedio.com
 * Paginador para PHP, HTML5
 */

<!DOCTYPE html>
<html>
<head>
	<title>Paginacion en PHP</title>
	
	<style type="text/css">
	   .active > a{
	   	background: rgb(255,116,0); 
	   }
	  ul{
	  	margin-left: 0px;
	  	padding: 0px;
	  } 
      ul > li{
      	list-style: none;
      	display: inline-block;
      	margin-right:7px;
      }
      ul > li > a {
      	color: #FFFFFF;
      	text-decoration: none;
      	padding: 5px 10px 5px 10px;
        display: block;
		background: #1e5799; /* Old browsers */
		border-radius: 20px;
      }
      .btn > a{
      	padding: 2px;
		background: #1e5799; /* Old browsers */
		 border-radius: 2px;
		 text-align: center;
		 width:30px;
      }
      table{
      	border: solid 1px #7E7C7C;
      	border-collapse: collapse;
      }
td , th{
      	border: solid 1px #7E7C7C;
      	padding: 2px;
      	text-align: center;
      }
	</style>
</head>
<body>
 
require_once 'paginador.php';
 
</body>
</html>