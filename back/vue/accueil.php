<?php include '../../include/script/secur_back.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Back-office - Travel'INT Agency</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<?php include "../../include/vue/header.php" ?>
	<header class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
	</header>
	<section class="section">
		<h2>Espace Administrateur</h2>
		<div class="row para-large center">
			<div class="col col-20 ta-center" style="vertical-align:middle;"><a href="circuit_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/circuit-xl.png" alt=""><br>Gérer les circuits</a></div>
			<div class="col col-20 ta-center" style="vertical-align:middle;"><a href="programmation_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/programmation-xl.png" alt=""><br>Gérer les programmation</a></div>
			<div class="col col-20 ta-center" style="vertical-align:middle;"><a href="actualite_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/actualite-xl.png" alt=""><br>Gérer les actualités</a></div>
			<div class="col col-20 ta-center" style="vertical-align:middle;"><a href="avis_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/avis-xl.png" alt=""><br>Modérer les avis</a></div>
			<div class="col col-20 ta-center" style="vertical-align:middle;"><a href="user_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/user-xl.png" alt=""><br>Gérer les utilisateurs</a></div>
		</div>
	</section>

	<section class="section">
		<h2>Statistiques</h2>
		<article class="para center">
			<ul style="list-style-type:none;" style="font-size:1.5em;line-height:2em;">
				<li><b style="font-size:1em;line-height:2em;">Nombre d'actualités : </b>
				<?php $req = $bdd->query('SELECT count(*) FROM ACTUALITE');
				if($d = $req->fetch()) {echo $d['count(*)']; } ?></li>
				<li><b style="font-size:1em;line-height:2em;">Nombre d'avis des utilisateurs : </b>
				<?php $req = $bdd->query('SELECT count(*) FROM AVIS');
				if($d = $req->fetch()) {echo $d['count(*)'];  } ?></li>
				<li><b style="font-size:1em;line-height:2em;">Moyenne des notes données : </b>
				<?php $req = $bdd->query('SELECT AVG(note) FROM AVIS');
				if($d = $req->fetch()) {echo $d['AVG(note)'];  } ?></li>
				<li><b style="font-size:1em;line-height:2em;">Moyenne par circuit :</b>
					<ul style="font-size:1em;line-height:1.5em;">
						<?php $req = $bdd->query('SELECT *, AVG(note) FROM AVIS A, CIRCUIT C WHERE A.circuitID = C.circuitID GROUP BY A.circuitID ORDER BY AVG(note) DESC');
						while($d = $req->fetch()) {echo '<li><b>'.$d['circuitID'].' - '.$d['description'].' : </b>'.$d['AVG(note)'].'</li>';  } ?>
					</ul>
				</li>
			</ul>
		</article>

	</section>
</body>
</html>