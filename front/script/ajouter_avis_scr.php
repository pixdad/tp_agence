<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Ajout d\'un avis - Travel\'INT Agency</title></head><body>';

if ($connecte) {
	echo $template_html;
	if(isset($_POST['circuitID']) && isset($_POST['note']) && isset($_POST['clientID']
		&& isset($_POST['avis'])) {
		$clientID = $_POST['clientID'];
		$circuitID = $_POST['circuitID'];
		$note = $_POST['note'];
		$avis = $_POST['avis'];

		$sql_delete = 'DELETE FROM AVIS WHERE circuitID = ? AND clientID = ?'
		$sql_add = 'INSERT INTO AVIS(circuitID, clientID, note, avis) VALUES (?,?,?,?)';
		$req = $bdd->prepare($sql_delete);
		$req->execute(array($circuitID, $clientID));

		$req = $bdd->prepare($sql_add);
		$req->execute(array($circuitID, $clientID, $note, $avis));

		if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
			echo "Impossible d'ajouter un avis pour ce circuit.";
		}
		else echo "<h1>Merci ! Votre avis a bien été enrengistré.</h1>";

	}	
	else echo("<h1>Erreur dans les données post : veuillez réessayer.</h1>");

	echo("<a href='../vue/accueil.php'>Retour à l'accueil.</a>");
}
else {
	header('location:../vue/login.php?false=session');
}


 ?>

 </body></html>