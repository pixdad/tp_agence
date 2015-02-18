<?php include '../../include/script/secur_front.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php include '../../include/vue/head.php'; ?>
</head>
<body>
	<header id="one_page">
		<h1 class="h0 ta-center wow fadeInUp">Travel'INT<br/>Agency</h1>
		<div class="ta-center marge-xl"><a href="#" class="button-xl uppercase thin bg-main wow zoomIn" data-wow-delay="0.5s">Découvrez</a></div>
	</header>
	<section class="section bg-fond-1">
		<h2>Notre objectif</h2>
		<p class="para center">
			Vous fournir les meilleurs voyages, à petit prix
		</p>
	</section>
	<section class="section bg-fond-2">
		<h2>Actualités</h2>
		<ul class="list-x">
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quod aut voluptas magni praesentium tenetur corrupti facilis doloremque cum, laudantium earum quaerat autem et totam quia dicta magnam fugiat dolore.</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At perferendis magni quae maiores consequuntur, sequi ipsa debitis doloremque laudantium iure quisquam tempora quo velit iste molestias necessitatibus fuga, qui provident.</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure voluptate dolores animi quisquam accusamus quo? Perspiciatis deleniti dolores, exercitationem doloremque. Similique quisquam soluta minus, incidunt necessitatibus cupiditate atque minima doloremque!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae doloribus molestiae vero, ipsam sequi ratione alias, provident expedita quibusdam facilis consequatur velit a voluptatibus corrupti, explicabo sapiente asperiores necessitatibus in!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo quae incidunt, hic dignissimos cumque, enim doloribus sequi accusamus quis voluptatibus libero beatae magni, ipsa in, quos eos. Illum, necessitatibus, nemo!</li>
			<li class="list-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi placeat est maiores officia ab cupiditate dolorum earum unde, adipisci sapiente aliquid beatae sed temporibus vero hic incidunt quaerat quisquam magni.</li>
		</ul>
	</section>

	<section class="section">
		<h2>Circuits proposés</h2>
		<?php include '../script/circuit.php'; ?>
	</section>
	
	<script>
	$(function() {
		$('#one_page').height('600px');//$(window).height());
	});
	</script>
</body>
</html>