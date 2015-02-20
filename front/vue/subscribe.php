<?php include '../../include/script/secur_front.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Travel'INT - Accueil</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include '../../include/vue/header.php'; ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>S'inscrire</h2>
		<div class="para-large center">
			<form class="form" action="">
				<table class="center">
					<tr>
						<td>Nom : </td>
						<td><input type="text" name="nom" placeholder="Votre nom" required></td>
					</tr>
					<tr>
						<td>Prenom : </td>
						<td><input type="text" name="prenom" placeholder="Votre prénom" required></td>
					</tr>
					<tr>
						<td>Login : </td>
						<td><input type="text" name="login" placeholder="Votre login" required></td>
					</tr>
					<tr>
						<td>Mot de passe : </td>
						<td><input type="password" name="passwd" placeholder="mot de passe" required></td>
					</tr>
					<tr>
						<td>Confirmer : </td>
						<td><input type="password" placeholder="confirmer de passe" required></td>
					</tr>
				</table>
				<p class="ta-center"><input type="submit" class="button-xl bg-main" value="S'inscrire"></p>
			</form>
		</div>
	</section>
</body>
</html>