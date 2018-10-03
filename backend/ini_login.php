<?php
include('ini_sesion.php');

$user = strip_tags($_GET['us']);
$pass = strip_tags($_GET['pas']);

if($user == "Admin" && $pass == "Cilantro_23!"){
	$result = ini_ses::crearsesion($user);
	echo $result;
}
else{
	$result = "Usuario y contrase&ntilde;a incorrecto";
	echo $result;
}
?>
