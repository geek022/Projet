<html>
    <body>
    <form action="insererSerre.php" method = "GET">
        Numéro serre : <input type="text" name="noserre"><br>
        Nom serre : <input type="text" name="nomserre"><br>
        <input type="submit" value="Ajouter">
        </form>
    <?php
        if(isset($_GET['noserre']) && isset($_GET['nomserre'])){
        $noserre = $_GET['noserre'];
        $nomserre = $_GET['nomserre'];
        // Connexion au serveur
        require_once('connexion2.php');
        // Suppression de données
        try {
        $requete =$connexion2->prepare("INSERT INTO serre(noserre, nomserre)VALUES(:noserre, :nomserre)");
        $requete->bindParam(':noserre', $noserre);
        $requete->bindParam(':nomserre', $nomserre);
        $requete->execute();
        //On obtient le nombre de lignes affectés
        $nombreDeInsertion = $requete->rowCount();
        // On affiche le nombre d'enregistrements supprimés
        echo $nombreDeInsertion, " ligne(s) a(ont) été insérée(s).";
        
        } catch (Exception $e) {
        echo "Une erreur est survenue lors de l'insertion." .$e->getMessage();
        }
    }
        ?>
    </body>
</html>
