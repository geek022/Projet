<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Se connecter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
  require_once('conf/connexion.php');
  if(!isset($_SESSION['connecte'])){
    $_SESSION['connecte'] = false;
  }
  if ($_SESSION['connecte'] === true) {
    echo '<div class="card solid text-center" style="border:2px solid #000;">';
    echo '' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . ' <br>';
    echo $_SESSION['mel'] . "<br>";
    echo $_SESSION['adresse'] . "<br>";
    echo '' .$_SESSION['codepostal'].' ' .$_SESSION['ville'];
    echo '<form method="post">
    <input type="submit" class="btn btn-outline-secondary" value="Se déconnecter" name="deco">
    </form>';
    echo'</div>';
    if(isset($_POST['deco'])){
      session_destroy();
      header("Location:accueil.php");
      exit;
    }
  } else {
    if (isset($_POST['btn'])) {
      $mail = $_POST['email'];
      $requete = $connexion->prepare("SELECT * FROM UTILISATEUR WHERE mel=:email");
      $requete->bindParam(":email", $mail);
      $requete->execute();
      $resultat = $requete->fetch(PDO::FETCH_OBJ);
      if ($resultat->motdepasse == $_POST['mdp']) {
        $_SESSION['mel'] = $resultat->mel;
        $_SESSION['nom'] = $resultat->nom;
        $_SESSION['prenom'] = $resultat->prenom;
        $_SESSION['adresse'] = $resultat->adresse;
        $_SESSION['codepostal'] = $resultat->codepostal;
        $_SESSION['ville'] = $resultat->ville;
        $_SESSION['profil'] = $resultat->profil;
        $_SESSION['connecte'] = true;
        header("Location:accueil.php");
      } else {
        echo '<p>Vous êtes déconnecté</p>';
        $_SESSION['connecte'] = false;
      }
    } else {
      echo '<div class="card solid" style="border:2px solid #000;">';
      echo '<div class="card-body">';
      echo '<p class="text-center">Se connecter</p>';
      echo '<form method="post">';
      echo '<div class="card-body text-center">';
      echo '<label for="email">Identifiant</label>';
      echo '<input type="email" class="form-control solid" style="border:2px solid #000;" id="email" placeholder="Enter email" name="email">';
      echo '</div>';
      echo '<div class="card-body text-center">';
      echo '<label for="pwd">Mot de passe</label>';
      echo '<input type="password" class="form-control solid" style="border:2px solid #000;" id="pwd" placeholder="Enter password" name="mdp">';
      echo '</div>';
      echo '<div class="card-body text-center">';
      echo '<button type="submit" class="btn btn-outline-secondary solid" style="border:2px solid #000;" name="btn">Connexion</button>';
      echo '</div>';
      echo '</form>';
      echo '</div>';
      echo '</div>';
    }
  }

  ?>
</body>

</html>