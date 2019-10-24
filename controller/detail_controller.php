<?php
include "connexion_bdd.php";

//REQUETE POUR LE DETAIL DES PRODUITS
$db = connexionBase(); // Appel de la fonction de connexion
$pro_id = $_GET["pro_id"];
$requete = "SELECT * FROM produits WHERE pro_id=:pro_id";
// selectionne tout les éléments de la table produit en fonction de leur ID
$result = $db->prepare($requete);
// requête préparé
$result->bindValue(":pro_id", $_GET["pro_id"], PDO::PARAM_INT);
//bindValue — Associe une valeur à un paramètre 
$result->execute();
//obligatoire pour requête préparé

//REQUETE POUR MODIFICATION DE L'HEURE EN FRANCAIS
$produit = $result->fetch(PDO::FETCH_OBJ);
$dateModif = new DateTime($produit->pro_d_modif); // définition de la variable de la date de modif
$dateAjout = new DateTime($produit->pro_d_ajout); // définition de la variable de la date d'ajout

//REQUETE POUR LA CATEGORIE 
$requete = "SELECT * FROM categories ORDER BY cat_nom";
$result = $db->query($requete);
$categories = $result->fetchAll(PDO::FETCH_OBJ);
// fetchAll = récuperer toutes les catégories
//aller chercher les produits 


//TABLEAU D'ERREUR
$erreur = array();
//DECLARATION DES REGEX
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
// submit correspond au name dans le formulaire 
{
    //REFERENCE
    if (!empty($_POST['pro_ref']))
    //Si champs n'est pas vide on enchaine sur l'autre if
    {
        if (preg_match($regexRef, $_POST['pro_ref']))
        //Si la regex passe
        {
            $pro_ref = htmlspecialchars($_POST['pro_ref']);
            //htmlspecialchars= Convertit les caractères spéciaux en entités HTML
            //on affiche résultat
        } else {
            $erreur['pro_ref'] = 'ref invalide';
            //Si regex ne passe pas message d'erreur
        }
    } else {
        $erreur['pro_ref'] = 'champs vide';
        // si champ vide on affiche le message 
    }
    //LIBELLE
    if (!empty($_POST['pro_libelle'])) {
        if (preg_match($regexLibelle, $_POST['pro_libelle'])) {
            $pro_libelle = htmlspecialchars($_POST['pro_libelle']);
        } else {
            $erreur['pro_libelle'] = 'libellé invalide';
        }
    } else {
        $erreur['pro_libelle'] = 'champs vide';
    }
    //DESCRIPTIONQ
    if (!empty($_POST['pro_description'])) {
        if (preg_match($regexDescription, $_POST['pro_description'])) {
            $pro_description = htmlspecialchars($_POST['pro_description']);
        } else {
            $erreur['pro_description'] = 'description invalide';
        }
    } else {
        $erreur['pro_description'] = 'champs vide';
    }
    //PRIX
    if (!empty($_POST['pro_prix'])) {
        if (preg_match($regexPrix, $_POST['pro_prix'])) {
            $pro_prix = htmlspecialchars($_POST['pro_prix']);
        } else {
            $erreur['pro_prix'] = 'prix invalide';
        }
    } else {
        $erreur['pro_prix'] = 'champs vide';
    }
    //STOCK
    if (!empty($_POST['pro_stock'])) {
        if (preg_match($regexStock, $_POST['pro_stock'])) {
            $pro_stock = htmlspecialchars($_POST['pro_stock']);
        } else {
            $erreur['pro_stock'] = 'stock invalide';
        }
    } else {
        $erreur['pro_stock'] = 'champs vide';
    }
    //COULEUR
    if (!empty($_POST['pro_couleur'])) {
        if (preg_match($regexCouleur, $_POST['pro_couleur'])) {
            $pro_couleur = htmlspecialchars($_POST['pro_couleur']);
        } else {
            $erreur['pro_couleur'] = 'couleur invalide';
        }
    } else {
        $erreur['pro_couleur'] = 'champs vide';
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
            var_dump($_FILES);
            var_dump($file);
            //return $file;
        }
    }
    
    
    //VALIDATION FORMULAIRE 
    if (count($erreur) === 0) {
        //si tableau d'erreur est égal à 0
        //si tableau d'erreur est vide, on envoi le formulaire 
        $requete =
        // La commande UPDATE permet d’effectuer des modifications sur des lignes existantes
        "UPDATE produits 
     SET
     pro_ref = :pro_ref,
     pro_cat_id = :pro_cat_id,
     pro_libelle = :pro_libelle,
     pro_description = :pro_description,
     pro_prix = :pro_prix,
     pro_stock = :pro_stock,
     pro_couleur = :pro_couleur,
     pro_photo = :pro_photo,
     pro_d_modif = NOW(),
     pro_bloque = :pro_bloque
     WHERE pro_id= :pro_id";
        // var_dump($requete);
        // exit;
        $result = $db->prepare($requete);
        // requête préparé
        $result->bindValue(":pro_id", $pro_id, PDO::PARAM_STR);
        $result->bindValue(":pro_ref", $pro_ref, PDO::PARAM_STR);
        // bindValue = Associe une valeur à un nom correspondant
        $result->bindValue(":pro_cat_id", $_POST["pro_cat_id"], PDO::PARAM_INT);
        // PDO::PARAM_INT = obliagtion de mettre des nombre
        $result->bindValue(":pro_libelle", $pro_libelle, PDO::PARAM_STR);
        //PDO::PARAM_STR = obligation de mettre des "string"
        $result->bindValue(":pro_description", $pro_description, PDO::PARAM_STR);
        $result->bindValue(":pro_prix", $pro_prix, PDO::PARAM_STR);
        $result->bindValue(":pro_stock", $pro_stock, PDO::PARAM_INT);
        $result->bindValue(":pro_couleur", $pro_couleur, PDO::PARAM_STR);
        $result->bindValue(":pro_photo", $file, PDO::PARAM_STR);
        $result->bindValue(":pro_bloque", $_POST["pro_bloque"], PDO::PARAM_STR);
        $result->execute();
        $result->closeCursor();
        
        move_uploaded_file($_FILES["file"]["tmp_name"], "../assets/img/jarditou_photo/" . $pro_id . "." . $file);
        // permet l'upload d'un fichier
        header('Location: ../view/liste.php');
        exit;
    }
}
