<?php

function curltoken($url, $pars){
    $ini = curl_init();
    curl_setopt($ini, CURLOPT_URL, $url);
    curl_setopt($ini, CURLOPT_POST, 1);
    curl_setopt($ini, CURLOPT_POSTFIELDS, $pars); 
    curl_setopt($ini, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);
    $hdrs = [];
    $hdrs[] = "Content-type: application/x-www-form-urlencoded";
    curl_setopt($ini, CURLOPT_HTTPHEADER, $hdrs);

    $regre = curl_exec($ini);
    $resp = curl_getinfo($ini);
    return $regre; 
}

function info($url){
    $ini = curl_init();
    curl_setopt($ini, CURLOPT_URL, $url);
    curl_setopt($ini, CURLOPT_POST, 1);
    curl_setopt($ini, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ini, CURLOPT_RETURNTRANSFER, 1);

    $regre = curl_exec($ini);
    $resp = curl_getinfo($ini);
    return $regre; 
}

?>

