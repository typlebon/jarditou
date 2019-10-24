<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
$requete = "SELECT * FROM categories";
$result = $db->query($requete);
?>