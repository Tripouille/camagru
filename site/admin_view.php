<?php ob_start(); ?>
<table>
<?php while ($data = $request->fetch())
{
	echo '<tr>';
	echo "<td>" .$data['name'] . "</td><td> " . $data['password'] . "</td>";
	echo "</tr>";
} ?>
</table>
<?php $content = ob_get_clean(); ?>

<?php require("template.php"); ?>