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
                                                             <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                  <h3>Listado de Usuarios<a href="vista_crear_usuario.php"> <button class="btn btn-success">Nuevo</button></a></h3>
                                 <!--Le voy a decir que llame a la vista search ubicada en la carpeta estudiante de las views-->
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
                                        <th>Clave</th>
                                        <th>Email</th>
                                        <th>Tipo de Usuario</th>
                                        <th>Opciones</th>
                                      </thead>
                                      <!--Este bucle va recorrear todas los estudiantes, los va a almacenar en la variable $est de manera independiente y se ira mostrando en las filas-->
                                      <?php
                                            require_once("../../../modelo/modelo_funcionario.php");

                                            $fun = new Funcionario();
                                            if ($resultado=$fun->index($searchText))
                                            {
                                              //var_dump($resultado);
                                              foreach ($resultado as $valor)
                                            {
                                          ?>
                                         <tr>
                                           <td> <?php echo $valor['Documento'];?> </td>
                                           <td> <?php echo $valor['Nombre']." ".$valor['Apellido'];?> </td>
                                           <td> <?php echo $valor['Clave'];?> </td>
                                           <td> <?php echo $valor['Mail'];?> </td>
                                           <td> <?php echo $valor['Cargo'];?> </td>
                                           <td>
                                             <?php 
												  //Le estoy pasando la llave primaria de cada tabla---doc para la tabla usuario---e ID para la tabla funcionario
                                              echo "<a href='vista_modificar_usuario.php?doc= ".$valor['Documento']."&id= ".$valor['ID']."'><button class='btn btn-info'>Editar</button></a>";
                                              echo "<a href='#' onclick='preguntar(".$valor['Documento'].$valor['ID'].")'><button class='btn btn-danger'> Borrar</button></a> ";
                                           ?>
                                         </td>
                                       </tr>
                                       <?php
                                               }
												
                                            }
                                            else
                                            { 
												?>
                                                <h4>No se encuentran coincidencias</h3>
                                                
                                                <?php
                                            }
                                            
                                            if (isset($_GET['resp']))
                                            {
                                               if($us->borrar('usuario',$_GET['resp']))
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
                                        </body>
                                        <?php
									
                                          foreach ($fun->contar() as $conteo)
                                          {      
                                            echo  "El número de usuarios en el sistema es: ".$conteo['usuarios']."<br>";
											
                                          }
											$registros=count($resultado);
											if($registros==1)
											{
												echo "Se encontro ".$registros." coincidencia";
											}
											elseif($registros==0)
											{
												echo "No se encontraron coincidencias";
											}
											else
											{
												echo "Se encontraron ".$registros." coincidencias";
											}
											
                                        ?>  
                                       
                                    </table>      
                                  </div>  
                                  <!--Gracias al metodo render () podemos paginar los datos
                                  $estudiantes->render()-->  
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
            if (confirm('¿Desea eliminar el regristro?, con el número de documento '+valor['Documento']+' '+valor['ID']))
            {
                window.location.href="vista_index_usuario.php?resp="+valor;
            }
        }
    </script> 
  </body>
</html>
