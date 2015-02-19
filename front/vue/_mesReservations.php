<?php 
include_once '../../include/script/secur_front.php';

if(!$connecte) {
	header('location:login.php?false=session');
}
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

		<tr>
			<td><?=$donnees['description']?><br/><?=$donnees['villeDepart']?>, <?=$donnees['paysDepart']?> - <?=$donnees['villeArrivee']?></td>
			<td><?=$donnees['dateDepart']?></td>
			<td><?=$donnees['dateReservation']?></td>
			<td><?=$donnees['prix']?>€</td>
			<td><form action="../script/supprimerReservation_scr.php" method="post">
				<input type="hidden" name="cID" value="<?=$id?>">
				<input type="hidden" name="pID" value="<?=$donnees['programmationID']?>">
				<input type="submit" value="Supprimer">
			</form></td>
		</tr>

		<?php } ?>


</table>