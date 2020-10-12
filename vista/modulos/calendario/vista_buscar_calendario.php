

<Form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off" role="search">

<div class="input-group">
	<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="<?php if(isset($searchText)) echo $searchText?>" >
	<spam class="input-group-btn">
		<button type="sumit" class="btn btn-primary">Buscar</button>
	</spam>
</div>
</Form>