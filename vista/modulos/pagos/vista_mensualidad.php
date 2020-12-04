<!DOCTYPE html>
<html lang="es">
<?php
  	require_once("../../partials/head.php");
  ?>
    <head>
    <script type="text/javascript">
        function preguntar(valor)
        {
            if (confirm('¿Desea eliminar el regristro? de ID '+valor))
            {
                window.location.href="vista_mensualidad.php?resp="+valor;
            }
        }
    </script>
    </head>
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
    <div class="table-responsive">
    <table class="table table-striped table-bordered table-condensed table-hover">
  	
		<thead>
		<tr>
			<th>Mensualidad</th>
			<th>Valor</th>
			<th>Fecha de pago</th>
			<th>Mes Cancelado</th>
			<th>Estudiante</th>
      <th>Categoria</th>
      <th>Funcionario</th>
      <th>Opciones</th>
		</tr>
		</thead>
<?php
    require_once("../../../modelo/modelo_mensualidad.php");
    $men = new mensualidad();
    if($resultado=$men->buscar($searchText))
    { 
       //echo var_dump($resultado);
       foreach ($resultado as $valor)
       {   
?>        <tr>   
              <td> <?php echo $valor['ID'];?></td>
              <td> <?php echo $valor['total'];?></td>
              <td> <?php echo $valor['fechadepago'];?></td>
              <td> <?php echo $valor['mescancelado'];?></td>
              <td> <?php echo $valor['nombre_e']." ".$valor['apellido_e'];?> </td>
              <td> <?php echo $valor['nombre_c'];?></td>
              <td> <?php echo $valor['nombre_f']." ".$valor['apellido_f'];?> </td>
            <?php
               //Esta es la manera de enviar un dato a un archivo php Ejemplo:vista_modificar_usuario.php?doc= ".$valor['doc_usuario']
               echo "<td><a href='vista_modificar_mensualidad.php?id= ".$valor['ID']."'class='btn btn-info'>Modificar</a>";
               echo "<td><a href='#' onclick='preguntar(".$valor['ID'].")' class='btn btn-danger'> Borrar</a> </td>";
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
       if($men->borrar('mensualidad',$_GET['resp']))
       {
           echo "Registro fue eliminado";
       }
       else
       {
           echo "Registro no fue eliminado";
       }
    }
?>
   </table>
   <!-- Esta fila contiene el boton para imprimir el reporte de categorias -->
   <div class="row">
                                              <div class="btn-group btn-group-justified">                                           
                                              <?php echo "<a href='../../pdf/Reporte_mensualidad.php?searchText= ".$searchText."' target='_blank' class='btn btn-primary'><span class='glyphicon glyphicon-print'></span>Imprimir Reporte</a>"; ?>
                                                <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                                <?php require_once("../../partials/vista_buscar.php") ?>  
                                              </div>
                                            </div>
                                            <br>

                                        
                                        <?php
                                          foreach ($men->contar() as $conteo)
                                          {      
                                            echo  "El número de mensualidades en el sistema es: ".$conteo['mensualidades']."<br>";
                                          }
                                        $registros=count($resultado);
                                          if($registros==1)
                                            {
                                              echo "Se encontro ".count($resultado)." coincidencia";
                                            }else
                                            {
                                              echo "Se encontraron ".count($resultado)." coincidencias";
                                            }
                                        ?>  

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
    <?php
		require_once("../../partials/footer.php");
		require_once("../../partials/script.php");
      ?>
</body>
</html>