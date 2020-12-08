
     <header class="main-header">
     <?php  
      include"../controlador/controlador_buscar.php";
      ?>
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><img src="img/V20.png" height="20px" width="45px"></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><img src="img/V20.png" height="50px" width="200px"></b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small><small>   Larry Torres</small>
                  <span class="hidden-xs"> <!-- Aqui va la linea de codigo 38 --> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                     
                     <img src="../imagenes/usuarios/user-default.png" class="img-circle" alt="User Image"/>
                      
                    <p>
                    <!-- Aqui va la linea de codigo 38 -->  	
        				<small>Administrador</small>  
                <p>
                  <?php echo $_SESSION['nombre']; ?>
                  <small><?php echo $_SESSION['cargo']; ?></small>
                </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                    	<a style="width:80px" href="?modulo=archivo" class="btn btn-defaul btn-flat">Perfil</a>                    	
                    </div>
                    
                    <div class="pull-right">
                      <a style="width:80px" data-toggle="modal" href="../../../index.html" class="btn btn-default btn-flat">Salir</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>