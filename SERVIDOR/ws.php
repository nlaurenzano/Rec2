<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../clases/AccesoDatos.php');
	require_once('../clases/Elemento.php');
	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Listado', 'urn:wsElem'); 

///**********************************************************************************************************///								
	$server->register('TraerTodos',
						array(),
						array('return' => 'xsd:Array'),
						'urn:wsElem',
						'urn:wsElem#TraerTodos',
						'rpc',
						'encoded',
						'Obtiene todos los elementos.'
					);


	function TraerTodos() {
		return Elemento::TraerTodos();
	}



	$server->register('BorrarId',
						array('id' => 'xsd:int'),
						array('return' => 'xsd:Array'),
						'urn:wsElem',
						'urn:wsElem#BorrarId',
						'rpc',
						'encoded',
						'Obtiene todos los elementos.'
					);


	function BorrarId($id) {
		Elemento::Borrar($id);
		return Elemento::TraerTodos();
	}

///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
