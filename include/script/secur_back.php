<?php 
/* ========================================================================== *\
 * Script à inclure dans toutes les pages du back office :
 * => Si le visiteur n'est pas admin, il est redirigé avec sa session courante 
 * vers front/login.php?false=session
\* ========================================================================== */

session_start();

if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
	header('location: ../../front/vue/accueil.php');
}
else {

	include '../../include/bdd.php';

	$login = Securite::bdd($_SESSION['login']);
	$passwd = Securite::bdd($_SESSION['password']);

	$requete = $bdd->prepare('SELECT login, passwd, admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch()) {
		if ($donnees['admin']) {
			header('location: back/vue/accueil.php');
		}
		else header('location: front/vue/accueil.php');
	}
}
 ?>