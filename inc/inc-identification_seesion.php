<?php 
    session_start();
if(!isset($_SESSION['user_login'])){
    header('location: ../index.php');
}
else
{
    $user_login= $_SESSION['user_login'];
}
?>