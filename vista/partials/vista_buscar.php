<?php
//Importamos los archivos de funciones y la clase a manipular de la capa modelo.
require_once("../../../controlador/Controlador_Funciones.php");
require_once("../../../modelo/modelo_usuario.php");


//Guarda los valores de los campos en variables, siempre y cuando se haya enviado del formulario, sino se guardará null.

$searchText = isset($_POST['searchText']) ? $_POST['searchText'] : null;

?>
<Form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" role="search">

<div class="input-group">
	<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="<?php if(isset($searchText)) echo $searchText?>" >
	<spam class="input-group-btn">
		<button type="sumit" class="btn btn-primary">Buscar</button>
	</spam>
</div>
</Form>