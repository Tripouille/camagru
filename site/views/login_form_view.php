<?php ob_start(); ?>
<article id="login">
	<h1>Camagru</h1>
	<section>
		<form action="/connect_user" method="POST">
			<input type="text" name="login" placeholder="Login" required/>
			<input type="password" name="password"  placeholder="Password" required/>
			<input type="submit" name ="submit" value="Connect" disabled/>
		</form>
		<p>
			<a href="/register_form">Register</a>
		</p>
		<aside class="error"><p><?= $_SESSION['error'] ?? '' ?></p></aside>
	</section>
</article>
<script type="text/javascript" src="scripts/login_form_script.js"></script>

<?php $content = ob_get_clean(); ?>
<?php require("views/template_unlogged.php"); ?>