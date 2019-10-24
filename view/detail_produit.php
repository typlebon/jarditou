<?php
include "../controller/detail_produit_controller.php";
include "header.php";
?>
<div class="container">
  <form action="" method="POST">
    <?php
    echo "<img src=\"../assets/img/jarditou_photo/" . $produit->pro_id . "." . $produit->pro_photo . "\"" . "width=\"150\"" . ">"
    ?>
    <!-- Photo -->
    <div class="form-row">
      <div class="form-group col-md-6">

      </div>
    </div>
    <?php
    if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
      ?>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="ID">ID</label>
          <input type="text" class="form-control" name="id" id="id" value="<?= $produit->pro_id; ?>" readonly>
          <!-- readonly= empeche utilisateur d'appporter une modification sur l'input -->
        </div>
      </div>
    <?php
    }
    if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
      ?>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="ref">Référence</label>
          <input type="text" class="form-control" name="ref" id="ref" value="<?php echo $produit->pro_ref; ?>" readonly>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="categorie">Categorie</label>
        <input type="text" class="form-control" name="categorie" id="categorie" value="<?php echo $produit->cat_nom; ?>" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="libelle">Libellé</label>
        <input type="text" class="form-control" name="libelle" id="libelle" value="<?php echo $produit->pro_libelle; ?>" readonly>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" readonly value=""><?php echo $produit->pro_description; ?></textarea>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" name="prix" id="prix" value="<?php echo $produit->pro_prix; ?>" readonly>
      </div>
    </div>
    <?php
    if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
      ?>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="stock">Stock</label>
          <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $produit->pro_stock; ?>" readonly>
        </div>
      </div>
    <?php
    }
    ?>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="couleur">Couleur</label>
        <input type="text" class="form-control" name="couleur" id="couleur" value="<?php echo $produit->pro_couleur; ?>" readonly>
      </div>
    </div>
    <?php
    if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
      ?>
      <?php
        if ($produit->pro_bloque == 1) { ?>
        <div class="form-check form-check-inline">
          <span>Produit bloqué : </span>
          <input type="radio" id="bouton1" name="bouton" value="1" checked disabled>
          <label for="bouton1">Oui</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="bouton2" name="bouton" value="0" disabled>
          <label for="bouton2">Non</label>
        </div>
      <?php } else { ?>
        <div class="form-check form-check-inline">
          <span>Produit bloqué : </span>
          <input type="radio" id="bouton1" name="bouton" value="1" disabled>
          <label for="bouton1">Oui</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="bouton2" name="bouton" value="0" checked disabled>
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
    <a class="btn btn-primary" href="detail_produit_modif.php?pro_id=<?php echo $produit->pro_id; ?>" title="Modifier">Modifier</a>
    <a class="btn btn-primary" id="suppression" href="../controller/suppression.php?pro_id=<?php echo $produit->pro_id; ?>" title="Supprimer">Supprimer</a>
  <?php
  }
  ?>
  </div>
  </form>
</div>
<?php include "footer.php"; ?>