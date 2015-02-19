<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Reservation - Travel\'INT Agency</title></head><body>';

if ($connecte) {
	echo $template_html;
	if(isset($_POST['cID']) && isset($_POST['pID']) ) {
		$cID = $_POST['cID'];
		$pID = $_POST['pID'];

		$sql = 'DELETE FROM RESERVATION WHERE clientID = ? AND programmationID = ?';
		$req = $bdd->prepare($sql);
		$req->execute(array($cID, $pID));

		if (!$req){
			echo "\nEreur dans l'envoi de la requête SQL: \n";
			print_r($req->errorInfo());
		}
		else echo "<h1>Votre réservation a été annulée !</h1>";

	}	
	else echo("<h1>Erreur dans les données post : veuillez réessayer</h1>");

	echo("<a href='../vue/gestionMembre.php'>Retour à votre espace membre</a>");
}
else {
	header('location:../vue/login.php?false=session');
}


 ?>

 </body></html>