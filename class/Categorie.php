<?php

class Categorie{
    function __construct(){
        // pas de constructeur pour cette class
    }
    // méthode qui ajoute une catégorie à la bdd
    function ajouterCategorie($nom_categorie){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        $result=$mysqli->query('SELECT COUNT(id_cat) FROM categories WHERE nom_cat="' . $nom_categorie .'"');
        $row = $result->fetch_array();
        if($row[0]==0){
            if($result = $mysqli->query('INSERT INTO categories (nom_cat)  VALUES ("' . $nom_categorie .'") ')){
                $msg_succes= '<p class="text-success"> La catégorie a été ajoutée avec succès. </p> ';
                return $msg_succes;
            }
            else{
                $msg_error='<p class=text-danger">Une erreur s\'est produite lors de l\'ajout de la catégorie. </p>';
                return $msg_error;
            }
            
            
        }
        else{
            $msg_error=' <p class="text-danger"> La catégorie existe déjà. </p>';
            return $msg_error;
        }
    }

    // méthode qui supprime une catégorie à la bdd
    function supprimerCategorie($id){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        if($result=$mysqli->query('DELETE FROM categories WHERE id_cat=' . $id )){
            $msg_succes='<p class="text-success"> La catégorie a été supprimée avec succès. </p>';
            return $msg_succes;
        }
        else{
            $msg_error='<p class="text-danger"> Une erreur s\'est produite lors de la suppression de la catégorie. </p>';
            return $msg_error;
        }
    }

    //méthode qui modifie une catégorie
    function modifierCategorie($id, $nouveau_nom){
        $mysqli = new mysqli('localhost','root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli->connect_error ;
            exit();
        }
        $result=$mysqli->query('SELECT COUNT(id_cat) FROM categories WHERE nom_cat="' . $nouveau_nom .'"');
        $row = $result->fetch_array();
        if($row[0]==0){
            if($result=$mysqli->query('UPDATE categories SET nom_cat="'
            . $nouveau_nom .'" WHERE id_cat=' . $id )){
             $msg_succes='<p class="text-success"> La catégorie a été modifiée avec succès. </p>';
             return $msg_succes;
            }
            else{
                $msg_error='<p class="text-danger"> Une erreur est survenue lors de la modification de la catégorie. </p>';
                return $msg_error;
            }
        }
        else{
            $msg_error ='<p class="text-danger"> Cette catégorie existe déjà. </p>';
            return $msg_error;
        }
    }

    function exportData($id){
        $mysqli = new mysqli('localhost', 'root','', 'renovehabitat');
        if($mysqli->connect_errno){
            echo 'Echec de la connexion ' . $mysqli-> connect_error;
            exit();
        }
        if($result= $mysqli->query('SELECT nom_cat FROM categories WHERE id_cat=' . $id)){
            $row = $result->fetch_array();
            return $row[0];
        }
        
    }

}

?>