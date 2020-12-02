<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_calendario.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id_calendario = isset($_POST['idcalendario']) ? $_POST['idcalendario'] : null;
$nombre_calendario = isset($_POST['nombre_calendario']) ? $_POST['nombre_calendario'] : null;
$estado_calendario = isset($_POST['estado_calendario']) ? $_POST['estado_calendario'] : null;
$fecha_calendario = isset($_POST['fecha_calendario']) ? $_POST['fecha_calendario'] : null;
$descripcion_calendario = isset($_POST['descripcion_calendario']) ? $_POST['descripcion_calendario'] : null;


   if (!validaRequerido($id_calendario))
   {
      $errores[] = 'El numero de evento es requerido, no se a digitado. !INCORRECTO!.';
   }
  
   if (!validaRequerido($nombre_calendario))
   {
      $errores[] = 'El nombre del evento es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($estado_calendario))
   {
      $errores[] = 'El estado del evento es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($fecha_calendario))
   {
      $errores[] = 'La fecha del evento es requerida, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($descripcion_calendario))
   {
      $errores[] = 'La descripcion del evento es requerida, no se a digitado. !INCORRECTO!.';
   }    
   //Valida que el campo documento sea numérico y no esté vacío.        
   if (!validaNumero($id_calendario))
   {
      $errores[] = 'El numero del evento es numérico, !INCORRECTO!.';
   }
   
    
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        //require_once("vista_usuario.php");
        $cal=new calendario();
        $cal->setId($id_calendario);
        $cal->setNombre($nombre_calendario);
        $cal->setEstado($estado_calendario);
        $cal->setFecha($fecha_calendario);     
        $cal->setDescripcion($descripcion_calendario);
        if ($cal->actualizar("calendario",null))
        {  
        header("location: vista_calendario.php");  
        }
        else
        {
        echo "Registro, no se puede actualizar";
        }
    }    
}
else
{
    $id_calendario=isset($_REQUEST['id']) ? $_REQUEST['id']:null;
    $cal = new calendario();
    if ($resultado=$cal->buscar('calendario',$id_calendario))
    {
      foreach ($resultado as $v)
      {
        $id_calendario1 = $v['id_calendario'];  
        $nombre_calendario = $v['nombre']; 
        $estado_calendario = $v['estado']; 
        $fecha_calendario = $v['fecha'];
        $descripcion_calendario = $v['descripcion']; 
      }
    }   
}
?>
<!DOCTYPE html>
<html lang="es">
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
                                  <h3>Actualizar mensualidad</h3>
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
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        <div>
          <input name="idcalendario" id="identificador" type="numb" class="form-control" placeholder="Numero de calendario" value="<?php if(isset($id_calendario)) echo $id_calendario?>"readonly> 
          <span class="help-block"></span>
        </div>
        <div>
          <input name="nombre_calendario" id="nombre" type="text" class="form-control" placeholder="nombre de calendario" value="<?php if(isset($nombre_calendario)) echo $nombre_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
          <input name="estado_calendario" id="estado" type="text" class="form-control" placeholder="estado del calendario" value="<?php if(isset($estado_calendario)) echo $estado_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
          <input name="fecha_calendario" id="fecha" type="date" class="form-control" placeholder="fecha del calendario" value="<?php if(isset($fecha_calendario)) echo $fecha_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <div>
          <input name="descripcion_calendario" id="descripcion" type="text" class="form-control" placeholder="descripcion del calendario" value="<?php if(isset($descripcion_calendario)) echo $descripcion_calendario?>"> 
          <span class="help-block"></span>
        </div>
        <button class="btn btn-block bt-login" type="submit" id="submit_btn" data-loading-text="Agregar....">Modificar mensualidad</button>
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