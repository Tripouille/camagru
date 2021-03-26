<?php ob_start(); ?>
<article id="login">
	<h1 id="logo">Camagru</h1>
	<form action="connect_user.php" method="POST">
		<input type="text" name="login" placeholder="Login" required/>
		<input type="password" name="password"  placeholder="Password" required/>
		<input type="submit" name ="submit" value="Connect"/>
	</form>
</article>
<?php
if (isset($_SESSION['invalid_login']))
	echo '<aside><p class="error"> Invalid login <p/></aside>';
unset($_SESSION['invalid_login']);
$content = ob_get_clean(); ?>

<?php require("template.php"); ?>