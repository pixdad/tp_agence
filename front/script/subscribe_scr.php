<?php 
include '../../include/script/secur_front.php';

if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['adresse'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$adresse = $_POST['adresse'];
	$login = $_POST['login'];
	$passwd = $_POST['passwd'];

	$test = $bdd->prepare('SELECT login FROM CLIENT WHERE login = ?');
	$test->execute(array($login));
	if ($exist = $test->fetch()) {
		header('location:../vue/subscribe.php?reponse=exist');
	}
	else {

		$sql = 'INSERT INTO CLIENT(nom, prenom, adresse, login, passwd) VALUES (?,?,?,?,?)';
		$req = $bdd->prepare($sql);
		$req->execute(array($nom, $prenom, $adresse, $login, $passwd));
		if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
			echo "Vous avez sans doute déjà réservé une place pour ce voyage. Vérifiez dans votre espace membre !";
		}
		else header('location:../vue/subscribe.php?reponse=ok');
	}

}	
else header('location:../vue/subscribe.php');
 
?>