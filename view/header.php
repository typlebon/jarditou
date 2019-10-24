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
								<a class="nav-item nav-link" href="Jarditou-officiel.php" title="Aller à la cible">ACCUEIL</a>
								<a class="nav-item nav-link" href="Formulaire_officiel.php" title="Nous contactez">CONTACT</a>
								<a class="nav-item nav-link" href="liste.php" title="liste produits bases de données">LISTE PRODUIT</a>
								<?php
								if (isset($_SESSION["role"])) {
								// administrateur a accès à tout
								// ce qui bloque l'accès à tout autre utilisateur 
									?>
								<a class="nav-item nav-link" href="information_perso.php" title="liste produits bases de données">VOTRE COMPTE</a>
								<?php
								}
								?>
								<?php
								if (isset($_SESSION["role"]) && ($_SESSION["role"] === "Administrateur")) {
								// administrateur a accès à tout
								// ce qui bloque l'accès à tout autre utilisateur 
									?>
									<a class="nav-item nav-link" href="produits_ajout.php" title="Aller à la cible">AJOUT PRODUIT</a>
								<?php
								}
								?>
								<?php if (isset($_SESSION["id"])) {
									// si un id est trouvé dans la base de données, on affiche son identifiant
									// sinon on affiche connexion et inscription
									?>
									<p>Bonjour <?= $_SESSION['identifiant'] ?></p>
									<form method=POST action="">
										<input type="submit" class="btn btn-warning" name="signout" value="Déconnexion">
										<!-- <button type="submit" class="" name="submit" title="Aller à la cible" value="oui"><a href="../controller/deconnexion.php" title="jarditou">Oui</a></button> -->
									</form>
								<?php } else {
									?>
									<a class="nav-item nav-link" href="inscription.php" title="Aller à la cible">Inscription</a>
									<a class="nav-item nav-link" href="enregistrement.php">Connexion</a>
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