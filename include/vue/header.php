<nav class="connect-links row">
<?php 
if (isset($admin) && $admin) { ?>
		<span class="col col-50 ta-left">
			<ul class="menu style-none horizontal">
				<li id="link-admin"><a href="../../back/vue/accueil.php"><span class='c-valeur'>Administrateur </span></a>
					<ul class="sub-links style-none vertical bg-fond-sombre">
						<li><a href="../../back/vue/circuit_bo.php">Circuits</a></li>
						<li><a href="../../back/vue/programmation_bo.php">Programmations</a></li>
						<li><a href="../../back/vue/actualite_bo.php">Actualité</a></li>
						<li><a href="../../back/vue/avis_bo.php">Avis</a></li>
					</ul>
				</li>
				<li><a href="../../front/vue/accueil.php">Voir le site</a></li>
				<li><a href="../../front/vue/accueil.php#actualite">Actualités</a></li>
				<li><a href="../../front/vue/circuit.php">Circuits</a></li>
				<li><a href="../../front/vue/accueil.php#contact">Contact</a></li>
			</ul>
		</span>

<?php } else { ?>
		<span class="col col-50 ta-left">
			<ul class="menu style-none horizontal">
				<li><a href="accueil.php">Accueil</a></li>
				<li><a href="accueil.php#actualite">Actualités</a></li>
				<li><a href="circuit.php">Circuits</a></li>
				<li><a href="accueil.php#contact">Contact</a></li>
			</ul>
		</span>
<?php 
}

if ((isset($connecte) && $connecte) || (isset($admin) && $admin)) {
?>
		<span class="col col-50 ta-right">
			<span style="margin-right:50px;">Bienvenue <?=$nom?> <?=$prenom?>,</span>
			<a href="gestionMembre.php" class="button-xs bg-main">Mon compte</a>
			<a class="button-xs bg-second" href="../../front/script/login_scr.php?deconnect=true">Se déconnecter</a>
		</span>
		
<?php
}
else {
?>
		<span class="col col-50 ta-right">
			<form action="../script/login_scr.php" method="post">
				<input type="text" name="login"	placeholder="login">
				<input type="password" name="passwd" placeholder="mot de passe">
				<input class="bg-second" type="submit" value="Se connecter">
				<a href="subscribe.php" style="border-left:1px solid white;padding:0 15px;margin:0 15px;">S'inscrire</a>
			</form>
		</span>
<?php
}
?>
</nav>