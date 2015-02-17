<?php
session_start();

if (!isset($_SESSION['login']) && !isset($_SESSION['password'])) {
	header('location: front/vue/accueil.php');
}
else {

	include 'include/bdd.php';

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