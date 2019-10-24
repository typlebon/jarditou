<?php
//include "../controller/ajout.php";
include "../controller/produits_ajout_script.php";
include "header.php";
$result = $db->query('Select cat_id,cat_nom from categories');
//connexion à la base de données et requête des catégories >> pour le while 
if (isset($_POST['submit'])) {
    // var_dump($_POST);
    // var_dump($erreur);
}
//var_dump($_FILES);
?>

<h5 class="card-header info-color white-text text-center py-4">
    <strong>FORMULAIRE D'AJOUT:</strong>
</h5>
<div class="card-body px-lg-5 pt-0">
    <form class="text-center" style="color: #757575;" action="#" method="POST" enctype="multipart/form-data">
        <!-- enctype="multipart/form-data" >> pour faire un uplode d'image -->
        <!-- REFERENCE -->
        <div class="md-form">
            <label for="ref">REFERENCE</label>
            <input type="text" class="form-control" name="ref" id="ref" value="<?= isset($_POST["ref"]) ? $_POST["ref"] : "" ?>">
            <!-- value sert pour garder les valeurs rentrées par utilisateurs -->
            <span><?= isset($erreur['ref']) ? $erreur['ref'] : '' ?></span>
        </div>

        <!-- Categorie -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="cat">CATEGORIE</label>
                <select class="form-control" id="cat" name="cat">
                    <?php
                    while ($produit = $result->fetch(PDO::FETCH_OBJ)) { ?>
                        <option value="<?php echo $produit->cat_id; ?>"><?php echo $produit->cat_nom; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- LIBELLE -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="libelle">LIBELLE</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="<?= isset($_POST["libelle"]) ? $_POST["libelle"] : "" ?>">
                <span><?= isset($erreur['libelle']) ? $erreur['libelle'] : '' ?></span>
            </div>
        </div>
        <!-- DESCRIPTION -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="description">DESCRIPTION</label>
                <textarea class="form-control" name="description" id="description">
                    <?php echo isset($_POST["description"]) ? $_POST["description"] : "" ?>
                </textarea>
                <span><?= isset($erreur['description']) ? $erreur['description'] : '' ?></span>
            </div>
        </div>
        <!-- PRIX -->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="prix">PRIX</label>
                <input type="text" class="form-control" id="prix" name="prix" value="<?= isset($_POST["prix"]) ? $_POST["prix"] : "" ?>">
                <span><?= isset($erreur['prix']) ? $erreur['prix'] : '' ?></span>
            </div>
        </div>
        <!-- STOCK-->
        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="stock">STOCK</label>
                <input type="text" class="form-control" id="stock" name="stock" value="<?= isset($_POST["stock"]) ? $_POST["stock"] : "" ?>">
                <span><?= isset($erreur['stock']) ? $erreur['stock'] : '' ?></span>
            </div>
        </div>
        <!-- COULEUR-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="couleur">COULEUR</label>
                <input type="text" class="form-control" name="couleur" id="couleur" value="<?= isset($_POST["couleur"]) ? $_POST["couleur"] : "" ?>">
                <span><?= isset($erreur['couleur']) ? $erreur['couleur'] : '' ?></span>
            </div>
        </div>
        <!-- PHOTO-->
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="file">PHOTO</label>
                <input type="file" name="file" id="file">
                <span><?= isset($erreur['file']) ? $erreur['file'] : '' ?></span>
            </div>
        </div>
        <label for="bouton">Produit bloqué :</label>
        <input type="radio" name="pro_bloque" id="Bouton1" value="1"> Oui
        <input type="radio" name="pro_bloque" id="bouton2" value="0" checked> Non
        <!-- Bouton d'envoi du formulaire ci-dessous -->
        <div>
            <input type="submit" name="submit" class="btn btn-primary" value="Valider" id="envoi"> <!-- Bouton permettant envoi du formulaire -->
            <input type="reset" class="btn btn-primary" value="Effacer" id="effacer"><!-- Bouton pour effacer donn�es entr�e -->
        </div>
    </form>
    <?php include "footer.php";
    ?>