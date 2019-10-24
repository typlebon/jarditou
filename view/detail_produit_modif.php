<?php
include "../controller/detail_controller.php";
include "header.php";
?>
<div class="container">
  <form action="#" method="POST" enctype="multipart/form-data">

    <img src="../assets/img/jarditou_photo/<?= $produit->pro_id . "." . $produit->pro_photo ?>" width="200">
    <!-- Affichage de la photo -->

    <!-- Photo -->
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="couleur">PHOTO</label>
        <input type="file" name="file" value="<?php echo isset($_POST["pro_photo"]) ? $_POST["pro_photo"] : $produit->pro_photo ?>">
        <!-- echo isset permet de garder données utilisateur -->
        <span><?= isset($erreur['file']) ? $erreur['file'] : '' ?></span>
        <!-- span pour afficher message d'erreur -->
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="pro_id">ID</label>
        <input type="text" class="form-control" name="pro_id" id="pro_id" value="<?php echo $_GET['pro_id']; ?>" readonly>
        <!-- readonly= empeche utilisateur d'appporter une modification sur l'input -->
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="ref">Référence</label>
        <input type="text" class="form-control" name="pro_ref" id="pro_ref" value="<?php echo isset($_POST["pro_ref"]) ? $_POST["pro_ref"] : $produit->pro_ref ?>">
        <span><?= isset($erreur['pro_ref']) ? $erreur['pro_ref'] : '' ?></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="categorie">Categorie</label>
        <select type="text" class="form-control" name="pro_cat_id" id="pro_cat_id">
          <?php
          foreach ($categories as $cat) {
            echo "<option value='" . $cat->cat_id . "'";
            if ($produit->pro_cat_id == $cat->cat_id) {
              echo " selected";
            }
            echo ">" . $cat->cat_nom . "</option>\n";
          }
          ?>
          <!-- Foreach permet d'afficher la photo en fonction de son id -->
        </select>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="libelle">Libellé</label>
        <input type="text" class="form-control" name="pro_libelle" id="pro_libelle" value="<?php echo isset($_POST["pro_libelle"]) ? $_POST["pro_libelle"] : $produit->pro_libelle ?>">
        <span><?= isset($erreur['pro_libelle']) ? $erreur['pro_libelle'] : '' ?></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea class="form-control" name="pro_description" id="pro_description">
        <?php echo isset($_POST["pro_description"]) ? $_POST["pro_description"] : $produit->pro_description ?>
        </textarea>
        <span><?= isset($erreur['pro_description']) ? $erreur['pro_description'] : '' ?></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" name="pro_prix" id="pro_prix" value="<?php echo isset($_POST["pro_prix"]) ? $_POST["pro_prix"] : $produit->pro_prix ?>">
        <span><?= isset($erreur['pro_prix']) ? $erreur['pro_prix'] : '' ?></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="stock">Stock</label>
        <input type="text" class="form-control" name="pro_stock" id="pro_stock" value="<?php echo isset($_POST["pro_stock"]) ? $_POST["pro_stock"] : $produit->pro_stock ?>">
        <span><?= isset($erreur['pro_stock']) ? $erreur['pro_stock'] : '' ?></span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="couleur">Couleur</label>
        <input type="text" class="form-control" name="pro_couleur" id="pro_couleur" value="<?php echo isset($_POST["pro_couleur"]) ? $_POST["pro_couleur"] : $produit->pro_couleur ?>">
        <span><?= isset($erreur['pro_couleur']) ? $erreur['pro_couleur'] : '' ?></span>
      </div>
    </div>
    <?php
    if ($produit->pro_bloque == 1) { ?>
      <div class="form-check form-check-inline">
        <span>Produit bloqué : </span>
        <input type="radio" id="bouton1" name="pro_bloque" value="1" checked>
        <label for="bouton1">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" id="bouton2" name="pro_bloque" value="0">
        <label for="bouton2">Non</label>
      </div>
    <?php } else { ?>
      <div class="form-check form-check-inline">
        <span>Produit bloqué : </span>
        <input type="radio" id="bouton1" name="pro_bloque" value="1">
        <label for="bouton1">Oui</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" id="bouton2" name="pro_bloque" value="0" checked>
        <!-- disabled= empêche utilisateur de toucher au bouton -->
        <label for="bouton2">Non</label>
      </div>
    <?php } ?>
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-6">
    <label for="reference">Date modification : </label>
    <span><?= $dateModif->format('d-m-Y'); ?></span><br>
    <label for="reference">Date d'ajout : </label>
    <span><?= $dateAjout->format('d-m-Y'); ?></span>
  </div>
  <div>
    <div>
      <input type="submit" class="btn btn-primary" value="Valider" name="submit" id="envoi">
    </div>

    </form>
  </div>
  <?php include "footer.php"; ?>