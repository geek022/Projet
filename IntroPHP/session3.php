<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>
<?php
// Pour changer la valeur d'une variable de session une simple affectation suffit
/*$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);'*/
unset($_SESSION["favcolor"]); // suppression de la variable de session "favcolor"
session_unset(); // suppression de toutes les variables de session
// destruction de la session
session_destroy();
?>
</body>
</html>