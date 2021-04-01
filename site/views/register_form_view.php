<?php ob_start(); ?>
<article id="register">
	<h1>Camagru</h1>
	<section>
		<form action="/register_user" method="POST">
			<input type="text" name="login" placeholder="Login" value="<?= $_SESSION['register_form']['login'] ?? ""?>" required/>
			<input type="password" name="password"  placeholder="Password" value="<?= $_SESSION['register_form']['password'] ?? "" ?>" required/>
			<input type="text" name="mail"  placeholder="Mail" value="<?= $_SESSION['register_form']['mail'] ?? "" ?>" required/>
			<input type="submit" value="Register" disabled />
		</form>
		<aside class="error"><p><?= $_SESSION['error'] ?? '' ?></p></aside>
	</section>
</article>

<script type="text/javascript" src="scripts/register_form_script.js"></script>
<?php $content = ob_get_clean(); ?>
<?php require("views/template_unlogged.php"); ?>