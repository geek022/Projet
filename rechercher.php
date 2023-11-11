<html>
    <body>
        <?php
        if(isset($_GET["txtNom"])){
            $nom = $_GET["txtNom"];
        }
        //On se connecte
        require_once('conf/connexion.php');
        //Envoi de la requête vers MySQL
         $requete = $connexion->query("SELECT * FROM utilisateur WHERE nom ='$nom'");
         //Les résultats retournés par la requête
        $requete->setFetchMode(PDO::FETCH_OBJ);
        while($res = $requete -> fetch()){
            //Affiche des champs nom et prénom de la table utilisateur
            echo '<h1>', $res -> nom,' ', '<h1>', $res -> prenom, ' ','<h1>', $res -> mot_de_passe;
        }
        ?>
    </body>
</html>