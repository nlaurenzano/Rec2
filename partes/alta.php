<?php     
	require_once("clases/Elemento.php");
	require_once("clases/AccesoDatos.php");

?>
<div class="">
	<h3>CARGA DE DATOS</h3>
		
	<div class="panel-body">
		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-6">
				<input type="text" name="campo1" id="campo1" placeholder="Nombre" class="form-control input-lg"  />
				<input type="text" name="campo2" id="campo2" placeholder="Precio" class="form-control input-lg" />

				<input type="radio" name="campo3" id="campo3" value="solido" />Sólido
				<input type="radio" name="campo3" id="campo3" value="liquido" />Líquido</br>
				
				<input type="hidden" name="idModificar" id="idModificar" />
			</div>

			<div class="col-md-3">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-6">
				<input type="button" class="btn btn-lg btn-block btn-success" name="guardar" value="Ingresar"
					onclick="Guardar()" />
			</div>

			<div class="col-md-3">
			</div>
		</div>

		<div class="row">
			<div class="col-md-3">
			</div>
		
			<div class="col-md-6">
				<div class="" id="mensajesABM"></div>
			</div>

			<div class="col-md-3">
			</div>
		</div>
	</div>
</div>