<?php 
	function conectar() {
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "ealbum";

		$conector = new mysqli($servidor, $usuario, $senha, $banco);
		mysqli_set_charset($conector,"utf8");
		if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());

		return $conector;
	}
 ?>