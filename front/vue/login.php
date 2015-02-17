<?php 
$response = true;
if (isset($_GET['response']) && $_GET['response']=='false') {
	$response = false;
}
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Agence - Login</title>
</head>
<body>
<?php if(!$response) {?><div class="alert">Identifiant ou mot de passe erroné</div><?php } ?>
<h1>Connexion</h1>
<div>
	<form action="../script/login_scr.php" method="post">
		<fieldset>
			<legend>Connexion</legend>
			<input type="text" name="login"	placeholder="Saisissez votre login ...">
			<input type="password" name="passwd" placeholder="Votre mot de passe ...">
			<input type="submit" value="Se connecter">
		</fieldset>
	</form>
</div>
	
</body>
</html>