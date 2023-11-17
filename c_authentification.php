<!DOCTYPE html>
<html>
<head>
<title>Résultat authentification</title>
</head>
<body>
<?php
// On se connecte
require_once('conf/connexion.php');
$mel = $_POST['mel'];
$mot_de_passe = $_POST['mot_de_passe'];
$requete = "SELECT numero FROM utilisateur WHERE mel='".$mel."' AND mot_de_passe = '".$mot_de_passe."'";
echo $requete;
// Envoi de la requête vers MySQL
$select = $connexion->query($requete);
// Les résultats retournés par la requête seront traités en 'mode' objet
$select->setFetchMode(PDO::FETCH_OBJ);
// Traitement d'un seul résultat
$enregistrement = $select->fetch();
if ($enregistrement) {// si $enregistrement n'est pas vide = on a trouvé quelque chose -> on est connecté
  echo '<h1>Connexion réussie !</h1>';
} 
else {// La requête n'a pas retournée de résultat, on a pas trouvé de ligne correspondant au mel et mot de passe
  echo "Echec à la connexion.";
}
?>
</body>
</html>