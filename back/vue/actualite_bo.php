<?php include '../../include/script/secur_back.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Back-Office : Actualités - Travel'INT Agency</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include "../../include/vue/header.php" ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Gérer les Actualités</h2>
			<table class="full ta-center bg-fond-sombre">
				<tr style="border-bottom:1px solid white">
					<td>ID</td>
					<td>Titre</td>
					<td>Date</td>
					<td>Modifier</td>
					<td>Supprimer</td>
				</tr>

				<?php 

					$sql = 'SELECT * FROM ACTUALITE';
					$req = $bdd->query($sql);
					if (!$req){
						echo "\nEreur :\n";
						print_r($req->errorInfo());
					}
					while($donnees = $req->fetch()) { ?>

					<tr>
						<td><?=$donnees['id']?></td>
						<td><?=$donnees['titre']?></td>
						<td><?=$donnees['date']?></td>
						<td>
							<a class="button-xs bg-main" 
							onclick="$('.lig-modif').hide();$(this).parent().parent().next('.lig-modif').show(); ">Modifier</a>
						</td>
						<td>
							<form method="post" action="../script/ajouterModifierSupprimerActualite_scr.php">
								<input type="hidden" name="action" value="supprimer">
								<input type="hidden" name="actuID" value="<?=$donnees['id']?>">
								<input class="button-xs bg-second" type="submit" value="Supprimer">
							</form>
						</td>
					</tr>
					<tr class="lig-modif bg-fond-2">
						<td colspan="7">
							<form method="post" action="../script/ajouterModifierSupprimerActualite_scr.php">
								<input type="hidden" name="action" value="modifier">
								<input type="text" name="titre" placeholder="Titre" value="<?=$donnees['titre']?>">
								<textarea name="texte" cols="30" rows="10"><?=$donnees['texte']?></textarea>
								<input class="button-xs bg-main" type="submit" value="Modifier">
							</form>
						</td>
					</tr> 
					<?php } ?>
			</table>

			<h3>Créer une actualité</h3>
			<div class="para center">
				<form action="../script/ajouterModifierSupprimerActualite_scr.php" method="post">
					<input type="hidden" name="action" value="ajouter">
					<table class="center">
						<tr>
							<td>Titre : </td>
							<td><input type="text" name="description" required></td>
						</tr>
						<tr>
							<td>Texte : </td>
							<td>
								<textarea name="texte" cols="30" rows="10" required></textarea>
							</td>
						</tr>
					</table>
					<div class="ta-center"><input class="button-sm bg-main" type="submit" value="Ajouter"></div>
				</form>
			</div>
	</section>
</body>
</html>