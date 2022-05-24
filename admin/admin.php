<?php
    require('../inc/inc-identification_seesion.php');
    require('../inc/inc_dataconnexion.php');
?>

<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Page d'administration Renove Habitat</title>
</head>

<body>
    <div class="container mt-2">

        <?php require('../inc/inc_header.php'); ?>

        <div class="row">
            <nav class="col-sm-12 col-md-3 ">
                <div class="btn-group d-flex flex-column justify-content-center bg-primary p-3 mt-2 mb-2">
                    <a href="../admin/admin.php" class="btn btn-primary active mb-1 rounded-2"
                        aria-current="page">Accueil</a>

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
            <div class="col-sm-12 col-md-9">


            </div>
        </div>



        <?php require('../inc/inc_admin_footer.php') ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>