<?php   	
     require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
     $db = connexionBase(); // Appel de la fonction de connexion
     // d'abord écrire les varibale et après voir pour la concaténation
     $requete = 
    "DELETE FROM produits WHERE pro_id=:pro_id";
// var_dump($requete);
$result=$db->prepare($requete);
$result->bindValue(":pro_id", $_GET["pro_id"], PDO::PARAM_INT);
$result->execute();

header("Location: ../view/liste.php");
exit;
