const login = document.querySelector('input[name="login"]');
const password = document.querySelector('input[name="password"]');
const mail = document.querySelector('input[name="mail"]');
const registerButton = document.querySelector('input[value="Register"]');
var message = document.querySelector('.error p');

function mailIsValid() {
	return (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-]{2,}$/
			.test(mail.value));
}

function getError() {
	if (login.value.length == 0)
		return ("Login cannot be empty");
	else if (password.value.length < 6)
		return ("Password too short");
	else if (!mailIsValid())
		return ("Invalid mail");
	return ("");
}

function switchButton() {
	if (getError())
		registerButton.disabled = true;
	else
		registerButton.disabled = false;
}

function checkChange() {
	console.log('change');
	if (login.value.length == 0)
		message.textContent = "Login cannot be empty";
	else if (password.value.length > 0 && password.value.length < 6)
		message.textContent = "Password too short";
	else if (mail.value.length > 0 && !mailIsValid())
		message.textContent = "Invalid mail";
	else
		message.textContent = "";
	switchButton();
}

function checkLogin() {
	console.log('login input');
	if (login.value.length == 0)
		message.textContent = "Login cannot be empty";
	else
		message.textContent = "";
	switchButton();
}

function checkPassword() {
	console.log('pass input');
	if (password.value.length < 6)
		message.textContent = "Password too short";
	else
		message.textContent = "";
	switchButton();
}

function checkMail() {
	console.log('mail input');
	if (!mailIsValid(mail))
		message.textContent = "Invalid mail";
	else
		message.textContent = "";
	switchButton();
}

function checkRegister(e) {
	message.textContent = getError();
	if (message.textContent.length > 0)
		e.preventDefault();
}

login.addEventListener('change', checkChange);
password.addEventListener('change', checkChange);
mail.addEventListener('change', checkChange);
login.addEventListener('input', checkLogin);
password.addEventListener('input', checkPassword);
mail.addEventListener('input', checkMail);
registerButton.addEventListener('click', checkRegister);