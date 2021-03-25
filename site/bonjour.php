<?php

try
{
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'admin', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$req = $bdd->prepare("SELECT AVG(prix) AS prix_moyen, console FROM jeux_video WHERE prix > 5 GROUP BY console HAVING prix_moyen <= 10");
$req->execute();
echo '<pre>';
print_r($req->fetchAll());
echo '</pre>';
?>
<p>coucou a tous </p>