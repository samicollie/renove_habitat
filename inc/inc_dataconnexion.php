<?php 
    $mysqli = new mysqli('localhost','root','', 'renovehabitat');
    if($mysqli->connect_errno){
        echo 'Echec de la connexion ' . $mysqli->connect_error;
        exit();
    }
?>