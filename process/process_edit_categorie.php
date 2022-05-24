<?php
require('../inc/inc_identification_session.php');
require('../inc/inc_dataconnexion.php');
require('../class/Categorie.php');
$categorie = new Categorie();
if(isset($_POST['submitModifier'])){
    if(!empty($_POST['nom_categorie'])){
        $id = $_GET['cat'];
        $nom_categorie = $_POST['nom_categorie'];
        $_SESSION['message'] = $categorie->modifierCategorie($id, $nom_categorie );
        header('location:../admin/edit_categorie.php?cat=' . $id);
    }
}
?>