<?php
include "../controller/liste_controller.php";
/* ".. "permert de remonter dans arborescence */
include "header.php"; ?>

<body>
  <div class="container">

    <?php
    if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
      // si il y a une session et si le role est administrateur 
      // administrateur a accès à tout
      // ce qui bloque l'accès à tout autre utilisateur 
      ?>
      <table class="table">
        <thead>
          <tr class="table-light">
            <th scope="col">PHOTO</th>
            <th scope="col">ID</th>
            <th scope="col">REFERENCE</th>
            <th scope="col">LIBELLE</th>
            <th scope="col">PRIX</th>
            <th scope="col">STOCK</th>
            <th scope="col">COULEUR</th>
            <th scope="col">AJOUT</th>
            <th scope="col">MODIF</th>
            <th scope="col">BLOQUE</th>
          </tr>
        </thead>
        <tbody>
          <?php
            while ($row = $result->fetch(PDO::FETCH_OBJ)) {
              // obligé de la déclaré car pas super global 
              //fetch est tout ce qui correspond à la requête 
              //fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
              $dateAjout = new DateTime($row->pro_d_ajout);
              // $row = une ligne de la base de données 
              $dateModif = new DateTime($row->pro_d_modif);
              ?>
            <tr>
              <td class="table-warning"><img src="../assets/img/jarditou_photo/<?= $row->pro_id . "." . $row->pro_photo; ?>" alt="<?= $row->pro_photo ?>" width="150px"></td>
              <td class="table-warning"><?= $row->pro_id; ?></td>
              <td class="table-warning"><?= $row->pro_ref; ?></td>
              <td class="table-secondary"><a class="text-info" href="detail_produit.php?pro_id=<?= $row->pro_id; ?>" title="<?= $row->pro_libelle; ?>"><?= $row->pro_libelle; ?></a></td>
              <td class="table-info"><?= $row->pro_prix . " €"; ?></td>
              <td class="table-info"><?= $row->pro_stock; ?></td>
              <td class="table-info"><?= $row->pro_couleur; ?></td>
              <td class="table-primary"><?= $dateAjout->format('d-m-Y'); ?></td>
              <td class="table-primary"><?= $dateModif->format('d-m-Y'); ?></td>
              <?php if ($row->pro_bloque == 1) { ?>
                <td class="table-danger">Oui</td>
              <?php } else { ?>
                <td class="table-success">Non</td>
              <?php } ?>
            </tr>
          <?php // Condition pour afficher “Oui” ou “Non” ou une chaîne vide lors de la récupération de valeurs booléennes.
            } ?>
        <?php
        }
        ?>
        </tbody>
      </table>

      <?php
      if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Utilisateur")) {
        // administrateur a accès à tout
        // ce qui bloque l'accès à tout autre utilisateur 
        ?>
        <table class="table table-striped">
          <thead>
            <tr class="table-light">
              <th scope="col">PHOTO</th>
              <th scope="col">LIBELLE</th>
              <th scope="col">PRIX</th>
              <th scope="col">COULEUR</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = $result->fetch(PDO::FETCH_OBJ)) {
                //fetch — Récupère la ligne suivante d'un jeu de résultats PDO 
                ?>
              <tr>
                <td class="table-warning"><img src="../assets/img/jarditou_photo/<?= $row->pro_id . "." . $row->pro_photo; ?>" alt="<?= $row->pro_photo ?>" width="150px"></td>
                <td class="table-secondary"><a class="text-info" href="detail_produit.php?pro_id=<?= $row->pro_id; ?>" title="<?= $row->pro_libelle; ?>"><?= $row->pro_libelle; ?></a></td>
                <td class="table-info"><?= $row->pro_prix . " €"; ?></td>
                <td class="table-info"><?= $row->pro_couleur; ?></td>
              </tr>
            <?php // Condition pour afficher “Oui” ou “Non” ou une chaîne vide lors de la récupération de valeurs booléennes.
              } ?>
          <?php
          }
          ?>
          </tbody>
        </table>
  </div>
  <?php include "footer.php";
  ?>