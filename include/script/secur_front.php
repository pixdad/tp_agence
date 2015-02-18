<?php 
/* ========================================================================== *\
 * Script à inclure dans toutes les pages du front office :
 * => Si le visiteur n'est pas connecté, 
 * - $connecte = false
 * (BUT : Cacher certaines parties de la page OU rediriger le visiteur)
\* ========================================================================== */

session_start();

$connecte = false;

if (!isset($_SESSION['login']) || !isset($_SESSION['passwd'])) {
	$connecte = false;
}
else {

	include '../../include/script/bdd.php';

	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];

	$requete = $bdd->prepare('SELECT prenom, nom, adresse, admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch() && !$donnees['admin']) {
		$prenom = $donnees['prenom'];
		$nom = $donnees['nom'];
		$adresse = $donnees['adresse'];
		$passwd = ''; //On vide pour éviter de s'en servir dans le reste de la page (pour l'afficher, etc.)
	}
	else $connecte = false;
}


 ?>