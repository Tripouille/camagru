<?php
session_start();
include("controller.php");
try { //switch //header location pour connect
	if (!isset($_GET['action']) or $_GET['action'] == 'login_form') {
		if (isset($_SESSION['login']))
			profile();
		else
			login_form();
	}
	else if ($_GET['action'] == 'connect_user') {
		if (connect_user())
			header("location: /profile");
		else {
			$_SESSION['invalid_login'] = true;
			header("location: /");
		}
	}
	else if ($_GET['action'] == 'register_form') {
		register_form();
	}
	else if ($_GET['action'] == 'register_user') {
		if (register_form_is_valid() and register_user())
			header("location: /");
		else
			header("location: /register_form");
	}
	else if ($_GET['action'] == 'logout') {
		logout();
		header("location: /");
	}
	else if ($_GET['action'] == 'profile') {
		profile();
	}
}
catch (Exception $e) {
	die ('Internal server error: ' .  $e->getMessage() . '\n');
}