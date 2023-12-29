<html>
    <body>
        <head>
            <title>
            Lister des auteurs
            </title>
        </head>
        <?php
            //CNX AUX BDD
            require_once('conf/connexion.php');
            //Ma requête SQL
            $requete = $connexion->prepare("SELECT * FROM livre L INNER JOIN auteur A ON A.noauteur = L.noauteur");
            $requete->execute();
            $res = $requete->fetchAll(PDO::FETCH_OBJ);
            echo '<table border=2>';
            echo '<tr><th>nolivre</th><th>nom</th><th>prénom</th></td>';
            if($res){
                foreach($res as $resultat){
                    echo "<tr><td> $resultat->noauteur</td><td><a href='http://127.0.0.1/tpPHP/Projet/detailAuteur.php?nom=".$resultat->noauteur."'>$resultat->nom</td><td><a href='http://127.0.0.1/tpPHP/Projet/detailAuteur.php?prenom=".$resultat->noauteur."'>$resultat->prenom</td></tr>";
                }
            }
            echo '</table>';
        ?>
    </body>
</html>