<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM produits ORDER BY pro_id DESC";

$result = $db->query($requete);  //récuperer base de données 
if (!$result) {
  $tableauErreurs = $db->errorInfo();
  echo $tableauErreur[2];
  die("Erreur dans la requête");
}

if ($result->rowCount() == 0) {
  // Pas d'enregistrement	
  die("La table est vide");
} ?>
