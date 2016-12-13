function Guardar()
{
	var id=$("#idModificar").val();
	var campo1=$("#campo1").val();
	var campo2=$("#campo2").val();
	var campo3=$('#campo3:checked').val();
	$("#campo1").val('');
	$("#campo2").val('');
	$('#campo3:checked').prop("checked", false);

	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Guardar",
			id:id,
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

function Borrar(idBorrar)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"Borrar",
			idBorrar:idBorrar
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
		$("#idModificar").val(elemento.id);
		$("#campo2").val(elemento.campo2);
		$("#campo3[value="+elemento.campo3+"]").prop('checked',true);
	});
	funcionAjax.fail(function(retorno){	
		$("#mensajesABM").html("Error al borrar: " + retorno.responseText);	
	});	
//	Mostrar('MostrarAlta');
}
