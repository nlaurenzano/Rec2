function Mostrar(queMostrar)
{
	$("#principal").html('<img style="padding-top:10%;" src="imagenes/preloader.gif">');

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostrarLogin() {
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostrarLogin"}
	});
	funcionAjax.done(function(retorno) {
		$("#formLogin").html(retorno);
	});
	funcionAjax.fail(function(retorno) {
		$("#mensajesLogin").html("Error en login.");
	});
	funcionAjax.always(function(retorno) {
		//alert("siempre "+retorno.statusText);
	});
}

function MostrarJSON(tablas) {
	tablas = JSON.parse(tablas);
	var retorno;

switch (tablas.status) {
	case 'success':
		retorno = '<div style="padding:10px;">';
		retorno += '<div style="float:left;">';

		// TODO: Cambiar títulos de la tabla
		retorno += "<table><tr><th>Nombre</th><th>Precio</th><th>Tipo</th><th>Acciones</th></tr>";

		for (var i = 0; i <= tablas.data.length - 1; i++) {
			retorno +=  "<tr><td>" + tablas.data[i].campo1 + "</td>";
			retorno +=  "<td>" + tablas.data[i].campo2 + "</td>";
			retorno +=  "<td>" + tablas.data[i].campo3 + "</td>";
			retorno +=  '<td><button class="btn btn-danger" style="margin-right:5px;"" name="Borrar" onclick="Borrar(\''+tablas.data[i].campo1+'\')">Borrar</button>';
			retorno +=  '<button class="btn btn-warning" name="Modificar" onclick="Modificar(\''+tablas.data[i].campo1+'\')">Modificar</button></td>';
			retorno +=  '</tr>';
		}
		retorno += '</table></div>';
		break;
	case 'fail':
		retorno = '<h2>' + tablas.data + ':</h2><pre>' + tablas.message + '</pre>';
		break;

	case 'error':
		retorno = '<h2>ERROR EN EL CLIENTE:</h2><pre>' + tablas.message + '</pre>';
		break;
	default:
		retorno = '';
	}

	return retorno;
}