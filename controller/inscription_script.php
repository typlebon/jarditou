<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
//$_SESSION["login"] = "webmaster";	
//$_SESSION["role"] = "admin";
//$_SESSION["name"] = "Typhanie"; 
//$_SESSION['password'] = "motdepasse"; 


//définition des regexs
$nomRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]*$/';
$prenomRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]*$/';
$loginRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáyàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';
$passwordRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';
$pseudoRegex = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';
$mailRegex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

// définition du tableau d'erreur
$erreur = array();
 
//vérification des users existants ou non dans le formulaire
// $verifPseudo1 = "select pseudo from users";
// $verifPseudo = $db->prepare ($verifPseudo1);
// $verifPseudo ->execute ();
// $verifPseudo = $verifPseudo -> fetch(PDO::FETCH_OBJ); 

if (isset($_POST['submit'])) {
   // isset — Détermine si une variable est déclarée et est différente de NULL
   // verif nom
   if (!empty($_POST['nom'])) {
      if (preg_match($nomRegex, $_POST['nom'])) {
         $nom = htmlspecialchars($_POST['nom']);
      } else {
         $erreur['nom'] = 'nom invalide';
      }
   } else {
      $erreur['nom'] = 'nom absent';
   }
   //verif prénom
   if (!empty($_POST['prenom'])) {
      if (preg_match($prenomRegex, $_POST['prenom'])) {
         $prenom = htmlspecialchars($_POST['prenom']);
      } else {
         $erreur['prenom'] = 'prenom invalide';
      }
   } else {
      $erreur['prenom'] = 'prenom absent';
   }
   // verif pseudo
   if (!empty($_POST['pseudo'])) {
      if (preg_match($pseudoRegex, $_POST['pseudo'])) {
         $pseudo = htmlspecialchars($_POST['pseudo']);
      } else {
         $erreur['pseudo'] = 'pseudo invalide';
      }
   // if ($pseudo === $verifPseudo -> pseudo) {
   //    $erreur["pseudo"]= "Ce pseudo existe déjà";
   // }
   } else {
      $erreur['pseudo'] = 'pseudo absent';
   }
   // verif mail
   if (!empty($_POST['mail'])) {
      if (preg_match($mailRegex, $_POST['mail'])) {
         $mail = htmlspecialchars($_POST['mail']);
      } else {
         $erreur['mail'] = 'mail invalide';
      }
   } else {
      $erreur['mail'] = 'mail absent';
   }
   // vérification login 
   if (!empty($_POST['login'])) {
      //empty — Détermine si une variable est vide
      if (preg_match($loginRegex, $_POST['login'])) {
         // preg_match — Effectue une recherche de correspondance avec une expression rationnelle standard
         // test si le login passe la regex
         $login = htmlspecialchars($_POST['login']);
      } else {
         $erreur['login'] = 'login invalide';
         // Si login ne passe pas la regex un message d'erreur s'affiche 
      }
   } else {
      $erreur['login'] = 'login absent';
   }
   // Si aucun login n'est rentré, un message d'erreur s'affiche
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
      //       $_SESSION["nom"] = $nom;
      //       $_SESSION["prenom"] = $prenom;
      //       $_SESSION["mail"] = $mail;
      //       $_SESSION['login'] = $login;
      //       $_SESSION["pseudo"] = $pseudo;
      //       $_SESSION['password'] = $password;
      //si tableau d'erreur est vide, on envoi le formulaire 
      $requete = "INSERT INTO users (
      nom,
      prenom,
      pseudo,
      mail,
      identifiant,
      mdp,
      inscription) 
      VALUES(
      :nom,
      :prenom,
      :pseudo,
      :mail,
      :identifiant,
      :mdp,
      NOW())";

      $result = $db->prepare($requete);
      // requête préparée
      $result->bindValue(":nom", $nom, PDO::PARAM_STR);
      $result->bindValue(":prenom", $prenom, PDO::PARAM_STR);
      // PDO::PARAM_INT = obliagtion de mettre des nombre
      $result->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
      //PDO::PARAM_STR = obligation de mettre des "string"
      $result->bindValue(":mail", $mail, PDO::PARAM_STR);
      $result->bindValue(":identifiant", $login, PDO::PARAM_STR);
      $result->bindValue(":mdp", $password, PDO::PARAM_STR);
      $result->execute();
      header("Location: ../view/Jarditou-officiel.php?inscription_success=1");
       
   }
}

