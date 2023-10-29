<html>
    <body>
       <?php
      
       if (isset($_GET["vitesse"]) && isset($_GET["lumiere"])){
        $vitesse_fusee = (float) $_GET["vitesse"];
        $vitesse_lumiere = (float) $_GET["lumiere"];
        $c = 300000;
        //Calcul de la dilatation du tem^s
        $duree_propre = $vitesse_lumiere;
        $duree_exterieure = $vitesse_lumiere / sqrt(1 - pow($vitesse_fusee,2) / pow($c,2));
        echo "Vitesse de la fusée : $vitesse_fusee km/s <br>";
        echo "Durée propre dans la fusée : $duree_propre seconde <br>";
        echo "Durée mesurée à l'extérieur : $duree_exterieure seconde <br>";
        $duree_sur_terre_seconde = $duree_exterieure;
        $duree_sur_terre_annees = $duree_sur_terre_seconde / (365 * 24 * 60 * 60);
        echo "Durée écoulée sur Terre : environ $duree_sur_terre_annees années<br>";
       }
       else{
        echo "Veuillez spécifier la vitesse de la fusée et la vitesse de la lumière.";
       }
       ?>
    </body>
</html>
