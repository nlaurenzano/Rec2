<?php
	//require_once('clases/Elemento.php');
	//require_once('clases/AccesoDatos.php');
?>

<div class="">
	<h3>LISTADOS</h3>
	<div id="listados"></div>
	
	<label>
		<div class="" id="mensajesABM"></div>
	</label>

	<script>
		$("#listados").html(MostrarJSON('<?php TraerWS(); ?>'));
	</script>

</div>