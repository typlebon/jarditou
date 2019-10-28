<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion

//définition des regexs
$passwordRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';

// définition du tableau d'erreur
$erreur = array();

if (isset($_POST['submit'])) {
   // isset — Détermine si une variable est déclarée et est différente de NULL
   // vérification mdp
   if (!empty($_POST['password'])) {
      if (preg_match($passwordRegex, $_POST['password'])) {
         $password = htmlspecialchars($_POST['password']);
         //password_hash — Crée une clé de hachage pour un mot de passe
      } else {
         $erreur['password'] = 'password invalide';
      }
   } else {
      $erreur['password'] = 'password absent';
   }
   if (!empty($_POST['password2'])) {
      if (preg_match($passwordRegex, $_POST['password2'])) {
         $password2 = htmlspecialchars($_POST['password2']);
         //password_hash — Crée une clé de hachage pour un mot de passe
      } else {
         $erreur['password2'] = 'password invalide';
      }
      // test pour voir si les deux mots de passe correspondent 
      if ($password === $password2) {
         $password = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
         $password2 = password_hash(htmlspecialchars($password2), PASSWORD_DEFAULT); 
      } else {
         $erreur["password2"] = "Les deux mots ne sont pas identiques";
      }
} else {
      $erreur['password2'] = 'Deuxième mot de passe obligatoire';
   }
   if (count($erreur) === 0) {
      //si tableau d'erreur est vide, on envoi le formulaire 
      $requete = "UPDATE users SET mdp=:mdp WHERE mail=:mail";
      $result = $db->prepare($requete);
      // requête préparée
      $result->bindValue(":mdp", $password, PDO::PARAM_STR);
      $result->bindValue(":mail", $_GET["mail"], PDO::PARAM_STR);
      $result->execute();

      $requete2 = "UPDATE users SET tentatives=0 WHERE mail=:mail";
      $result2 = $db->prepare($requete2);
      // requête préparée
      $result2->bindValue(":mail", $_GET["mail"], PDO::PARAM_STR);
      $result2->execute();
      header("Location: ../view/Jarditou-officiel.php");
       
   }
}

