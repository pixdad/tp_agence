<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Reservation - Travel\'INT Agency</title></head><body>';

if ($connecte) {
	echo $template_html;
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['adresse']) && isset($_POST['login']) && isset($_POST['clientID'])) {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$adresse = $_POST['adresse'];
		$login = $_POST['login'];
		$id = $_POST['clientID'];

		if(isset($_POST['passwd']) && $_POST['passwd']!='') {
			$passwd = $_POST['passwd'];
			$sql = 'UPDATE CLIENT SET nom=?, prenom=?, adresse=?, login=?, passwd=? WHERE clientID = ?';
			$req = $bdd->prepare($sql);
			$req->execute(array($nom, $prenom, $adresse, $login, $passwd, $id));
		}
		else {
			$sql = 'UPDATE CLIENT SET nom=?, prenom=?, adresse=?, login=? WHERE clientID = ?';
			$req = $bdd->prepare($sql);
			$req->execute(array($nom, $prenom, $adresse, $login, $id));
		}
		if (!$req){
			echo "\nEreur dans l'envoi de la requête SQL: \n";
			print_r($req->errorInfo());
		}
		else echo "<h1>Vos modifications ont été enregistrées</h1>";

	}	
	else echo("<h1>Erreur dans les données post : veuillez réessayer</h1>");

	echo("<a href='../vue/gestionMembre.php'>Retour à votre espace membre</a>");
}
else {
	header('location:../vue/login.php?false=session');
}


 ?>

 </body></html>