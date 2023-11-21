<!DOCTYPE html>
<html>
<head>
<title>Résultat authentification</title>
</head>
<body>
<?php
if(isset($_GET['txtNom']) && isset($_GET['txtPrenom']) && isset($_GET['mel']) && isset($_GET['mot_de_passe'])){
    $nom = $_GET['txtNom'];
    $prenom = $_GET['txtPrenom'];
    $mel = $_GET['mel'];
    $mdp = $_GET['mot_de_passe'];
    // On se connecte à la base de donnée
    require_once('conf/connexion.php');
    try{
    $requete = $connexion->prepare("INSERT INTO utilisateur(nom,prenom,mel,mot_de_passe) VALUES('".$nom."','".$prenom."','".$mel."','".$mdp."')");
    $requete->bindParam(':nom',$nom);
    $requete->bindParam(':prenom',$prenom);
    $requete->bindParam(':mel',$mel);
    $requete->bindParam(':mot_de_passe',$mdp);
    $requete->execute();
    echo $requete;
    //Nombre d'insertion
    $nombreDeInsertion = $connexion->exec($requete);
    //On affiche le nombre d'insertion
    echo "Insertion réussie", $nombreDeInsertion, "ligne(s) a (ont) été insérée(s)";
    }catch(Exception $e){
        echo "Une erreur est survenue lors de l'insertion.";
    }
}
?>
</body>
</html>