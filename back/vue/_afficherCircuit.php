<?php 
include_once '../../include/script/secur_back.php';
?>

<table class="full ta-center bg-fond-sombre">
	<tr style="border-bottom:1px solid white">
		<td>Description</td>
		<td>Ville de départ</td>
		<td>Pays de départ</td>
		<td>Ville d'arrivée</td>
		<td>Durée en jours</td>
		<td>Modifier</td>
		<td>Supprimer</td>
	</tr>

	<?php 

		$sql = 'SELECT * FROM CIRCUIT';
		$req = $bdd->query($sql);
		if (!$req){
			echo "\nEreur :\n";
			print_r($req->errorInfo());
		}
		while($donnees = $req->fetch()) { ?>

		<tr>
			<td><?=$donnees['description']?></td>
			<td><?=$donnees['villeDepart']?></td>
			<td><?=$donnees['paysDepart']?></td>
			<td><?=$donnees['villeArrivee']?></td>
			<td><?=$donnees['dureeCircuit']?></td>
			<td><form action=""><input type="hidden"><input type="submit" value="Modifier"></form></td>
			<td><form action=""><input type="hidden"><input type="submit" value="Supprimer"></form></td>
		</tr>

		<?php } ?>
</table>
