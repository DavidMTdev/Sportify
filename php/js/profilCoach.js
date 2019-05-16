const jsButtonImg = document.querySelector('.js-button-img');
jsButtonImg.addEventListener('click', changeImg);

const jsButtonPrincipal = document.querySelector('.js-button-principal');
jsButtonPrincipal.addEventListener('click', changeInfoPrincipal);

const jsButtonAdress = document.querySelector('.js-button-adress');
jsButtonAdress.addEventListener('click', changeInfoAdress);

const jsButtonContact = document.querySelector('.js-button-contact');
jsButtonContact.addEventListener('click', changeInfoContact);

const jsButtonSpeciality = document.querySelector('.js-button-speciality');
jsButtonSpeciality.addEventListener('click', changeInfoSpeciality);

const jsButtonPassword = document.querySelector('.js-button-password');
jsButtonPassword.addEventListener('click', changeInfoPassword);

//fonction d'affichage du menu
function changeInfoSpeciality() {
	createProfilMenu();
	createH2('contact');
	createProfilFrom();
	createForm('js-form', '');
	// createLabel('.js-form-speciality', 'specialite', 'Specialite');
	createInput('.js-form', 'text', 'specialite', 'Specialite', '');
	createButtonSubmit('submit-info_c', '.js-form');
}

function changeInfoPassword() {
	createProfilMenu();
	createH2('contact');
	createProfilFrom();
	createForm('js-form', '');
	// createLabel('.js-form-password', 'ancient-password', 'Ancien Mot de passe<');
	createInput('.js-form', 'password', 'ancient-password', 'Ancient Password', '');
	// createLabel('.js-form-password', 'new-password', 'Ancien Mot de passe<');
	createInput('.js-form', 'password', 'new-password', 'New Password', '');
	// createLabel('.js-form-password', 'confirm-password', 'Confirmer Mot de passe<');
	createInput('.js-form', 'password', 'confirm-password', 'Confirm Password', '');
	createButtonSubmit('submit-password_c', '.js-form');
}

function changeInfoContact() {
	createProfilMenu();
	createH2('contact');
	createProfilFrom();
	createForm('js-form', '');
	// createLabel('.js-form-contact', 'telephone_c', 'Telephone');
	createInput('.js-form', 'text', 'telephone_c', 'Telephone', '');
	createButtonSubmit('submit-contact_c', '.js-form');
}

function changeInfoAdress() {
	createProfilMenu();
	createH2('addresse');
	createProfilFrom();
	createForm('js-form', '');
	// createLabel('.js-form-adress', 'adresse_c', 'Adresse');
	createInput('.js-form', 'text', 'adresse_c', 'Adresse', '');
	// createLabel('.js-form-adress', 'ville_c', 'Ville');
	createInput('.js-form', 'text', 'ville_c', 'Ville', '');
	// createLabel('.js-form-adress', 'code_postal_c', 'Code Postal');
	createInput('.js-form', 'text', 'code_postal_c', 'Code Postal', '');
	createButtonSubmit('submit-adress_c', '.js-form');
}

function changeInfoPrincipal() {
	createProfilMenu();
	createH2('principal');
	createProfilFrom();
	createForm('js-form', '');
	// createLabel('.js-form-principal', 'nom_c', 'Nom');
	createInput('.js-form', 'text', 'nom_c', 'Nom', '');
	// createLabel('.js-form-principal', 'prenom_c', 'Prenom');
	createInput('.js-form', 'text', 'prenom_c', 'Prenom', '');
	// createLabel('.js-form-principal', 'age_c', 'Age');
	createInput('.js-form', 'text', 'age_c', 'Age', '');
	createTextArea('.js-form', 'description_c', 'enter une description');
	createButtonSubmit('submit-info_c', '.js-form');
}

function changeImg() {
	createProfilMenu();
	createH2('image');
	createProfilFrom();
	createForm('js-form', 'multipart/form-data');
	// createLabel('.js-form-img', 'img', 'choisi une image');
	createInput('.js-form', 'file', 'img', '', '');
	createButtonSubmit('submit-image_c', '.js-form');
}

//fonction de creation des balise html
function createTextArea(nameClass, name, placeholder) {
	const form = document.querySelector(nameClass);

	var newTextArea = document.createElement('textarea');

	newTextArea.setAttribute('name', name);
	newTextArea.setAttribute('placeholder', placeholder);
	newTextArea.setAttribute('cols', '50');
	newTextArea.setAttribute('rows', '5');

	form.appendChild(newTextArea);
}

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
	newButton.setAttribute('class', 'js-button-form');
	newButton.innerText = 'Valider';

	form.appendChild(newButton);
}

function createProfilMenu() {
	const main = document.querySelector('main');

	var newdivjsFiltreBlur = document.createElement('div');
	newdivjsFiltreBlur.setAttribute('class', 'js-filter-blur');

	main.appendChild(newdivjsFiltreBlur);

	var divJsProfilMenu = document.createElement('div');

	divJsProfilMenu.setAttribute('class', 'js-profil-menu');
	main.appendChild(divJsProfilMenu);

	createButtonCancel();
}

function createProfilFrom() {
	const jsProfilMenu = document.querySelector('.js-profil-menu');
	var newDiv = document.createElement('div');

	newDiv.setAttribute('class', 'js-profil-form');

	jsProfilMenu.appendChild(newDiv);
}

function createForm(nameClass, enctype) {
	const jsProfilMenu = document.querySelector('.js-profil-form');
	var newForm = document.createElement('form');

	newForm.setAttribute('method', 'POST');
	newForm.setAttribute('class', nameClass);
	newForm.setAttribute('enctype', enctype);

	jsProfilMenu.appendChild(newForm);
}

function createH2(h2) {
	const jsProfilMenu = document.querySelector('.js-profil-menu');

	var newH2 = document.createElement('h2');
	newH2.innerText = 'Modification informations ' + h2;

	jsProfilMenu.appendChild(newH2);
}

function createButtonCancel() {
	const jsProfilMenu = document.querySelector('.js-profil-menu');
	var newbuttonCancel = document.createElement('button');

	newbuttonCancel.setAttribute('class', 'js-profil-cancel');
	newbuttonCancel.setAttribute('onclick', 'cancel(".js-profil-menu")');
	// newbuttonCancel.innerText = 'Retour';

	jsProfilMenu.appendChild(newbuttonCancel);

	const ButtonCancel = document.querySelector('.js-profil-cancel');
	var newImg = document.createElement('img');

	newImg.setAttribute('src', 'icons/icons8-effacer-64_1.png');

	ButtonCancel.appendChild(newImg);
}

//fonction suppression de la div js-form-menu
function cancel(nameClass) {
	const main = document.querySelector('main');
	const div = document.querySelector(nameClass);
	const divFiltre = document.querySelector('.js-filter-blur');

	main.removeChild(div);
	main.removeChild(divFiltre);
}
