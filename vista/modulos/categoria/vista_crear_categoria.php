<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_categoria.php");


//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($nombre)) {
      $errores[] = 'El nombre de la categoría es requerida, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($descripcion))
   {
      $errores[] = 'La descripción es requerida, no se a digitado. !INCORRECTO!.';
   }
       
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        //require_once("vista_usuario.php");
        $cat=new categoria();
        $cat->setNombre($nombre);
        $cat->setDescripcion($descripcion);
        if ($cat->insertar("categoria",null))
       
        {
          header("location: vista_index_categoria.php");
        }
    }    
}
?>
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
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <h3>Nueva Categoría</h3>
                                    <?php 
                                   if ($errores)
                                  { 
                                  ?>
                                         <ul style="color: #f00;">
                                  <?php 
                                         foreach ($errores as $error):?>
                                           <li> <?php echo $error ?> </li>
                                  <?php  endforeach; ?>
                                         </ul>
                                  <?php 
                                  }
                                  ?>
                                  </div>
                              </div>
                                                                 
                                                                 
                                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
										<div class="form-group">
											<label for="nombre">Nombre</label>
											<input type="text" name="nombre" class="form-control" required value="<?php if(isset($nombre)) echo $nombre?>" placeholder="Nombre...">        
										</div>
										<div class="form-group">
										  <label for="descripcion">Descripción</label>
										  <input type="text" name="descripcion" class="form-control" required value="<?php if(isset($descripcion)) echo $descripcion?>" placeholder="Descripción...">      
										</div>
										<div class="form-group">
											<button class="btn btn-primary" type="submit">Guardar</button>
											<button class="btn btn-danger" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">Cancelar</button>
										</div>
								  </form>

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
    
  </body>
</html>