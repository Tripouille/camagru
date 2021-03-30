<?php ob_start(); ?>
<article>
	<h1>Camagru</h1>
	<section>
		<form action="/connect_user" method="POST">
			<input type="text" name="login" placeholder="Login" required/>
			<input type="password" name="password"  placeholder="Password" required/>
			<input type="submit" name ="submit" value="Connect"/>
		</form>
		<form action="/register_form" method="GET">
			<input type="submit" value="Register"/>
		</form>
	</section>
	<?php
		if (isset($_SESSION['invalid_login']))
			echo '<aside class="error"><p> Invalid login <p/></aside>';
		unset($_SESSION['invalid_login']);
	?>
</article>
<?php $content = ob_get_clean(); ?>

<?php require("views/template_unlogged.php"); ?>