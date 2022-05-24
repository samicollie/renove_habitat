<nav class="col-sm-12 col-md-3 ">
    <div class="btn-group d-flex flex-column justify-content-center bg-primary p-3 mt-2 mb-2">
        <a href="../admin/admin.php" class="btn btn-primary active mb-1 rounded-2" aria-current="page">Accueil</a>

        <?php
        // requete pour récupérer les catégories dans la bdd
        if($result= $mysqli->query('SELECT id_cat, nom_cat FROM categories ')){
            while($row = $result->fetch_array()){
                $categories[$row['id_cat']] = $row['nom_cat']; // stockage des catégories dans un array
            }
        }
        //Affichage
        ?>
        <?php if(isset($categories)): ?>
        <?php foreach($categories as $id => $categorie): ?>
        <a href="categorie.php?cat=<?php echo $id ?>"
            class="btn btn-primary bg-secondary mb-1 rounded-2"><?php echo $categorie ?></a>
        <p>
            <a class="text-decoration-none text-white" href="#">[edit.]</a>
            <a class="text-decoration-none text-white" href="#">[suppr.]</a>
        </p>



        <?php endforeach ?>
        <?php endif ?>
        <a class="btn btn-primary bg-secondary mb-1 rounded-2" href="#"><i class="fa fa-plus-square"></i>
            Ajouter </a>
    </div>
</nav>