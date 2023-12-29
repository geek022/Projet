<html>
    <body>
        <?php
        if(isset($_GET["txtDividende"]) && isset($_GET["txtDiviseur"])){
            $txtDividende = (float)  $_GET["txtDividende"];
            $txtDiviseur = (float)  $_GET["txtDiviseur"];

            //Calcul du quotient
            $quotient = $txtDividende / $txtDiviseur;
            echo "Quotien = $quotient";
        }
        else{
            echo "Erreur detectée";
        }
        ?>
    </body>
</html>