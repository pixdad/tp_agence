<?php include '../../include/script/secur_back.php';

if (isset($_POST['circuitID']) && isset($_POST['clientID'])) {
	$req = $bdd->prepare('DELETE FROM AVIS WHERE circuitID = ? AND clientID = ?');
	$req->execute(array($_POST['circuitID'], $_POST['clientID']));
	if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
	}
	else header('location:../vue/avis_bo.php');
}
else header('location:../vue/avis_bo.php');

?>