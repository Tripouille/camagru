<?php
session_start();
include("controller.php");
try { //switch //header location pour connect
	if (!isset($_GET['action']) or $_GET['action'] == 'login') {
		if (isset($_SESSION['login']))
			admin();
		else
			login_form();
	}
	else if ($_GET['action'] == 'admin') {
		admin();
	}
	else if ($_GET['action'] == 'connect_user') {
		if (connect_user())
			profile();
		else {
			$_SESSION['invalid_login'] = true;
			login_form();
		}
	}
	else if ($_GET['action'] == 'register_form') {
		register_form();
	}
	else if ($_GET['action'] == 'register_user') {
		if (register_form_is_valid() and register_user())
			login_form();
		else
			register_form();
	}
	else if ($_GET['action'] == 'logout') {
		logout();
		login_form();
	}
	else if ($_GET['action'] == 'profile') {
		profile();
	}
}
catch (Exception $e) {
	die ('Internal server error: ' .  $e->getMessage() . '\n');
}