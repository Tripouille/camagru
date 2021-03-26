<?php
	session_start();
	if (isset($_SESSION['login']))
		header("location: profil.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="css/site.css" rel="stylesheet">
		<title>Camagru</title>
	</head>

	<body>
		<article id="login">
			<h1 id="logo">Camagru</h1>
			<form action="connect_user.php" method="POST">
				<input type="text" name="login" placeholder="Login" required/>
				<input type="password" name="password"  placeholder="Password" required/>
				<input type="submit" name ="submit" value="Connect"/>
			</form>
		</article>

		<footer>

		</footer>
	</body>
</html>