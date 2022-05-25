<?php
    require('../inc/inc_identification_session.php');
    require('../inc/inc_dataconnexion.php');
    require('../class/Categorie.php');

    if(isset($_GET['cat'])){
        $id_cat = $_GET['cat'];
    }
    $categorie = new Categorie();
    $nom_categorie = $categorie-> exportData($id_cat);
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../style.css" rel="stylesheet">
    <title><?php echo $nom_categorie ?></title>
</head>

<body>
    <div class="container mt-2">

        <?php require('../inc/inc_header.php'); ?>

        <main class="main">
            <div class="row">

                <?php require('../inc/inc_admin_menu.php'); ?>

                <div class="col-sm-12 col-md-9 mt-2">
                    <?php if(isset($message)) echo $message ?>

                    <a href="#">
                        <figure class="figure  position-relative">
                            <img src="../img/ajouter.png" class="figure-img img-fluid rounded" alt="plus" width="200"
                                height="200">
                            <figcaption
                                class="fig-caption position-absolute top-0 start-0 end-0 bottom-0 bg-dark opacity-75 fs-2 text-white d-flex justify-content-center align-items-center">
                                Ajouter
                            </figcaption>
                        </figure>
                    </a>
                </div>

            </div>
        </main>
        <?php require('../inc/inc_admin_footer.php'); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>