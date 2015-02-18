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
	</section>
	<?php include '../../include/vue/footer.php' ?>
</body>
</html>