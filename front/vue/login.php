<?php 
/* ========================================================================== *\
 * Formulaire de login
 * => ?false=id : erreur de login
 * => ?flase=session : tentative d'accès à une page interdite
\* ========================================================================== */
include '../../include/script/secur_front.php';

$message="vide";
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
	<?php include '../../include/vue/head.php'; ?>
</head>

<body>
	<?php include '../../include/vue/header.php'; ?>
	<div id="contenu">
		<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
		<?php if(!$response) {?><div class="banner alert"><?=$message?></div><?php } ?>
		<section class="section">
			<h2>Connexion</h2>
			<form action="../script/login_scr.php" method="post" class="form">
				<fieldset class="para center ta-center">
					<legend>Identifiants</legend>
					<input type="text" name="login"	placeholder="Saisissez votre login ...">
					<input type="password" name="passwd" placeholder="Votre mot de passe ...">
					<input class="button-xs bg-main" type="submit" value="Se connecter">
				</fieldset>
			</form>
		</section>
	</div>
	<?php include '../../include/vue/footer.php' ?>
</body>
</html>