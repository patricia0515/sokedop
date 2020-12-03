<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_mensualidad.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id_mensualidad = isset($_POST['id_mensualidad']) ? $_POST['id_mensualidad'] : null;
    $valor = isset($_POST['valor']) ? $_POST['valor'] : null;
    $fecha_pago = isset($_POST['fecha_pago']) ? $_POST['fecha_pago'] : null;
    $mes = isset($_POST['mes']) ? $_POST['mes'] : null;
    $estudiante = isset($_POST['estudiante']) ? $_POST['estudiante'] : null;
    $funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($valor))
   {
      $errores[] = 'valor es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($fecha_pago))
   {
      $errores[] = 'La fecha de pago es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($mes))
   {
      $errores[] = 'El mes es requerido, no se a digitado. !INCORRECTO!.';
   }        
      
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
        $men = new mensualidad();
        $men->setId_mensualidad($id_mensualidad);
        $men->setValor($valor);
        $men->setFecha_pago($fecha_pago);
        $men->setMes($mes);
        $men->setEstudiante($estudiante);
        $men->setFuncionario($funcionario);
        if ($men->actualizar("mensualidad",null))
        {
          header("location: vista_mensualidad.php"); 
        }
        else
        {
          echo "Registro, no se puede actualizar";
        }
    }    
}
else
{
    $id_mensualidad=isset($_REQUEST['id']) ? $_REQUEST['id']:null;
    $men = new mensualidad();
    if ($resultado=$men->editar('mensualidad',$id_mensualidad))
    {
      foreach ($resultado as $v)
      {
        $id_mensualidad1 = $v['id_mensualidad'];  
        $valor = $v['valor']; 
        $fecha_pago = $v['fecha_pago']; 
        $mes = $v['mes']; 
        $estudiante1= $v['estudiante'];
        $funcionario1 =$v ['funcionario'];  
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
        <label for="id_mensualidad">ID Mensualidad</label>
					<input name="id_mensualidad" id="id" type="text" class="form-control" placeholder="id_mensualidad" value="<?php if(isset($id_mensualidad1)) echo $id_mensualidad1?>" readonly> 
					<span class="help-block"></span>
				</div>
				<div>
        <label for="valor">Valor a pagar</label>
					<input name="valor" id="valor" type="text" class="form-control" placeholder="valor" value="<?php if(isset($valor)) echo $valor?>"> 
					<span class="help-block"></span>
				</div>
				<div>
        <label for="fecha_pago">Fecha pago</label>
					<input name="fecha_pago" id="fecha" type="date" class="form-control" placeholder="fecha de pago" value="<?php if(isset($fecha_pago)) echo $fecha_pago?>"> 
					<span class="help-block"></span>
				</div>
				<div>
        <label for="mes">Mes de pago</label>
					<input name="mes" id="mes" type="text" class="form-control" placeholder="Mes" value="<?php if(isset($mes)) echo $mes?>"> 
					<span class="help-block"></span>
				</div>
                <div>
                <label for="estudante">Estudiante</label>
					<input name="estudiante" id="documento" type="text" class="form-control" placeholder="Documento" value="<?php if(isset($estudiante1)) echo $estudiante1?>"readonly> 
					<span class="help-block"></span>
				</div>
                <div>
                <label for="funcionario">funcionario</label>
					<input name="funcionario" id="documento" type="text" class="form-control" placeholder="Documento" value="<?php if(isset($funcionario1)) echo $funcionario1?>"readonly> 
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