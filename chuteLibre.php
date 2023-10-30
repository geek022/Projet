<html>
    <body>
        <head>
            <title>Chute libre</title>
        </head>
        <?php
        if (isset($_GET["g"]) && isset($_GET["t"])){
            $g = (float) $_GET["g"];
            $t = (float) $_GET["t"];
            //Calcul de la distance parcourue
            $y = $g * pow($t,2) / 2;
            echo "Distance parcourue après $t secondes = $y m <br>";

            //Calcul de la vitesse acquise
            $v = $g * $t;
            echo "La vitesse acquise après $t secondes = $v m/s <br>";
        }else{
            echo "Veuillez spécifier le champ de pesanteur (g) et le temps (t).";
        }
        ?>
    </body>
</html>