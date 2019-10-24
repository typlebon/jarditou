var acceptation = document.getElementById("envoi");
acceptation.addEventListener("blur", validation); //lier un code à un evenement

// pour chaque catégorie dans l'ordre : 
// var input = aller chercher la valeur saisie dans le champs 
//var span = afficher les erreurs
//var regEx


//evenement qui change (au click)
// bootstrap css responsive 

function validation(event) {
	// variable utilisé dans la fonction pour société 
	var societe = document.getElementById("societe");
	var erreurSociete = document.getElementById("erreurSociete");
	var regSociete = /^[a-zA-Z]+$/; // "/" caractère d'encadrement de la regex
	if (societe.validity.valueMissing) //valueMissing = element manquant
	//champs totalement vide
	{
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurSociete.textContent = "Champ non rempli"; // message d'erreur 
		erreurSociete.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regSociete.test(societe.value) == false) // condition suplémentaire avec expression régulières 
	{
		event.preventDefault();
		erreurSociete.textContent = "Saisie incorrect, veuillez saisir au moins un caractère";
		erreurSociete.style.color = "orange";
	} else // si aucune erreur détectée
	{
		erreurSociete.textContent = "Saisie ok";
		erreurSociete.style.color = "green";
	}


	// variable utilisé dans la fonction pour personne
	var personne = document.getElementById("personne");
	var erreurPersonne = document.getElementById("erreurPersonne");
	var regPersonne = /^[a-zA-Z]+$/;
	if (personne.validity.valueMissing) //valueMissing = element manquant
	//champs totalement vide
	{
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurPersonne.textContent = "Champs non rempli"; // message d'erreur 
		erreurPersonne.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regPersonne.test(personne.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurPersonne.textContent = "Saisie incorrect, veuillez saisir au moins 1 caractère";
		erreurPersonne.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurPersonne.textContent = "Saisie ok";
		erreurPersonne.style.color = "green";
	}


	//variable utilisé dans la fonction pour code postal 
	var postal = document.getElementById("postal");
	var erreurPostal = document.getElementById("erreurPostal");
	var regPostal = /^[0-9]{5}$/;
	if (postal.validity.valueMissing) //valueMissing = element manquant
	//champs totalement vide
	{
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurPostal.textContent = "Champs non rempli"; // message d'erreur 
		erreurPostal.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regPostal.test(postal.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurPostal.textContent = "Saisie incorrect, veuillez entrez un code postal avec 5 nombres";
		erreurPostal.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurPostal.textContent = "Saisie ok";
		erreurPostal.style.color = "green";
	}


	//variable utilisé dans la fonction pour adresse
	var ville = document.getElementById("ville");
	var erreurVille = document.getElementById("erreurVille");
	var regVille = /^[a-zA-Z]+$/;
	if (ville.validity.valueMissing) //valueMissing = element manquant
	//champs totalement vide
	{
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurVille.textContent = "Champs non rempli"; // message d'erreur 
		erreurVille.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regVille.test(ville.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurVille.textContent = "Saisie incorrect, veuillez saisir au moins 1 caractère";
		erreurVille.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurVille.textContent = "Saisie ok";
		erreurVille.style.color = "green";
	}


	//variable utilisé dans la fonction pour mail 
	var mail = document.getElementById("mail");
	var erreurMail = document.getElementById("erreurMail");
	var regMail = /^[@]{1}$/;
	if (mail.validity.valueMissing) //valueMissing = element manquant
	//champs totalement vide
	{
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurMail.textContent = "Champs non rempli"; // message d'erreur 
		erreurMail.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regMail.test(mail.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurMail.textContent = "Saisie incorrect, veuillez saisir au moins 1 caractère @ dans votre mail";
		erreurMail.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurMail.textContent = "Saisie ok";
		erreurMail.style.color = "green";
	}
}