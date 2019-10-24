var acceptation = document.getElementById("envoi");
acceptation.addEventListener("click", validation); //lier un code à un evenement

// pour chaque catégorie dans l'ordre : 
// var input = aller chercher la valeur saisie dans le champs 
var prenom = document.getElementById("prenom");
var nom = document.getElementById("nom");
var naissance = document.getElementById("naissance");
var postal = document.getElementById("postal");
//var span = afficher les erreurs
var erreurPrenom = document.getElementById("erreurPrenom");
var erreurNom = document.getElementById("erreurNom");
var erreurNaissance = document.getElementById("erreurNaissance");
var mail = document.getElementById("mail");
//var regEx
var regPrenom = /^[a-zA-Z]+$/; // "/" caractère d'encadrement de la regex
var regNom = /^[a-zA-Z]+$/; // "/" caractère d'encadrement de la regex
var regNaissance = /^[0-9]{8}$/;


function validation(event) {
	// IF POUR LE PRENOM
	if (prenom.validity.valueMissing) { //valueMissing = element manquant
		//champs totalement vide
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurPrenom.textContent = "Champ non rempli"; // message d'erreur 
		erreurPrenom.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regPrenom.test(prenom.value) == false) { // condition suplémentaire avec expression régulières 
		event.preventDefault();
		erreurPrenom.textContent = "Saisie incorrect";
		erreurPrenom.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurPrenom.textContent = "Saisie ok";
		erreurPrenom.style.color = "green";
	}
	//IF POUR LE NOM
	if (nom.validity.valueMissing) { //valueMissing = element manquant
		//champs totalement vide
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurNom.textContent = "Champ non rempli"; // message d'erreur 
		erreurNom.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regNom.test(nom.value) == false) { // condition suplémentaire avec expression régulières 
		event.preventDefault();
		erreurNom.textContent = "Saisie incorrect,";
		erreurNom.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurNom.textContent = "Saisie ok";
		erreurNom.style.color = "green";
	}

	//IF POUR LA DATE DE NAISSANCE
	//variable utilisé dans la fonction pour date de naissance 
	if (naissance.validity.valueMissing) { //valueMissing = element manquant
		//champs totalement vide
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurNaissance.textContent = "Champs non rempli"; // message d'erreur 
		erreurNaissance.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regNaissance.test(naissance.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurNaissance.textContent = "Saisie incorrect";
		erreurNaissance.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurNaissance.textContent = "Saisie ok";
		erreurNaissance.style.color = "green";
	}
	// function objetdate			
	//IF POUR LE CODE POSTAL
	//variable utilisé dans la fonction pour code postal 
	var erreurPostal = document.getElementById("erreurPostal");
	var regPostal = /^[0-9]{5,5}$/;
	if (postal.validity.valueMissing) { //valueMissing = element manquant
		//champs totalement vide
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurPostal.textContent = "Champs non rempli"; // message d'erreur 
		erreurPostal.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regPostal.test(postal.value) == false) { // condition suplémentaire 
		event.preventDefault();
		erreurPostal.textContent = "Saisie incorrect";
		erreurPostal.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurPostal.textContent = "Saisie ok";
		erreurPostal.style.color = "green";
	}
	// IF POUR LE MAIL
	var erreurMail = document.getElementById("erreurMail");
	var regMail = /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/;
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
		erreurMail.textContent = "Saisie incorrect";
		erreurMail.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurMail.textContent = "Saisie ok";
		erreurMail.style.color = "green";
	}
	// IF POUR LE CHOIX DU SUJET
	var choix = document.getElementById("choix");
	var erreurChoix = document.getElementById("erreurChoix");
	if (choix.value == "default") {
		erreurChoix.textContent = "Veuillez selectionner un champ";
		erreurChoix.style.color = "red";
	} else {
		erreurChoix.textContent = "Choix ok";
		erreurChoix.style.color = "green";
	}

	// IF POUR LA QUESTION
	var question = document.getElementById("question");
	var erreurQuestion = document.getElementById("erreurQuestion");
	var regQuestion = /^[a-zA-Z]*$/; // "/" caractère d'encadrement de la regex
	if (question.validity.valueMissing) { //valueMissing = element manquant
		//champs totalement vide
		event.preventDefault(); // des qu'une erreur est détécté, empeche l'envoi
		erreurQuestion.textContent = "Champ non rempli"; // message d'erreur 
		erreurQuestion.style.color = "red"; // couleur message d'erreur 
	}
	// si données incorrect = champs ne contient pas au moins 1 caractère
	else if (regQuestion.test(question.value) == false) { // condition suplémentaire avec expression régulières 
		event.preventDefault();
		erreurQuestion.textContent = "Saisie incorrect";
		erreurQuestion.style.color = "orange";
	} else { // si aucune erreur détectée
		erreurQuestion.textContent = "Saisie ok";
		erreurQuestion.style.color = "green";
	}
}