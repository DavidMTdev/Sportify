const jsProfilImg = document.querySelector('.js-info-img');
jsProfilImg.addEventListener('click', changeImg);

const jsInfoPrincipal = document.querySelector('.js-info-principal');
jsInfoPrincipal.addEventListener('click', changeInfoPrincipal);

const jsInfoAdress = document.querySelector('.js-info-adress');
jsInfoAdress.addEventListener('click', changeInfoAdress);

const jsInfoContact = document.querySelector('.js-info-contact');
jsInfoContact.addEventListener('click', changeInfoContact);

const jsInfoSpeciality = document.querySelector('.js-info-speciality');
jsInfoSpeciality.addEventListener('click', changeInfoSpeciality);

const jsInfoPassword = document.querySelector('.js-info-password');
jsInfoPassword.addEventListener('click', changeInfoPassword);

const jsInfoBody = document.querySelector('.js-info-body');
jsInfoBody.addEventListener('click', changeInfoBody);

//fonction d'affichage du menu
function changeInfoBody() {
	createProfilMenu('js-form-body');

	createLabel('.js-form-body', 'poid_u', 'Votre poid');
	createInput('.js-form-body', 'text', 'poid_u', 'Poid', '');

	createLabel('.js-form-body', 'taille', 'Votre taille');
	createInput('.js-form-body', 'text', 'taille', 'Taille', '');

	createButtonSubmit('submit-body', '.js-form-body');

	createButtonCancel();
}

function changeInfoPassword() {
	createProfilMenu('js-form-password');

	createLabel('.js-form-password', 'ancient-password', 'Ancien Mot de passe<');
	createInput('.js-form-password', 'password', 'ancient-password', 'Ancient Password', '');

	createLabel('.js-form-password', 'new-password', 'Ancien Mot de passe<');
	createInput('.js-form-password', 'password', 'new-password', 'New Password', '');

	createLabel('.js-form-password', 'confirm-password', 'Confirmer Mot de passe<');
	createInput('.js-form-password', 'password', 'confirm-password', 'Confirm Password', '');

	createButtonSubmit('submit-password', '.js-form-password');

	createButtonCancel();
}

function changeInfoSpeciality() {
	createProfilMenu('js-form-speciality');

	createLabel('.js-form-speciality', 'specialite', 'Specialite');
	createInput('.js-form-speciality', 'text', 'specialite', 'Specialite', '');

	createButtonSubmit('submit-speciality', '.js-form-speciality');

	createButtonCancel();
}

function changeInfoContact() {
	createProfilMenu('js-form-contact');

	createLabel('.js-form-contact', 'telephone_c', 'Telephone');
	createInput('.js-form-contact', 'text', 'telephone_c', 'Telephone', '');

	createButtonSubmit('submit-contact', '.js-form-contact');

	createButtonCancel();
}

function changeInfoAdress() {
	createProfilMenu('js-form-adress');

	createLabel('.js-form-adress', 'adresse_c', 'Adresse');
	createInput('.js-form-adress', 'text', 'adresse_c', 'Adresse', '');

	createLabel('.js-form-adress', 'ville_c', 'Ville');
	createInput('.js-form-adress', 'text', 'ville_c', 'Ville', '');

	createLabel('.js-form-adress', 'code_c', 'Code Postal');
	createInput('.js-form-adress', 'text', 'code_c', 'Code Postal', '');

	createButtonSubmit('submit-adress', '.js-form-adress');

	createButtonCancel();
}

function changeInfoPrincipal() {
	createProfilMenu('js-form-principal');

	createLabel('.js-form-principal', 'nom_c', 'Nom');
	createInput('.js-form-principal', 'text', 'nom_c', 'Nom', '');

	createLabel('.js-form-principal', 'prenom_c', 'Prenom');
	createInput('.js-form-principal', 'text', 'prenom_c', 'Prenom', '');

	createLabel('.js-form-principal', 'age_c', 'Age');
	createInput('.js-form-principal', 'text', 'age_c', 'Age', '');

	createButtonSubmit('submit-info', '.js-form-principal');

	createButtonCancel();
}

function changeImg() {
	createProfilMenu('js-form-img');

	createLabel('.js-form-img', 'image_c', 'choisi une image');
	createInput('.js-form-img', 'file', 'image_c', '', '');

	createButtonSubmit('submit-img', '.js-form-img');

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
	console.log(newButton);
}

function createProfilMenu(nameClass) {
	const main = document.querySelector('main');
	var divJsProfilMenu = document.createElement('div');

	divJsProfilMenu.setAttribute('class', 'js-profil-menu');
	main.appendChild(divJsProfilMenu);

	const jsProfilMenu = document.querySelector('.js-profil-menu');
	var newForm = document.createElement('form');

	newForm.setAttribute('method', 'POST');
	newForm.setAttribute('class', nameClass);

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
