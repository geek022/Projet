<html>
    <body>
        <?php
        //On vérifie si les paramètres existes
        if(isset($_GET["txtNom"]) && isset($_GET["txtPrenom"])&& isset($_GET["email"]) && isset($_GET["mot_de_passe"])){
            $nom = $_GET["txtNom"];
            $prenom = $_GET["txtPrenom"];
            $mel = $_GET["email"];
            $mdp = $_GET["mot_de_passe"];
            //Connexion à la bdd
            require_once('conf/connexion.php');
            try{
                $nom = "Hergé";
                $prenom = "Tintin";
                $mel = "tintin@moulinsart.com";
                $mdp = "secrettintin";
                //On fait une requête pour insérer notre utilisateur
                $requete = "INSERT INTO utilisateur(nom,prenom,mel,mot_de_passe) VALUES('".$nom."','".$prenom."','".$mel."','".$mdp."')";
                echo $requete;
                //Nombre d'insertion
                $nombreDeInsertion = $connexion->exec($requete);
                //On affiche le nombre d'insertion
                echo $nombreDeInsertion, "ligne(s) a (ont) été insérée(s)";
            }catch(Exception $e){
                echo "Une erreur est survenue lors de l'insertion.";
            }

        }
        ?>
    </body>
</html>