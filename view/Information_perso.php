<?php
include "header.php"; ?>

<ul class="list-group">
  <li class="list-group-item"></li>
  <li class="list-group-item list-group-item-primary"><?php echo $_SESSION["mail"]?></li>
  <li class="list-group-item list-group-item-secondary"><?php echo $_SESSION["identifiant"]?></li>
  <li class="list-group-item list-group-item-success"><?php echo $_SESSION["role"] ?></li>
  <li class="list-group-item list-group-item-danger"><?php echo $_SESSION["nom"] ?></li>
  <li class="list-group-item list-group-item-warning"><?php echo $_SESSION["prenom"] ?></li>
  <li class="list-group-item list-group-item-info"><?php echo $_SESSION["pseudo"] ?></li>
  <li class="list-group-item list-group-item-light"><?php echo $_SESSION["inscription"] ?></li>
</ul>

<?php include "footer.php";
  ?>