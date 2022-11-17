<?php
session_start(); //Interruptor

$idiomas = ["es","ca","en"]; //Idiomes disponibles

if (isset($_GET['idioma'])){ //M'han demanat un idioma?
    if (!in_array($_GET['idioma'],$idiomas)){
        idiomaPorDefecto();
    } else {
        define("LANG",$_GET['idioma']);    
    }
    $_SESSION['idioma'] = LANG; //Es memoritza
} else { //Si no demanes cap dels idiomes disponibles, posa un per defecte
    if (!isset($_SESSION['idioma'])){ //Si no hi ha cap idioma guardat de sessions anteriors
        idiomaPorDefecto();
    } else {
        define("LANG",$_SESSION['idioma']); //Defineix LANG com una constant amb l'idioma que està guardat
    }
}

function idiomaPorDefecto(){
    global $idiomas;
    $idioma = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2); //Agafa les dues primeres lletres de l'idioma que té el navegador
    if (!in_array($idioma,$idiomas)){
        define("LANG","es");
    } else {
        define("LANG",$idioma);
    }
}
?>