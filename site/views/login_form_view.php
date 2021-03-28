<?php ob_start(); ?>
<article id="login">
	<h1 id="logo">Camagru</h1>
	<form action="index.php?action=connect_user" method="POST">
		<input type="text" name="login" placeholder="Login" required/>
		<input type="password" name="password"  placeholder="Password" required/>
		<input type="submit" name ="submit" value="Connect"/>
	</form>
	<form action="index.php" method="GET">
			<button type="submit" name="action" value="register_form">Register</button>
	</form>
	<?php
		if (isset($_SESSION['invalid_login']))
			echo '<aside class="error"><p> Invalid login <p/></aside>';
		unset($_SESSION['invalid_login']);
	?>
</article>
<?php $content = ob_get_clean(); ?>

<?php require("views/template_unlogged.php"); ?>