<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sockedOp | Escuela de Futbol</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-select.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../img/favicon.ico">
    

      <!-- libreria JS de jQuery, debe tener internet para que se accione -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <!-- JavaScript compilado más reciente, del framework bootstrap versión 3.3.7 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
        function preguntar(valor)
        {
            if (confirm('¿Desea eliminar el regristro?, con el número de documento '+valor))
            {
                window.location.href="vista_usuario.php?resp="+valor;
            }
        }
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="../img/V20.png" height="20px" width="45px"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="../img/V20.png" height="50px" width="200px"></b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">Patricia Vallejos</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      Analisis y Desarrollo de Software
                      <!--<small>www.youtube.com/jcarlosad7</small>-->
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Categoría</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Categorias</a></li>
                
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Ficha Tecnica</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../estudiante/vista_index_estudiante.php"><i class="fa fa-circle-o"></i>Estudiante</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Rendimiento</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Calendario</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i>Eventos</a></li>
                
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-shopping-cart"></i>
                <span>Pagos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i>Mensualidad</a></li>
               <!-- <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i>Contadores</a></li>-->>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Escuela de Futbol Coaching F.C</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                    <h3>Listado de Categorías <a href="vista_crear_categoria.php"> <button class="btn btn-success">Nuevo</button></a></h3>



                                    <!--Le voy a decir que llame a la vista search ubicada en la carpeta categoria de las views-->
                                    <?php require_once("vista_buscar_categoria.php") ?> 
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="table-responsive">
                                      <table class="table table-striped table-bordered table-condensed table-hover">
                                        <thead><!--Esta es la cabecera de la tabla con los campos titulos -->
                                          <th>Id</th>
                                          <th>Nombre</th>
                                          <th>Descripción</th>
                                          <th>Opciones</th>
                                        </thead>
                                        <!--Este bucle va recorrear todas las categorias y las va a almacenar en la variable $cap de manera independiente y se ira mostrando en las filas-->
                                        <?php
                                            require_once("../../modelo/modelo_categoria.php");

                                            $cat = new categoria();
                                            if ($resultado=$cat->index())
                                            {
                                              //var_dump($resultado);
                                              foreach ($resultado as $valor)
                                            {
                                          ?>
                                         <tr>
                                           <td> <?php echo $valor['idcategoria'];?> </td>
                                           <td> <?php echo $valor['nombre'];?> </td>
                                           <td> <?php echo $valor['descripcion'];?> </td>
                                           <td>
                                             <?php 
                                              echo "<a href='vista_modificar_categoria.php?doc= ".$valor['idcategoria']."'><button class='btn btn-info'>Editar</button></a>";
                                              echo "<a href='#' onclick='preguntar(".$valor['idcategoria'].")'><button class='btn btn-danger'> Borrar</button></a> ";
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
                                            
                                            if (isset($_GET['resp']))
                                            {
                                               if($us->borrar('categoria',$_GET['resp']))
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
                                        </body>
                                        <?php
                                          foreach ($cat->contar() as $conteo)
                                          {      
                                            echo  "El número de categorias en el sistema es: ".$conteo['categorias'];
                                          }
                                        ?>  

                                        
                                      </table>      
                                    </div>  
                                    <!--Gracias al metodo render () podemos paguinar los datos-->
                                    $categorias -> render()
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
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.2.0
        </div>
        <strong>Copyright &copy; 2019-2020   <!--<a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.-->
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="../js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootstrap-select.min.js"></script>

    <!-- AdminLTE App -->
    <script src="../js/app.min.js"></script>
    
  </body>
</html>

