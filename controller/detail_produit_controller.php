<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["pro_id"];
$requete = "SELECT * FROM produits JOIN categories ON pro_cat_id = cat_id WHERE pro_id=" . $pro_id;
$result = $db->query($requete);

$produit = $result->fetch(PDO::FETCH_OBJ);
$dateModif = new DateTime($produit->pro_d_modif);
$dateAjout = new DateTime($produit->pro_d_ajout);
//$row = $result->fetch(PDO::FETCH_OBJ); // afficher photo
// Renvoi de l'enregistrement sous forme d'un objet
?>