const login = document.querySelector('input[name="login"]');
const password = document.querySelector('input[name="password"]');
const connectButton = document.querySelector('input[value="Connect"]');

function switchButton() {
	if (login.value.length > 0 && password.value.length > 0)
		connectButton.disabled = false;
	else
		connectButton.disabled = true;
}

login.addEventListener('input', switchButton);
password.addEventListener('input', switchButton);