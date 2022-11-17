<?php
$root = "/";
$uri = $_SERVER['REQUEST_URI'];
$dir = substr($uri,strlen($root)); //substr Torna una part de la cadena i strlen obté la seva longitud
$links = explode("/",$dir); //Torna una matriu de cadenes separades obtingudes entre les barres

$methods = ["pagina1","pagina2","pagina3"];

if ($links[0] == ""){ //Cas que no hi hagi res, ha d'anar a la portada
    $pag = "portada";
} else if (!in_array($links[0],$methods)){ //Verifica que alguna dels links coincideix amb algun valor de la matriu $methods
    $pag = "error";
} else {
    $pag = $links[0];
}

include($pag . ".php"); //Inclou l'arxiu php correponent a la pàgina en qüestió
?>