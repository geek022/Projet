<?php
session_start();
if(isset($_SESSION['profil']) && $_SESSION['profil'] == 'membre'){
    header('Location:accueil.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre - Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            require_once('conf/connexion.php');

            $afficherFormulaire = false;
            if(isset($_POST['ajouter'])){
                $afficherFormulaire = true;
            }
            // Si le formulaire d'ajout de livre est soumis
            if (isset($_POST['ajouter_livre'])) {
                $auteur = isset($_POST['auteur'])? $_POST['auteur'] : null;
                $titre = isset($_POST['titre'])? $_POST['titre'] : null;
                $isbn13 = isset($_POST['isbn13'])? $_POST['isbn13'] : null;
                $anneeparution = isset($_POST['anneeparution'])? $_POST['anneeparution'] : null;
                $resume = isset($_POST['resume'])? $_POST['resume'] : null;
                $dateajout = date('Y-m-d H:i:s');
                $image = isset($_POST['image']) ? $_POST['image'] : null;
            
                // Ajouter le livre à la base de données
                $requeteAjoutLivre = $connexion->prepare("INSERT INTO LIVRE (noauteur, titre, isbn13, anneeparution, resume,dateajout, image) VALUES (:noauteur,:titre, :isbn13, :anneeparution, :resume,:dateajout, :image)");
                $requeteAjoutLivre->bindParam(':noauteur', $auteur);
                $requeteAjoutLivre->bindParam(':titre', $titre);
                $requeteAjoutLivre->bindParam(':isbn13', $isbn13);
                $requeteAjoutLivre->bindParam(':anneeparution', $anneeparution);
                $requeteAjoutLivre->bindParam(':resume', $resume);
                $requeteAjoutLivre->bindParam(':dateajout',$dateajout);
                $requeteAjoutLivre->bindParam(':image', $image);
                if($requeteAjoutLivre->execute()){
                    echo '<p>Livre ajouté avec succès.</p>';
                } else {
                    echo '<p>Erreur lors de l\'ajout du livre.</p>';
                } 
            }
               
            ?>
            <div class="col-md-8">
                <h2>La Bibliothèque de Moulinsart est fermée au public jusqu'à nouvel ordre. Mais il vous est possible de réserver et retirer vos livres via notre service Biblio Drive !</h2>
                <div class="border p-3">
                    <form method="post">
                        <button type="submit" class="btn" name="ajouter">Ajouter un livre</button>
                        <a href="membre.php" class="btn" type="button" name="membre">Créer un membre</a>
                    </form>
                </div>
            </div>
            <div class="col-md-4 p-3 text-white align-content-lg-end text-end">
                <img src="formulaires/images3.png" alt="images3" style="max-width: 100%;">
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 d-flex justify-content-center text-center align-items-center">
                <div class="col-md-5">
                <h1 class="text-danger text-center">Ajouter un livre</h1>
                    <?php
                    if($afficherFormulaire){
                    ?>
                    <form method="post">
                        <div class="mb-3">
                            <label for="auteur" class="form-label">Auteur :</label>
                            <select class="form-select" name="auteur" required>
                                <?php
                                require_once('conf/connexion.php');
                                $requeteAuteurs = $connexion->query("SELECT * FROM auteur");
                                while ($auteur = $requeteAuteurs->fetch(PDO::FETCH_OBJ)) {
                                    echo "<option value='$auteur->noauteur'>$auteur->nom $auteur->prenom</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="titre" class="form-label">Titre :</label>
                            <input type="text" class="form-control" name="titre" required>
                        </div>
                        <div class="mb-3">
                            <label for="isbn13" class="form-label">ISBN13 :</label>
                            <input type="text" class="form-control" name="isbn13" required>
                        </div>
                        <div class="mb-3">
                            <label for="anneeparution" class="form-label">Année de parution :</label>
                            <input type="text" class="form-control" name="anneeparution" required>
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label">Résumé :</label>
                            <textarea class="form-control" rows="3" id="resume" name="resume" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image :</label>
                            <input type="text" class="form-control" name="image" required>
                        </div>
                        <input type="submit" class="btn btn-secondary" value="Ajouter" name="ajouter_livre">
                        <?php
                    }
                        ?>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php include_once('authentification.php') ?>
            </div>
        </div>
    </div>
</body>

</html>
