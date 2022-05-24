<?php

class SousCategorie{
    function __construct(){
        // pas de constructeur pour cette class
    }
    // méthode qui ajoute une sous catégorie à la bdd
    function ajouterSousCategorie($nom_sous_categorie, $nom_image, $desc_image,  $id_cat){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        $result=$mysqli->query('SELECT COUNT(id_sous_cat) FROM sous_categories WHERE nom_sous_cat="' . $nom_sous_categorie .'"');
        $row = $result->fetch_array();
        if($row[0]==0){
            if($result = $mysqli->query('INSERT INTO sous_categories (nom_cat, nom_image, desc_image, id_cat)  VALUES ("' . $nom_sous_categorie .'",
            "'. $nom_image . '","'. $desc_image .'","' . $id_cat .'" ) ')){
                $msg_succes= '<p class="text-success"> La sous catégorie a été ajoutée avec succès. </p> ';
                return $msg_succes;
            }
            else{
                $msg_error='<p class=text-danger">Une erreur s\'est produite lors de l\'ajout de la sous catégorie. </p>';
                return $msg_error;
            }
            
            
        }
        else{
            $msg_error=' <p class="text-danger"> La  sous catégorie existe déjà. </p>';
            return $msg_error;
        }
    }

    // méthode qui supprime une catégorie à la bdd
    function supprimerSousCategorie($id_sous_cat){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        if($result=$mysqli->query('DELETE FROM sous_categories WHERE id_sous_cat=' . $id_sous_cat )){
            $msg_succes='<p class="text-success"> La catégorie a été supprimée avec succès. </p>';
            return $msg_succes;
        }
        else{
            $msg_error='<p class="text-danger"> Une erreur s\'est produite lors de la suppression de la catégorie. </p>';
            return $msg_error;
        }
    }

    //méthode qui modifie une catégorie
    function modifierCategorie($id_sous_cat, $nouveau_nom){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        $result=$mysqli->query('SELECT COUNT(id_sous_cat) FROM sous_categories WHERE nom_sous_cat="' . $nouveau_nom .'"');
        $row = $result->fetch_array();
        if($row[0]==0){
            if($result=$mysqli->query('UPDATE sous_categories SET nom_sous_cat="'
            . $nouveau_nom .'" WHERE id_sous_cat=' . $id_sous_cat )){
             $msg_succes='<p class="text-success"> La sous catégorie a été modifiée avec succès. </p>';
             return $msg_succes;
            }
            else{
                $msg_error='<p class="text-danger"> Une erreur est survenue lors de la modification de la sous catégorie. </p>';
                return $msg_error;
            }
        }
        else{
            $msg_error ='<p class="text-danger"> Cette sous catégorie existe déjà. </p>';
            return $msg_error;
        }
    }

    function exportData($id_sous_cat){
        $mysqli = new mysqli('localhost', 'root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli-> connect_error;
            exit();
        }
        if($result= $mysqli->query('SELECT nom_sous_cat FROM sous_categories WHERE id_sous_cat=' . $id_sous_cat)){
            $row = $result->fetch_array();
            return $row[0];
        }
        
    }

}

?>