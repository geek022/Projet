<?php
include_once('formulaires/entete.html');
session_start();
if (!isset($_SESSION['panier']) || !is_array($_SESSION['panier'])) {
    $_SESSION['panier'] = array();
}
$nombreEmpruntsMax = 5 ;
$empruntsEncours = $nombreEmpruntsMax - count($_SESSION['panier']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Panier</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center text-success">Votre panier </h1><br />
                <?php
                if($empruntsEncours == 1){
                    echo'<p class="text-primary text-center">(encore 1 réservation possible, ' . $empruntsEncours . ' emprunt en cours)</p>';
                }else{
                    echo'<p class="text-primary text-center">(encore ' . $empruntsEncours . ' réservation possibles, ' . $empruntsEncours . ' emprunts en cours)</p>';
                }
                ?>
                <?php
                require_once('conf/connexion.php');
                if (isset($_POST['emprunter'])) {
                    if (isset($_SESSION['emprunter'])) {
                        if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {
                            if($empruntsEncours > 0){
                            $requete = $connexion->prepare("SELECT * FROM LIVRE WHERE nolivre =:emprunter ");
                            $requete->bindParam(":emprunter", $_SESSION['emprunter']);
                            $requete->execute();
                            $resultat = $requete->fetch(PDO::FETCH_OBJ);
                            $tableaux = array(
                                'nolivre' => $resultat->nolivre,
                                'noauteur' => $resultat->noauteur,
                                'Titre' => $resultat->titre,
                                'ISBN13' => $resultat->isbn13,
                                'Annee de parution' => $resultat->anneeparution,
                                'Résumé' => $resultat->resume,
                                "Date d'ajout" => $resultat->dateajout,
                                'Image' => $resultat->image,
                            );
                            if (!isset($_SESSION['panier'])) {
                                $_SESSION['panier'] = array();
                            }if(!in_array($tableaux, $_SESSION['panier'])){
                                array_push($_SESSION["panier"],$tableaux);
                                $empruntsEncours--;
                            }else{
                                echo'<p class="text-danger text-center">Ce livre existe déja dans votre panier</p>';
                            }
                        } else {
                            echo '<p class="text-danger text-center">Vous avez atteint la limite d\'emprunts en cours (5).</p>';
                        }
                    }
                }
            }
                $livre = null;
                foreach ($_SESSION['panier'] as $index => $livre) {
                    $requete = $connexion->prepare("SELECT * FROM LIVRE L INNER JOIN AUTEUR A ON (L.noauteur=A.noauteur) WHERE a.noauteur=:livre");
                    $requete->bindParam(":livre", $livre['noauteur']);
                    $requete->execute();
                    echo '<div class="d-flex justify-content-center mb-2">';
                    $res = $requete->fetch(PDO::FETCH_OBJ);
                    echo '<div class="d-flex">';
                    echo '<p>' . $res->nom . "-" . $res->prenom . " (" . $res->anneeparution . ")" . '</p>';
                    echo '<form method="post" action="panier.php">';
                    echo '<input type="submit" class="ms-2" value="Annuler" name="annuler">';
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                }
                if (isset($_POST['annuler'])) {
                    $index = array_search($livre,$_SESSION['panier']);
                    if($index !== false){
                        unset($_SESSION['panier'][$index]);
                        $empruntsEncours++;
                    }
                }
                if (isset($_POST['panier'])) {
                    $connexion->beginTransaction();
                    try {
                        foreach ($_SESSION['panier'] as $livre) {
                            $stmt = $connexion->prepare("INSERT INTO EMPRUNTER (mel,nolivre,dateemprunt) VALUES (:mel,:nolivre, NOW())");
                            $stmt->bindParam(":mel",$_SESSION['mel']);
                            $stmt->bindParam(":nolivre", $livre['nolivre']);
                            if(!$stmt->execute()){
                                throw new Exception('Erreur lors de l\'insertion du livre');
                            }
                        }
                        $connexion->commit();
                        $_SESSION['panier'] = array();
                        echo '<p class="text-success">Le panier a été validé avec succès.</p>';
                    } catch (Exception $e) {
                        $connexion->rollBack();
                        echo '<p class="text-danger">Une erreur est survenue lors de la validation du panier.</p>';
                    }
                    header('Location:panier.php');
                    exit();
                }
                ?>
                <div class="col-md-12 d-flex justify-content-center text-center align-items-center">
                    <div class="col-md-9">
                        <form action="panier.php" method="POST">
                            <input type="submit" value="Valider le panier" name="panier">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3 float-end">
                <?php include_once('authentification.php') ?>
            </div>
        </div>
</body>
</html>