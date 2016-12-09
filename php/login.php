<?php 
require_once("../clases/AccesoDatos.php");
require_once("../clases/Usuario.php");

session_start();
$usuario = $_POST["usuario"];
if (!filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
  $retorno= "El formato del email ingresado no es correcto.";
} else {
	$clave = $_POST['clave'];

	if (!preg_match('/^[0-9]{3}$/', $clave)) {
		$retorno= "El formato de la clave ingresada no es correcto.";
	} else {
		$recordar = $_POST['recordarme'];

		$userBuscado = Usuario::TraerPorEmail($usuario);

		if ($userBuscado) {
			if ($userBuscado->GetClave()==$clave) {
				if($recordar=="true")
				{
					setcookie("registro",$usuario,  time()+36000 , '/');
				} else {
					setcookie("registro",$usuario,  time()-36000, '/');
				}
				$_SESSION['registrado']=$userBuscado->GetNombre();
				$_SESSION['rol']=$userBuscado->GetRol();
				$retorno="ingreso";
			} else {
				$retorno= "Clave inválida.";
			}
		} else {
			$retorno= "No se encuentra el usuario ingresado.";
		}
	}
}

echo $retorno;
?>