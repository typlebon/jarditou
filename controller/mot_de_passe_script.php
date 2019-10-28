<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion

//définition des regexs
$mailRegex = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

// définition du tableau d'erreur
$erreur = array();

if (isset($_POST['submit'])) {
    // isset — Détermine si une variable est déclarée et est différente de NULL
    // verif nom
    if (!empty($_POST['mail'])) {
        var_dump($_POST['mail']);
        if (preg_match($mailRegex, $_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
            $test_mail1 = "SELECT mail from users where mail=:mail";
            $test_mail = $db->prepare($test_mail1);
            // préparation de la requete 

            $test_mail->bindValue(":mail", $mail, PDO::PARAM_STR);
            // bindValue — Associe une valeur à un paramètre 
            $test_mail->execute(); // exécution de la requête 
            // conditon pour vérifier existence du mail dans la base de donnée
            $result = $test_mail->fetch(PDO::FETCH_OBJ);
            var_dump($result);
            if (!$result) {
                $erreur["mail"] = "mail inconnu";
            }



            //si le mail existe dans la base de données 
            // alors on lui envoi un message sur sa boite mail
            else {
                $destinataire = $mail;
                // récuperer le mail de la base de données 
                $objet = "Mot de passe en cours de réinitialisation";
                $message = "Veuillez cliquer sur le lien : http://localhost/Bonjour/TEST_PHP_JARDITOU/view/mdp_reinit.php?mail=" . $_POST["mail"];
                mail($destinataire, $objet, $message);
                header("Location: ../view/Jarditou-officiel.php");
                exit;
            }
        } else {
            $erreur['mail'] = 'mail invalide';
            var_dump($erreur);
        }
        // requête pour tester si le mail existe dans la base de données 


        //      $date1 = "UPDATE users SET derniere_connexion = NOW() WHERE mail=:mail";
        //      $date = $db->prepare($date1);
        //      // préparation de la requete 
        //      $date->bindValue(":mail", $mail, PDO::PARAM_STR);
        //      // bindValue — Associe une valeur à un paramètre 
        //      $date->execute(); // exécution de la requête 

    } else {
        $erreur['mail'] = 'mail absent';
    }
}
