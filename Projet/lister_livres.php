<html>

<body>

    <head>
        <title>
            Catalogues des livres
        </title>
    </head>
    <?php
    session_start();
    include('formulaires/entete.html');
    ?>
    <div class="row">
        <div class="col-md-9">
            <?php
            //CNX AUX BDD
            require_once('conf/connexion.php');
            //Ma requête SQL
            $auteur = $_POST["noauteur"];
            $requete = $connexion->prepare("SELECT * FROM livre L inner join auteur A on (A.noauteur = L.noauteur)  WHERE nom = :noauteur");
            $requete->bindParam(":noauteur", $auteur);
            $requete->execute();
            echo '<div class="containier">';
            while ($resultat = $requete->fetch(PDO::FETCH_OBJ)) {
                echo "<p><a href='http://127.0.0.1/tpPHP/Projet/detail.php?nolivre=$resultat->nolivre'>$resultat->titre ($resultat->anneeparution)</a></p><br>";
            }
            echo '</div>';
            ?>
        </div>
        <div class="col-md-3">
            <?php
            include_once('authentification.php')
            ?>
        </div>
    </div>
</body>
</html>