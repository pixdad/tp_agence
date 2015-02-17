<?php 
session_start();
if(isset($_POST['login']) && isset($_POST['passwd'])) {
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];
	$var = false;

	include '../../include/bdd.php';

	$requete = $bdd->prepare('SELECT login, passwd, admin FROM CLIENT WHERE login=?');
	$requete->execute(array($login));

	while($donnees = $requete->fetch()) {
		if ($donnees['passwd'] == $passwd) {
			
			$_SESSION['login'] = $login;
			$_SESSION['passwd'] = $passwd;

			if ($donnees['admin']) {
				header('location: ../../back/vue/accueil.php');
			}
			else {
				header('location: ../..front/vue/accueil.php');
			}
		}
	}
	$var = true;
	if ($var == true) header('location: ../vue/login.php?response=false');
}
else {
	header('location: ../vue/login.php?message=ici');
}
 ?>
