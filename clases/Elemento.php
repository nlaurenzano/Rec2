<?php
class Elemento
{
//--------------------------------------------------------------------------------//
//--ATRIBUTOS
	private $campo1;
 	private $campo2;
 	private $campo3;

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
 	public function GetCampo1()
	{
		return $this->campo1;
	}
	public function GetCampo2()
	{
		return $this->campo2;
	}
	public function GetCampo3()
	{
		return $this->campo3;
	}
	
	public function SetCampo1($valor)
	{
		$this->campo1 = $valor;
	}
	public function SetCampo2($valor)
	{
		$this->campo2 = $valor;
	}
	public function SetCampo3($valor)
	{
		$this->campo3 = $valor;
	}
	
//--------------------------------------------------------------------------------//
//--CONSTRUCTOR
	public function __construct($campo1=NULL)
	{
		if($campo1 != NULL){
			$obj = Elemento::TraerPorCampo1($campo1);
			$this->campo1 = $obj->campo1;
			$this->campo2 = $obj->campo2;
			$this->campo3 = $obj->campo3;
		}
	}

//--------------------------------------------------------------------------------//
//--TOSTRING	
  	public function ToString()
	{
	  	return $this->campo1."  ".$this->campo2."  ".$this->campo3;
	}
//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODO DE CLASE

	public static function Guardar($campo1, $campo2, $campo3) {
		
		if (Elemento::TraerPorCampo1($campo1)) {
				echo "No tenemos registrado ningún elemento llamado '$campo1'.";
				return false;
			} else {
				$unElemento = new Elemento();
				$unElemento->SetCampo1($campo1);
				$unElemento->SetCampo2($campo2);
				$unElemento->SetCampo3($campo3);

				$unElemento->Insertar();
			}
		return true;
	}

	public static function Sacar($campo1) {
		
		$elemento = Elemento::TraerPorCampo1($campo1);

		if ($elemento) {
			// Tenemos el elemento
			Elemento::Borrar($campo1);
		} else {
			echo "No tenemos registrado ningún elemento llamado '$campo1'.";
		}
	}

	public static function TraerPorCampo1($campo1) 
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta = $objetoAccesoDato->RetornarConsulta("SELECT campo1, campo2, campo3 FROM listado WHERE campo1 = :campo1 ");
		$consulta->bindValue(':campo1', $campo1, PDO::PARAM_STR);
		$consulta->execute();
		$matBuscado = $consulta->fetchObject('Elemento');
		return $matBuscado;
	}

	public static function Borrar($campo1)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("DELETE FROM listado WHERE campo1 = :campo1");	
		$consulta->bindValue(':campo1', $campo1, PDO::PARAM_STR);		
		$consulta->execute();
		return $consulta->rowCount();
	}

	public static function TraerTodos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta=$objetoAccesoDato->RetornarConsulta("SELECT campo1,campo2,campo3 FROM listado");
		$consulta->execute();

		//return $consulta->fetchall(PDO::FETCH_CLASS,"Elemento");
		return $consulta->fetchall();
	}

//--------------------------------------------------------------------------------//

//--------------------------------------------------------------------------------//
//--METODOS DE INSTANCIA
	public function Insertar()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso();
		$consulta = $objetoAccesoDato->RetornarConsulta("INSERT INTO listado (campo1, campo2, campo3) values (:campo1, :campo2, :campo3)");
		$consulta->bindValue(':campo1',$this->campo1, PDO::PARAM_STR);
		$consulta->bindValue(':campo2',$this->campo2, PDO::PARAM_STR);
		$consulta->bindValue(':campo3',$this->campo3, PDO::PARAM_STR);
		$consulta->execute();
		//return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
	
	public function Modificar()
	{
		
	}

//--------------------------------------------------------------------------------//




}