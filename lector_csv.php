<?php
$csv = [];
$file = fopen("file.csv","r");
$keys = fgets($file); //Preparació de les claus
$columns = explode(";",$keys);

do {
    $row = explode(";",fgets($file)); //Llegeix línia a línia
    array_push($csv, array_combine($columns,$row)); //Combina cada columna amb la seva clau
} while (!feof($file)); //Mentre no hi hagi més línies (no està al final de l'arxiu)

for ($i = 0; $i < count($csv); $i++){
    //
    echo $csv[$i]['name'];
}
?>