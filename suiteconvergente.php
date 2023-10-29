<html>
    <body>
       <?php 
       if (isset($_GET["rang"]) && isset($_GET["valeurDepart"])){
        $rang = (int) $_GET["rang"];
        $valeurDepart = (float) $_GET["valeurDepart"];
        echo "Rang du terme de départ : U0 = $valeurDepart <br>";
        $un = $valeurDepart ;
        for ($i = 1; $i <= $rang; $i++){
            $un = $un / 4 + 2;
            echo "Valeur pour le rang $i : U$i = $un <br>";
        }
       }else{
        echo "Veuillez spécifier le rang du terme à calculer et la valeur de départ.";
       }
       ?>
    </body>
</html>



