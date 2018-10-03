<?php

class conectar{
	function mostrar(){
		include 'config.php';
		try{
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $namedb, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$resul = $con->query("SELECT * FROM registros");
			return $resul;
		}
		catch (PDOException $e){
			$result = "Error en el registro 001";
			die($result);
		}
	}
	function mostcv($id){
		include 'config.php';
		try{
			$con = new PDO('mysql:host=' . $host . ';dbname=' . $namedb, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
			$resul = $con->query("SELECT * FROM cv WHERE idregistro = $id");
			return $resul;
		}
		catch (PDOException $e){
			$result = "Error en el registro 002";
			die($result);
		}
	}
}

?>
