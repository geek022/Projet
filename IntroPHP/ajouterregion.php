<!DOCTYPE html>
<html>
<head>
<title>Résultat authentification</title>
</head>
<body>
<?php
if(isset($_GET['num']) && isset($_GET['nom'])){
    $num = $_GET['num'];
    $nom = $_GET['nom'];
    //CNX AUX BDD
    require_once('conf/connexion2.php');
    //Ma requête SQL
    $requete = $connexion2->prepare("INSERT INTO REGION(noregion,nomregion)VALUES(:num,:nom)");
    $requete->bindParam('num', $num);
    $requete->bindParam('nom', $nom);
    $requete->execute();
    while($res=$requete->fetch())
    {
        echo '<h1>', $res->noregion, ' ', $res->nomregion, '</h1>';
    }
}
?>
</body>
</html>