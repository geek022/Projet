<html>
    <body>
    <?php
// Connexion au serveur
require_once('conf/connexion.php');
// Suppression de données
try {
  /* En situation 'réelle' les variables ci-après
  seront généralement récupérées via un formulaire de saisie.
  On pourra directement utiliser, par exemple : $_POST['nom'] ... 
  */
  $nom = "Verse";
  $prenom = "Alain";
  $mel = "alain.verse@orange.fr";
  $mot_de_passe = "secretverse";
  $requete = "INSERT INTO utilisateur(nom, prenom, mel, mot_de_passe) VALUES('".$nom."','".$prenom."','".$mel."','".$mot_de_passe."')";
  echo $requete;
/* Notez bien : 
 - On insere pas dans le champ 'numero', celui-ci sera automatiquement renseigné par le MySQL (AUTO_INCREMENT)
 - les valeurs pour les champs de type chaine de caractères doivent être encadrées par des quotes (')
 - le echo $requete; n'est pas indispensable, mais très très fortement conseillé en phase de test : il permet de
  controler que notre requete sera correctement formée avant de demander son exécution, ci-après. 
  */
  $nombreDeInsertion = $connexion->exec($requete);
  // On affiche le nombre d'enregistrements supprimés
  echo $nombreDeInsertion, " ligne(s) a(ont) été insérée(s).";
} catch (Exception $e) {
  echo "Une erreur est survenue lors de l'insertion.";
}
?>
    </body>
</html>