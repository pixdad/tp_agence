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
	<section class="section bg-fond-2">
		<h2>Nos circuits</h2>
		<div class="row">
			<?php 
				$req = $bdd->query('SELECT circuitID, description, paysDepart, villeDepart, villeArrivee, dureeCircuit FROM CIRCUIT');
				while($donnees=$req->fetch()) { ?>
					
					<div class="col col-50 padding">
						<div class="center circuit-detail padding bg-fond">
							<span class="info-titre"><?=$donnees['description']?> <a style="vertical-align:middle" class="button-sm bg-main" href="../script/afficherAvis_scr.php?id=<?=$donnees['circuitID']?>"  onclick="open(this.href(), 'Popup', 'scrollbars=1,resizable=1,height=560,width=770'); return false;">Avis</a></span>
							<div class="row">
								<p class="col col-50 padding">
									<b>Départ : </b><?=$donnees['villeDepart']?>, <?=$donnees['paysDepart']?><br/> <b>Arrivée : </b><?=$donnees['villeArrivee']?><br/>
									<b>Durée : </b><?=$donnees['dureeCircuit']?> jours
								</p>
								<p class="col col-50 padding">
									<b>Etapes :</b><br/>
									<?php 
									$req_etape = $bdd->prepare('SELECT numeroEtape, villeEtape, nombreJours FROM ETAPE WHERE circuitID = ? ORDER BY numeroEtape');
									$req_etape->execute(array($donnees['circuitID']));
									while($etapes=$req_etape->fetch()) {
										echo $etapes['numeroEtape']." - ".$etapes['villeEtape'].", ".$etapes['nombreJours']." jours<br/>";
									} 
									?>
						
								</p>
							</div>
						</div>
					</div>

				<?php }
			?>
					
			?>
		</div>
	</section>
	<section id="circuit" class="section bg-fond-1">
		<h2 class="wow fadeInUp">Réserver</h2>
		<?php include '_circuit.php'; ?>
	</section>
	

</body>
</html>