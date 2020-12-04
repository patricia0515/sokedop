<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_calendario.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$nombre_calendario = isset($_POST['nombre_calendario']) ? $_POST['nombre_calendario'] : null;
$estado_calendario = isset($_POST['estado_calendario']) ? $_POST['estado_calendario'] : null;
$fecha_calendario = isset($_POST['fecha_calendario']) ? $_POST['fecha_calendario'] : null;
$descripcion_calendario = isset($_POST['descripcion_calendario']) ? $_POST['descripcion_calendario'] : null;
$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
//$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Valida que el campo documento usuario, no esté vacío.
   //Valida que el campo clave usuario, no esté vacío.
   


   if (!validaRequerido($nombre_calendario))
   {
      $errores[] = 'El nombre del calendario es requerido, no se a digitado. !INCORRECTO!.';
   }
   
   if (!validaRequerido($estado_calendario))
   {
      $errores[] = 'El estado del calendario es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($fecha_calendario))
   {
      $errores[] = 'La fecha del calendario es requerida, no se a digitado. !INCORRECTO!.';
   }    

   if (!validaRequerido($descripcion_calendario))
   {
      $errores[] = 'La descripcion del usuario es requerida, no se a digitado. !INCORRECTO!.';
   }    
   
   if (!validaRequerido($funcionario))
   {
      $errores[] = 'El funcionario es requerido, no se a digitado. !INCORRECTO!.';
   }
    
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        //require_once("vista_calendario.php");
        $cal=new calendario();
        $cal->setNombre($nombre_calendario);
        $cal->setEstado($estado_calendario);
        $cal->setFecha_calendario($fecha_calendario);     
        $cal->setDescripcion($descripcion_calendario);
        $cal->setFuncionario($funcionario);

        if ($cal->insertar("calendario",null))
        {
          echo header("location: vista_index_calendario.php");   
        }
        else
        {
          echo "Registro, no se puede adicionar, porque ya existe un registro con el numero de calendario digitado";
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
                          <div class="row">
                                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <h3>Nueva evento</h3>
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
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        <div class ="form-grup">
        <label for="nombre_calendario">Nombre</label>
          <input name="nombre_calendario" id="nombre" type="text" class="form-control" placeholder="nombre de calendario" value="<?php if(isset($nombre_calendario)) echo $nombre_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
        <label for="estado_calendario">Estado</label>
          <input name="estado_calendario" id="estado" type="text" class="form-control" placeholder="estado del calendario" value="<?php if(isset($estado_calendario)) echo $estado_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
        <label for="fecha_calendario">Fecha</label>
          <input name="fecha_calendario" id="fecha_calendario" type="date" class="form-control" placeholder="fecha del calendario" value="<?php if(isset($fecha_calendario)) echo $fecha_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
        <label for="descripcion_calendario">Descripcion</label>
          <input name="descripcion_calendario" id="descripcion" type="text" class="form-control" placeholder="descripcion del calendario" value="<?php if(isset($descripcion_calendario)) echo $descripcion_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div >
									
				<label for="id_funcionario">ID Funcionario</label>					 
				<select name="funcionario" class="form-control" data-live-search="true">
				<option disabled selected>Seleccione un funcionario</option>
				<?php
				require_once("../../../modelo/modelo_funcionario.php");
				$fun = new Funcionario();
				if ($resultado=$fun->buscar1('funcionario',null))
				{
				foreach ($resultado as $valor)
												  {
				?>
				<option value="<?php echo $valor['id_funcionario'];?>"><?php echo $valor['nombres'];?> <?php echo $valor['apellidos'];?></option>
				<?php												   
				   }
				}
				    ?>
				</select>
                    <span class="help-block"></span> 
								
				</div>
        
				
        <div class="form-group">
											<button class="btn btn-primary" type="submit">Guardar</button>
											<button class="btn btn-danger" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">Cancelar</button>
										</div>
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
				
			</form>
			<div>
        
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

