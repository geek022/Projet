<html>
    <body>
        <?php
        //On vérifie si le paramètre 'txtNom' est défini
        if(isset($_GET["txtNom"])){
            //On récupère le paramètre 'txtNom'
            $nom = $_GET["txtNom"];
            //On se connecte à la bdd
            require_once('conf/connexion.php');
            //Envoi de la requête vers MySQL
            $requete = $connexion->query("SELECT * FROM utilisateur WHERE nom ='$nom'");
            //Les résultats retournés par la requête seront traités en 'mode' objet
            $requete->setFetchMode(PDO::FETCH_OBJ);
            //Parcours des résultats retournés par la requête
            while($res = $requete -> fetch()){
                //Affiche des champs nom et prénom de la table utilisateur
                echo '<h1>', $res -> nom,' ', '<h1>', $res -> prenom, ' ','<h1>', $res -> mot_de_passe;
            }
        }else{
            //On affiche ce message dans le cas où le paramètre 'txtNom n'est défini
            echo "Le paramètre 'txtNom' n''est pas défini dans url.php";
        }
        
        ?>
    </body>
</html>