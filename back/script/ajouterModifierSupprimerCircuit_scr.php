<?php include '../../include/script/secur_back.php' ;

if (isset($_POST['action'])) {
	

	switch($_POST['action']) {

		case "suprimer":
			if($_POST['circuitID']) {
				$req = $bdd->prepare('DELETE FROM CIRCUIT WHERE circuitID = ?');
				$req->execute(array($_POST['circuitID']);
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;

		case "modifier":
			if($_POST['description'] && $_POST['villeDepart'] && $_POST['paysDepart'] && $_POST['villeArrivee'] && $_POST['dureeCircuit'] && $_POST['circuitID'] ) {
				$req = $bdd->prepare('UPDATE CIRCUIT SET description=?, villeDepart=?, paysDepart=?, villeArrivee=?, dureeCircuit=? WHERE circuitID = ?');
				$req->execute(array($_POST['description'], $_POST['villeDepart'], $_POST['paysDepart'], $_POST['villeArrivee'], $_POST['dureeCircuit'], $_POST['circuitID']);
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;

		case "ajouter":
			if($_POST['description'] && $_POST['villeDepart'] && $_POST['paysDepart'] && $_POST['villeArrivee'] && $_POST['dureeCircuit']) {
				$req = $bdd->prepare('INSERT INTO CIRCUIT(description, villeDepart, paysDepart, villeArrivee, dureeCircuit) VALUES (?,?,?,?,?)');
				$req->execute(array($_POST['description'], $_POST['villeDepart'], $_POST['paysDepart'], $_POST['villeArrivee'], $_POST['dureeCircuit']);
				if (!$req){
						echo "\nEreur : \n";
						print_r($req->errorInfo());
				}
			}
		break;


	}
}
header('location:../vue/circuit_bo.php');


?>