<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_usuario.php");
require_once("../../../modelo/modelo_funcionario.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.


//Este array guardará los errores de validación que surjan.
$errores = array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
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
	$id_funcionario = isset($_REQUEST['id']) ? $_REQUEST['id']:null;
	
   //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($doc_usuario)) {
      $errores[] = 'El documento del usuario es requerido, no sea digitado. !INCORRECTO!.';
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
	if (!validaRequerido($direccion))
   {
      $errores[] = 'La dirección usuario es requerida, no se a digitado. !INCORRECTO!.';
   }
    
    if(!$errores)
    {    
        try{
                $us=new usuario();
                $us->setDoc_usuario($doc_usuario);
                $us->setClave_usuario($clave_usuario);
                $us->setMail_usuario($email_usuario);
                $us->setTipo_usuario($tipo_usuario);

                $fun=new funcionario();
                $fun->setTipo_documento($tipo_documento);
                $fun->setNombres($nombres);
                $fun->setApellidos($apellidos);
                $fun->setCelular($celular);
                $fun->setDireccion($direccion);
                $fun->setUsuario($doc_usuario);
                $fun->setId_funcionario($id_funcionario);
                header("location: vista_index_usuario.php");
        }catch(Exception $e)
            {
            echo "No se pudo actualizar los registros en ninguna tabla";
                $us->rollBack();
                $fun->rollBack();
            }
        
        }else{
            $doc_usuario = isset($_REQUEST['doc']) ? $_REQUEST['doc']:null;
            $us = new usuario();
            if ($resultado=$us->editar('usuario',$doc_usuario))
            {
              foreach ($resultado as $v)
              {
                $doc_usuario1 = $v['doc_usuario'];  
                $clave_usuario = $v['clave_usuario']; 
                $email_usuario = $v['mail_usuario'];
                $tipo_usuario = $v['tipo_usuario'];        
              }

                $id_funcionario = isset($_REQUEST['id']) ? $_REQUEST['id']:null;

                $fun = new funcionario();
                if ($resultado=$fun->editar('funcionario',$id_funcionario))
                {
                  foreach ($resultado as $v)
                  {
                    $id_funcionario1 = $v['id_funcionario'];  
                    $tipo_documento = $v['tipo_documento'];
                    $nombres = $v['nombres'];
                    $apellidos = $v['apellidos'];
                    $celular = $v['celular'];
                    $direccion = $v['direccion'];
                  }
                }else
                {
                    echo "Tenemos un error con la función editar funcionario cuando va a hacer la consulta en la base de datos del id que pide el cambio";
                }		
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
                             
                             <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <!--Contenido OJO AQUI INICIA MI VISTA-->
                              <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <h3>Modificar Usuario: <?php echo $doc_usuario1 ?></h3> 
                                  <h3>ID Funcionario: <?php echo $id_funcionario1 ?></h3>
                                  
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
									  <select name="tipo_documento" type="text" required class="form-control" placeholder="Tipo de documento" value="<?php if(isset($tipo_documento)) echo $tipo_documento ?>">
										  <option <?php if ($tipo_documento ==''){echo 'selected';} ?> disabled selected>Seleccione una opción</option>
										  <option <?php if ($tipo_documento =='R.C'){echo 'selected';} ?> >R.C</option>
										  <option <?php if ($tipo_documento =='T.I'){echo 'selected';} ?> >T.I</option>
										  <option <?php if ($tipo_documento =='C.C'){echo 'selected';} ?> >C.C</option>                       
									  </select>
									</div>
								  </div>

                                <!--2.Aqui metemos una columna -->
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                  <div class="form-group">
                                      <label for="doc_usuario">No. Documento</label>
                                      <input name="doc_usuario" id="documento" type="text" required value="<?php if(isset($doc_usuario1)) echo $doc_usuario1 ?>" class="form-control" readonly>       
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
										<input type="text" name="celular" required value="<?php if(isset($celular)) echo $celular?>" class="form-control" placeholder="No. Celular...">    
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
                                      <input name="clave_usuario" id="clave" type="text" required class="form-control" placeholder="Contraseña" value="<?php if(isset($clave_usuario)) echo $clave_usuario?>">       
                                    </div>
                                </div>

                                

                                <!--9.Aqui metemos una columna -->
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                  <div class="form-group">
                                      <label for="Tipo_usuario">Tipo Usuario</label>
                                        <select name="tipo_usuario" id="tipo_us" type="text" required class="form-control" placeholder="tipo de usuario" value="<?php if(isset($tipo_usuario)) echo $tipo_usuario?>">
                                          <option <?php if ($tipo_usuario==''){echo 'selected';} ?> disabled>Seleccione una opción</option>
										  <option <?php if ($tipo_usuario=='Administrador'){echo 'selected';} ?>>Administrador</option>
                                          <option <?php if ($tipo_usuario=='Entrenador'){echo 'selected';} ?>>Entrenador</option>
                                          <option <?php if ($tipo_usuario=='Contador'){echo 'selected';} ?>>Contador</option>              
                                        </select> 
                                    </div>
                                </div>
                                
                                <input name="id_funcionario" type="hidden" value="<?php if(isset($id_funcionario)) echo $id_funcionario?>" class="form-control">

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