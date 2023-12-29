

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
 if(isset($_POST['btn'])){
  $mail = $_POST['email'];
  $requete = $connexion->prepare("SELECT * FROM UTILISATEUR WHERE mel=:email");
  $requete->bindParam(":email", $mail);
  $requete->execute();
  $resultat = $requete->fetch(PDO::FETCH_OBJ);
  if($resultat->motdepasse == $_POST['mdp']){
    echo ''.$resultat->nom.' '.$resultat->prenom.' <br>';
    echo "$resultat->mel <br>";
    echo "$resultat->adresse <br>";

  }
  else{
    echo'<p>Vous êtes déconnecté</p>';
  }
 }
 else{
  echo '<div class="card">';
  echo '<div class="card-body">';
  echo '<p class="text-center">Se connecter</p>';
  echo '<form method="post">';
    echo '<div class="card-body text-center">';
      echo '<label for="email">Identifiant</label>';
      echo '<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">';
    echo '</div>';
    echo '<div class="card-body text-center">';
      echo '<label for="pwd">Mot de passe</label>';
      echo '<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="mdp">';
    echo '</div>';
    echo '<div class="card-body text-center">';
    echo '<button type="submit" class="btn btn-primary" name="btn">Connexion</button>';
    echo '</div>';
  echo '</form>';
  echo '</div>';
echo '</div>';
 }
?>
</body>
</html>