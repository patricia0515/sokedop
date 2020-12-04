<?php
require_once "../controlador/controlador_funciones.php";

if (empty($_SESSION['docusuario']) && empty($_SESSION['clave'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php>";
}
else 
{
	if ($_GET['modulo'] == 'inicio') 
    {
		include "../vista/modulos/inicio/vista_inicio.php";
	}

	elseif ($_GET['modulo'] == 'boletines') {
		include "../vista/modulos/boletines/vista_boletines.php";
	}

	elseif ($_GET['modulo'] == 'usuario') {
		include "../vista/modulos/usuarios/vista_usuarios.php";
	}


	elseif ($_GET['modulo'] == 'form_usuario') {
		include "../vista/modulos/usuarios/vista_formulario_usuario.php";
	}

	elseif ($_GET['modulo'] == 'profile') {
		include "../vista/modulos/profile/view.php";
		}


	elseif ($_GET['modulo'] == 'form_profile') {
		include "../vista/modulos/profile/form.php";
	}

	elseif ($_GET['modulo'] == 'password') {
		include "../vista/modulos/password/view.php";
	}
    elseif ($_GET['modulo'] == 'ayuda') {
		include "../vista/modulos/manualsiga/index.html";
	}
    elseif ($_GET['modulo'] == 'cmasivo') {
		include "../vista/modulos/cargamasivadatos/vista_cargamasiva.php";
	}
    elseif ($_GET['modulo'] == 'matricula')
    {
        include "../vista/modulos/matriculas/vista_matriculas.php";
    }
    
    elseif ($_GET['modulo'] == 'form_matricula')
    {
        include "../vista/modulos/matriculas/vista_formulario_matricula.php";
    }
}
?>