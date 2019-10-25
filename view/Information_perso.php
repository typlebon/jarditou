<?php
include "header.php"; ?>
<!-- Bouton execution modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
	  Lancer la modal
  </button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title" id="myModalLabel">Vos informations personnels :</h4>
  </div>
  <div class="modal-body">
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
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
	</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->



 


<?php include "footer.php";
  ?>