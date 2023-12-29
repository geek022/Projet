<html>
    <body>
        <?php
        //On vérifie si les paramètres existent
        if(isset($_POST["txtNom"]) && isset($_POST["txtPrenom"])&& isset($_POST["email"]) && isset($_POST["mot_de_passe"])){
            $nom = $_POST["txtNom"];
            $prenom = $_POST["txtPrenom"];
            $mel = $_POST["email"];
            $mdp = $_POST["mot_de_passe"];
            //Connexion à la bdd
            require_once('conf/connexion.php');
            try{
                /*
                $nom = "Hergé";
                $prenom = "Tintin";
                $mel = "tintin@moulinsart.com";
                $mdp = "blablabla";
                */
                //On fait une requête pour insérer notre utilisateur
                $requete = $connexion->prepare("INSERT INTO utilisateur(nom,prenom,mel,mot_de_passe) VALUES(?,?,?,?)");
                $requete->execute([$nom,$prenom,$mel,$mdp]);
                //Nombre d'insertion
                $nombreDeInsertion = $requete->rowCount();
                //On affiche le nombre d'insertion
                echo $nombreDeInsertion, "ligne(s) a (ont) été insérée(s)";
            }catch(Exception $e){
                echo "Une erreur est survenue lors de l'insertion :" . $e->getMessage();
            }
        }
        ?>
    </body>
</html>