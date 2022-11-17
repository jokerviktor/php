<?php
if (isset($_POST['email'],$_POST['password'],$_POST['username'])) { //Determina si les variables estan definides i no estan buides
    $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS); //filter_var Filtra la variable per desempellegar-se de caracters especials com "<>& i caracters amb valor ASCII per sota del 32
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); //Comprova que el valor sigui una adreça electrònica vàlida
    $pass = $_POST['pass']; //Agafa el valor de pass obtingut per entrada de formulari i l'assigna a $pass
    
    if (!$email){
        //
    } else {
        $pass = password_hash($pass,PASSWORD_DEFAULT); //Assigna a $pass una nova contrasenya més forta mitjançant un algoritme
    
        include("config.php");
        $bd = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS); //Construeix la base de dades
        $res = $bd->prepare('INSERT INTO users (email,pass,username) VALUES (:email,:pass,:username)'); //Prepara la sentència per a la seva execució
    
        $res->execute([
            ":email" => $email,
            ":pass" => $pass,
            ":username" => $username
        ]);

        //
    }
}