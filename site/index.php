<?php
session_start();
include("controller.php");
try {
	if (!isset($_GET['action']) or $_GET['action'] == 'login') {
		if (isset($_SESSION['login']))
			admin();
		else
			login();
	}
	else if ($_GET['action'] == 'admin') {
		admin();
	}
	else if ($_GET['action'] == 'connect_user') {
		if (connect_user())
			profile();
		else {
			$_SESSION['invalid_login'] = true;
			login();
		}
	}
	else if ($_GET['action'] == 'register_form') {
		register_form();
	}
	else if ($_GET['action'] == 'register_user') {
		if (register_form_is_valid() and register_user())
			login();
		else
			register_form();
	}
}
catch (Exception $e) {
	die ('Internal server error: ' .  $e->getMessage() . '\n');
}