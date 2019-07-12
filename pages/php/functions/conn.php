<?php 
	function connect() {
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$base = "ealbum";

		$conector = new mysqli($host, $user, $pass, $base);
		mysqli_set_charset($conector,"utf8");
		if(mysqli_connect_errno()) trigger_error(mysqli_connect_errno());

		return $conector;
	}
 ?>