<?php 
include '../../include/script/secur_front.php';

$template_html = '<!DOCTYPE html><html lang="fr"><link rel="stylesheet" href="../../css/style.css">
<link rel="stylesheet" href="../../css/form.css">
<link rel="stylesheet" href="../../css/propriete.css"><link rel="stylesheet" href="../../css/normalize.css"><head><meta charset="UTF-8"><title>Affichage des avis - Travel\'INT Agency</title></head><body>';

echo $template_html;
$req = "";

if (isset($_GET['id']))
{
	$circuitID = $_GET['id'];
	$sql = 'SELECT description, note, avis, prenom, nom FROM AVIS A, CIRCUIT C1, CLIENT C2 WHERE A.circuitID = C1.circuitID AND A.clientID = C2.clientID AND A.circuitID = ?';
	$req = $bdd->prepare($sql);
	$req->execute(array($circuitID));
	if (!$req){
			echo "\nEreur :\n";
			print_r($req->errorInfo());
		}

} else {

	$sql = 'SELECT description, note, avis, prenom, nom FROM AVIS A, CIRCUIT C1, CLIENT C2 WHERE A.circuitID = C1.circuitID AND A.clientID = C2.clientID';
	$req = $bdd->prepare($sql);
	$req->execute();
	if (!$req){
			echo "\nEreur :\n";
			print_r($req->errorInfo());
		}
}

?>
<table class="full ta-center">
<tr>
	<td>Circuit :</td>
	<td>Client :</td>
	<td>Note :</td>
	<td>Avis :</td>
</tr>
<?php
while($donnees = $req->fetch())
{
?>
<tr>
	<td><?=$donnees['description']?></td>
	<td><?=$donnees['prenom']?> <?=$donnees['nom']?></td>
	<td><?=$donnees['note']?></td>
	<td><?=$donnees['avis']?></td>
</tr>
<?php
}
echo "</table>";
if (isset($_GET['id']))
{
	$circuitID = $_GET['id'];
	$sql_2 = 'SELECT AVG(note) FROM AVIS GROUP BY circuitID HAVING circuitID = ?';
	$req_2 = $bdd->prepare($sql_2);
	$req_2->execute(array($circuitID));
	if (!$req_2){
		echo "\nEreur :\n";
		print_r($req_2->errorInfo());
	}
	if ($donnees_2 = $req_2->fetch())
	{
		?>
		<div></div>
		<div>Moyenne des notes : <?=$donnees_2[0]?></div>
		<?php
	}
}
echo("<a href='#' onclick='window.close()'>Fermer la fennêtre.</a>");
?>

</body></html>
