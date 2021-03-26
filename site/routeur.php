<?php
session_start();
include("controller.php");

if (!isset($_GET['action']) or $_GET['action'] == 'login')
{
	if (isset($_SESSION['login']))
		admin();
	else
		login();
}
else if ($_GET['action'] == 'admin')
{
	admin();
}