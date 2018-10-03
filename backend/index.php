<style>
th, td {
        border: 1px solid #000;
}
</style>
<?php
session_start();
include('login.js');
include('ini_sesion.php');
include('conexion.php');

$vs = ini_ses::validasesion();
$regis = conectar::mostrar();

if($vs == 4){
?>
<div style="width: 50%; margin: auto;">
<h3>INGRESA</h3>
<form onsubmit="return validar();">
<input type="text" id="usuario" name="usuario" style="margin-bottom: 5px;">
<input type="password" id="password" name="password">
</form>
<button onclick="validar();">Ingresar</button>
<p id="msg"></p>
<div>
<?php
}
else{
?>
<button style="right: 10px; position: fixed;" onclick="location.href='salir.php'">Salir</button>
<table>
<tr><th>NOMBRE</th><th>APELLIDO</th><th>URL</th><th>CORREO</th><th>PUESTO</th><th>SECTOR</th><th>FOTO</th></tr>
<?php
	foreach($regis as $row){
		$id = $row[id];
		echo '<tr><td style="padding: 10px;">' . $row[nombre] . '</td><td style="padding: 10px;">' . $row[apellidos] . '</td><td style="padding: 10px;"><a href="' . $row[url] . '" target="_blank">url</a></td><td style="padding: 10px;">' . $row[correo] . '</td><td style="padding: 10px;">' . $row[titulo] . '</td><td style="padding: 10px;">' . $row[sector] . '</td><td style="padding: 10px;"><img src="' . $row[foto] . '" /></td></tr>';
		echo '<tr><th colspan="1"></th><th></th><th></th><th>EMPRESA</th><th>PUESTO</th><th>FECHA DE INICIO</th><th>FUNCION</th></tr>';
		$cvreg = conectar::mostcv($id);
		foreach($cvreg as $reg){
	            echo '<tr><td colspan="3" style="padding: 10px;"></td><td style="padding: 10px;">' . $reg[empresa] . '</td><td style="padding: 10px;">' . $reg[puesto] . '</td><td style="padding: 10px;">' . $reg[fechadeinicio] . '</td><td style="padding: 10px;">' . $reg[funcion] . '</td></tr>';
	         }
	}
}
?>
</table>

