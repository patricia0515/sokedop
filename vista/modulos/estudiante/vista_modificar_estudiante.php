<?php

//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_estudiante.php");
//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.

//Este array guardará los errores de validación que surjan.
$errores= array();
//Pregunta si está llegando una petición por POST, lo que significa que el usuario envió el formulario.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
$no_documento = isset($_POST['no_documento']) ? $_POST['no_documento'] : null;
$tipo_documento = isset($_POST['tipo_documento']) ? $_POST['tipo_documento'] : null;
$nombres = isset($_POST['nombres']) ? $_POST['nombres'] : null;
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : null;
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;
$barrio = isset($_POST['barrio']) ? $_POST['barrio'] : null;
$celular = isset($_POST['celular']) ? $_POST['celular'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$nombre_acudiente = isset($_POST['nombre_acudiente']) ? $_POST['nombre_acudiente'] : null;
$apellidos_acudiente = isset($_POST['apellidos_acudiente']) ? $_POST['apellidos_acudiente'] : null;
$tel_acudiente = isset($_POST['tel_acudiente']) ? $_POST['tel_acudiente'] : null;
$email_acudiente = isset($_POST['email_acudiente']) ? $_POST['email_acudiente'] : null;
$parentesco_acu = isset($_POST['parentesco_acu']) ? $_POST['parentesco_acu'] : null;
$funcionario = isset($_POST['funcionario']) ? $_POST['funcionario'] : null;
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;

if(isset($_FILES['foto']) ? $_FILES['foto']: null){
    $nombre_archivo = $_FILES['foto']['name'];
    $tipo_archivo = $_FILES['foto']['type'];
    $tamano_archivo = $_FILES['foto']['size'];
    $foto = $nombre_archivo;
    $directorio = '../../imagenes/estudiantes/';
    $directorio = $directorio.basename($_FILES['foto']['name']);
}else{
	$foto = $foto1;
}
//$foto = isset($_FILES['foto']) ? $_FILES['foto'] : null;
/*$ruta = $_FILES['foto']['tmp_name'];
$destino ="../../imagenes/estudiantes/".$foto;
copy($ruta,$destino);*/
    
    //Valida que el campo documento usuario, no esté vacío.
   if (!validaRequerido($no_documento)) 
   {
      $errores[] = 'El documento del usuario es requerido, no sea digitado. !INCORRECTO!.';
   }
   //Valida que el campo clave usuario, no esté vacío.
   if (!validaRequerido($tipo_documento))
   {
      $errores[] = 'La clave del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   //Valida que el email usuario, no esté vacío.
   if (!validaRequerido($nombres))
   {
      $errores[] = 'El email del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }
   if (!validaRequerido($apellidos))
   {
      $errores[] = 'El tipo del usuario es requerido, no se a digitado. !INCORRECTO!.';
   }    
   //Valida que el campo documento sea numérico y no esté vacío.        
   if (!validaNumero($celular))
   {
      $errores[] = 'El documento del usuario es numérico, !INCORRECTO!.';
   }
    
    //La función PHP strpos()  devuelve la posición de la primera coincidencia de la palabra o carácter buscado en una cadena de texto (string). Es sensible a mayúsculas y minúsculas.
    if (!((strpos($tipo_archivo, "jpg") || strpos($tipo_archivo, "jpeg")) && ($tamano_archivo < 600000))) {
   	$errores[] =  "La extensión o el tamaño de los archivos no es correcta. Se permiten archivos .jpg o .jpeg<br><li>se permiten archivos de 600 Kb máximo.";
    }else{
        
   	if (move_uploaded_file($_FILES['foto']['tmp_name'], $directorio)){
      		echo "El archivo ha sido cargado correctamente.";
   	}else{
      		$errores[] =  "Ocurrió algún error al subir el fichero. No pudo guardarse.";
   	}
	}
	
    //Verifica si se han encontrado errores y de no haber, se implementa la lógica del programa.    
    if(!$errores)
    {
        //require_once("vista_usuario.php");
        $est=new estudiante();
        $est->setNo_documento($no_documento);
        $est->setTipo_documento($tipo_documento);
        $est->setNombres($nombres);
        $est->setApellidos($apellidos);
		$est->setDireccion($direccion);
        $est->setBarrio($barrio);
        $est->setCelular($celular);
        $est->setEmail($email);
		$est->setNombre_acudiente($nombre_acudiente);
        $est->setApellidos_acudiente($apellidos_acudiente);
        $est->setTel_acudiente($tel_acudiente);
        $est->setEmail_acudiente($email_acudiente);
        $est->setParentesco_acu($parentesco_acu);
        $est->setFuncionario($funcionario);
		$est->setCategoria($categoria);
        $est->setFoto($foto);
        
		
        if ($est->actualizar("estudiante",null))
        {
          header("location: vista_index_estudiante.php");  
        }
        else
        {
          echo "Registro, no se puede actualizar";
        }
    }    
}
else
{
    $no_documento = isset($_REQUEST['doc']) ? $_REQUEST['doc']:null;
    $est = new estudiante();
    if ($resultado=$est->editar("estudiante",$no_documento))
    {
      foreach ($resultado as $v)
      {
		  
        $no_documento1 = $v['no_documento'];
		$tipo_documento = $v['tipo_documento'];
		$nombres = $v['nombres'];
		$apellidos = $v['apellidos'];
		$direccion = $v['direccion'];
		$barrio = $v['barrio'];
		$celular = $v['celular'];
		$email = $v['email'];
		$nombre_acudiente = $v['nombre_acudiente'];
		$apellidos_acudiente = $v['apellidos_acudiente'];
		$tel_acudiente = $v['tel_acudiente'];
		$email_acudiente = $v['email_acudiente'];
		$parentesco_acu = $v['parentesco_acu'];
		$funcionario = $v['funcionario'];
		$categoria = $v['categoria'];
		$foto1 = $v['foto'];
		$nombre_archivo = $v['foto'];
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
						   <?php $directorio = '../../imagenes/estudiantes/'; ?>
							<?php if($foto1 != '') {?>
                                  <img src="<?php echo $directorio.$v['foto']; ?>" alt="<?php echo $v['foto']; ?>" height="100px" width="140px"  class="img-responsive center-block">
							<?php } ?>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                  <h3>Modificar Estudiante:  <?php if(isset($no_documento1)) echo $no_documento1?></h3>
                                <?php 
                                   if ($errores)
                                  {

                                  ?>
                                     <div class="alert alert-danger">
                                      <ul>
                                  <?php 
                                         foreach ($errores as $error):?>
                                           <li> <?php echo $error ?> </li>
                                  <?php  endforeach; ?>
                                       </ul>
									</div>
                                  <?php 
                                  }
                                ?>
                                </div>
                            </div>

                                
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" autocomplete="of">
                              
                          		<div class="row">
                          		
                          		<!-- <div class="box-header with-border">
                                    <h4>Datos Familiares</h4>
                                </div> -->
                          		
                          		<!--1.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="from group">
									  <label>Tipo de Documento</label>
									  <select name="tipo_documento" id="tipo_doc" type="text" required class="form-control" placeholder="Tipo de documento" value="<?php if(isset($tipo_documento)) echo $tipo_documento?>">
										  <option <?php if ($tipo_documento ==''){echo 'selected';} ?> disabled selected>Seleccione una opción</option>
										  <option <?php if ($tipo_documento =='R.C'){echo 'selected';} ?> >R.C</option>
										  <option <?php if ($tipo_documento =='T.I'){echo 'selected';} ?> >T.I</option>
										  <option <?php if ($tipo_documento =='C.C'){echo 'selected';} ?> >C.C</option>              
									  </select>
									</div>
								  </div>
                        			
                         			
                         		<!--2.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="from group">
									  <label>No. Documento</label>
									  <input type="text" name="no_documento" required value="<?php if(isset($no_documento1)) echo $no_documento1?>" class="form-control" placeholder="Número de documento..." readonly>
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
										<label for="direccion">Dirección Residencia</label>
										<input type="text" name="direccion" required value="<?php if(isset($direccion)) echo $direccion?>" class="form-control" placeholder="Dirección...">        
									  </div>
								  </div>

								 <!--6.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="barrio">Barrio</label>
										<input type="text" name="barrio" required value="<?php if(isset($barrio)) echo $barrio?>" class="form-control" placeholder="Barrio...">   
									  </div>
								  </div>
                         			
                         		<!--7.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="celular">Celular</label>
										<input type="text" name="celular" required value="<?php if(isset($celular)) echo $celular?>" class="form-control" placeholder="No. Celular...">    
									  </div>
								  </div>

								<!--8.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="text" name="email" required value="<?php if(isset($email)) echo $email?>" class="form-control" placeholder="Correo Electronico...">   
									  </div>
								  </div>
                        			
                         		<!--9.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="from group">
									  <label>Categoría</label>
									  <select name="categoria" class="form-control" data-live-search="true" placeholder="Tipo de documento" value="<?php if(isset($categoria)) echo $categoria?>">
										<option disabled selected>Seleccione una Categoría</option>
										  <?php
												require_once("../../../modelo/modelo_categoria.php");
												$cat = new categoria();
												if ($resultado=$cat->buscar('categoria',"condicion = '1' "))
												{
												//   var_dump($resultado);
													foreach ($resultado as $valor)
												  {
											?>
												  <option <?php if ($categoria == $valor['id_categoria']){echo 'selected';} ?> value = "<?php echo  $valor['id_categoria'];?>" ><?php echo $valor['nombre'];?></option>
												<?php												   
												   }
												}
											    ?>
									  </select>
									</div>
								  </div>
                        
                                <!--9.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="from group">
									  <label>Entrenador</label>
									  <select name="funcionario" class="form-control" data-live-search="true">
										<option disabled selected>Seleccione un Entrenador</option>
										  <?php
												require_once("../../../modelo/modelo_funcionario.php");
												$fun = new Funcionario();
												if ($resultado=$fun->buscar('funcionario', null))
												{
												  //var_dump($resultado);
													foreach ($resultado as $vlr)
												  {
											?>
												  <option <?php if ($funcionario == $vlr['ID']){echo 'selected';} ?> value = "<?php echo  $vlr['ID'];?>" ><?php echo $vlr['Nombre']." ".$vlr['Apellido'];?></option>
												<?php												   
												   }
												}
											    ?>
									  </select>
									</div>
								  </div>
                         
                                 <!--Aqui esto haciendo otra fila para poner los datos del acudiente -->
                                </div>
                                <div class="row">
                      	
                        		<!--11.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="nombre_acudiente">Nombre Acudiente</label>
										<input type="text" name="nombre_acudiente" required value="<?php if(isset($nombre_acudiente)) echo $nombre_acudiente?>" class="form-control" placeholder="Nombre Acudiente...">        
									  </div>
								  </div>

								  <!--12.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="apellidos_acudiente">Apellido Acudiente</label>
										<input type="text" name="apellidos_acudiente" required value="<?php if(isset($apellidos_acudiente)) echo $apellidos_acudiente?>" class="form-control" placeholder="Apellido Acudiente...">        
									  </div>
								  </div>

								  <!--13.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="tel_acudiente">Telefono Acudiente</label>
										<input type="text" name="tel_acudiente" required value="<?php if(isset($tel_acudiente)) echo $tel_acudiente?>" class="form-control" placeholder="Número de contacto...">       
									  </div>
								  </div>

								  <!--14.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="email_acudiente">Email Acudiente</label>
										<input type="text" name="email_acudiente" required value="<?php if(isset($email_acudiente)) echo $email_acudiente?>" class="form-control" placeholder="Correo Electronico...">       
									  </div>
								  </div>

								  <!--15.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="parentesco_acu">Parentesco</label>
										<input type="text" name="parentesco_acu" required value="<?php if(isset($parentesco_acu)) echo $parentesco_acu?>" class="form-control" placeholder="Parentesco con el estudiante...">       
									</div>
								  </div>

								  <!--16.Aqui metemos una columna -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									<div class="form-group">
										<label for="foto">Foto Documento</label>
										<input type="file" name="foto" value="<?php if(isset($foto1)) echo $foto1?>" accept="image/*" class="form-control"> 
										<?php $directorio = '../../imagenes/estudiantes/'; ?>
							<?php if($foto1 != '') {?>
								<img src="<?php echo $directorio.$v['foto']; ?>" alt="<?php echo $v['foto']; ?>" height="100px" width="140px"  class="img-responsive center-block">
							<?php } ?>
									</div>
								  </div>

								  <!--17.Aqui metemos una columna, ponemos los botones para la CRUD -->
								  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
									  <div class="form-group">
										 <button class="btn btn-primary" type="submit">Guardar</button>
										 <button class="btn btn-danger" type="button" onclick="history.back()" name="volver atrás" value="volver atrás">Cancelar</button>
									  </div>
								  </div>
                         			                          			
                          		</div>

                            </form>
                             
                             <?php
								echo $no_documento."<br>";
								echo $tipo_documento."<br>";
								echo $nombres."<br>";
								echo $apellidos."<br>";
								echo $direccion."<br>";
								echo $barrio."<br>";
								echo $celular."<br>";
								echo $email."<br>";
								echo $nombre_archivo."<br>";
								echo $nombre_acudiente."<br>";
								echo $apellidos_acudiente."<br>";
								echo $tel_acudiente."<br>";
								echo $email_acudiente."<br>";
								echo $parentesco_acu."<br>";
								echo $categoria."<br>";
								echo $funcionario."<br>";
								echo $foto1."<br>";
                             
                             ?>
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