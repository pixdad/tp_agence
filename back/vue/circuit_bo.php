<?php include '../../include/script/secur_back.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Back-Office : Circuits - Travel'INT Agency</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include "../../include/vue/header.php" ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Gérer les circuits</h2>
			<table class="full ta-center bg-fond-sombre">
				<tr style="border-bottom:1px solid white">
					<td>Description</td>
					<td>Ville de départ</td>
					<td>Pays de départ</td>
					<td>Ville d'arrivée</td>
					<td>Durée en jours</td>
					<td>Modifier</td>
					<td>Supprimer</td>
				</tr>

				<?php 

					$sql = 'SELECT * FROM CIRCUIT';
					$req = $bdd->query($sql);
					if (!$req){
						echo "\nEreur :\n";
						print_r($req->errorInfo());
					}
					while($donnees = $req->fetch()) { ?>

					<tr>
						<td><?=$donnees['description']?></td>
						<td><?=$donnees['villeDepart']?></td>
						<td><?=$donnees['paysDepart']?></td>
						<td><?=$donnees['villeArrivee']?></td>
						<td><?=$donnees['dureeCircuit']?></td>
						<td>
							<a class="button-xs bg-main" 
							onclick="$('.lig-modif-circuit').hide();$(this).parent().parent().next('.lig-modif-circuit').show(); ">Modifier</a>
						</td>
						<td>
							<form method="post" action="../script/modifierSupprimerCircuit_scr.php">
								<input type="hidden" name="action" value="supprimer">
								<input type="hidden" name="circuitID" value="<?=$donnees['circuitID']?>">
								<input class="button-xs bg-second" type="submit" value="Supprimer">
							</form>
						</td>
					</tr>
					<tr class="lig-modif-circuit bg-fond-2">
						<td colspan="7">
							<p>Infos générales</p>
							<form method="post" action="../script/modifierSupprimerCircuit_scr.php">
								<input type="hidden" name="action" value="modifier">
								<input type="text" name="description" placeholder="Description" >
								<input type="text" name="villeDepart" placeholder="Ville de départ" >
								<input type="text" name="paysDepart" placeholder="Pays de départ" >
								<input type="text" name="villeArrivee" placeholder="Ville d'arrivée" >
								<input type="text" name="dureeCircuit" placeholder="durée du circuit" >
								<input class="button-xs bg-main" type="submit" value="Modifier">
							</form>
							<p>Remplacer toute les étapes</p>
							<div class="row">
								<div class="col col-25">
									<?php $reqEtape = $bdd->prepare('SELECT * FROM ETAPE WHERE circuitID = ?');
									$reqEtape->execute(array($donnees['circuitID']));
									if (!$reqEtape){	echo "\nEreur :\n";	print_r($reqEtape->errorInfo()); }
									while($etape = $reqEtape->fetch()) { 
										echo $etape['numeroEtape']." - ".$etape['villeEtape']." : ".$etape['nombreJours']." jour(s)<br>";
									} ?>
								</div>
								<div class="col col-25">
									<form method="post" action="../script/modifierSupprimerCircuit_scr.php">
										<input type="hidden" name="action" value="modifierEtape">
										<input type="hidden" name="circuitID" value="<?=$donnees['circuitID']?>">
										<input type="text" name="etape[]" placeholder="Ville étape"> <input type="number" min="1" placeholder="nombre de jours"><br>
										<img src="../../src/img/plus.png" height="64" width="64" alt="" 
										onclick="$(this).before('<input type=\'text\' name=\'etape[]\' placeholder=\'Ville étape\'><input type=\'number\' min=\'1\' placeholder=\'nombre de jours\'><img src=\'../../src/img/moins.png\' onclick=\'$(this).prev().prev().remove();$(this).prev().remove();$(this).next().remove();$(this).remove();\'/><br>');" />
										<br>
										<input class="button-xs bg-second" type="submit" value="Remplacez les étapes">
									</form>
								</div>
							</div>
						</td>
					</tr> 

					<?php } ?>
			</table>
	</section>
</body>
</html>