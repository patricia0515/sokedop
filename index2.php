<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Socked Op | Escuela de Futbol</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="vista/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vista/css/font-awesome.css">
   
    <!-- Theme style -->
    <link rel="stylesheet" href="vista/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="vista/css/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
       
        <a href="../../index2.html"><img src="vista/img/V20.png"  height="80px" width="300px"><b></b>
        </a>
      </div><!-- /.login-logo -->
      
      <?php	//Esta parte valida el usuario, para ingreso al sistema 
		if(empty($_GET['alerta']))
		{
			echo "";			
		}
		else
		{
			if ($_GET['alerta']==1) //si es devuelto 1: es porque el usuario o clave estan erroneas
			{
			echo "<div class='alert alert-danger alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4>  <i class='icon fa fa-times-circle'></i> Error al entrar!</h4>
                   Usuario o la contraseña es incorrecta, vuelva a verificar documento de usuario y contraseña.
                  </div>";
          }
            else
            {
                if ($_GET['alerta']==2)// Si la alerta es 2: es porque se ha salido del dashboard
                {
                    echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-check-circle'></i> Exito!!</h4>
                      Has salido con éxito.
                      </div>";
                }
            }
		}
		?>
      
      
      <div class="login-box-body">
        <p class="login-box-msg">Ingrese sus datos de Acceso</p>
        
        <form action="controlador/controlador_login.php" method="POST">
        
        
         
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="usuario" placeholder="Documento" required/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="clave"  placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
          
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Recordar
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" value ="Ingresar">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

        
        <a href="#">Olvidé mi password</a><br>
        

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="vista/js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="vista/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="vista/js/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
