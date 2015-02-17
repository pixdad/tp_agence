<?php 

/* ========================================================================== *\
 * $_GET deconnect = true : deconnexion
 * $_POST login et passwd : connexion
 * sinon : redirection vers vue/login.php
\* ========================================================================== */

session_start();
if (isset($_GET['deconnect']) && $_GET['deconnect']=='true') {
	session_destroy();
}
else if(isset($_POST['login']) && isset($_POST['passwd'])) {
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

	include '../../include/script/bdd.php';

	$requete = $bdd->prepare('SELECT admin FROM CLIENT WHERE login=? AND passwd=?');
	$requete->execute(array($login, $passwd));

	if($donnees = $requete->fetch()) {
			$_SESSION['login'] = $login;
			$_SESSION['passwd'] = $passwd;

			if ($donnees['admin']) {
				header('location: ../../back/vue/accueil.php');exit();
			}
			else {
				header('location: ../..front/vue/accueil.php');exit();
			}
	}
	else header('location: ../vue/login.php?false=id');exit();
}
else {
	header('location: ../vue/login.php');exit();
}





 ?>
