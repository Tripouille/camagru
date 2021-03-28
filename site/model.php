<?php

$bdd = new PDO('mysql:host=localhost; dbname=camagrudb;charset=utf8', 'camagru', 'camagru42',
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

function db_get_users() {
	global $bdd;
	return ($bdd->query("SELECT * FROM users"));
}

function db_get_user($user_name) {
	global $bdd;
	$request = $bdd->prepare("SELECT login FROM users WHERE login = :login");
	if (!$request->execute(["login" => $user_name]))
		throw new Exception('Cannot execute bdd request.');
	return ($request->fetch());
}

function db_add_user($user_name, $hashed_password, $mail) {
	global $bdd;
	$request = $bdd->prepare("INSERT INTO users VALUES(:login, :password, :mail)");
	if (!$request->execute(["login" => $user_name,
							"password" => $hashed_password,
							"mail" => $mail]))
		throw new Exception('Cannot execute bdd request.');
}

function db_get_password($login) {
	global $bdd;
	$request = $bdd->prepare("SELECT password FROM users WHERE login = :login");
	if (!$request->execute(array("login" => $login)))
		throw new Exception('Cannot execute bdd request.');
	return ($request->fetch());
}