<?php include '../../include/script/secur_back.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Back-Office : Avis - Travel'INT Agency</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include "../../include/vue/header.php" ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Modérer les avis</h2>
			<table class="full ta-center bg-fond-sombre">
				<tr style="border-bottom:1px solid white">
					<td>Circuit</td>
					<td>Note</td>
					<td>Avis</td>
					<td>Auteur</td>
					<td>Supprimer</td>
				</tr>

				<?php 

					$sql = 'SELECT * FROM AVIS A, CIRCUIT CI, CLIENT CL WHERE A.clientID = CL.clientID AND A.circuitID = CI.circuitID ORDER BY CI.circuitID, A.avis';
					$req = $bdd->query($sql);
					if (!$req){
						echo "\nEreur :\n";
						print_r($req->errorInfo());
					}
					while($donnees = $req->fetch()) { ?>

					<tr>
						<td><?=$donnees['circuitID']?> - <?=$donnees['description']?></td>
						<td><?=$donnees['note']?></td>
						<td style="max-width:500px;"><?=$donnees['avis']?></td>
						<td><?=$donnees['login']?></td>
						<td>
							<form method="post" action="../script/supprimerAvis_scr.php">
								<input type="hidden" name="action" value="supprimer">
								<input type="hidden" name="circuitID" value="<?=$donnees['circuitID']?>">
								<input type="hidden" name="clientID" value="<?=$donnees['clientID']?>">
								<input class="button-xs bg-second" type="submit" value="Supprimer">
							</form>
						</td>
					</tr>
					<?php } ?>
			</table>
	</section>
</body>
</html>