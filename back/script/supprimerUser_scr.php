<?php include '../../include/script/secur_back.php';

if (isset($_POST['clientID'])) {
	$req = $bdd->prepare('DELETE FROM CLIENT WHERE clientID = ?');
	$req->execute(array($_POST['clientID']));
	if (!$req){
			echo "\nEreur : \n";
			print_r($req->errorInfo());
	}
	else header('location:../vue/user_bo.php');
}
else header('location:../vue/user_bo.php');

?>