<nav class="connect-links row">
<?php 
if ($connecte) {
?>
		<span class="col col-50 ta-left">
			<ul class="menu style-none horizontal">
				<li><a href="accueil.php">Accueil</a></li>
				<li><a href="accueil.php#actualite">Actualités</a></li>
				<li><a href="circuit.php">Circuits</a></li>
				<li><a href="accueil.php#contact">Contact</a></li>
			</ul>
		</span>
		<span class="col col-50 ta-right">
			<span style="margin-right:50px;">Bienvenue <?=$nom?> <?=$prenom?>,</span>
			<a href="gestionMembre.php" class="button-xs bg-main">Mon compte</a>
			<a class="button-xs bg-second" href="../script/login_scr.php?deconnect=true">Se déconnecter</a>
		</span>
		
<?php
}
else {
?>
		<span class="col col-50 ta-left"></span>
		<span class="col col-50 ta-right">
			<form action="../script/login_scr.php" method="post">
				<input type="text" name="login"	placeholder="login">
				<input type="password" name="passwd" placeholder="mot de passe">
				<input class="bg-second" type="submit" value="Se connecter">
			</form>
		</span>
<?php
}
?>
</nav>