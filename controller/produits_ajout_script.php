<?php
require "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions	
$db = connexionBase(); // Appel de la fonction de connexion
// d'abord écrire les varibale et après voir pour la concaténation
//tableau 
$erreur = array();
//LISTE DES REGEX POUR LE FORMULAIRE D'AJOUT
$regexRef = '/^[A-Za-z ÁÀÂÄÃÅÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝÆÇáàâäãåéèêëíìîïñóòôöõúùûüýÿæç\'0-9,\.\-\_]{1,10}+$/';
// mettre "/" pour avoir uniquement le caractère voulu
$regexLibelle = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-, .]+$/';
$regexDescription = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-, .]+$/';
$regexPrix = '/[0-9]{1,}[.,]{0,1}[0-9]{0,2}/';
$regexStock = '/^[0-9]{0,9}$/';
$regexCouleur = '/^[0-9-a-zA-Zàáâãäåçèéêëìíîïðòóôõöùúûüýÿ\-, .]+$/';


//REFERENCE
//Si la valeur du submit est présent 
//var_dump($_POST);
if (isset($_POST['submit']))
// Name sur le submit
{
    //REFERENCE
    if (!empty($_POST['ref']))
    //Si champs pas vide on enchaine sur l'autre if
    {
        if (preg_match($regexRef, $_POST['ref']))
        //Si la regex passe
        {
            $ref = htmlspecialchars($_POST['ref']);
            //htmlspecialchars= Convertit les caractères spéciaux en entités HTML
            //on affiche résultat
        } else {
            $erreur['ref'] = 'ref invalide';
            //Si regex ne passe pas message d'erreur
        }
    } else {
        $erreur['ref'] = 'champs vide';
        // si champ vide on affiche le message 
    }
    //LIBELLE
    if (!empty($_POST['libelle'])) {
        if (preg_match($regexLibelle, $_POST['libelle'])) {
            $libelle = htmlspecialchars($_POST['libelle']);
        } else {
            $erreur['libelle'] = 'libellé invalide';
        }
    } else {
        $erreur['libelle'] = 'champs vide';
    }
    //DESCRIPTIONQ
    if (!empty($_POST['description'])) {
        if (preg_match($regexDescription, $_POST['description'])) {
            $description = htmlspecialchars($_POST['description']);
        } else {
            $erreur['description'] = 'description invalide';
        }
    } else {
        $erreur['description'] = 'champs vide';
    }
    //PRIX
    if (!empty($_POST['prix'])) {
        if (preg_match($regexPrix, $_POST['prix'])) {
            $prix = htmlspecialchars($_POST['prix']);
        } else {
            $erreur['prix'] = 'prix invalide';
        }
    } else {
        $erreur['prix'] = 'champs vide';
    }
    //STOCK
    if (!empty($_POST['stock'])) {
        if (preg_match($regexStock, $_POST['stock'])) {
            $stock = htmlspecialchars($_POST['stock']);
        } else {
            $erreur['stock'] = 'stock invalide';
        }
    } else {
        $erreur['stock'] = 'champs vide';
    }
    //COULEUR
    if (!empty($_POST['couleur'])) {
        if (preg_match($regexCouleur, $_POST['couleur'])) {
            $couleur = htmlspecialchars($_POST['couleur']);
        } else {
            $erreur['couleur'] = 'couleur invalide';
        }
    } else {
        $erreur['couleur'] = 'champs vide';
    }

    //PHOTO
    // var_dump($_FILES);
    if ($_FILES["file"]["name"] != "") {
        //Si le champs est rempli >> vérification
        //var_dump($_FILES);
        //$_FILES appelle du fichier 
        // On met les types autorisés dans un tableau (ici pour une image)
        $aMimeTypes = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        // On extrait le type du fichier via l'extension FILE_INFO 
        $type = $_FILES["file"]["type"];
        //déclaration de variable pour le type 
        $tmp_name = $_FILES["file"]["tmp_name"];
        //déclaration de varibale pour tmp_name

        if (!in_array($type, $aMimeTypes))
        //Si dans le tableau vérification du type de fichier et des extensions
        {
            $erreur["file"] = "Fichier incorrect";
            //vérification du type de fichier, si incorrect erreur 
        } else {
            //TECHNIQUE ORIENTE OBJET
            //$info = new SplFileInfo($_FILES["file"]["name"]);
            //var_dump($info->getExtension());
            $file = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
            //var_dump($_FILES);
            //var_dump($file);
            //return $file;
        }
    }

    //VALIDATION FORMULAIRE 
    if (count($erreur) === 0) {
        //si tableau d'erreur est égal à 0
        //si tableau d'erreur est vide, on envoi le formulaire 
        $requete = "INSERT INTO produits (
                 pro_ref,
                 pro_cat_id,
                 pro_libelle,
                 pro_description,
                 pro_prix,
                 pro_stock,
                 pro_couleur,
                 pro_photo,
                 pro_d_ajout,
                 pro_bloque) 
                 VALUES(
                 :ref,
                 :cat,
                 :libelle,
                 :descr,
                 :prix,
                 :stock,
                 :couleur,
                 :photo,
                 NOW(),
                 :pro_bloque)";
        $result = $db->prepare($requete);
        // requête préparée
        $result->bindValue(":ref", $ref, PDO::PARAM_STR);
        $result->bindValue(":cat", $_POST["cat"], PDO::PARAM_INT);
        // PDO::PARAM_INT = obliagtion de mettre des nombre
        $result->bindValue(":libelle", $libelle, PDO::PARAM_STR);
        //PDO::PARAM_STR = obligation de mettre des "string"
        $result->bindValue(":descr", $description, PDO::PARAM_STR);
        $result->bindValue(":prix", $prix, PDO::PARAM_INT);
        $result->bindValue(":stock", $stock, PDO::PARAM_INT);
        $result->bindValue(":couleur", $couleur, PDO::PARAM_STR);
        $result->bindValue(":photo", $file, PDO::PARAM_STR);
        $result->bindValue(":pro_bloque", $_POST["pro_bloque"]);
        $result->execute();
        $result->closeCursor();

        move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/img/jarditou_photo/" . $db->lastInsertId() . "." . $file);

        header("Location: ../view/liste.php");
        //exit;
    }
    
}
