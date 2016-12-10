function Guardar()
{
	var campo1=$("#campo1").val();
	var campo2=$("#campo2").val();
	var campo3=$("#campo3").val();
	$("#campo1").val('');
	$("#campo2").val('');
	//$("#campo3").checked(false);

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardar",
			campo1:campo1,
			campo2:campo2,
			campo3:campo3
		}
	});
	funcionAjax.done(function(retorno){
		$("#mensajesABM").html(retorno);
		
	});
	funcionAjax.fail(function(retorno){
		$("#mensajesABM").html("Error al ingresar el elemento: " + retorno.responseText);
	});
}

function Borrar(idborrar)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borrar",
			campo1:idborrar
		}
	});
	funcionAjax.done(function(retorno){
		//$("#mensajesABM").html('');
		Mostrar('MostrarGrilla');
	});
	funcionAjax.fail(function(retorno){	
		$("#mensajesABM").html("Error al borrar: " + retorno.responseText);	
	});	
}

function Modificar(idModificar) {

	Mostrar('MostrarAlta');

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Modificar",
			idModificar:idModificar
		}
	});
	funcionAjax.done(function(retorno){
		var elemento =JSON.parse(retorno);
		$("#campo1").val(elemento.campo1);
		$("#idModificar").val(elemento.campo1);
		$("#campo2").val(elemento.campo2);
		$("#campo3").val(elemento.campo3);
	});
	funcionAjax.fail(function(retorno){	
		$("#mensajesABM").html("Error al borrar: " + retorno.responseText);	
	});	
//	Mostrar('MostrarAlta');
}
