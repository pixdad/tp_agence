<?php 
include '../../include/script/secur_front.php';

if ($connect) {
	if(isset($_POST['clientID']) && isset($_POST['pID']) && isset($_POST['mode']) && isset($_POST['nombre']) && $_POST['nombre'] < 10) { //On bloque à 10 commandes
		$clientID = $_POST['clientID'];
		$pID = $_POST['programmationID'];
		$mode = $_POST['mode'];
		$nombre = $_POST['nombre'];

		$sql = 'INSERT INTO RESERVATION(clientID, programmationID, dateReservation, modePaiement) VALUES (?,?,CURDATE(), ?)';
		$req = $bdd->prepare($sql);
		$req->execute(array($clientID, $pID, $mode));
		if (!$req){
			echo "\nEreur dans la réservation de la $i ieme place\n";
			print_r($req->errorInfo());
			echo "Vous avez sans doute déjà réservé une place pour ce voyage. Vérifiez dans votre espace membre !";
		}
		else echo "<h1>Bravo ! Votre réservation vient d'être validée</h1>";

	}
	else echo("<h1>Erreur dans les données post : veuillez réessayer</h1>");

	echo("<a href='../accueil.php'>Retour à l'accueil</a>");
}
else {
	header('location:../vue/login.php?false=session');
}


 ?>