<?php 
include_once '../../include/script/secur_front.php';

$requete = $bdd->prepare('SELECT description, paysDepart , villeDepart, villeArrivee, dureeCircuit, dateDepart, prix FROM CIRCUIT C, CIRCUITPROGRAMME P WHERE C.circuitID = P.circuitID');
$requete->execute();

?>
<table class="full ta-center">
<tr>
	<td>Description :</td>
	<td>Pays départ :</td>
	<td>Ville départ :</td>
	<td>Ville arrivée :</td>
	<td>Durée circuit :</td>
	<td>Date départ :</td>
	<td>Prix :</td>
	<td>Inscription :</td>
</tr>
<?php

while($donnees = $requete->fetch())
{
?>

<tr>
	<td><?=$donnees['description']?></td>
	<td><?=$donnees['paysDepart']?></td>
	<td><?=$donnees['villeDepart']?></td>
	<td><?=$donnees['villeArrivee']?></td>
	<td><?=$donnees['dureeCircuit']?></td>
	<td><?=$donnees['dateDepart']?></td>
	<td><?=$donnees['prix']?></td>
	<td><a <?php if ($connecte == true) print("href=\"../script/inscription.php\""); else print("href=\"../vue/login.php\""); ?> class="button-sm bg-main">S'inscire</a></td>
</tr>

<?php
}
?>
</table>
