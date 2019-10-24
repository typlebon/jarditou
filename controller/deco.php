<?php
if (isset($_POST['signout'])) {
    $_SESSION["mail"] = array();
    $_SESSION["mdp"] = array();




    // supression des variable de session
    unset($_SESSION);
    //  destruction des variables de session. 
    if (ini_get("session.use_cookies")) {
        setcookie(session_name(), '', time() - 42000);
    }
    // via la fonction setcookie(), on fait expirer en termes de date le cookie qui concerne le nom de la session.
    session_destroy();
    // detruit le reste de la session
    header('Location: ../view/Jarditou-officiel.php');
}
