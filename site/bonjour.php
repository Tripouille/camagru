<?php 
	if (isset($_GET['prenom']) && isset($_GET['nom']))
		echo "$_GET[prenom] $_GET[nom]";
	else
		die("You must enter more informations");
?>
<p>coucou a tous </p>