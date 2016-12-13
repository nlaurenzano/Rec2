<?php 
require_once('./SERVIDOR/lib/nusoap.php');
require_once("clases/AccesoDatos.php");
require_once("clases/Elemento.php");

$queHago = $_POST['queHacer'];

switch ($queHago) {
	case 'MostrarInicio':
		include("partes/inicio.php");
		break;
	case 'MostrarBotones':
		include("partes/botonesNav.php");
		break;
	case 'MostrarAlta':
		include("partes/alta.php");
		break;
	case 'MostrarGrilla':
		include("partes/grilla.php");
		break;
	case 'MostrarAdmin':
		include("partes/admin.php");
		break;
	case 'MostrarLogin':
		include("partes/formLogin.php");
		break;
	case 'Guardar':
		Elemento::Guardar($_POST['id'], $_POST['campo1'], $_POST['campo2'], $_POST['campo3']);
		break;
	case 'Borrar':
		//Elemento::Borrar($_POST['idBorrar']);
		echo BorrarWS($_POST['idBorrar']);
		break;
	case 'Modificar':
		$unElemento = Elemento::TraerPorId($_POST['idModificar']);
		echo json_encode($unElemento);
		break;

	default:
		# code...
		break;
}

function ObtenerHost() {
	return 'http://localhost:8080/rec2/SERVIDOR/ws.php';
}

function TraerWS() {
	$host = ObtenerHost();
	$client = new nusoap_client($host . '?wsdl');
	$err = $client->getError();
	if ($err) {
		echo '{"status" : "fail","data" : "ERROR EN LA CONSTRUCCION DEL WS","message" : "' . $err . '"}';
	} else {

		$listado = $client->call('TraerTodos');

		if ($client->fault) {
			echo '{"status" : "fail","data" : "ERROR AL INVOCAR METODO",message" : "' . print_r($listado) . '"}';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '{"status" : "error","message" : "' . $err . '"}';
			} 
			else {
				$retorno = '{"status" : "success","data" :';
	        	$retorno .= json_encode($listado);
	        	$retorno .= '}';
	        	echo $retorno;
			}
		}
	}
}

function BorrarWS($id) {
	$host = ObtenerHost();
	$client = new nusoap_client($host . '?wsdl');
	$err = $client->getError();
	if ($err) {
		echo '{"status" : "fail","data" : "ERROR EN LA CONSTRUCCION DEL WS","message" : "' . $err . '"}';
	} else {

		$listado = $client->call('BorrarId',array($id));

		if ($client->fault) {
			echo '{"status" : "fail","data" : "ERROR AL INVOCAR METODO",message" : "' . print_r($listado) . '"}';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '{"status" : "error","message" : "' . $err . '"}';
			} 
			else {
				$retorno = '{"status" : "success","data" :';
	        	$retorno .= json_encode($listado);
	        	$retorno .= '}';
	        	echo $retorno;
			}
		}
	}
}

function GuardarWS($id) {
	$host = ObtenerHost();
	$client = new nusoap_client($host . '?wsdl');
	$err = $client->getError();
	if ($err) {
		echo '{"status" : "fail","data" : "ERROR EN LA CONSTRUCCION DEL WS","message" : "' . $err . '"}';
	} else {

		$listado = $client->call('BorrarId',array($id));

		if ($client->fault) {
			echo '{"status" : "fail","data" : "ERROR AL INVOCAR METODO",message" : "' . print_r($listado) . '"}';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '{"status" : "error","message" : "' . $err . '"}';
			} 
			else {
				$retorno = '{"status" : "success","data" :';
	        	$retorno .= json_encode($listado);
	        	$retorno .= '}';
	        	echo $retorno;
			}
		}
	}
}

?>