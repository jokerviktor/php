<?php
$file = file_get_contents("file.json"); //Llegeix l'arxiu file.json i ho transforma en una cadena
$json = json_decode($file); //Transforma una cadena codificada JSON en un valor PHP

for ($i = 0; $i < count($json->items); $i ++){
    echo $json->items[$i]->name;
}
?>