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
	if (!isset($_POST['submit']) or !isset($_POST['login']) or !isset($_POST['password'])
	or empty($_POST['login']) or empty($_POST['password']))
		$_SESSION['invalid_register'] = "Login and password must be filled.";
	elseif (htmlspecialchars($_POST['login']) != $_POST['login'])
		$_SESSION['invalid_register'] = "Invalid login.";
	elseif ($_POST['login'] == $_POST['password'])
		$_SESSION['invalid_register'] = "Login and password must be different.";
	elseif (strlen($_POST['password']) < 6)
		$_SESSION['invalid_register'] = "password len must be >= 6.";
	else
		return (true);
	return (false);
}

function register_user() {
	$request_result = db_get_user($_POST['login']);
	if ($request_result)
	{
		$_SESSION['invalid_register'] = "Login already in use.";
		return (false);
	}
	define("PEPPER", "OAJGbY7kRDogl46ku4eBGb6J4PWzn3OC");
	$password_options = ["salt" => PEPPER . $_POST['login'] . PEPPER, "cost" => 10];
	$hashed_password = password_hash($_POST['password'], PASSWORD_BCRYPT, $password_options);
	db_add_user($_POST['login'], $hashed_password);
	return (true);
}

function admin() {
	$request = db_get_users();
	require("views/admin_view.php");
}

function login() {
	require("views/login_view.php");
}

function profile() {
	require("views/profile_view.php");
}

function register_form() {
	require("views/register_form_view.php");
}