<nav class="connect-links row">
<?php 
if ($connecte) {
?>
		<span class="col col-50 ta-left">Bienvenue <?=$nom?> <?=$prenom?>,</span>
		<span class="col col-50 ta-right"><a class="button-xs bg-second" href="../script/login_scr.php?deconnect=true">Se déconnecter</a></span>
		
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