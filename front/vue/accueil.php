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
	<header id="one_page" class="fond-h0">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
		<div class="ta-center marge-xl"><a href="#" class="button-xl uppercase thin bg-main  wow zoomIn" data-wow-delay="0.5s">Découvrez</a></div>
	</header>
	<section class="section bg-fond-1">
		<h2 class="wow fadeInUp">Notre objectif</h2>
		<div class="para center wow zoomIn" data-wow-delay="0.5s">
			<div class="info-titre ta-center">Vous fournir les meilleurs voyages, à petit prix</div>
		</div>
	</section>
	<section id="actualite" class="section bg-fond-2">
		<h2 class="wow fadeInUp">Actualités</h2>
		<ul class="list-x para-large wow zoomIn">
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quod aut voluptas magni praesentium tenetur corrupti facilis doloremque cum, laudantium earum quaerat autem et totam quia dicta magnam fugiat dolore.</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At perferendis magni quae maiores consequuntur, sequi ipsa debitis doloremque laudantium iure quisquam tempora quo velit iste molestias necessitatibus fuga, qui provident.</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure voluptate dolores animi quisquam accusamus quo? Perspiciatis deleniti dolores, exercitationem doloremque. Similique quisquam soluta minus, incidunt necessitatibus cupiditate atque minima doloremque!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae doloribus molestiae vero, ipsam sequi ratione alias, provident expedita quibusdam facilis consequatur velit a voluptatibus corrupti, explicabo sapiente asperiores necessitatibus in!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quae incidunt, hic dignissimos cumque, enim doloribus sequi accusamus quis voluptatibus libero beatae magni, ipsa in, quos eos. Illum, necessitatibus, nemo!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi placeat est maiores officia ab cupiditate dolorum earum unde, adipisci sapiente aliquid beatae sed temporibus vero hic incidunt quaerat quisquam magni.</li>
		</ul>
	</section>

	<section id="circuit" class="section bg-fond-1">
		<h2 class="wow fadeInUp">Circuits proposés <a style="vertical-align:top" href="circuit.php" class="button-xl bg-main">Détails</a></h2>
		<p class="ta-center"></p>
		<?php include '_circuit.php'; ?>
	</section>

	<section id="contact" class="section bg-fond-2">
		<h2 class="wow fadeInUp">Contact</h2>
		<div class="row para-large center wow zoomIn" data-wow-delay="0.5s">
			<div class="col col-50">
				<span class="info-titre">Travel'INT Agency</span>
				<p>
					5 rue Charles Fourier,<br/>
					91000 EVRY
				</p>
				<p>
					<b>TEL : </b>01 23 45 67 89<br/>
					<b>EMAIL : </b><a href="mailto:contact@travelintagency.com">contact@travelintagency.com</a>
				</p>
			</div>
			<div class="col col-50">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2637.2402173428995!2d2.4444044000000003!3d48.6243851!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e5e0a5bdc254e7%3A0x57e17cc472e08bc2!2s5+Rue+Charles+Fourier%2C+T%C3%A9l%C3%A9com+Ecole+de+Management%2C+91000+%C3%89vry!5e0!3m2!1sfr!2sfr!4v1424295881386" width="600" height="450" frameborder="0" style="border:0"></iframe>
			</div>
		</div>
	</section>
	
	<?php include '../../include/vue/footer.php' ?>

	<script>
	$(function() {
		$('#one_page').height('600px');//$(window).height());
	});
	</script>
</body>
</html>