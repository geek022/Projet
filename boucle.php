<html>
    <body>
       résultat 
       <?php 
       $rang = $_GET["rang"];
       $valeurDepart = $_GET["valeur"];
       $valeurActu = $valeurDepart;
       echo "Rang 0 :$valeurActu";
       for($i = 0; $i <= $rang; $i++ ){
        $valeurActu /= 4 + 2;
        echo "Les rang : $valeurActu <br>";
       } ?>
    </body>
</html>