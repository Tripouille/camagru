<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
	</head>

	<body>
		<p>
			<?php 
				if (!isset($_FILES['monfichier']) || $_FILES['monfichier']['error'] != 0)
					echo "Erreur lors de l'envoi du fichier!";
				else
				{
					echo "Bien recu capitaine!";
					$infos = pathinfo($_FILES['monfichier']['name']);
					$fichier = $_FILES['monfichier'];
					$user = "jgambard";
					print_r($infos);
					$extension = $infos['extension'];
					echo "<p>extension : $extension</p>";
					if (in_array($extension, ['jpg', 'pdf']))
					{
						echo "<p>bonne extension</p>";
						if (!is_dir("./$user/"))
						{
							if (file_exists("./$user/"))
								unlink('file');
							mkdir("./$user/", 0755, true);
						}
	
						move_uploaded_file($fichier['tmp_name'], "./$user/devis.$extension");
					}
					else
						echo "<p>mauvaise extension</p>";
				}
			?>
		</p>
	</body>
</html>
