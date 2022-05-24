<?php
    require('../inc/inc_identification_session.php');
    require('../inc/inc_dataconnexion.php');
    require('../class/Categorie.php');
    $categorie = new Categorie();
    if(isset($_GET['cat'])){
        $id_cat = $_GET['cat'];
    }
    $nom_categorie = $categorie->exportData($id_cat);
    if(isset($_SESSION['message'])){
        $message = $_SESSION['message'];
        $_SESSION['message'] = NULL;
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
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Modifier une catégorie</title>
</head>
<body>
    <div class="container mt-2">

        <?php require('../inc/inc_header.php'); ?>

        <main class="main">
            <div class="row">

                <?php require('../inc/inc_admin_menu.php'); ?>

                <div class="col-sm-12 col-md-9">
                    <form class="form-modifier" action="../process/process_edit_categorie.php?cat=<?php echo $id_cat ?>" method="post">
                        <h1>Modifier une catégorie</h1>
                        <p>Nom de la catégorie</p>
                        <input type="text" name="nom_categorie" value="<?php echo $nom_categorie ?>">
                        <input type="submit" name="submitModifier" value="Modifier">
                    </form>

                    <?php if(isset($message)) echo $message ?>

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