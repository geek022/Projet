<html>
<body>
<?php 
require_once('conf/connexion2.php');
$t = $_GET["noregion"];
$requete = $connexion2->prepare("SELECT P.nomplante, R.nomregion,R.noregion, P.noplante FROM PLANTE P INNER JOIN REGION R ON P.noregion=R.noregion WHERE R.noregion = $t");
$requete->execute();
echo '<table border=2>';
while($res = $requete->fetch(PDO::FETCH_OBJ)){
    echo "<tr>";
    echo "<td>" .$res->noplante."</td>";
    echo "<td>" .$res->nomplante."</td>";
    echo "</tr>";
}
echo '</table>';
?>
</body>
</html>