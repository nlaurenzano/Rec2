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
		$("#mensajesABM").html("Error al ingresar el material: " + retorno.responseText);
	});
}

function Sacar()
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
			queHacer:"Sacar",
			campo1:campo1
		}
	});
	funcionAjax.done(function(retorno){
		$("#mensajesABM").html(retorno);	
		
	});
	funcionAjax.fail(function(retorno){	
		$("#mensajesABM").html("Error al sacar el material: " + retorno.responseText);	
	});	
}
