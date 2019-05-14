const jsButtonImg = document.querySelector('.js-button-img');
jsButtonImg.addEventListener('click', changeImg);

const jsButtonPrincipal = document.querySelector('.js-button-principal');
jsButtonPrincipal.addEventListener('click', changeInfoPrincipal);

const jsButtonAdress = document.querySelector('.js-button-adress');
jsButtonAdress.addEventListener('click', changeInfoAdress);

const jsButtonContact = document.querySelector('.js-button-contact');
jsButtonContact.addEventListener('click', changeInfoContact);

const jsButtonPassword = document.querySelector('.js-button-password');
jsButtonPassword.addEventListener('click', changeInfoPassword);

const jsButtonBody = document.querySelector('.js-button-body');
jsButtonBody.addEventListener('click', changeInfoBody);

//fonction d'affichage du menu
function changeInfoBody() {
	createProfilMenu('js-form-body', '');

	createLabel('.js-form-body', 'poid_u', 'Votre poid');
	createInput('.js-form-body', 'text', 'poid_u', 'Poid', '');

	createLabel('.js-form-body', 'taille', 'Votre taille');
	createInput('.js-form-body', 'text', 'taille', 'Taille', '');

	createButtonSubmit('submit-body', '.js-form-body');

	createButtonCancel();
}

function changeInfoPassword() {
	createProfilMenu('js-form-password', '');

	createLabel('.js-form-password', 'ancient-password', 'Ancien Mot de passe<');
	createInput('.js-form-password', 'password', 'ancient-password', 'Ancient Password', '');

	createLabel('.js-form-password', 'new-password', 'Ancien Mot de passe<');
	createInput('.js-form-password', 'password', 'new-password', 'New Password', '');

	createLabel('.js-form-password', 'confirm-password', 'Confirmer Mot de passe<');
	createInput('.js-form-password', 'password', 'confirm-password', 'Confirm Password', '');

	createButtonSubmit('submit-password_u', '.js-form-password');

	createButtonCancel();
}

function changeInfoContact() {
	createProfilMenu('js-form-contact', '');

	createLabel('.js-form-contact', 'telephone_u', 'Telephone');
	createInput('.js-form-contact', 'text', 'telephone_u', 'Telephone', '');

	createButtonSubmit('submit-contact_u', '.js-form-contact');

	createButtonCancel();
}

function changeInfoAdress() {
	createProfilMenu('js-form-adress', '');

	createLabel('.js-form-adress', 'adresse_u', 'Adresse');
	createInput('.js-form-adress', 'text', 'adresse_u', 'Adresse', '');

	createLabel('.js-form-adress', 'ville_u', 'Ville');
	createInput('.js-form-adress', 'text', 'ville_u', 'Ville', '');

	createLabel('.js-form-adress', 'code_postal_u', 'Code Postal');
	createInput('.js-form-adress', 'text', 'code_postal_u', 'Code Postal', '');

	createButtonSubmit('submit-adress_u', '.js-form-adress');

	createButtonCancel();
}

function changeInfoPrincipal() {
	createProfilMenu('js-form-principal', '');

	createLabel('.js-form-principal', 'nom_u', 'Nom');
	createInput('.js-form-principal', 'text', 'nom_u', 'Nom', '');

	createLabel('.js-form-principal', 'prenom_u', 'Prenom');
	createInput('.js-form-principal', 'text', 'prenom_u', 'Prenom', '');

	createLabel('.js-form-principal', 'age_u', 'Age');
	createInput('.js-form-principal', 'text', 'age_u', 'Age', '');

	createButtonSubmit('submit-info_u', '.js-form-principal');

	createButtonCancel();
}

function changeImg() {
	createProfilMenu('js-form-img', 'multipart/form-data');

	createLabel('.js-form-img', 'img', 'choisi une image');
	createInput('.js-form-img', 'file', 'img', '', '');

	createButtonSubmit('submit-image_u', '.js-form-img');

	createButtonCancel();
}

//fonction de creation des balise html
function createLabel(nameClass, name, text) {
	const form = document.querySelector(nameClass);

	var newLabel = document.createElement('label');

	newLabel.setAttribute('for', name);
	newLabel.innerText = text;

	form.appendChild(newLabel);
}

function createInput(nameClass, type, name, placeholder, value) {
	const form = document.querySelector(nameClass);

	var newInput = document.createElement('input');

	newInput.setAttribute('type', type);
	newInput.setAttribute('name', name);
	newInput.setAttribute('placeholder', placeholder);
	newInput.setAttribute('value', value);

	form.appendChild(newInput);
}

function createButtonSubmit(name, nameClass) {
	var newButton = document.createElement('button');
	const form = document.querySelector(nameClass);

	newButton.setAttribute('type', 'submit');
	newButton.setAttribute('name', name);
	newButton.innerText = 'Valider';

	form.appendChild(newButton);
}

function createProfilMenu(nameClass, enctype) {
	const main = document.querySelector('main');
	// var newdivJsProfilModify = document.createElement('div');

	// newdivJsProfilModify.setAttribute('class', 'js-profil-modify');

	// main.appendChild(newdivJsProfilModify);

	// const divJsProfilModify = document.querySelector('.js-profil-modify');
	var divJsProfilMenu = document.createElement('div');

	divJsProfilMenu.setAttribute('class', 'js-profil-menu');
	main.appendChild(divJsProfilMenu);

	const jsProfilMenu = document.querySelector('.js-profil-menu');
	var newForm = document.createElement('form');

	newForm.setAttribute('method', 'POST');
	newForm.setAttribute('class', nameClass);
	newForm.setAttribute('enctype', enctype);

	jsProfilMenu.appendChild(newForm);
}

function createButtonCancel() {
	const jsProfilMenu = document.querySelector('.js-profil-menu');
	var buttonCancel = document.createElement('button');

	buttonCancel.setAttribute('class', 'js-profil-cancel');
	buttonCancel.setAttribute('onclick', 'cancel(".js-profil-menu")');
	buttonCancel.innerText = 'Retour';

	jsProfilMenu.appendChild(buttonCancel);
}

//fonction suppression de la div js-form-menu
function cancel(nameClass) {
	const main = document.querySelector('main');
	const div = document.querySelector(nameClass);
	main.removeChild(div);
}
