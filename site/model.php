<?php

$bdd = new PDO('mysql:host=localhost; dbname=camagrudb;charset=utf8', 'camagru', 'camagru42',
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

function db_get_users() {
	global $bdd;
	return ($bdd->query("SELECT * FROM users"));
}

function db_get_user($user_name) {
	global $bdd;
	$request = $bdd->prepare("SELECT name FROM users WHERE name = :name");
	if (!$request->execute(["name" => $user_name]))
		throw new Exception('Cannot execute bdd request.');
	return ($request->fetch());
}

function db_add_user($user_name, $hashed_password) {
	global $bdd;
	$request = $bdd->prepare("INSERT INTO users VALUES(:name, :password)");
	if (!$request->execute(["name" => $user_name, "password" => $hashed_password]))
		throw new Exception('Cannot execute bdd request.');
}

function db_get_password($login) {
	global $bdd;
	$request = $bdd->prepare("SELECT password FROM users WHERE name = :login");
	if (!$request->execute(array("login" => $_POST['login'])))
		throw new Exception('Cannot execute bdd request.');
	return ($request->fetch());
}