<?php
include("model.php");

function connect_user() {
	if (!isset($_POST['submit']) or !isset($_POST['login']) or !isset($_POST['password']))
		return (false);

	$request_result = db_get_password($_POST['login']);
	if (!$request_result or !password_verify($_POST['password'], $request_result[0]))
		return (false);

	$_SESSION['login'] = $_POST['login'];
	return (true);
}

function register_form_is_valid() {
	if (!isset($_POST['login']) or !isset($_POST['password']) or !isset($_POST['mail'])
	or empty($_POST['login']) or empty($_POST['password']) or empty($_POST['mail']))
		$_SESSION['error'] = "Login, password and mail must be filled";
	elseif (htmlspecialchars($_POST['login']) != $_POST['login'])
		$_SESSION['error'] = "Invalid login";
	elseif ($_POST['login'] == $_POST['password'])
		$_SESSION['error'] = "Login and password must be different";
	elseif (strlen($_POST['password']) < 6)
		$_SESSION['error'] = "Password too short";
	elseif (htmlspecialchars($_POST['login']) != $_POST['login'] 
	or !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
		$_SESSION['error'] = "Invalid mail format";
	else if (db_contain_user($_POST['login']))
		$_SESSION['error'] = "Login already in use";
	else if (db_contain_mail($_POST['mail']))
		$_SESSION['error'] = "Mail already in use";
	else
		return (true);
	return (false);
}

function register_user() {
	define("PEPPER", "OAJGbY7kRDogl46ku4eBGb6J4PWzn3OC");
	$password_options = ["salt" => PEPPER . $_POST['login'] . PEPPER, "cost" => 10];
	$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT, $password_options);
	db_add_user($_POST['login'], $hashed_password, $_POST['mail']);
	return (true);
}

function login_form() {
	require("views/login_form_view.php");
	unset($_SESSION['error']);
}

function profile() {
	require("views/profile_view.php");
}

function register_form() {
	require("views/register_form_view.php");
	unset($_SESSION['error']);
}

function logout() {
	$_SESSION = array();
}