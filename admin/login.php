<?php
session_start();
if(isset($_SESSION['user_login'])){
    header('location:admin.php');
}

    if(isset($_POST['submitForm'])){
        if(isset($_POST['user_name'])){
            $user_input_login = $_POST['user_name'];
            $user_input_password = $_POST['pwd'];
            $mysqli = new mysqli('localhost', 'root', '', 'renovehabitat');
            if($mysqli->connect_errno){
                echo 'Echec de connexion ' . $mysqli->connect_error;
                exit();
            }
            if($result = $mysqli->query('SELECT user_login, user_password FROM
             user WHERE user_login="' . $user_input_login . '"')){
                 $row = $result->fetch_array();
                if(isset($row['user_login'])){
                    $user_login= $row['user_login'];
                    $user_password = $row['user_password'];
                    if(crypt($user_input_password, $user_password) != $user_password){
                        $msg_error ='<p class="error"> Mot de passe erroné </p>';
                    }
                    else{
                        session_start();
                        $_SESSION['user_login']= $user_login;
                        header('location:admin.php');
                    }
                }
                else{
                    $msg_error ='<p class="error"> Ce nom d\'utilisateur n\'existe pas. </p>';
                }
             }
             else{
                $msg_error ='<p class="error"> Une erreur est survenue lors de l\'accès à la base. </p>';
             }
        }
        else{
            $msg_error ='<p class="error"> Vous devez saisir un nom d\'utilisateur. </p>';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Page de connexion à l'administration</title>
</head>

<body>
    <div class="wrapper container mt-2">

        <header class="main-header bg-primary p-3 rounded-3">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <img class="logo img-fluid" src="../img/logo.png" alt="logo">
                </div>
                <div class="col-sm-12 col-md-9 text-center text-white align-self-center">
                    <h1>Renove Habitat</h1>
                    <h2>des 3 frères</h2>
                </div>
            </div>
        </header>

        <?php if(isset($msg_error)) echo $msg_error ?>
        <div class="d-flex justify-content-center m-5">
            <form class="login-form " action="login.php" method="post">
                <p>Nom d'utilisateur : </p>
                <input type="text" name="user_name">
                <p>Mot de passe :</p>
                <input type="password" name="pwd">
                <p><input class="mt-2" type="submit" name="submitForm" value="se connecter"></p>
            </form>
        </div>

        <?php require('../inc/inc_footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>