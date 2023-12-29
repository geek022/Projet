<html>
    <body>
        <head>
            <title>
            Lister les régions
            </title>
        </head>
        <?php
            //CNX AUX BDD
            require_once('conf/connexion2.php');
            //Ma requête SQL
            $requete = $connexion2->prepare("SELECT * FROM REGION");
            $requete->execute();
            $res = $requete->fetchAll(PDO::FETCH_OBJ);
            echo '<table border=2>';
            echo '<tr><th>noregion</th><th>nomregion</th></td>';
            if($res){
                foreach($res as $resultat){
                    echo "<tr><td> $resultat->noregion </td><td>$resultat->nomregion</td></tr>";
                }
                echo '</table>';
            }
            
            else{
                echo '<p>Erreur dectectée.</p>';
            }
        ?>
    </body>
</html>