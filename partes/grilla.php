<?php
	require_once('clases/Elemento.php');
	require_once('clases/AccesoDatos.php');
?>

<script type="text/javascript">
	function Sacar(id)
	{
		$('#idparasacar').val(id);
		document.frmSalir.submit();
	}
	function Borrar(id)
	{
		$('#idparaborrar').val(id);
		document.frmBorrar.submit();
	}
	function Modificar(id)
	{
		//alert(id);
		$('#idparamodificar').val(id);
		document.frmModificar.submit();
	}
</script>

<?php
	if(isset($_POST['idparasacar']))
	{
		$resultado = Elemento::Sacar($_POST['idparasacar']);
	}
	if(isset($_POST['idparaborrar']))
	{
		$resultado = Elemento::Borrar($_POST['idparaborrar']);
	}
?>	
<div class="">
	<h3>LISTADOS</h3>
	<div id="listados"></div>

	<script>
		$("#listados").html(MostrarJSON('<?php TraerWS(); ?>'));
	</script>

</div>

<form name="frmSalir" method="POST" >
	<input type="hidden" name="idparasacar" id="idparasacar" />
</form>

<form name="frmBorrar" method="POST" >
	<input type="hidden" name="idparaborrar" id="idparaborrar" />
</form>

<form name="frmModificar" method="POST" action="alta.php">
	<input type="hidden" name="idparamodificar" id="idparamodificar" />
</form>