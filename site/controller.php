<?php
include("model.php");

function admin() {
	$bdd = db_connect();
	$request = db_get_users($bdd);
	require("admin_view.php");
}

function login() {
	require("login_view.php");
}