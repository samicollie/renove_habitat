<?php 
    require('../inc/inc_identification_session.php');
    require('../class/Categorie.php');
    require('../inc/inc_dataconnexion.php');
    $categorie = new Categorie();

    if(isset($_POST['submitAjouter'])){
        if(!empty($_POST['nom_categorie'])){
            $nom_categorie = $_POST['nom_categorie'];
            $_SESSION['message'] = $categorie-> ajouterCategorie($nom_categorie);
            header('location:../admin/ajout_categorie.php');
        }
    }
?>