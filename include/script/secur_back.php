<?php 
/* ========================================================================== *\
 * Script à inclure dans toutes les pages du back office :
 * => Si le visiteur n'est pas admin, il est redirigé avec sa session courante 
 * vers front/vue/login.php?false=session
\* ========================================================================== */

session_start();
include '../../include/script/bdd.php';

if (!isset($_SESSION['login']) || !isset($_SESSION['passwd'])) {
	header('location: ../../front/vue/login.php?false=session');
}
else {

	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];

	$requete = $bdd->prepare('SELECT prenom, nom, adresse, admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch()) {
		if ($donnees['admin']) {
			$prenom = $donnees['prenom'];
			$nom = $donnees['nom'];
			$adresse = $donnees['adresse'];
			$passwd = ''; //On vide pour éviter de s'en servir dans le reste de la page (pour l'afficher, etc.)
		}
		else header('location: ../../front/vue/login.php?false=session');
	}
	else header('location: ../../front/vue/login.php?false=session');
}
$admin = true;
 ?>