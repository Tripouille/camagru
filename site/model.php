<?php

function db_connect() {
	$bdd = new PDO('mysql:host=localhost; dbname=camagrudb;charset=utf8', 'camagru', 'camagru42',
				array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	return ($bdd);
}

function db_get_users($bdd) {
	return ($bdd->query("SELECT * FROM users"));
}