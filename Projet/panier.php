
<?php
session_start();
require_once('conf/connexion.php');
if($_SERVER['REQUEST_METHOD'] === 'post' && isset($_POST['nolivre'])){
    $livre = $_POST['nolvire'];
    if(isset($_SESSION['userid'])){
        $userid = $_SESSION['userid'];
        
        //Vérifier le nombre d'emprunts en cours
        $nbEmprunts = $connexion->prepare("SELECT COUNT(*) AS nombre FROM EMPRUNTER WHERE userid=:userid AND dateretour IS NULL");
        $nbEmprunts->bindParam(':userid',$userid);
        $nbEmprunts->execute();
        $resultatNbEmprunts=$nbEmprunts->fetch(PDO::FETCH_ASSOC);
        if($resultatNbEmprunts['nombre']<5){
            $insertPanier = $connexion->prepare("INSERT INTO PANIER(userid,nolivre) VALUES(:userid,:nolivre)");
            $insertPanier->bindParam(':userid',$userid);
            $insertPanier->bindParam(':nolivre',$livre);
            if($insertPanier->execute()){
                echo"Livre ajouté au panier";
            }else{
                die("Erreur : ".$insertPanier->errorInfo()[2]);
            }
        }else{
            echo"Vous avez déjà 5 emprunts en cours. Impossible d'ajouter plus de livres.";
        }
    }else{
        echo"Veuillez vous connecter pour ajouter des livres au panier.";
    }
}
?>