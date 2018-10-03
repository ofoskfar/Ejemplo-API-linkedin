<?php
require_once "ws-api.php";
include('conexion.php');

$code = $_REQUEST['code'];

$url = "https://www.linkedin.com/uas/oauth2/accessToken";
$vars = [
	'client_id' => '77r4yi7dvtvrpe',
	'client_secret' => 'wLTDwIsjrATh7TNu',
	'redirect_uri' => 'http://cursosim.com/respuesta.php',
	'code' => $code, 
	'grant_type' => 'authorization_code',
];

$res = curltoken($url, http_build_query($vars));

$actok = json_decode($res)->access_token;

$urlinfo = "https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrl,headline,publicProfileUrl,location,industry,positions,email-address,educations:(id,school-name,field-of-study,start-date,end-date,degree,activities,notes))?format=json&oauth2_access_token=$actok";
$info = file_get_contents($urlinfo, FALSE);
$perfil = json_decode($info);

$correo = $perfil->emailAddress;
$nombre = $perfil->firstName;
$apellido = $perfil->lastName;
$tit = $perfil->headline;
$url = $perfil->publicProfileUrl;
$sector = $perfil->industry;
$foto = $perfil->pictureUrl;

$curpos = $perfil->positions;
$curvals = $curpos->values;

$registrar = crear::registrodb($nombre, $apellido, $url, $correo, $tit, $sector, $foto);

foreach ($curvals as $arr){
	$empre = $arr->company->name;
	$fech = $arr->startDate->month . "-" . $arr->startDate->year;
	$puesto = $arr->title;
	$fun = $arr->summary;

	if($empre !== "" && $fech !== "" && $puesto !== "" && $fun !== ""){
		$addcv = crear::cvdb($empre, $fech, $puesto, $fun, $registrar);
	}
}

$nomreg = crear::impnom($registrar);
echo "Hola " . $nomreg[nombre] . " tu registr&oacute; se ha realizado con exit&oacute;";
?>

