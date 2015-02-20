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
			<div class="col col-25 ta-center" style="vertical-align:middle;"><a href="circuit_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/circuit-xl.png" alt=""><br>Gérer les circuits</a></div>
			<div class="col col-25 ta-center" style="vertical-align:middle;"><a href="programmation_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/programmation-xl.png" alt=""><br>Gérer les programmation</a></div>
			<div class="col col-25 ta-center" style="vertical-align:middle;"><a href="actualite_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/actualite-xl.png" alt=""><br>Gérer les actualités</a></div>
			<div class="col col-25 ta-center" style="vertical-align:middle;"><a href="avis_bo.php" class="ico-link c-valeur button-xl"><img src="../../src/img/avis-xl.png" alt=""><br>Modérer les avis</a></div>
		</div>
	</section>
</body>
</html>