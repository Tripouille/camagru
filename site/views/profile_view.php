<?php ob_start(); ?>
<p>Profil de <?= $_SESSION['login'] ?></p>
<?php $content = ob_get_clean(); ?>

<?php require("views/template.php"); ?>
