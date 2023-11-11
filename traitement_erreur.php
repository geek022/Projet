<html>
    <body>
    <?php
if(!file_exists("welcome.txt")) { // Si le fichier n'existe pas
  die("File not found"); // l'exécution du script est stoppée
} else {
  $file=fopen("welcome.txt","r"); // Le fichier existe, on peut l'ouvrir, l’exécution du script se poursuit.
  echo "Le fichier existe !";
}
?>
    </body>
</html>