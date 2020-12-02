<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_usuario.php");
require_once("../../../modelo/modelo_funcionario.php");


//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.
$doc_usuario = isset($_POST['doc_usuario']) ? $_POST['doc_usuario'] : null;
$clave_usuario = isset($_POST['clave_usuario']) ? $_POST['clave_usuario'] : null;
$email_usuario = isset($_POST['email_usuario']) ? $_POST['email_usuario'] : null;
$tipo_usuario = isset($_POST['tipo_usuario']) ? $_POST['tipo_usuario'] : null;

$tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : null;
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : null;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$usuario = isset($_POST['doc_usuario']) ? $_POST['doc_usuario'] : null;

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($doc_usuario)) {
      $errores[] = 'El documento del usuario es requerido, no sea digitado. !INCORRECTO!.';
   }
   if (!validaNumero($doc_usuario)){
    $errores[] = 'El documento del usuario debe ser numerico, no se admiten letras. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($clave_usuario))
   {
      $errores[] = 'La clave del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($email_usuario))
   {
      $errores[] = 'El email del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($tipo_usuario))
   {
      $errores[] = 'El tipo del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
	if (!validaRequerido($tipo_documento)) {
      $errores[] = 'El tipo dedocumento del usuario es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($nombres))
   {
      $errores[] = 'El nombre del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($apellidos))
   {
      $errores[] = 'El apellido del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($celular))
   {
      $errores[] = 'El celular del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaNumero($celular)){
    $errores[] = 'El No. celular del usuario debe ser numerico, no se admiten letras. !INCORRECTO!.';
   }
	if (!validaRequerido($direccion))
   {
      $errores[] = 'La dirección usuario es requerida, no se a digitado. !INCORRECTO!.';
   } 
   
    
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.
    
    if(!$errores)
    {
		$us=new usuario();
			$us->setDoc_usuario($doc_usuario);
			$us->setClave_usuario($clave_usuario);
			$us->setMail_usuario($email_usuario);
			$us->setTipo_usuario($tipo_usuario);

        if ($us->insertar("usuario",null))
        {
        $fun = new Funcionario();
		  	$fun->setTipo_documento($tipo_documento);
        $fun->setNombres($nombres);
        $fun->setApellidos($apellidos);
        $fun->setCelular($celular);
        $fun->setDireccion($direccion);
        $fun->setUsuario($doc_usuario);
			
        }
		if ($fun->insertar("funcionario",null))
		{
			header("location: vista_index_usuario.php");	
		}
        //include ("../../controlador/controlador_insertar.php");
		
		//ESTA ES LA FORMA DE PASAR UN PARAMETRO A OTRO ARCHIVO
		//header("location: ../../controlador/controlador_insertar.php?doc=".$doc_usuario."&clave=".$clave_usuario."&mail=".$email_usuario."&tipo=".$tipo_usuario);
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
                             
                             <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <h3>Nuevo Usuario</h3>
                                  
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

                              <!--Iniciamos el formulario -->
                              <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                              <!--Aqui metemos una fila -->
                              <div class="row">
                                <!--
                                <div class="box-header with-border">
                                        <h4> Datos Personales</h4>
                                    </div>
                                    -->
                                <!--1.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="from group">
									  <label>Tipo de Documento</label>
									  <select name="tipo_documento" id="tipo_doc" type="text" required class="form-control" placeholder="Tipo de documento" value="<?php if(isset($tipo_documento)) echo $tipo_documento?>">
										  <option disabled selected>Seleccione una opción</option>
										  <option>R.C</option>
										  <option>T.I</option>
										  <option>C.C</option>              
									  </select>
									</div>
								  </div>

                                <!--2.Aqui metemos una columna -->
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="doc_usuario">No. Documento</label>
                                      <input name="doc_usuario" id="documento" type="number" required value="<?php if(isset($doc_usuario)) echo $doc_usuario?>" class="form-control" placeholder="Número de documento...">       
                                    </div>
                                </div>
                                
                                <!--3.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="nombres">Nombre</label>
										<input type="text" name="nombres" required value="<?php if(isset($nombres)) echo $nombres?>" class="form-control" placeholder="Nombre...">       
									  </div>
								  </div>

								<!--4.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="apellidos">Apellido</label>
										<input type="text" name="apellidos" required value="<?php if(isset($apellidos)) echo $apellidos?>" class="form-control" placeholder="Apellido...">       
									  </div>
								  </div>
                                
                                <!--5.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="celular">Celular</label>
										<input type="number" name="celular" required value="<?php if(isset($celular)) echo $celular?>" class="form-control" placeholder="No. Celular...">    
									  </div>
								  </div>
                                
                                <!--6.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="direccion">Dirección Residencia</label>
										<input type="text" name="direccion" required value="<?php if(isset($direccion)) echo $direccion?>" class="form-control" placeholder="Dirección...">        
									  </div>
								  </div>
                                
                                <!--7.Aqui metemos una columna -->
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="email_usuario">Email</label>
                                      <input name="email_usuario" id="email" type="email" required class="form-control" placeholder="Correo electrónico" value="<?php if(isset($email_usuario)) echo $email_usuario?>">        
                                    </div>
                                </div>

                                <!--8.Aqui metemos una columna -->
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="clave_usuario">Clave</label>
                                      <input name="clave_usuario" id="clave" type="password" required class="form-control" placeholder="Contraseña" value="<?php if(isset($clave_usuario)) echo $clave_usuario?>">       
                                    </div>
                                </div>

                                

                                <!--9.Aqui metemos una columna -->
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                  <div class="form-group">
                                      <label for="Tipo_usuario">Tipo Usuario</label>
                                        <select name="tipo_usuario" id="tipo_us" type="text" required class="form-control" placeholder="tipo de usuario" value="<?php if(isset($tipo_usuario)) echo $tipo_usuario?>">
                                          <option disabled selected>Seleccione una opción</option>
                                          <option>Administrador</option>
                                          <option>Entrenador</option>
                                          <option>Contador</option>              
                                        </select> 
                                    </div>
                                </div>

                                <!--10.Aqui metemos una columna, Aqui ponemos os botones para la CRUD -->
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                    <div class="form-group">
                                       <button class="btn btn-primary" type="submit">Guardar</button>
                                       <button class="btn btn-danger" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">Cancelar</button>
                                    </div>
                                </div>
                              </div>
                                  
                                </form>
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