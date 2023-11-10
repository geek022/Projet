<html>

<body>

 

<?php

 

if(!isset($_POST['btnEnvoyer'])) {
    /* L'entrée btnEnvoyer est vide = le formulaire n'a pas été posté, on affiche le formulaire */

    echo '

    <form action="" method="post">

    Nom : <input type="text" name="txtNom"><br>

    Mél : <input type="text" name="txtMel"><br>

    <input type="submit" name="btnEnvoyer" value="Envoyer" >

    </form>';

}

else 

/* L'utilisateur a cliqué sur Envoyer, l'entrée btnEnvoyer <> vide, on traite le formulaire */

{    echo "Bonjour : ".$_POST["txtNom"]."<br>";

     echo "Votre mél est : ".$_POST["txtMel"]; 

}

?>

</body>

</html>