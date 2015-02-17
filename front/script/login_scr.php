<?php 
session_start();
if(isset($_POST['login']) && isset($_POST['passwd'])) {
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

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
				else header('location: ../..front/vue/accueil.php');
			}
		}
	}
}
 ?>
