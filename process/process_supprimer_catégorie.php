<?php 
require('../inc/inc_identification_session.php');
require('../class/Categorie.php');
require('../inc/inc_dataconnexion.php');
if(isset($_GET['cat'])){
    $id = $_GET['cat'];
}
$categorie = new Categorie(); 
$_SESSION['message'] = $categorie->supprimerCategorie($id);
header('location:../admin/admin.php');
?>