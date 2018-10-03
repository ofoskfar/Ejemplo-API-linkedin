<?php

class crear{
	function registrodb($nombre, $apellido, $url, $correo, $tit, $sector){
		include 'config.php';
		try{
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $namedb, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$resul = $con->prepare("INSERT INTO registros (nombre, apellidos, url, correo, titulo, sector) VALUES ('$nombre', '$apellido', '$url', '$correo', '$tit', '$sector')");
			$resul->execute();
			$result = $con->lastInsertId('id');
			return $result;
		}
		catch (PDOException $e){
			$result = "Error en el registro 001";
			die($result);
		}
	}
	function cvdb($empresa, $fecha, $puesto, $funciones, $id){
		include 'config.php';
		try{
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $namedb, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$resul = $con->prepare("INSERT INTO cv (empresa, fechadeinicio, puesto, funcion, idregistro) VALUES ('$empresa', '$fecha', '$puesto', '$funciones', '$id')");
			$resul->execute();
		}
		catch (PDOException $e){
			$result = "Error en el registro 002";
			die($result);
		}
	}
	function impnom($id){
		include 'config.php';
		try{
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $namedb, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$resul = $con->prepare("SELECT * FROM registros WHERE id = $id LIMIT 1");
			$resul->execute();
			$result = $resul->fetch();
			return $result;
		}
		catch (PDOException $e){
			$result = "Error en el registro 003";
			die($result);
		}
	}
}

?>
