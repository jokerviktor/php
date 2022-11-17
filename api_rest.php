<?php
header('Access-Control-Allow-Origin: *');

$root = "/";
$uri = $_SERVER['REQUEST_URI'];
$dir = substr($uri,strlen($root)); //substr Torna una part de la cadena i strlen obté la seva longitud
$links = explode("/",$dir); //Torna una matriu de cadenes separades obtingudes entre les barres

$json = "error";

switch ($links[0]){ //Similar a IF comparant els diferents valors que pot prendre una variable
    case "metodo1":
        $json = [ "clave1" => "valor1" ];
        break; //Atura un cop es compleix la condició i no mira les següents
    case "metodo2":
        $json = [ "clave2" => "valor2" ];
        break;
    case "metodo3":
        $json = [ "clave3" => "valor3" ];
        break;
}

header("Content-Type: application/json"); //S'especifica explícitament la declaració del tipus de contingut d'un recurs
echo json_encode($json); //Genera una línia de text
?>