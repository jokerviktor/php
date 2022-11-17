<?php
session_start(); //Crea una sessió
$_SESSION = [];
header ("Location: index.php");
?>