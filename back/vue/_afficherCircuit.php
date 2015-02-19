<?php 
include_once '../../include/script/secur_back.php';
?>

<table class="full ta-center bg-fond-sombre">
	<tr style="border-bottom:1px solid white">
		<td>Description</td>
		<td>Date de départ</td>
		<td>Date de réservation</td>
		<td>Prix</td>
		<td>Supprimer</td>
	</tr>

	<?php 

		$sql = 'SELECT description, dateDepart, villeDepart, villeArrivee, paysDepart, R.programmationID, dateReservation, prix
				FROM RESERVATION R, CIRCUITPROGRAMME CP, CIRCUIT C
				WHERE R.programmationID = CP.programmationID AND CP.circuitID = C.circuitID AND R.clientID = ?';
		$req = $bdd->prepare($sql);
		$req->execute(array($id));
		if (!$req){
			echo "\nEreur :\n";
			print_r($req->errorInfo());
		}
		while($donnees = $req->fetch()) { ?>