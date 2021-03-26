<?php
function log_user() {
	if (!isset($_POST['submit']) or !isset($_POST['login']) or !isset($_POST['password']))
		return (false);
	
	$bdd = new PDO('mysql:host=localhost; dbname=camagrudb;charset=utf8', 'camagru', 'camagru42',
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	$request = $bdd->prepare("SELECT password FROM users WHERE name = :login");
	$request->execute(array("login" => $_POST['login']));
	$password = $request->fetch();

	if (!$password or !password_verify($_POST['password'], $password[0]))
		return (false);
	$_SESSION['login'] = $_POST['login'];
	return (true);
}

session_start();
if (log_user())
	header("location: profil.php");
else
{
	$_SESSION['invalid_login'] = true;
	header("location: index.php");
}



    