<!DOCTYPE html>
<html lang="es">
    <head>
    <script type="text/javascript">
        function preguntar(valor)
        {
            if (confirm('¿Desea eliminar el regristro?, con el número de documento '+valor))
            {
                window.location.href="vista_mensualidad.php?resp="+valor;
            }
        }
    </script>
    </head>
<?php
  	require_once("../../partials/head.php");
  ?>
<body class="hold-transition skin-blue sidebar-mini">
       <div class="wrapper">

      <?php
		require_once("../../partials/header.php");		
      	require_once("../../partials/menu.php");
      ?>
       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">               
                <?php
                	require_once("../../partials/box_header_grilla.php");
                ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                  <h3>Listado de Mensualidades<a href="vista_adicionar_mensualidad.php"> <button class="btn btn-success">Nuevo</button></a></h3>
                                  <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                  <?php require_once("../../partials/vista_buscar.php") ?>   
                                </div>
                              </div>
    <div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
   <table class="table table-striped">
  	
		<thead>
		<tr>
			<th>Mensualidad</th>
			<th>Valor</th>
			<th>Fecha</th>
			<th>Mes</th>
			<th>Estudiante</th>
            <th>Funcionario</th>
            <th>Acciones</th>
		</tr>
		</thead>
<?php
    require_once("../../../modelo/modelo_mensualidad.php");
    $us = new mensualidad();
    if($resultado=$us->buscar("mensualidad","id_mensualidad like '%".$searchText."%'order by id_mensualidad desc"))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?>        <tr>   
              <td> <?php echo $valor['id_mensualidad'];?></td>
              <td> <?php echo $valor['valor'];?></td>
              <td> <?php echo $valor['fecha_pago'];?></td>
              <td> <?php echo $valor['mes'];?></td>
              <td> <?php echo $valor['estudiante'];?></td>
              <td> <?php echo $valor['funcionario'];?></td>
            <?php
               //Esta es la manera de enviar un dato a un archivo php Ejemplo:vista_modificar_usuario.php?doc= ".$valor['doc_usuario']
               echo "<td><a href='vista_modificar_mensualidad.php?id= ".$valor['id_mensualidad']."'class='btn btn-primary'>Modificar</a>";
               echo "<td><a href='#' onclick='preguntar(".$valor['id_mensualidad'].")' class='btn btn-danger'> Borrar</a> </td>";
            ?> 
          </tr>
<?php
       }
    }
    else
    {  
        echo  "No hay registros";
    }
    
    if (isset($_GET['resp']))
    {
       if($us->borrar('mensualidad',$_GET['resp']))
       {
           echo "Registro eliminado, fisicamente";
       }
       else
       {
           echo "Registro no fue eliminado";
       }
    }
?>
   </table>
        </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
           </div>
    </div>
</body>
</html>