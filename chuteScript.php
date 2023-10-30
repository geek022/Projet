<html>
    <body>
        <head>
            <title>Chute libre</title>
        </head>
        <?php
        if (isset($_GET["g"]) && isset($_GET["t"])){
            $g = (float) $_GET["g"];
            $t_total = (float) $_GET["t"];
        //Création du tableau HTML
        echo "<table border='1'>";
        echo "<tr><th>Temps écoulé (s)</th><th>Vitesse acquise (m/s)</th></tr>";
        for ($t = 0;$t <= $t_total; $t++){
            //Calcul de la distance parcourue (y)
            $y = ($g * pow($t,2) / 2);
            //Calcul de la vitesse acquise (v)
            $v = $g * $t;
            echo "<tr><td>$t</td><td>$v</td></tr>";
        }
        echo "</table>";
        }else{
            echo "Veuillez spécifier le champ de pesanteur (g) et le temps total (t).";
        }
        ?>
    </body>
</html>