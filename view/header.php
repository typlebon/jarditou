<?php
session_start();
include '../controller/deco.php';
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href="Styles/MainStyle.css" rel="stylesheet" type="text/css" />
<title></title>
<link rel="stylesheet" href="../assets/css/styleCopie.css">

<title>Jarditou</title>
<!--  -->

<body data-spy="scroll" data-target="#navbar-example">

	<header>
		<!-- Début header -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<!-- Application sur le header -->
					<img id="jarditou" src="../assets/img/jarditou1.jpg" alt="logo jarditou" class="img-fluid" style="width:150px;">
					<blockquote class="text-right display-2">La qualité depuis 70 ans</blockquote>
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
							<div class="navbar-nav">
								<a class="nav-item nav-link" href="Jarditou-officiel.php" title="Aller à la cible"><button type="button" class="btn btn-outline-info" class="text-left">ACCUEIL</button></a>
								<a class="nav-item nav-link" href="liste.php" title="liste produits bases de données"><button type="button" class="btn btn-outline-secondary" class="text-left">PRODUITS</button></a>
								<?php
								if (isset($_SESSION["role"])) {
									// administrateur a accès à tout
									// ce qui bloque l'accès à tout autre utilisateur 
									?>
									<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#myModal">VOTRE COMPTE </button>
									<!-- Bouton execution modal -->
									<!-- Modal -->
									<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													<h4 class="modal-title" id="myModalLabel">Vos informations personnelles :</h4>
												</div>
												<div class="modal-body">
													<ul class="list-group">
														<li class="list-group-item"></li>
														<li class="list-group-item list-group-item-primary"><?php echo $_SESSION["mail"] ?></li>
														<li class="list-group-item list-group-item-secondary"><?php echo $_SESSION["identifiant"] ?></li>
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
								<?php
								}
								?>
								<?php
								if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
									// administrateur a accès à tout
									// ce qui bloque l'accès à tout autre utilisateur 
									?>
									<a class="nav-item nav-link" href="produits_ajout.php" title="Aller à la cible"><button href="" type="button" class="btn btn-outline-warning" class="text-left">AJOUT</button></a>
								<?php
								}
								?>
								<?php if (isset($_SESSION["id"])) {
									// si un id est trouvé dans la base de données, on affiche son identifiant
									// sinon on affiche connexion et inscription
									?>
									<p>Bonjour <?= $_SESSION['prenom'] ?></p>
									<form method=POST action="">
										<input type="submit" class="btn btn-warning" name="signout" value="Déconnexion">
										<!-- <button type="submit" class="" name="submit" title="Aller à la cible" value="oui"><a href="../controller/deconnexion.php" title="jarditou">Oui</a></button> -->
									</form>
								<?php } else {
									?>
									<a class="nav-item nav-link" href="inscription.php" title="Aller à la cible"><button href="" type="button" class="btn btn-outline-warning" class="text-left">Inscription</button></a>
									<a class="nav-item nav-link" href="enregistrement.php"><button href="" type="button" class="btn btn-outline-warning" class="text-left">Connexion</button></a>
								<?php
								}
								?>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>