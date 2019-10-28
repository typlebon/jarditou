<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
//$_SESSION["login"] = "webmaster";	
//$_SESSION["role"] = "admin";
//$_SESSION["name"] = "Typhanie"; 
//$_SESSION['password'] = "motdepasse"; 


//définition des regexs
$passwordRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';
$mailRegex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

// définition du tableau d'erreur
$erreur = array();

if (isset($_POST['submit'])) {
   // isset — Détermine si une variable est déclarée et est différente de NULL
   // verif nom
   if (!empty($_POST['mail'])) {
      if (preg_match($mailRegex, $_POST['mail'])) {
         $mail = htmlspecialchars($_POST['mail']);
      } else {
         $erreur['mail'] = 'mail invalide';
      }
   } else {
      $erreur['mail'] = 'mail absent';
   }
   //verif mdp
   if (!empty($_POST['mdp'])) {
      if (preg_match($passwordRegex, $_POST['mdp'])) {
         $mdp = htmlspecialchars($_POST['mdp']);
      } else {
         $erreur['mdp'] = 'mot de passe invalide';
      }
   } else {
      $erreur['mdp'] = 'mot de passe absent';
   }

   if (count($erreur) === 0) {
      $requete = "select * from users where mail=:mail";
      $connexion = $db->prepare($requete);
      // préparation de la requete 
      $connexion->bindValue(":mail", $mail, PDO::PARAM_STR);
      // bindValue — Associe une valeur à un paramètre 
      $connexion->execute(); // exécution de la requête 
      $result = $connexion->fetch(PDO::FETCH_OBJ); // retourne valeur de $connexion sous forme d'objet 
      $mdptest = password_verify($mdp, $result->mdp);
      // password_verify = Vérifie qu'un mot de passe correspond à un hachage

      if ($mdptest) {
         $_SESSION["nom"] = $result->nom;
         // définition des variables des sessions 
         $_SESSION["prenom"] = $result->prenom;
         $_SESSION["pseudo"] = $result->pseudo;
         $_SESSION["mail"] = $mail;
         $_SESSION["id"] = $result->users_id;
         $_SESSION["identifiant"] = $result->identifiant;
         $_SESSION["inscription"] = $result->inscription;
         $_SESSION["role"] = $result->Role;
         // requête permettant de récupére la date de la dernière connexion


         $date1 = "UPDATE users SET derniere_connexion = NOW() WHERE mail=:mail";
         $date = $db->prepare($date1);
         // préparation de la requete 
         $date->bindValue(":mail", $mail, PDO::PARAM_STR);
         // bindValue — Associe une valeur à un paramètre 
         $date->execute(); // exécution de la requête 

         header("Location: ../view/Jarditou-officiel.php");
         exit;
      } else {
         if ($result->tentatives < 3) {
            echo "Mot de passe incorrect (attention 3 tentatives maximum!)";
            $result->tentatives += 1;
            // si la connexion ne se fait pas, enregistre le nombre de tentatives de mot de passe
            $date1 = "UPDATE users SET tentatives= $result->tentatives WHERE mail=:mail";
            $date = $db->prepare($date1);
            // préparation de la requete 
            $date->bindValue(":mail", $mail, PDO::PARAM_STR);
            // bindValue — Associe une valeur à un paramètre 
            $date->execute(); // exécution de la requête 
         } else {
            header("Location: ../view/compte_bloque.php");
            exit;
         }
      }
   }
}
