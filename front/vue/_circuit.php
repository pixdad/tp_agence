<?php 
include_once '../../include/script/secur_front.php';

$requete = $bdd->prepare('SELECT circuitID, description, paysDepart , villeDepart, villeArrivee, dureeCircuit FROM CIRCUIT C ORDER BY circuitID');
$requete->execute();
?>
	<div class="para-large center">
	<ul class="style-none" style="position:relative;min-height:400px;">
<?php
while($donnees = $requete->fetch())
{
?>
	<li class="row">
		<div class="col col-25 ta-left circuit-btn" onclick="$('.circuit-btn').removeClass('circuit-btn-actif').next().css('display', 'none');$(this).addClass('circuit-btn-actif').next().css('display', 'inline-block');"><?=$donnees['description']?></div>
		<div class="col col-75 circuit-info" style="display:none">
			<div class="info-titre"><?=$donnees['description']?></div>
			<div><b>Départ : </b><?=$donnees['villeDepart']?>, <?=$donnees['paysDepart']?> - <b>Arrivée : </b><?=$donnees['villeArrivee']?><br/>
			<b>Durée : </b><?=$donnees['dureeCircuit']?> jours</div>
			<table class="full ta-center bg-fond-sombre">
				<tr style="border-bottom:1px solid white">
					<td>Date départ</td>
					<td>Prix</td>
					<td>Places restantes</td>
					<td>Réserver</td>
				</tr>
				<?php 
					$sql = 'SELECT dateDepart, prix, nombrePersonnes, P.programmationID, count(*) 
							FROM CIRCUITPROGRAMME P LEFT OUTER JOIN RESERVATION R 
							ON (P.programmationID = R.programmationID) WHERE circuitID = ?
							GROUP BY P.programmationID';
					$requete_p = $bdd->prepare($sql);
					$requete_p->execute(array($donnees['circuitID']));
					if (!$requete_p){
						echo "\nEreur :\n";
						print_r($requete_p->errorInfo());
					}
					while($program = $requete_p->fetch()) {
						$place_restante = $program['nombrePersonnes']-$program[4];
						?>
						<tr>
							<td><?=$program['dateDepart']?></td>
							<td><?=$program['prix']?>€</td>
							<td><?=$place_restante?></td>
							<td>
								<?php if($connecte) { ?>
									<form action="../script/reservation_scr.php" method='post'>
										<input type="hidden" name="clientID" value="<?=$id?>"><input type="hidden" name="pID" value="<?=$program['programmationID']?>">
										<select name="mode" style="color:black" required><optgroup label="Mode de paiement"></option><option value="Cheque"/>Chèque<option value="CB"/>CB</optgroup></select>
										<input type="submit" class="button-xs bg-second" value="Réserver">
									</form>
								<?php } else { ?>
									<a href="login.php" class="button-xs bg-second">Se connecter</a>
								<?php } ?>
								
							</td>
						</tr>
					<?php } ?>
			</table>
		</div>
	</li>
<?php
}
?>
	</ul>
	</div>



