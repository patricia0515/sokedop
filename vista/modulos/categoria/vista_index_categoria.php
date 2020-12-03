<!DOCTYPE html>
<html>
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
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <h3>Listado de Categorías <a href="vista_crear_categoria.php"> <button class="btn btn-success">Nuevo</button></a></h3>
                                    <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                    <?php require_once("../../partials/vista_buscar.php") ?>  
                                  </div>
                                </div>

                                <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead><!--Esta es la cabecera de la tabla con los campos titulos -->
                                          <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Opciones</th>
                                          </tr>
                                        </thead>
                                        <!--Este bucle va recorrear todas las categorias y las va a almacenar en la variable $cap de manera independiente y se ira mostrando en las filas-->
                                        <?php
                                            require_once("../../../modelo/modelo_categoria.php");

                                            $cat = new categoria();
                                            if ($resultado=$cat->buscar('categoria',"nombre like '%".$searchText."%' and condicion = '1' order by id_categoria desc"))
                                            {
                                              //var_dump($resultado);
                                              foreach ($resultado as $valor)
                                            {
                                          ?>
                                         <tr>
                                           <td> <?php echo $valor['id_categoria'];?> </td>
                                           <td> <?php echo $valor['nombre'];?> </td>
                                           <td> <?php echo $valor['descripcion'];?> </td>                                            
                                            
                                             <?php                                               
                                              //Esta es la manera de enviar un dato a un archivo php Ejemplo:vista_modificar_usuario.php?doc= ".$valor['doc_usuario']
                                              echo "<td><a href='vista_modificar_categoria.php?id= ".$valor['id_categoria']."'class='btn btn-info'>Modificar</a>";
                                              echo "<td><a href='#' onclick='preguntar(".$valor['id_categoria'].")' class='btn btn-danger'> Borrar</a></td>";
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
                                               if($cat->borrar('categoria',$_GET['resp']))
                                               {
                                                   //echo "Registro eliminado, fisicamente";
												   ?>
                                             		<h4>Registro eliminado con exito</h4>
                                              		<?php
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
                                                
                                              
                                              <?php echo "<a href='../../pdf/Reporte_categorias.php?searchText= ".$searchText."' class='btn btn-primary'><span class='glyphicon glyphicon-print'></span>Imprimir Reporte</a>"; ?>
                                                <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                                <?php require_once("../../partials/vista_buscar.php") ?>  
                                              </div>
                                            </div>
                                            <br>

                                        </body>
                                        <?php
                                          foreach ($cat->contar() as $conteo)
                                          {      
                                            echo  "El número de categorias en el sistema es: ".$conteo['categorias']."<br>";
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
                                    <!--Gracias al metodo render () podemos paguinar los datos
                                    $categorias -> render()-->
                                  </div>
                                </div>

                              <!--Fin Contenido OJO AQUI TERMINA MI VISTA-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <?php
		require_once("../../partials/footer.php");
		require_once("../../partials/script.php");
      ?>
      <script type="text/javascript">
        function preguntar(valor)
        {
            if (confirm('¿Desea eliminar la categoria ?, con ID '+valor))
            {
                window.location.href="vista_index_categoria.php?resp="+valor;
            }
        }
    </script> 
    
  </body>
</html>

