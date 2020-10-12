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
                             <h3>Bienvenido, seleccione una opción del Menú</h3>
                            </form>
                            
                             <img src="img/6.jpg" height="420px" width="1070px">
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

