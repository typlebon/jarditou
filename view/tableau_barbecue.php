<?php include "header.php"; ?>

<table class="table table-bordered table-striped table-sm text-dark bg-white">
	<tr class="text-center display-4">
		<td>Photo</td>
		<td>ID</td>
		<td>Catégorie</td>
		<td>Libellé</td>
		<td>Prix</td>
		<td>Couleur</td>
	</tr>
	<tr>
		<td><img src="assets/images/7.jpg" alt="Image barbecue" Title="Image barbecue" width="120" height="120"></td>
		<td class="text-center display-4">7</td>
		<td class="text-center display-4">Barbecues</td>
		<td class="text-center display-5">Aramis</td>
		<td class="text-center display-4">110.11€</td>
		<td class="text-center display-4 p-3 mb-2 bg-info text-white">Bleu</td>
	</tr>
	<tr>
		<td><img src="assets/images/8.jpg" alt="Image barbecue" Title="Image barbecue" width="120" height="120"></td>
		<td class="text-center display-4">8</td>
		<td class="text-center display-4">Barbecues</td>
		<td class="text-center display-5">Athos</td>
		<td class="text-center display-4">249.99€</td>
		<td class="text-center display-4 p-3 mb-2 bg-danger text-white">Rouge</td>
	</tr>
	<tr>
		<td><img src="assets/images/11.jpg" alt="Image barbecue" Title="Image barbecue" width="120" height="120"></td>
		<td class="text-center display-4">11</td>
		<td class="text-center display-4">Barbecue</td>
		<td class="text-center display-5">Clatronic</td>
		<td class="text-center display-4">135.90€</td>
		<td class="text-center display-4 p-3 mb-2 bg-secondary text-white">Chrome</td>
	</tr>
	<tr>
		<td><img src="assets/images/12.jpg" alt="Image barbecue" Title="Image barbecue" width="120" height="120"></td>
		<td class="text-center display-4">12</td>
		<td class="text-center display-4">Barbecues</td>
		<td class="text-center display-5">Camping</td>
		<td class="text-center display-4">88.00€</td>
		<td class="text-center display-4 p-3 mb-2 bg-dark text-white">Noir</td>
	</tr>
	<tr>
		<td><img src="assets/images/13.jpg" alt="Image barbecue" Title="Image barbecue" width="120" height="120"></td>
		<td class="text-center display-4">13</td>
		<td class="text-center display-4">Brouettes</td>
		<td class="text-center display-5">Green</td>
		<td class="text-center display-4">49.00€</td>
		<td class="text-center display-4 p-3 mb-2 bg-success text-white">Verte</td>
	</tr>
</table>
<footer>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-item nav-link" title="Aller à la cible">Mentions légales</a>
				<a class="nav-item nav-link">Horaires</a>
				<a class="nav-item nav-link disabled" title="Nous contactez">Plan du site</a>
			</div>
		</div>
		<?php include "footer.php";
		?>