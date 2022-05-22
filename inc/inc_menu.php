<nav class="col-sm-12 col-md-3">
    <ul class=" ">
        <li><a href="index.php">Accueil</a></li>

        <?php
        // requete pour récupérer les catégories dans la bdd
        if($result= $mysqli->query('SELECT id_categorie, nom_categorie FROM categories ')){
            while($row = $result->fetch_array()){
                $categories[$row['id_categorie']] = $row['nom_categorie']; // stockage des catégories dans un array
            }
        }
        //Affichage
        ?>
        <?php if(isset($categories)): ?>
        <?php foreach($categories as $id => $categorie): ?>

        <li><a href="categorie_.php?cat=<?php echo $id ?>"><?php echo $categorie ?></a>


            <?php endforeach ?>
            <?php endif ?>

    </ul>
</nav>