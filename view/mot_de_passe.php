<?php
include "../controller/mot_de_passe_script.php";
include "header.php";

?>
    <div class="container register">
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Réinitialisation du mot de passe:</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active text-align form-new" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row register-form">
                            <div class="col-md-12">
                                <form method="post">
                                    <div class="form-group">
                                        <input type="text" name="mail" class="form-control" placeholder="Votre email*" value="<?= isset($_POST["mail"]) ? $_POST["mail"] : "" ?>" />
                                        <span><?= isset($erreur['mail']) ? $erreur['mail'] : '' ?></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btnContactSubmit" value="Login" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php
include "footer.php";
?>