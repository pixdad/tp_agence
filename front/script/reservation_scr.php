<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Reservation - Travel\'INT Agency</title></head><body>';

if ($connecte) {
	echo $template_html;
	if(isset($_POST['clientID']) && isset($_POST['pID']) && isset($_POST['mode'])) {
		$clientID = $_POST['clientID'];
		$pID = $_POST['pID'];
		$mode = $_POST['mode'];

		$sql = 'INSERT INTO RESERVATION(clientID, programmationID, dateReservation, modePaiement) VALUES (?,?,CURDATE(), ?)';
		$req = $bdd->prepare($sql);
		$req->execute(array($clientID, $pID, $mode));
		if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
			echo "Vous avez sans doute déjà réservé une place pour ce voyage. Vérifiez dans votre espace membre !";
		}
		else echo "<h1>Bravo ! Votre réservation vient d'être validée</h1>";

	}	
	else echo("<h1>Erreur dans les données post : veuillez réessayer</h1>");

	echo("<a href='../vue/accueil.php'>Retour à l'accueil</a>");
}
else {
	header('location:../vue/login.php?false=session');
}


 ?>

 </body></html>