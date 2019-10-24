<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM categories";
// on selectionne tout les éléments dans la table categorie 
$result = $db->query($requete);
// query=Exécute une requête SQL, retourne un jeu de résultats
?>