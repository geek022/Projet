<html>
<body>
</body>
<?php
// On se  connecte, voir code du fichier connexion.php ci-dessus
require_once('connexion2.php'); // once : le fichier ne peut être inclus qu'une fois
// Envoi de la requête vers MySQL
$select = $connexion2->query("SELECT * FROM SERRE");
// Les résultats retournés par la requête seront traités en 'mode' objet
$select->setFetchMode(PDO::FETCH_OBJ);
// Parcours des enregistrements retournés par la requête : premier, deuxième…
echo '<table border=2>';
echo "<tr><th>noserre</th><th>nomserre</th></tr>";
while($enregistrement = $select->fetch())
{
  // Affichage des champs noserre et nomserre'
  echo "<tr><td>$enregistrement->noserre</td><td>$enregistrement->nomserre</td></tr>";
  //echo '<h1>', $enregistrement->noserre, ' ', $enregistrement->nomserre, '</h1>';
}
echo '</table>';

?>
</html>
