<html>
    <body>
        
<?php
// On se  connecte, voir code du fichier connexion.php ci-dessus
require_once('conf/connexion.php'); // once : le fichier ne peut être inclus qu'une fois
// Envoi de la requête vers MySQL
$select = $connexion->query("SELECT * FROM utilisateur");
// Les résultats retournés par la requête seront traités en 'mode' objet
$select->setFetchMode(PDO::FETCH_OBJ);
// Parcours des enregistrements retournés par la requête : premier, deuxième…
while($enregistrement = $select->fetch())
{
  // Affichage des champs nom et prenom de la table 'utilisateur'
  echo '<h1>', $enregistrement->nom, ' ', $enregistrement->prenom, '</h1>';
}
?>
    </body>
</html>