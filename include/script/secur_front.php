<?php 
/* ========================================================================== *\
 * Script à inclure dans toutes les pages du front office :
 * => Si le visiteur n'est pas connecté, 
 * - $connecte = false
 * (BUT : Cacher certaines parties de la page OU rediriger le visiteur)
\* ========================================================================== */

session_start();
include '../../include/script/bdd.php';

$connecte = false;
if (!isset($_SESSION['login']) || !isset($_SESSION['passwd'])) {
	$connecte = false;
}
else {

	$login = $_SESSION['login'];
	$passwd = $_SESSION['passwd'];

	$requete = $bdd->prepare('SELECT clientID, prenom, nom, adresse, admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch()) {
		$id = $donnees['clientID'];
		$prenom = $donnees['prenom'];
		$nom = $donnees['nom'];
		$adresse = $donnees['adresse'];
		$passwd = ''; //On vide pour éviter de s'en servir dans le reste de la page (pour l'afficher, etc.)
		if (!$donnees['admin']) {
			$connecte = true;
		}
		else {
			$connecte = false;
			$admin = true;
		}
	}
	else $connecte = false;
}


 ?>