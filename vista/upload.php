<!DOCTYPE html>
<html>
  <?php
  	require_once("partials/head -inicio.php");
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php
		require_once("partials/header -inicio.php");		
      	require_once("partials/menu -inicio.php");
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
                	require_once("partials/box_header_grilla.php");
                ?>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                             <h3>Resultado de la carga: </h3>
                             
                             <div class="form-group">
                            <?php
                            $directorio = 'img/archivos/';
                            $subir_archivo = $directorio.basename($_FILES['subir_archivo']['name']);
                            echo "<div>";
                            if (move_uploaded_file($_FILES['subir_archivo']['tmp_name'], $subir_archivo))
                            {
                                 echo "El archivo es válido y se cargó correctamente.<br><br>";
                                    echo"<a href='".$subir_archivo."' target='_blank'><img src='".$subir_archivo."' width='150'></a>";
                            } 
                            else 
                            {
                                echo "La subida ha fallado";
                            }
                                echo "</div>";
                            ?>
                            <br>
                            <div >
                            <h3 align="center"><div align="center"><a href="vista_inicio.php">Volver </a></div></h3></div>
                            </div>
                              <!--Fin Contenido OJO AQUI TERMINA MI VISTA-->
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div>
          </section><!-- /.box -->
            </div>
        </div>
        <!-- /.col -->
          <!-- /.row -->

        <!-- /.content -->
      
    <!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <?php
		require_once("partials/footer.php");
		require_once("partials/script -inicio.php");
      ?>     
  </body>

</html>