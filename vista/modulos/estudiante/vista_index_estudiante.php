<!DOCTYPE html>
<html>
  <?php
  	require_once("../../partials/head.php");
  ?>
  <!-- libreria JS de jQuery, debe tener internet para que se accione -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- JavaScript compilado más reciente, del framework bootstrap versión 3.3.7 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
        function preguntar(valor)
        {
            if (confirm('¿Desea eliminar el regristro?, con el número de documento '+valor))
            {
                window.location.href="vista_index_estudiante.php?resp="+valor;
            }
        }
    </script>
  
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
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                                                             <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                  <h3>Listado de Estudiantes<a href="vista_crear_estudiante.php"> <button class="btn btn-success">Nuevo</button></a></h3>
                                  <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                  <?php require_once("../../partials/vista_buscar.php") ?>   
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                      <thead><!--Esta es la cabecera de la tabla con los campos tipulos -->
                                        <th>No. Documento</th>
                                        <th>Nombre</th>
                                        <th>Categoria</th>
                                        <th>Foto</th>
                                        <th>Estado</th>
                                        <th>Opciones</th>
                                      </thead>
                                      <!--Este bucle va recorrear todas los estudiantes, los va a almacenar en la variable $est de manera independiente y se ira mostrando en las filas-->
                                      <?php
                                            require_once("../../../modelo/modelo_estudiante.php");

                                            $est = new estudiante();
                                            //if ($resultado=$est->buscar('estudiante',"nombres like '%".$searchText."%' or apellidos like '%".$searchText."%' or no_documento like '%".$searchText."%' order by apellidos asc"))
											if ($resultado=$est->index($searchText))
                                            {
                                              //var_dump($resultado);
                                              foreach ($resultado as $valor)
                                            {
                                          ?>
                                         <tr>
                                           <td> <?php echo $valor['Documento'];?> </td>
                                           <td> <?php echo $valor['Nombre']." ".$valor['Apellido'];?> </td>
                                           <td> <?php echo $valor['Categoria'];?> </td>
                                           <td>
                                           		<?php $directorio = '../../imagenes/estudiantes/'; ?> 
                                                  
                                               <img src="<?php echo $directorio.$valor['Foto']; ?>" alt="<?php echo $valor['Foto']; ?>" height="50px" width="70px"  class="img-responsive center-block">
                                          		
					 					   </td>
                                           
                                           <td> <?php echo $valor['Estado'];?> </td> 
                                           <td>
                                             <?php 
                                              echo "<a href='vista_modificar_estudiante.php?doc= ".$valor['Documento']."'><button class='btn btn-info'>Editar</button></a>";
                                              echo "<td><a href='#' onclick='preguntar(".$valor['Documento'].")' class='btn btn-danger'> Borrar </a></td>";
                                           ?>
                                         </td>
                                       </tr>
                                       <?php
                                               }
                                            }
                                            else
                                            {  
                                                echo  "No hay registros";
                                            }
                                            require_once("../../../modelo/modelo_estudiante.php");
                                            if (isset($_GET['resp']))
                                            {
                                               if($est->borrar($_GET['resp']))
                                               {
                                                   //echo "Registro eliminado, fisicamente";
                                                header("location: vista_index_estudiante.php"); 
                                            
                                               }
                                               else
                                               {
                                                   echo "Registro no fue eliminado";
                                               }
                                            }
                                        
                                          foreach ($est->contar() as $conteo)
                                          {      
                                            echo  "El número de estudiantes en el sistema es: ".$conteo['estudiantes']."<br>";
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
                                           </table>
                                    </div>
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
                           