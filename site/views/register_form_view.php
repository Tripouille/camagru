<?php ob_start(); ?>
<article id="login">
	<h1 id="logo">Camagru</h1>
	<form action="index.php?action=register_user" method="POST">
		<input type="text" name="login" placeholder="Login" required/>
		<input type="password" name="password"  placeholder="Password" required/>
		<input type="text" name="mail"  placeholder="Mail" required/>
		<button type="submit">Register</button>
	</form>
	<?php
		if (isset($_SESSION['invalid_register']))
		echo '<aside class="error"><p>' . $_SESSION["invalid_register"] . '<p/></aside>';
		unset($_SESSION['invalid_register'])
	?>
</article>
<?php $content = ob_get_clean(); ?>

<?php require("views/template_unlogged.php"); ?>