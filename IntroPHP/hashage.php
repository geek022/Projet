<html>
<body>

<?php
// Création du mot de passe, hash et stockage dans la BDD (stockage non codé ici)

$argon2i_a_inserer_dans_bdd = password_hash('secretmartin', PASSWORD_ARGON2I);

echo 'Argon2i hash: '. $argon2i_a_inserer_dans_bdd;

 

// hash généré ci-dessus et normalement extrait de la BDD

$hash_recup='$argon2i$v=19$m=65536,t=4,p=1$U2UubU5WQ1pzV0lmMnF6Lw$Vn9/2Il47AqWkLdOHZfNVAeZbFFloaSY6RRybfAlxOo';

$mdp_saisi = 'secretmartin'; // mot de passe saisi à l'authentification

if (password_verify($mdp_saisi, $hash_recup)) {

    echo 'Le mot de passe est valide !';

} else {

    echo 'Le mot de passe est invalide.';

}

 
?>
</form>
</body>
</html>