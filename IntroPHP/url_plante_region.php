<html>
<body>
<?php  // REGION d'origine d'une PLANTE
try {
    $dns = 'mysql:host=localhost;dbname=serres'; // dbname : nom de la base
    $utilisateur = 'root'; // root sur vos postes
    $motDePasse = ''; // pas de mot de passe sur vos postes
    $connection = new PDO( $dns, $utilisateur, $motDePasse );
  } catch (Exception $e) {
      echo "Connexion à MySQL impossible : ", $e->getMessage();
      die();
  }
echo "<h1>Cliquez sur le lien pour afficher le n° de la region d'origine de la plante</h1>";
$select = $connection->query("SELECT P.nomplante, R.nomregion,R.noregion,P.noplante FROM PLANTE P INNER JOIN REGION R ON P.noregion=R.noregion GROUP BY P.nomplante, R.nomregion,R.noregion,P.noplante");
$select->setFetchMode(PDO::FETCH_OBJ);
while($enregistrement = $select->fetch())
{
 echo "<a href='http://127.0.0.1/tpPHP/introPHP/detailPlante.php?noregion=".$enregistrement->noregion."'>".$enregistrement->nomplante.'</a><BR>';
}
?>
</body>
</html>