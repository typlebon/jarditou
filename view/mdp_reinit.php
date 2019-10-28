<?php
//session_start();
include "header.php";
include "../controller/mdp_reinit_script.php";
?>

<div id="login">
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
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
            </div>
        </div>
    </div>
</div>
</div>
</body>