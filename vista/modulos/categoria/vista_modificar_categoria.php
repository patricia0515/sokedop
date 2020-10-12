<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_categoria.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.


//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria']:null;
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
    
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($nombre))
   {
      $errores[] = 'El nombre es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($descripcion))
   {
      $errores[] = 'La descripción es requerida, no se a digitado. !INCORRECTO!.';
   }
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        $cat = new categoria();
        $cat->setId_categoria($id_categoria);
        $cat->setNombre($nombre);
        $cat->setDescripcion($descripcion);
        		
        if ($cat->actualizar('categoria',null))
       	{
          header("location: vista_index_categoria.php");   
        }
        else
        {
          echo "Registro, no se puede actualizar";
        }
    }   
}
else
{
    $id_categoria = isset($_REQUEST['id']) ? $_REQUEST['id']:null;
    $cat = new categoria();
    if ($resultado=$cat->editar('categoria',$id_categoria))
    {
      foreach ($resultado as $v)
      {
		  
        $id_categoria1 = $v['id_categoria'];  
        $nombre = $v['nombre']; 
        $descripcion = $v['descripcion']; 
        
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
                                  <h3>Modificar Categoría:       <?php if(isset($nombre)) echo $nombre?></h3>
                                    
                                  </div>
                              </div>
                                                                 
                                                                 
                                  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                  
                                  	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group">
											<label for="id_categoria">ID Categoría</label>
											<input type="text" id="id" name="id_categoria" class="form-control" value="<?php if(isset($id_categoria1)) echo $id_categoria1?>"  readonly>
										</div>
									</div>
																		
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">	
										<div class="form-group">
											<label for="nombre">Nombre</label>
											<input type="text" name="nombre" class="form-control" required value="<?php if(isset($nombre)) echo $nombre?>" placeholder="Nombre...">        
										</div>
									</div>
									
										<div class="form-group">
										  <label for="descripcion">Descripción</label>
										  <input type="text" name="descripcion" class="form-control" required value="<?php if(isset($descripcion)) echo $descripcion?>" placeholder="Descripción...">      
										</div>
										<div class="form-group">
											<button class="btn btn-primary" type="submit">Guardar</button>
											<button class="btn btn-danger" type="reset">Cancelar</button>
										</div>
								  </form>
                                  
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