<?php include '../../include/script/secur_front.php';

if(!$connecte) {
	header('location:login.php?false=session');
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Travel'INT - Gestion Membre</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include '../../include/vue/header.php'; ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Espace membre : <?php echo "$nom $prenom" ?></h1>
		<div class="para-large center">
			<form action="../script/updateInfoCompte.php" method="post" onsubmit="return match('#pass', '#confirm-pass');">
				<fieldset>
					<legend>Modifier mes informations</legend>
					<table class="center">
						<tr>
							<td>Nom* :</td>
							<td><input name="nom" type="text" value="<?=$nom?>" required></td>
						</tr>
						<tr>
							<td>Prénom* :</td>
							<td><input name="prenom" type="text" value="<?=$prenom?>" required></td>
						</tr>
						<tr>
							<td>Adresse* :</td>
							<td><input name="adresse" type="text" value="<?=$adresse?>" required></td>
						</tr>
						<tr>
							<td>Login* :</td>
							<td><input name="login" type="text" value="<?=$login?>" required></td>
						</tr>
						<tr>
							<td>Changer de mot de passe : </td>
							<td><input id="pass" name="passwd" type="password"></td>
						</tr>
						<tr>
							<td>Confirmer votre mot de passe : </td>
							<td><input id="confirm-pass" type="password"></td>
						</tr>
					</table>
					<input type="hidden" name="clientID" value="<?=$id?>">
					<div class="h50"></div>
					<div class="ta-center"><input type="submit" class="button-sm bg-second" value="Enregistrer"></div>
				</fieldset>
			</form>
			<hr>
			<fieldset>
				<legend>Gérer mes réservations</legend>
			</fieldset>
		</div>
	</section>
	<?php include '../../include/vue/footer.php' ?>
</body>
</html>