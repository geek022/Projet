<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2>La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !</h2>
                <div class="border p-3">
                    <form method="post" action="lister_livres.php">
                        <button type="submit" name="livre ">Ajouter un livre</button>
                        <button type="submit" name="membre">Créer un membre</button>
                    </form>
                </div>
            </div>
            <div class="col-md-4 p-3 text-white align-content-lg-end text-end">
                <img src="formulaires/images3.png" alt="images3" style="max-width: 100%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 d-flex justify-content-center text-center align-items-center">
                <div class="col-md-5">
                    <form method="post" action="menu_admin.php">
                        <h1 class="text-danger text-center">Ajouter un livre</h1>
                        Auteur :
                        <select name="auteur">
                            <?php
                            require_once('conf/connexion.php');
                            $requeteAuteurs = $connexion->query("SELECT * FROM auteur");
                            while ($auteur = $requeteAuteurs->fetch(PDO::FETCH_OBJ)) {
                                echo "<option value='$auteur->noauteur'>$auteur->nom $auteur->prenom</option>";
                            }
                            ?>
                        </select><br>
                        Titre : <input type="text" name="titre"><br>
                        ISBN13 : <input type="text" name="isbn13"><br>
                        Année de parution : <input type="text" name="anneeParution"><br>
                        <label for="resume">Résumé:</label>
                        <textarea class="form-control" rows="3" id="comment" name="text"></textarea><br>
                        Image : <input type="text" name="image"><br>
                        <input type="submit" value="Ajouter">
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