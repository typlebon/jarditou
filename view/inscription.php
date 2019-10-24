<?php
//session_start();
include "header.php";
include "../controller/inscription_script.php";
// if (isset($_POST['submit'])) {
    // var_dump($_SESSION);
//     var_dump($_POST);
//     var_dump($erreur);
// }
?>

<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info" for="login">Login</h3>
                        <div class="form-group">
                            <label for="nom" class="text-info">Nom:</label><br>
                            <input type="text" name="nom" id="nom" class="form-control" value="<?= isset($_POST["nom"]) ? $_POST["nom"] : "" ?>">
                            <span><?= isset($erreur['nom']) ? $erreur['nom'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="text-info">Prénom:</label><br>
                            <input type="text" name="prenom" id="prenom" class="form-control" value="<?= isset($_POST["prenom"]) ? $_POST["prenom"] : "" ?>">
                            <span><?= isset($erreur['prenom']) ? $erreur['prenom'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pseudo" class="text-info">Pseudo:</label><br>
                            <input type="text" class="form-control" id="pseudo" name="pseudo" value="<?= isset($_POST["pseudo"]) ? $_POST["pseudo"] : "" ?>">
                            <span><?= isset($erreur['pseudo']) ? $erreur['pseudo'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="text-info">Mail:</label><br>
                            <input type="email" class="form-control" id="mail" name="mail" value="<?= isset($_POST["mail"]) ? $_POST["mail"] : "" ?>">
                            <span><?= isset($erreur['mail']) ? $erreur['mail'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="login" class="text-info">login:</label><br>
                            <input type="text" class="form-control" id="login" name="login" value="<?= isset($_POST["login"]) ? $_POST["login"] : "" ?>">
                            <span><?= isset($erreur['login']) ? $erreur['login'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" value="<?= isset($_POST["password"]) ? $_POST["password"] : "" ?>">
                            <span><?= isset($erreur['password']) ? $erreur['password'] : '' ?></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="password" name="password2" id="password2" class="form-control" value="<?= isset($_POST["password2"]) ? $_POST["password2"] : "" ?>">
                            <span><?= isset($erreur['password2']) ? $erreur['password2'] : '' ?></span>
                        </div>
                        <input type="submit" name="submit" class="btn btn-info btn-md" value="Envoyer">
                </div>
                </form>
                <?php
                if (isset($_SESSION['login'])) {
                    ?>
                    <p>
                        Bienvenue <?= $_SESSION['login'] ?>
                    </p>
                    <form action="" method="post">
                        <input type="submit" name="signout" value="Se déconnecter">
                    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</body>