<?php 
include_once '../../include/script/secur_front.php';

$requete = $bdd->prepare('SELECT description, paysDepart , villeDepart, villeArrivee, dureeCircuit, dateDepart, prix FROM CIRCUIT C, CIRCUITPROGRAMME P WHERE C.circuitID = P.circuitID');
$requete->execute();
?>
	<div class="para-large center">
	<ul class="style-none" style="position:relative;min-height:400px;">
<?php
while($donnees = $requete->fetch())
{
?>
	<li class="row">
		<div class="col col-25 ta-center circuit-btn" onclick="$('.circuit-btn').removeClass('circuit-btn-actif').next().css('display', 'none');$(this).addClass('circuit-btn-actif').next().css('display', 'inline-block');"><?=$donnees['description']?></div>
		<div class="col col-75 circuit-info" style="display:none">
			<div class="info-titre"><?=$donnees['description']?></div>
			<div><b>Départ : </b><span><?=$donnees['villeDepart']?>, <?=$donnees['paysDepart']?></span> - <b>Arrivée : </b><span><?=$donnees['villeArrivee']?></span></div>
		</div>
	</li>
<?php
}
?>
	</ul>
	</div>

