<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_mensualidad.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$valor = isset($_POST['valor']) ? $_POST['valor'] : null;
$fecha_pago = isset($_POST['fecha_pago']) ? $_POST['fecha_pago'] : null;
$mes = isset($_POST['mes']) ? $_POST['mes'] : null;
$estudiante = isset($_POST['estudiante']) ? $_POST['estudiante'] : null;
$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
//$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Valida que el campo documento usuario, no esté vacío.
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($valor))
   {
      $errores[] = 'El valor de la mensualidad es requerido, no se a digitado. !INCORRECTO!.';
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
    
   if (!validaRequerido($funcionario))
   {
      $errores[] = 'El funcionario es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el campo documento sea numérico y no esté vacío.       
   
    
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores) 
    {
        //require_once("vista_usuario.php");
        $men=new mensualidad();
        $men->setValor($valor);
        $men->setFecha_pago($fecha_pago);
        $men->setMes($mes);
        $men->setEstudiante($estudiante);
        $men->setFuncionario($funcionario);
        //$us->setFuncionario($funcionario);
        if ($men->insertar("mensualidad",null))
        {
          echo header("location: vista_mensualidad.php"); 
        }
        else
        {
          echo "Registro, no se puede adicionar";
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
                                  <h3>Nueva Mensualidad</h3>
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
        <label for="Id_mensualidad">ID. Mensualidad</label>
					<input name="valor" id="valor" type="text" class="form-control" placeholder="Valor" required value="<?php if(isset($valor)) echo $valor?>"> 
					<span class="help-block"></span>
				</div>
				<div >
        <label for="fecha">Fecha</label>
					<input name="fecha_pago" id="fecha" type="date" class="form-control" placeholder="Fecha de pago" value="<?php if(isset($fecha_pago)) echo $fecha_pago?>"> 
					<span class="help-block"></span>
				</div>
				<div >
        <label for="mes">Mes</label>
					<input name="mes" id="mes" type="text" class="form-control" placeholder="Mes" value="<?php if(isset($mes)) echo $mes?>">
                    
					<span class="help-block"></span>
				</div>
            
                 
									
				<div> 
        <label for="id_estudiante">Doc. Estudiante</label>                   
                   <select name="estudiante" class="form-control" data-live-search="true">
                      <option     disabled selected>Seleccione un estudiante</option> <!-- Este elemento ignoro si esta bien así -->
                      <?php
                         require_once("../../../modelo/modelo_estudiante.php");
                         $est = new Estudiante();
                         if ($resultado=$est->buscar('estudiante',null))
                         {
                            foreach ($resultado as $valor)
                            {
                      ?>
                             <option value="<?php echo $valor ['no_documento'];?>">
                                 <?php echo $valor['nombres'];?> <?php echo $valor['apellidos'];?>
                                  </option>
                      <?php
                            }
                         }

                      ?>
                   </select>
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

