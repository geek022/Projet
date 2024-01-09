<?php
include_once('formulaires/entete.html');
session_start();
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
                <p class="text-primary text-center">(encore 1 réservation possible, 1 emprunt en cours)</p>
                <?php
                require_once('conf/connexion.php');
                if (isset($_POST['emprunter'])) {
                    if (isset($_SESSION['emprunter'])) {
                        if (isset($_SESSION['panier']) && count($_SESSION['panier']) < 5) {
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
                            }
                            array_push($_SESSION['panier'], $tableaux);
                        } else {
                            echo '<p class="text-danger">Vous avez atteint la limite d\'emprunts en cours (5).</p>';
                        }
                    }
                }
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
                    unset($_SESSION['panier'][$index]);
                }
                if (isset($_POST['panier'])) {
                    $connexion->beginTransaction();
                    try {
                        foreach ($_SESSION['panier'] as $livre) {
                            $stmt = $connexion->prepare("INSERT INTO EMPRUNTER (nolivre,dateemprunt) VALUES (:nolivre, NOW())");
                            $stmt->bindParam(":nolivre", $livre['nolivre']);
                            $stmt->execute();
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
            <div class="col-md-3 d-flex align-items-end text-end">
                <?php include_once('authentification.php') ?>
            </div>
        </div>
</body>
</html>