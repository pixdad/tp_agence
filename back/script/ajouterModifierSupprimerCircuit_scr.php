<?php include '../../include/script/secur_back.php' ;

if (isset($_POST['action'])) {
	

	switch($_POST['action']) {

		case "supprimer":
			if($_POST['circuitID']) {
				$req = $bdd->prepare('DELETE FROM CIRCUIT WHERE circuitID = ?');
				$req->execute(array($_POST['circuitID']));
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;

		case "modifier":
			if($_POST['description'] && $_POST['villeDepart'] && $_POST['paysDepart'] && $_POST['villeArrivee'] && $_POST['dureeCircuit'] && $_POST['circuitID'] ) {
				$req = $bdd->prepare('UPDATE CIRCUIT SET description=?, villeDepart=?, paysDepart=?, villeArrivee=?, dureeCircuit=? WHERE circuitID = ?');
				$req->execute(array($_POST['description'], $_POST['villeDepart'], $_POST['paysDepart'], $_POST['villeArrivee'], $_POST['dureeCircuit'], $_POST['circuitID']));
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;

		case "ajouter":
			if($_POST['description'] && $_POST['villeDepart'] && $_POST['paysDepart'] && $_POST['villeArrivee'] && $_POST['dureeCircuit']) {
				$req = $bdd->prepare('INSERT INTO CIRCUIT(description, villeDepart, paysDepart, villeArrivee, dureeCircuit) VALUES (?,?,?,?,?)');
				$req->execute(array($_POST['description'], $_POST['villeDepart'], $_POST['paysDepart'], $_POST['villeArrivee'], $_POST['dureeCircuit']));
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;

		case "modifierEtape":
			if($_POST['etape'] && $_POST['nbJour'] && $_POST['circuitID'] ) {
				$etape = $_POST['etape'];
				$jour = $_POST['nbJour'];
				$supprimer = $bdd->prepare('DELETE FROM ETAPE WHERE circuitID = ?');
				$supprimer->execute(array($_POST['circuitID']));

				for($i=0;$i<count($etape);$i++) {
					$req = $bdd->prepare('INSERT INTO ETAPE(circuitID, numeroEtape, villeEtape, nombreJours) VALUES(?,?,?,?)');
					$req->execute(array( $_POST['circuitID'], $i+1, $etape[$i], $jour[$i]));
					if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
					}
				}
			}
		break;


	}
}
header('location:../vue/circuit_bo.php');


?>