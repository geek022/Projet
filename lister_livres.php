<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue des livres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
include('formulaires/entete.html');
session_start();
?>

<div class="row">
    <div class="col-md-9">
        <?php
        require_once('conf/connexion.php');

        // Vérifier si l'utilisateur est un administrateur
        if (isset($_SESSION['profil']) && $_SESSION['profil'] === 'Administrateur') {
            // Afficher le menu spécifique à l'administrateur (à créer dans formulaires/menu_admin.html)
            include('menu_admin.php');
        }

        // Ma requête SQL pour afficher les livres en fonction de l'auteur sélectionné
        if (isset($_POST["noauteur"])) {
            $auteur = $_POST["noauteur"];
            $requete = $connexion->prepare("SELECT * FROM livre L INNER JOIN auteur A ON (A.noauteur = L.noauteur) WHERE nom = :noauteur");
            $requete->bindParam(":noauteur", $auteur);
            $requete->execute();
            
            echo '<div class="container">';
            while ($resultat = $requete->fetch(PDO::FETCH_OBJ)) {
                echo "<p><a href='http://127.0.0.1/tpPHP/Projet/detail.php?nolivre=$resultat->nolivre'>$resultat->titre ($resultat->anneeparution)</a></p><br>";
            }
            echo '</div>';
        }
        ?>
    </div>
    <div class="col-md-3">
        <?php include_once('authentification.php') ?>
    </div>
</div>

</body>
</html>
