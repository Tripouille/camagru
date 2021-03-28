<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<link href="css/template.css" rel="stylesheet">
		<title>Camagru</title>
	</head>

	<body>
		<?= $content ?>
		<form action="index.php?action=logout" method="POST">
			<input type="submit" value="Logout"/>
		</form>
	</body>
</html>