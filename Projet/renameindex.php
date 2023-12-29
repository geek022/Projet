<?php
    include("conf/connexion.php");
    if(isset($_POST["valider"])){
        $requete = $pdo->prepare("INSERT INTO images(nom,taille,type,bin)VALUES(?,?,?,?)");
        $requete->execute(array
        ($_FILES["image"]["name"],
         $_FILES["image"]["size"],
         $_FILES["image"]["type"],
         file_get_contents($_FILES["image"]["tmp_name"]
        )));
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="fo" method="POST" action="" enctype="multipart/form-data">
        <input type="file" name="image"/><br/>
        <input type="submit" name="valider" value="Charger"/>
    </form>
</body>
</html>