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
                                  <h3>Listado de Eventos<a href="vista_adicionar_calendario.php"> <button class="btn btn-success">Nuevo</button></a></h3>
                                  <!--Le voy a decir que llame a la vista search ubicada en la carpeta partials de las views-->
                                  <?php require_once("../../partials/vista_buscar.php") ?>   
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-condensed table-hover">
                                      <thead><!--Esta es la cabecera de la tabla con los campos tipulos -->
                                        <th>Id Calendario</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Descripcion</th>
                                      </thead>
                                      <!--Este bucle va recorrear todas los estudiantes, los va a almacenar en la variable $est de manera independiente y se ira mostrando en las filas-->
                                      <?php
                                            require_once("../../../modelo/modelo_calendario.php");

                                            $cal = new calendario();
                                            //if ($resultado=$est->buscar('estudiante',"nombres like '%".$searchText."%' or apellidos like '%".$searchText."%' or no_documento like '%".$searchText."%' order by apellidos asc"))
                                            if ($resultado=$cal->buscar("calendario",null))
                                            {
                                              //var_dump($resultado);
                                              foreach ($resultado as $valor)
                                            {
                                          ?>
                                         <tr>
                                           <td> <?php echo $valor['id_calendario'];?></td>
                                           <td> <?php echo $valor['nombre'];?></td>
                                           <td> <?php echo $valor['estado'];?></td>
                                           <td> <?php echo $valor['fecha'];?></td>
                                           <td> <?php echo $valor['descripcion'];?></td>
                                           <td> <?php echo $valor['funcionario'];?></td>
                                           
                                               
                                              
                                           
                                           
                                        
                                          <?php 
                                              echo "<td><a href='vista_modificar_calendario.php?id=".$valor['id_calendario']."'class='btn btn-primary'>Actualizar</a></td>";
                                              
                                              echo "<td><a href='#' onclick='preguntar(".$valor['id_calendario'].")' class='btn btn-danger'> Borrar</a> </td>";
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
                                               if($cal->borrar('calendario',$_GET['resp']))
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
                                        <?php
                                          foreach ($cal->contar() as $conteo)
                                          {      
                                            echo  "El número de eventos en el sistema es: ".$conteo['num_cal']."<br>";}
                        $registros=count($resultado);
                      
                                        ?>  
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
    </body>
</html>
                           