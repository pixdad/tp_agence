<?php 
/* ========================================================================== *\
 * Script à inclure dans toutes les pages du back office :
 * => Si le visiteur n'est pas admin, il est redirigé avec sa session courante 
 * vers front/vue/login.php?false=session
\* ========================================================================== */

session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['password'])) {
	header('location: ../../front/vue/login.php?false=session');
}
else {

	include '../../include/script/bdd.php';

	$login = $_SESSION['login'];
	$passwd = $_SESSION['password'];

	$requete = $bdd->prepare('SELECT prenom, nom, adresse, admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch() && $donnees['admin']) {
		$prenom = $donnees['prenom'];
		$nom = $donnees['nom'];
		$adresse = $donnees['adresse'];
		$passwd = ''; //On vide pour éviter de s'en servir dans le reste de la page (pour l'afficher, etc.)
	}
	else header('location: ../../front/vue/login.php?false=session');
}
 ?>