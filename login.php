<?php
session_start();

if (isset($_POST['email'],$_POST['pass'])){         
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) { //Treu @
        echo "Error: formato de correo electrónico incorrecto";
    } else {     
        include ("config.php");
        
        $bd = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS);
        $con = $bd->prepare("SELECT * FROM users WHERE email=:correo");
        $con->execute([
            ":correo" => $_POST['email']
        ]);
        $res = $con->fetchAll(PDO::FETCH_ASSOC);

        if (count($res) != 1){ 
            echo "Error"; //Correu no registrat
        } else {  
            $contra1 = $_POST['pass'];
            $contra2 = $res[0]['pass'];
            if (!password_verify($contra1, $contra2)) {
                echo "Error: correu o contrasenya erronis" //Contrasenya errònia: Persona no registrada o bé duplicada
            } else {
                //
                $_SESSION['id'] = $res[0]['id'];
            }
        }
    }
}
?>