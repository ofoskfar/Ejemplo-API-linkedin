<?php

class ini_ses{
    function crearsesion($param){
        session_start();
	$_SESSION["usuario"] = $param;
	$_SESSION["auten"] = "si";
	$resp = "1";
	return $resp;
    }
    function validasesion(){
        session_start();
	if($_SESSION["auten"] == "si"){
	        $resp = "1";
	        return $resp;
	}
	else{
		$resp = "4";
		return $resp;
	}
    }
    function cerrarsesion(){
        session_start();
	session_unset();
	session_destroy();
	$res = "<script>location.href='index.php'</script>";
	return $res;
    }
}

?>
