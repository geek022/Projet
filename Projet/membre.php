<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Créer un membre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !</h2>
                <form class="input-group mb-3" method="post" action="lister_livres.php">
                    <input class="form-control" type="text" placeholder="Ajouter un livre Créer un membre" name="noauteur">
                </form>
            </div>
            <div class="col-md-4 p-3 text-white align-content-lg-end text-end">
                <img src="formulaires/images3.png" alt="images3" style="max-width: 100%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 d-flex justify-content-center text-center align-items-center">
                <div class="col-md-5">
                    <form method="post" action="membre.php">
                        <h1 class="text-danger text-center">Créer un membre</h1>
                        Mel: <input type="text" name="mel"><br>
                        Mot de passe : <input type="text" name="motdepasse"><br>
                        Nom : <input type="text" name="nom"><br>
                        Prénom : <input type="text" name="prenom"><br>
                        Adresse : <input type="text" name="adresse"><br>
                        Ville : <input type="text" name="ville"><br>
                        Code Postal : <input type="text" name="cp"><br>
                        <input type="submit" value="Créer un membre">
                    </form>
                </div>
            </div>
            <div class="col-md-4 ">
                <?php include_once('authentification.php') ?>
            </div>
        </div>
    </div>
</body>

</html>