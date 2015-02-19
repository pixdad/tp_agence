<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Affichage des avis - Travel\'INT Agency</title></head><body>';

echo $template_html;

if (isset($_GET['id']))
{
	$circuitID = $_GET['id'];
	$sql = 'SELECT description, note, avis, prenom, nom FROM AVIS A, CIRCUIT C1, CLIENT C2 WHERE A.circuitID = C.circuitID AND C1.clientID = C2.clientID AND circuitID = ?';
	$req = $bdd->prepare($sql);
	$req->execute(array($circuitID));

} else {

	$sql = 'SELECT description, note, avis, prenom, nom FROM AVIS A, CIRCUIT C1, CLIENT C2 WHERE A.circuitID = C.circuitID AND C1.clientID = C2.clientID';
	$req = $bdd->prepare($sql);
	$req->execute();
}

?>
<table class="full ta-center">
<tr>
	<td>Circuit : :</td>
	<td>Client : :</td>
	<td>Note :</td>
	<td>Avis :</td>
</tr>
<?php

while($donnees = $requete->fetch())
{
?>

<tr>
	<td><?=$donnees['description']?></td>
	<td><?=$donnees['prenom'] $donnees['nom']?></td>
	<td><?=$donnees['note']?></td>
	<td><?=$donnees['avis']?></td>
</tr>

<?php
}

echo("<a href='../vue/accueil.php'>Retour à l'accueil.</a>");

?>
</body></html>