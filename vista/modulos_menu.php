<?php 

if ($_SESSION['tipousuario']=='Administrador') 
{ ?>

    <ul class="sidebar-menu">
        <li class="header">MENÚ</li>

	<?php 

	if ($_GET["modulo"]=="inicio")
    { 
		$active_home="active";
	}
    else 
    {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?modulo=inicio"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

	if ($_GET["modulo"]=="usuario" || $_GET["modulo"]=="form_usuario") 
    { ?>
		<li class="active">
			<a href="?modulo=usuario"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=usuario"><i class="fa fa-user"></i> Administrar usuarios</a>
	  	</li>
	  	
	<?php
	}
    
    if ($_GET["modulo"]=="matricula" || $_GET["modulo"]=="form_matricula") 
    { ?>
		<li class="active">
			<a href="?modulo=matricula"><i class="fa fa-user"></i> Matrículas</a>
	  	</li>
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=matricula"><i class="fa fa-user"></i> Matrículas</a>
	  	</li>
	  	
	<?php
	}

	if ($_GET["modulo"]=="clave") 
    { ?>
		<li class="active">
			<a href="?modulo=clave"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=clave"><i class="fa fa-lock"></i> Cambiar contraseña</a>
		</li>
	<?php
	}
	
    if ($_GET["modulo"]=="cmasivo") 
    { ?>
		<li class="active">
			<a href="?modulo=cmasivo"><i class="fa fa-lock"></i> Carga masiva</a>
		</li>
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=cmasivo"><i class="fa fa-lock"></i> Carga masiva</a>
		</li>
		<li>
			<a href="?modulo=ayuda"><i class="fa fa-user"></i> Ayuda</a>
	  	</li>
	<?php
	}
        
    ?>
	
	</ul>
	<?php
}

if ($_SESSION['tipousuario']=='Docente') 
{ ?>

    <ul class="sidebar-menu">
        <li class="header">MENÚ</li>

	<?php 

	if ($_GET["modulo"]=="inicio")
    { 
		$active_home="active";
	}
    else 
    {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?modulo=inicio"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php

	if ($_GET["modulo"]=="calificacion" || $_GET["modulo"]=="form_calificacion") 
    { ?>
		<li class="active">
			<a href="?modulo=calificacion"><i class="fa fa-user"></i> Calificaciones</a>
	  	</li>
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=calificacion"><i class="fa fa-user"></i> Calificaciones</a>
	  	</li>

	<?php
	}


	if ($_GET["modulo"]=="boletines") 
    { ?>
		<li class="active">
			<a href="?modulo=boletines"><i class="fa fa-lock"></i> Boletín</a>
		</li>
	
	<?php
	}

	else 
    { ?>
		<li>
			<a href="?modulo=boletines"><i class="fa fa-lock"></i> Boletín</a>
		</li>
		<li>
			<a href="?modulo=ayuda"><i class="fa fa-user"></i> Ayuda</a>
	  	</li>
	<?php
	}
	?>
	</ul>
	<?php
}