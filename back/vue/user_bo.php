<?php include '../../include/script/secur_back.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Back-Office : Utilisateurs - Travel'INT Agency</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include "../../include/vue/header.php" ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Gérer les utilisateurs</h2>
			<table class="full ta-center bg-fond-sombre">
				<tr style="border-bottom:1px solid white">
					<td>Prenom</td>
					<td>Nom</td>
					<td>Adresse</td>
					<td>Login</td>
					<td>Supprimer</td>
				</tr>

				<?php 

					$sql = 'SELECT * FROM CLIENT';
					$req = $bdd->query($sql);
					if (!$req){
						echo "\nEreur :\n";
						print_r($req->errorInfo());
					}
					while($donnees = $req->fetch()) { ?>

					<tr>
						<td><?=$donnees['prenom']?></td>
						<td><?=$donnees['nom']?></td>
						<td><?=$donnees['adresse']?></td>
						<td><?=$donnees['login']?></td>
						<td>
							<form method="post" action="../script/supprimerUser_scr.php">
								<input type="hidden" name="login" value="<?=$donnees['login']?>">
								<input class="button-xs bg-second" type="submit" value="Supprimer">
							</form>
						</td>
					</tr>
					<?php } ?>
			</table>
	</section>
</body>
</html>