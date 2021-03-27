<?ob_start(); ?>
<article id="register">
	<form action="index.php?action=register_user" method="POST">
		<input type="text" name="login" placeholder="login" required/>
		<input type="password" name="password" placeholder="Password" required/>
		<input type="submit" name ="submit" value="Register"/>
	</form>
</article>
<?php
if (isset($_SESSION['invalid_register']))
echo '<aside><p class="error">' . $_SESSION["invalid_register"] . '<p/></aside>';
unset($_SESSION['invalid_register']);
$content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>