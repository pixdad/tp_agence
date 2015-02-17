<?php 
$response = true;
if (isset($_GET['false'])) {

	$response = false;

	switch ($_GET['false']) {
		case 'id':
		$message = "Identifiant ou mot de passe erroné";
		break;

		case 'session':
		$message = "Vous devez vous connecter pour accéder à cette page";
		break;
	}
}
 ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Agence - Login</title>
	<?php include '../../include/head.php'; ?>
</head>

<body>
	<div id="contenu">
		<?php if(!$response) {?><div class="banner alert"><?=$message?></div><?php } ?>
		<h1>Connexion</h1>
		<section>
			<form action="../script/login_scr.php" method="post">
				<fieldset class="">
					<legend>Identifiants</legend>
					<input type="text" name="login"	placeholder="Saisissez votre login ...">
					<input type="password" name="passwd" placeholder="Votre mot de passe ...">
					<input type="submit" value="Se connecter">
				</fieldset>
			</form>
		</section>
	</div>
</body>
</html>