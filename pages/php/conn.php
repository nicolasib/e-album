<?php 

	function conectar() {
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "albumvirtual";

		$conector = new mysqli($servidor, $usuario, $senha, $banco);
		if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());

		return $conector;
	}
 ?>