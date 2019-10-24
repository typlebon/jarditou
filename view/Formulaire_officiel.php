<?php include "header.php"; ?>

<table class="table table-bordered table-striped table-sm">
	<h5><b>Merci de nous répondre</b></h5>
	</header>
	<h3>*Ces zones sont obligatoires</h3>
	<form action="http://bienvu.net/script.php" method="post">
		<fieldset>
			<br></br>
			<legend>Vos coordonées</legend>
			<label for="nom"> Votre nom* :</label>
			<input type="text" placeholder="Entrez votre nom" name="Name" id="Name"><br>
			<label for="prénom"> Votre prénom* :</label>
			<input type="text" placeholder="Entrez votre prénom" name="firtname" id="firstname"><br>
			<label for="sexe">Sexe* :</label>
			<input type="radio" name="man" value="man" id="man"> Masculin
			<input type="radio" name="women" value="women" id="women" checked="checked"> féminin
			<br></br>
			<label for="date de naissance"> Votre date de naissance* :</label>
			<input type="date" placeholder="Entrez votre date de naissance" name="birthday" id="birthday"><br>
			<label for="Adresse">Votre adresse</label>
			<input type="text" id="adress" name="adress"><br>
			<label for="ville">Votre ville</label>
			<input type="text" id="city" name="city"><br>
			<label for="Code postal">Votre code postal</label>
			<label for="email">Votre e-mail* :</label>
			<input type="email" placeholder="Entrez votre email" id="mail" name="mail"><br>
		</fieldset>
		<fieldset>
			<header>Sujet*</header>
			<select name="Mes commandes" required>
				<option value="Mes commandes">Mes commandes</option>
				<option value="Question sur un produit">Question sur un produit</option>
				<option value="Réclamation">Réclamamtion</option>
				<option value="Autres">Autres</option>
			</select>
			<br>
			<legend>Votre demande* :</legend>
			<header>Votre question* :</header>
			<textarea rows="5" cols="30" required></textarea>
		</fieldset>
		<fieldset>
			<input type="checkbox" name="traitement informatique" value="Traitement informtique" checkbox> J'accepte le traitement informatique de ce formulaire
		</fieldset>
		<fieldset>
			<input type="submit" value="Envoyer">
			<input type="reset" value="Annulez">
		</fieldset>

<?php include "footer.php";
?>