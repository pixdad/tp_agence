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
		<h2>Gérer les programmation de circuit</h2>
		<h3>Supprimer une programmation</h3>
		<table class="full bg-fond-sombre">
			<tr style="border-bottom:1px solid white">
				<td>ID</td>
				<td>Description</td>
				<td>Ville de départ</td>
				<td>Ville d'arrivée</td>
				<td>Date de départ</td>
				<td>Nombre de places</td>
				<td>Prix</td>
				<td>Supprimer</td>
			</tr>
			<?php 

					$sql = 'SELECT * FROM CIRCUIT C, CIRCUITPROGRAMME P WHERE C.circuitID = P.circuitID ORDER BY dateDepart DESC';
					$req = $bdd->query($sql);
					/*if (!$req){
						echo "\nEreur :\n";
						print_r($req->errorInfo());
					}*/
					while($d = $req->fetch()) { ?>

					<tr>
						<td><?=$d['programmationID']?></td>
						<td><?=$d['description']?></td>
						<td><?=$d['villeDepart']?></td>
						<td><?=$d['villeArrivee']?></td>
						<td><?=$d['dateDepart']?></td>
						<td><?=$d['nombrePersonnes']?></td>
						<td><?=$d['prix']?>€</td>
						<td>
							<form method="post" action="../script/ajouterSupprimerProg_scr.php" onsubmit="return confirm('Etes vous sûr de vouloir supprimer cette programmation ?');">
								<input type="hidden" name="pID" value="<?=$d['programmationID']?>">
								<input class="button-xs bg-main" type="submit" value="Supprimer">
							</form>
						</td>
					</tr>
					<?php } ?>
		</table>
		<h3>Créer une programmation</h3>
		<form action="../script/ajouterSupprimerProg_scr.php" method="post">
			<div class="para center">
				<table class="full">
					<tr>
						<td>
							Choisissez un circuit :
						</td>
						<td>
							<select name="cID" required>
								<?php $req = $bdd->query('SELECT * FROM CIRCUIT'); while($d = $req->fetch()) {
									echo '<option value="'.$d['circuitID'].'">'.$d['circuitID'].' - '.$d['description'];
								} ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Date de départ</td>
						<td><input type="date" name="dateDepart" required></td>
					</tr>
					<tr>
						<td>Nombre de personnes</td>
						<td><input type="number" name="nombre" min="0" required></td>
					</tr>
					<tr>
						<td>Prix</td>
						<td><input name="prix" type="number" required>€</td>
					</tr>
				</table>
			</div>
			<div class="ta-center"><input class="button-sm bg-main" type="submit" value="Ajouter"></div>
		</form>
	</section>
</body>
</html>